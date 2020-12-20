<?php

use function PHPSTORM_META\map;

defined('BASEPATH') or exit('No direct script access allowed');

class Perkuliahan extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      is_logged_in();
      $this->load->model('Perkuliahan_model', 'perkuliahan');
   }

   public function dosen()
   {
      $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
      $data['dosen'] = $this->db->get('dosen')->result_array();

      $data['title'] = 'Dosen';
      $data['header'] = 'Daftar Dosen';

      $this->form_validation->set_rules('id_dosen', 'Id', 'required');
      $this->form_validation->set_rules('nama_dosen', 'Nama', 'required');
      $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[dosen.email]');
      $this->form_validation->set_rules('no_handphone', 'NoHP', 'trim|numeric');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('perkuliahan/dosen', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            'id_dosen' => $this->input->post('id_dosen'),
            'nama_dosen' => $this->input->post('nama_dosen'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_handphone')
         ];

         $this->db->insert('dosen', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Dosen' . $data['nama_dosen'] . ' has been created</div>');
         redirect('perkuliahan/dosen');
      }
   }

   public function deleteDosen($id)
   {
      $this->perkuliahan->deleteDosen($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! ' . $id . ' has been deleted</div>');
      redirect('perkuliahan/dosen');
   }

   public function editDosen($id)
   {
      $data['dosen'] = $this->db->get_where('dosen', ['id_dosen' => $id])->row_array();

      $this->form_validation->set_rules('id_dosen', 'Id', 'required');
      $this->form_validation->set_rules('nama_dosen', 'Nama', 'required');
      $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
      $this->form_validation->set_rules('no_handphone', 'NoHP', 'trim|numeric');

      if ($this->form_validation->run() == false) {
         $data['title'] = 'Edit Dosen';
         $this->load->view('templates/auth_header', $data);
         $this->load->view('perkuliahan/edit_dosen', $data);
         $this->load->view('templates/auth_footer');
      } else {
         $data = [
            'id_dosen' => $this->input->post('id_dosen'),
            'nama_dosen' => $this->input->post('nama_dosen'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('phone')
         ];

         $this->db->replace('dosen', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! ' . $data['nama_dosen'] . ' has been created</div>');
         redirect('perkuliahan/dosen');
      }
   }

   public function matakuliah()
   {
      $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
      $data['matakuliah'] = $this->db->get('matakuliah')->result_array();

      $data['title'] = 'Matakuliah';
      $data['header'] = 'Daftar Matakuliah';

      $this->form_validation->set_rules('id_matakuliah', 'Id', 'required');
      $this->form_validation->set_rules('nama_matakuliah', 'Nama', 'required');
      $this->form_validation->set_rules('sks', 'NoHP', 'required|trim|numeric');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('perkuliahan/matakuliah', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            'id_matkul' => $this->input->post('id_matakuliah'),
            'nama_matkul' => $this->input->post('nama_matakuliah'),
            'sks' => $this->input->post('sks')
         ];

         $this->db->insert('matakuliah', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Dosen' . $data['nama_matakuliah'] . 'has been created</div>');
         redirect('perkuliahan/matakuliah');
      }
   }

   public function deleteMatkul($id)
   {
      $this->perkuliahan->deleteDosen($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! ' . $id . ' has been deleted</div>');
      redirect('perkuliahan/matakuliah');
   }

   public function editMatkul($id)
   {
      $data['matakuliah'] = $this->db->get_where('matakuliah', ['id_matkul' => $id])->row_array();

      $this->form_validation->set_rules('id_matakuliah', 'Id', 'required');
      $this->form_validation->set_rules('nama_matakuliah', 'Nama', 'required');
      $this->form_validation->set_rules('sks', 'NoHP', 'required|trim|numeric');
      if ($this->form_validation->run() == false) {
         $data['title'] = 'Edit matkul';
         $this->load->view('templates/auth_header', $data);
         $this->load->view('perkuliahan/edit_matkul', $data);
         $this->load->view('templates/auth_footer');
      } else {
         $data = [
            'id_matkul' => $this->input->post('id_matakuliah'),
            'nama_matkul' => $this->input->post('nama_matakuliah'),
            'sks' => $this->input->post('sks'),
         ];

         $this->db->replace('matakuliah', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! ' . $data['nama_matkul'] . ' has been created</div>');
         redirect('perkuliahan/matakuliah');
      }
   }

   public function kelas()
   {
      $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
      $data['kelas'] = $this->perkuliahan->getAllKelas();
      $data['dosen'] = $this->perkuliahan->getDosen();
      $data['matkul'] = $this->perkuliahan->getMatkul();
      $data['title'] = 'Kelas';
      $data['header'] = 'Daftar Kelas';
      $data['hari'] = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

      $this->form_validation->set_rules('index_kelas', 'Index', 'required|exact_length[1]');
      $this->form_validation->set_rules('jam_mulai', 'mulai', 'required');
      $this->form_validation->set_rules('jam_akhir', 'akhir', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('perkuliahan/kelas', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            'index_kelas' => $this->input->post('index_kelas'),
            'id_perkuliahan' => $this->input->post('index_kelas') . substr($this->input->post('id_matkul'), -4) . $this->input->post('id_dosen'),
            'id_matkul' => $this->input->post('id_matkul'),
            'id_dosen' => $this->input->post('id_dosen'),
            'hari' => $this->input->post('hari'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_akhir' => $this->input->post('jam_akhir')
         ];

         $this->db->insert('kelas', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Kelas ' . $data['id_matkul'] . ', kelas ' . $data['index_kelas'] . ' has been created</div>');

         $kelas = $this->input->post('index_kelas') . substr($this->input->post('id_matkul'), -4) . $this->input->post('id_dosen');

         for ($i = 1; $i <= 42; $i++) {
            $data_mahasiswa = [
               'nim' => 'Tersedia',
               'id_perkuliahan' => $kelas,
               'no_pc' => $i
            ];
            $this->db->insert('kontrak_pc', $data_mahasiswa);
         }

         redirect('Perkuliahan/kelas');
      }
   }

   public function deleteKelas($id)
   {
      $this->perkuliahan->deleteKelas($id);
      $this->db->where('id_perkuliahan', $id);
      $this->db->delete('kontrak_pc');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! ' . $id . ' has been deleted</div>');
      redirect('perkuliahan/kelas');
   }

   public function uploadMateri()
   {
      $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
      $data['materi'] = $this->perkuliahan->getAllMateri();
      $data['kelas'] = $this->perkuliahan->getAllKelas();

      $data['title'] = 'Upload Materi';
      $data['error'] = '';

      $this->form_validation->set_rules('namafile', 'Nama file', 'required');
      $this->form_validation->set_rules('kelas', 'Kelas', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('perkuliahan/upload_materi', $data);
         $this->load->view('templates/footer');
      } else {
         $nama = htmlspecialchars($this->input->post('namafile', true));
         $kelas = htmlspecialchars($this->input->post('kelas', true));
         $kelas_explode = explode('|', $kelas);
         $nama_kelas = $kelas_explode[0];
         $id_kelas = $kelas_explode[1];

         $filename = $_FILES["materi"]["name"];
         $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
         $new_name = str_replace(' ', '_', $nama . '_' . $id_kelas . '.' . $file_ext);

         //config upload materi
         $config['file_name']            = $new_name;
         $config['upload_path']          = 'file_upload/materi/' . $id_kelas;
         $config['allowed_types']        = 'gif|jpg|png|pdf|docx|xlsx|pptx|doc|rar|zip';
         $config['max_size']             = '10000';

         $this->load->library('upload', $config);
         $this->upload->initialize($config);

         if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
         }

         var_dump($this->perkuliahan->cekJumlahMateri($new_name));

         if ($this->perkuliahan->cekJumlahMateri($new_name) > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $new_name . ' is already uploaded !</div>');
            redirect('perkuliahan/uploadmateri');
         } else if (!$this->upload->do_upload('materi')) {
            $error = array('error' => $this->upload->display_errors());

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error['error'] . '</div>');
            redirect('perkuliahan/uploadmateri');
         } else {
            $data = array('upload_data' => $this->upload->data());
            $data_materi = [
               'nama_materi' => $new_name,
               'id_perkuliahan' => $id_kelas,
               'kelas' => $nama_kelas
            ];

            $this->db->insert('materi', $data_materi);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your Modul has been uploaded</div>');
            redirect('perkuliahan/uploadmateri');
         }
      }
   }

   public function deleteMateri($id, $nama_materi, $id_perkuliahan)
   {
      $file_dir = './file_upload/materi/' . $id_perkuliahan . '/' . $nama_materi;

      if (is_readable($file_dir) && unlink($file_dir)) {
         $this->perkuliahan->deleteMateri($id);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! ' . $nama_materi . ' has been deleted</div>');
         redirect('perkuliahan/uploadmateri');
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! to delete' . $nama_materi . '</div>');
         redirect('perkuliahan/uploadmateri');
      }
   }

   public function tugas()
   {
      $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

      $data['title'] = "Tugas";
      $data['header'] = "Tugas Praktikan";
      $data['kelas'] = $this->perkuliahan->getAllKelas();
      $data['jenis'] = ['quiz', 'test', 'uts', 'uas'];

      $this->form_validation->set_rules('kelas', 'Kelas', 'required');

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('perkuliahan/tugas', $data);
      $this->load->view('templates/footer');
   }

   public function lihatTugas()
   {
      $data['tugas'] = $this->perkuliahan->getTugas($_GET['idPerkuliahan'], $_GET['jenis'], $_GET['urutan']);
      $this->load->view('templates/view_ajax/daftar_tugas', $data);
   }

   public function exportTugasExcel()
   {
      $data = $this->perkuliahan->getTugas($_GET['kelas'], $_GET['jenis'], $_GET['urutan']);

      include_once APPPATH . '/third_party/xlsxwriter.class.php';
      ini_set('display_errors', 0);
      ini_set('log_errors', 1);
      error_reporting(E_ALL & ~E_NOTICE);

      $filename = "Nilai_" . $_GET['jenis'] . "_" . $_GET['urutan'] . "_" . $_GET['kelas'] . "_" . date('d-m-Y-H-i-s') . ".xlsx";
      header('Content-disposition: attachment; filename="' . XLSXWriter::sanitize_filename($filename) . '"');
      header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
      header('Content-Transfer-Encoding: binary');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');

      $styles = array('widths' => [3, 20, 30, 40], 'font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'fill' => '#77c3ec', 'halign' => 'center', 'border' => 'left,right,top,bottom');
      $styles2 = array(['font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'fill' => '#eee', 'halign' => 'left', 'border' => 'left,right,top,bottom'], ['fill' => '#eee'], ['fill' => '#eee'], ['fill' => '#eee'], ['fill' => '#eee'], ['fill' => '#eee']);

      $header = array(
         'No' => 'integer',
         'Nim' => 'string',
         'Nama' => 'string',
         'File' => 'string',
         'Jenis' => 'string',
         'Nilai' => 'integer'
      );

      $no = 1;
      $writer = new XLSXWriter();
      $writer->writeSheetHeader('Sheet1', $header, $styles);
      foreach ($data as $row) {
         $writer->writeSheetRow('Sheet1', [$no, $row['nim'], $row['name'], $row['nama_file'], $row['jenis_tugas'], $row['nilai']], $styles2);
         $no++;
      }
      $writer->writeToStdOut();
   }

   public function exportLaporanExcel()
   {
      $mahasiswa = $this->perkuliahan->getMahasiswaKelas($_GET['kelas']);
      $nilai = $this->perkuliahan->getLaporanMahasiswa($_GET['kelas'], $_GET['laporan']);

      $i = 1;
      foreach ($mahasiswa as $i => $m) {
         $data[$i]['nim'] = $m['nim'];
         $data[$i]['nama'] = $m['name'];
         if (isset($nilai[$i]) && $nilai[$i]['nim'] == $m['nim']) {
            $data[$i]['nilai'] = $nilai[$i]['nilai'];
         } else {
            $data[$i]['nilai'] = 0;
         }
      }

      include_once APPPATH . '/third_party/xlsxwriter.class.php';
      ini_set('display_errors', 0);
      ini_set('log_errors', 1);
      error_reporting(E_ALL & ~E_NOTICE);

      $filename = "Nilai_Laporan_" . $_GET['kelas'] . "_" . $_GET['urutan'] . date('d-m-Y-H-i-s') . ".xlsx";
      header('Content-disposition: attachment; filename="' . XLSXWriter::sanitize_filename($filename) . '"');
      header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
      header('Content-Transfer-Encoding: binary');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');

      $styles = array('widths' => [3, 20, 15], 'font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'fill' => '#77c3ec', 'halign' => 'center', 'border' => 'left,right,top,bottom');
      $styles2 = array(['font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'fill' => '#eee', 'halign' => 'left', 'border' => 'left,right,top,bottom'], ['fill' => '#eee'], ['fill' => '#eee'], ['fill' => '#eee'], ['fill' => '#eee'], ['fill' => '#eee']);

      $header = array(
         'No' => 'integer',
         'Nim' => 'string',
         'Nama' => 'string',
         'Nilai' => 'integer'
      );

      $no = 1;
      $writer = new XLSXWriter();
      $writer->writeSheetHeader('Sheet1', $header, $styles);
      foreach ($data as $row) {
         $writer->writeSheetRow('Sheet1', [$no, $row['nim'], $row['nama'], $row['nilai']], $styles2);
         $no++;
      }
      $writer->writeToStdOut();
   }

   public function exportKelas($id)
   {
      $data = $this->perkuliahan->getDetailKelas($id);

      include_once APPPATH . '/third_party/xlsxwriter.class.php';
      ini_set('display_errors', 0);
      ini_set('log_errors', 1);
      error_reporting(E_ALL & ~E_NOTICE);

      $filename = "Daftar_Mahasiswa_" . $id . ".xlsx";
      header('Content-disposition: attachment; filename="' . XLSXWriter::sanitize_filename($filename) . '"');
      header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
      header('Content-Transfer-Encoding: binary');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');

      $styles = array('widths' => [3, 20, 20, 20, 40, 15, 15], 'font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'fill' => '#77c3ec', 'halign' => 'center', 'border' => 'left,right,top,bottom');
      $styles2 = array(['font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'fill' => '#eee', 'halign' => 'left', 'border' => 'left,right,top,bottom'], ['fill' => '#eee'], ['fill' => '#eee'], ['fill' => '#eee'], ['fill' => '#eee'], ['fill' => '#eee'], ['fill' => '#eee']);

      $header = array(
         'No' => 'integer',
         'id Matakuliah' => 'string',
         'id Dosen' => 'string',
         'Nim' => 'string',
         'Nama' => 'string',
         'Nomor PC' => 'string',
         'Time stamp' => 'string'
      );

      $no = 1;
      $writer = new XLSXWriter();
      $writer->writeSheetHeader('Sheet1', $header, $styles);
      foreach ($data as $row) {
         $writer->writeSheetRow('Sheet1', [$no, $row['id_matkul'], $row['id_dosen'], $row['nim'], $row['name'], $row['no_pc'], $row['time_stamp']], $styles2);
         $no++;
      }
      $writer->writeToStdOut();
   }

   public function hapusTugas($id)
   {
      $tugas = $this->perkuliahan->cekTugas($id);

      if (!is_null(($tugas))) {
         $file_dir = './file_upload/tugas/' . $tugas['id_perkuliahan'] . '/' . $tugas['jenis_tugas'] . '/' . $tugas['urutan'] . '/' . $tugas['nama_file'];

         if (is_readable($file_dir) && unlink($file_dir)) {
            $this->perkuliahan->deleteTugas($tugas['id_file_tugas']);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! ' . $tugas['nama_file'] . ' has been deleted</div>');
            redirect('perkuliahan/tugas');
         } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! to delete ' . $tugas['nama_file'] . '</div>');
            redirect('perkuliahan/tugas');
         }
      }
   }

   public function inputNilaiTugas()
   {
      if (!empty($_POST['nilaiTugas'])) {
         echo '<div class="alert alert-success">';
         $nilai = $_POST['nilaiTugas'];
         foreach ($nilai as $n) {
            $this->perkuliahan->updateNilai($n[0], (int)$n[1]);
            echo "Nilai tugas " . $n[2] . " " . $n[3] . "-" . $n[4] . " = " . (int)$n[1] . " sudah ditambahkan" .  PHP_EOL;
         }
         echo '</div>';
      } else {
         echo "<div class='alert alert-danger'>Gagal menambahkan nilai<div>";
      }
   }

   public function laporan()
   {
      $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

      $data['title'] = "Laporan";
      $data['header'] = "Laporan Praktikan";
      $data['kelas'] = $this->perkuliahan->getAllKelas();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('perkuliahan/laporan', $data);
      $this->load->view('templates/footer');
   }

   public function lihatlaporan()
   {
      $data['laporan'] = $_GET['laporan'];
      $data['mahasiswa'] = $this->perkuliahan->getMahasiswaKelas($_GET['idPerkuliahan']);
      $data['nilai'] = $this->perkuliahan->getLaporanMahasiswa($_GET['idPerkuliahan'], $_GET['laporan']);

      $this->load->view('templates/view_ajax/daftar_mahasiswa', $data);
   }

   public function inputNilaiLaporan()
   {
      if (!empty($_POST['nilaiLaporan'])) {
         $nilai = $_POST['nilaiLaporan'];
         $idPerkuliahan = $_POST['idPerkuliahan'];
         $urutan = $_POST['laporan'];
         echo '<div class="alert alert-success">';
         foreach ($nilai as $n) {
            $data = [
               'nim' => $n[0],
               'urutan_laporan' => (int)$urutan,
               'id_perkuliahan' => $idPerkuliahan,
               'nilai' => (int)$n[1]
            ];

            if ($this->perkuliahan->cekLaporan($data['nim'], $data['urutan_laporan'], $idPerkuliahan) > 0) {
               $this->perkuliahan->updateLaporan($data['nim'], $idPerkuliahan, $urutan, $data['nilai']);
               echo "Data laporan " . $data['nim'] . " diupdate " . $data['id_perkuliahan'] . (int)$urutan .  '<br>' . PHP_EOL;
            } else if ($this->db->insert('nilai_laporan', $data)) {
               echo "Data laporan " . $data['nim'] . " ditambah " . $data['id_perkuliahan'] . (int)$urutan . '<br>' . PHP_EOL;
            }
         }
         echo '</div>';
      } else {
         echo "<div class='alert alert-danger'>Gagal menambahkan nilai<div>";
      }
   }
}
