<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $nim = $this->session-> userdata('nim');
        $data['user'] = $this->db->get_where('user', ['nim' =>$nim])->row_array();

        setlocale(LC_ALL, 'IND');
        $day = strtolower(strftime("%A"));

        $data['days'] = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        $data['currentDay'] = $day;
        $data['barang'] = $this->user->getBarangHilang();
        $data['info'] = $this->user->getInfoLab();

        $data['kelas'] = $this->user->getKelasNow($day);
        $data['title']  = 'Home';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('User/index', $data);
        $this->load->view('templates/footer');
    }

    public function nilaiUser(){
        $nim = $this->session-> userdata('nim');
        $data['user'] = $this->db->get_where('user', ['nim' =>$nim])->row_array();     
        $data['kelas'] = $this->user->getKelas();                                        

        $data['title']  = "Nilai";
        $data['header']  = 'Nilai ' . $data['user']['name'] ;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('User/nilai', $data);
        $this->load->view('templates/footer');
    }

    public function NilaiTugas(){
        $kelas = $_GET['kelas'];
        $nim = $nim = $this->session->userdata('nim');
        $data['tugas'] = $this->user->getNilaiTugasMahasiswa($kelas, $nim);
        $this->load->view('templates/view_ajax/tugas', $data);
    }

    public function NilaiLaporan(){
        $kelas = $_GET['kelas'];
        $nim = $nim = $this->session->userdata('nim');
        $data['laporan'] = $this->user->getNilaiLaporanMahasiswa($kelas, $nim);
        $this->load->view('templates/view_ajax/laporan', $data);
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('User/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nim = htmlspecialchars($this->input->post('nim', true));
            $name = htmlspecialchars($this->input->post('name', true));
            $email = htmlspecialchars($this->input->post('email'));
            $phone_number = htmlspecialchars($this->input->post('phone'));

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile';

                $this->load->library('upload', $config);

                $old_image = $data['user']['image'];

                if ($this->upload->do_upload('image')) {

                    if ($old_image != 'default.svg') {
                        unlink(FCPATH . 'assets/img/profile' .  $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->set('email', $email);
            $this->db->set('phone_number', $phone_number);

            $this->db->where('nim', $nim);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your Profile has been update</div>');
            redirect('user');
        }
    }

    public function getModalDownload()
    {
        $data['nama_kelas'] = $_GET['namaKelas'];
        $data['id_kelas'] = $_GET['idKelas'];
        $data['index_kelas'] = mb_substr($_GET['idKelas'], 0, 1, "UTF-8");
        $data['materi'] = $this->user->getAllMateri();

        $this->load->view('templates/view_ajax/modal_download', $data);
    }

    public function downloadMateri()
    {
        if (!empty($_GET['file'])) {
            $nama = basename($_GET['file']);
            $kelas = utf8_encode($_GET['kelas']);
            $filepath = base_url('upload/materi/') . $kelas . '/' . $nama;
            if (!file_exists($filepath)) {
                //Define Headers
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename=$nama");
                header("Content-Type: application/zip");
                header("Content-Transfer-Emcoding: binary");

                readfile($nama);
                exit;
            } else {
                echo "This File Does not exist.";
            }
        }
    }

    public function getJadwal()
    {
        $data['hari'] = $this->user->getJadwal($_GET['hari']);
        $this->load->view('templates/view_ajax/jadwal', $data);
    }

    public function uploadTugas()
    {
        $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

        $data['kelas'] = $this->user->getKelas();
        $kelas = $this->subArraysToString($this->user->getIdKelas());

        $data['title'] = 'Upload Tugas';
        $data['jenis'] = ['quiz', 'test', 'uts', 'uas'];
        $data['error'] = '';

        $jenis = implode(', ', $data['jenis']);

        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('jenis-ke', 'Jenis', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('User/upload_tugas', $data);
            $this->load->view('templates/footer');
        } else {
            $nim = htmlspecialchars($this->input->post('nim', true));
            $kelas = htmlspecialchars($this->input->post('kelas', true));
            $jenis = htmlspecialchars($this->input->post('jenis', true));
            $jenis_ke = htmlspecialchars($this->input->post('jenis-ke', true));
            $kelas_explode = explode('|', $kelas);
            $id_kelas = $kelas_explode[1];

            $filename = $_FILES["userfile"]["name"];
            $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
            $new_name = str_replace(' ', '_', $nim . '_' . $id_kelas . '_' . $jenis . '_' .  $jenis_ke .  '.' . $file_ext);

            $config['file_name']            = $new_name;
            $config['upload_path']          = "file_upload/tugas/" . $id_kelas . "/" . $jenis . "/" . $jenis_ke . '/';
            $config['allowed_types']        = 'gif|jpg|png|pdf|docx|xlsx|pptx|doc|rar|zip';
            $config['max_size']             = '10000';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            if ($this->user->cekJumlahTugas($jenis, $nim, $jenis_ke) > 0) {
                $tugas = $this->user->cekTugas($jenis, $nim, $jenis_ke);
                $file_dir = './file_upload/tugas/' . $tugas['id_perkuliahan'] . '/' . $tugas['jenis_tugas'] . '/' . $tugas['nama_file'];
                
                if (is_readable($file_dir) && unlink($file_dir)) {
                    $this->user->deleteTugas($jenis, $nim, $jenis_ke);

                    if (!$this->upload->do_upload('userfile')) {
                        $error = array('error' => $this->upload->display_errors());

                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error['error'] . '</div>');
                        redirect('user/uploadtugas');
                    } else {
                        $data = [
                            'nama_file' => $new_name,
                            'jenis_tugas' => $jenis,
                            'id_perkuliahan' => $id_kelas,
                            'nim' => $nim,
                            'urutan' => $jenis_ke
                        ];

                        $this->db->insert('file_upload', $data);

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your assignment has been uploaded</div>');
                        redirect('user/uploadtugas');
                    }
                } else {
                    $error = array('error' => $this->upload->display_errors());

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error['error'] . '</div>');
                    redirect('user/uploadtugas');
                }
            } else if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error['error'] . '</div>');
                redirect('user/uploadtugas');
            } else {
                $data = [
                    'nama_file' => $new_name,
                    'jenis_tugas' => $jenis,
                    'id_perkuliahan' => $id_kelas,
                    'nim' => $nim,
                    'urutan' => $jenis_ke
                ];

                $this->db->insert('file_upload', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your assignment has been uploaded</div>');
                redirect('user/uploadtugas');
            }
        }
    }

    function subArraysToString($ar, $sep = ', ')
    {
        $str = '';
        foreach ($ar as $val) {
            $str .= implode($sep, $val);
            $str .= $sep; // add separator between sub-arrays
        }
        $str = rtrim($str, $sep); // remove last separator
        return $str;
    }
}
