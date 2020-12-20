<?php

class Seat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Seat_model');
        // $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
        $data['title'] = 'Kontrak PC';
        $data['kelas'] = $this->Seat_model->getKelas(); 

        // $data['ip'] = $_SERVER['REMOTE_ADDR'];
        
        $data['ip'] = "10";
        $data['judul'] = 'Kontrak Tempat Duduk';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('seat/index', $data); 
        $this->load->view('templates/footer', $data);
    }

    public function ambil(){
        $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
        $data['ip'] = "10";
        $data['kelas'] = $_GET['kelas'];
        $data['Seat'] = $this->Seat_model->getSeat($data['kelas']);
        $this->load->view('templates/view_ajax/layoutSeat', $data); 
    }

    public function kontrakPC()
    {
        $data = [
            "nim" => $this->input->post('nim'),
            "id_perkuliahan" => $this->input->post('kelas'),
            "no_pc" => $this->input->post('no_pc')
        ];

        $this->db->where('no_pc', $data['no_pc']);
        $this->db->where('id_perkuliahan', $data['id_perkuliahan']);
        $this->db->update('kontrak_pc', $data);

        $this->session->set_flashdata('flash', 'Di Kontrak');
        redirect('seat');
    }
}
