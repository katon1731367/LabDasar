<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model', 'admin');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $nim = $this->session->userdata('nim');
        $data['user'] = $this->db->get_where('user', ['nim' => $nim])->row_array();

        setlocale(LC_ALL, 'IND');
        $day = strtolower(strftime("%A"));

        $data['days'] = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $data['currentDay'] = $day;
        $data['barang'] = $this->admin->getBarangHilang();
        $data['info'] = $this->admin->getInfoLab();
        $data['passRecover'] = $this->admin->getPassRecover();

        $data['kelas'] = $this->admin->getKelasNow($day);
        $data['title']  = 'Dashboard';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function addBarangHilang()
    {
        $namaBarang = htmlspecialchars($this->input->post('nama_barang', true));
        $tanggal = htmlspecialchars($this->input->post('tanggal_ditemukan', true));
        $ditemukanOleh = htmlspecialchars($this->input->post('ditemukan_oleh', true));
        $nomorPC = htmlspecialchars($this->input->post('no_pc', true));

        $data = [
            'nama_barang' => $namaBarang,
            'tanggal_ditemukan' => $tanggal,
            'ditemukan_oleh' => $ditemukanOleh,
            'no_pc' => $nomorPC
        ];

        $this->db->insert('barang_hilang', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your form has been inserted</div>');
        redirect('admin');
    }

    public function addInfoLab()
    {
        $info = htmlspecialchars($this->input->post('keterangan', true));

        $data = [
            'keterangan' => $info
        ];

        $this->db->insert('info_Lab', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your form has been inserted</div>');
        redirect('admin');
    }

    public function deleteBarangHilang($id)
    {
        $this->admin->deleteBarang($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your request has been deleted</div>');
        redirect('admin');
    }

    public function accRecoverPass($id)
    {
        $this->admin->updatePassUser($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Pass ' . $id . ' has been recovered</div>');
        redirect('admin');
    }

    public function role()
    {
        $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
        $data['title'] = 'Role';

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
        $data['title'] = 'Role Access';

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function dosen()
    {
        $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
        $data['dosen'] = $this->db->get('dosen')->result_array();

        $data['title'] = 'Daftar Dosen';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dosen', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed!</div>');
    }
}
