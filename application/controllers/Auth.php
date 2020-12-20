<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // untuk memanggil construct CI_Controller
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('nim')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else if ($this->session->userdata('role_id') == 2) {
                redirect('user');
            }
        }

        $this->form_validation->set_rules('nim', 'Nim', 'trim|numeric');
        $this->form_validation->set_rules('password', 'Password', 'trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'CP Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $nim = htmlspecialchars($this->input->post('nim'));
        $password = htmlspecialchars($this->input->post('password'));

        $user = $this->db->get_where('user', ['nim' => $nim])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'nim' => $user['nim'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIM is not registered</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIM has not activate</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('nim')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else if ($this->session->userdata('role_id') == 2) {
                redirect('user');
            }
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('nim', 'Nim', 'required|trim|numeric|exact_length[9]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => "This email has already registered"
        ]);
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password don\'t match',
            'min_lenght' => 'Password too sort',
            'required' => 'Password is required'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'CP User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data =  [
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email')),
                'image' => 'default.svg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time(),
                'phone_number' => htmlspecialchars($this->input->post('phone'))
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nim');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout</div>');
        redirect('auth');
    }

    public function forgotpass()
    {
        $data['title'] = 'User Forgot Password';

        $this->form_validation->set_rules('nim', 'Nim', 'required|trim|numeric|exact_length[9]');
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password don\'t match',
            'min_lenght' => 'Password too sort',
            'required' => 'Password is required'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot_pass');
            $this->load->view('templates/auth_footer');
        } else {
            $nim = htmlspecialchars($this->input->post('nim', true));
            $cekNim = $this->db->get_where('user', array('nim' => $nim))->num_rows();
            $cekAdmin = $this->db->get_where('user', array('nim' => $nim))->result_array();

            if ($cekNim > 0 && !($cekAdmin[0]['role_id']==="1")) {
                $data =  [
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'pass_recover' => 1,
                    'is_active' => 0,
                ];

                $this->db->where('nim', $nim);
                $this->db->update('user', $data);
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIM tidak ditemukan</div>');
                redirect('auth/forgotpass');
            }
        }
    }

    public function blocked()
    {
        $data['title'] = 'Page Blocked';
        $this->load->view('auth/blocked');
    }
}
