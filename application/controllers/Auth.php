<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        //cek apakah sudah login
        if ($this->session->userdata('email')) {
            redirect('home');
        }

        //membuat rule validation form
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim', [
            'required' => 'Kolom email harus diisi!',
            'valid_email' => 'Alamat email harus valid!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Kolom password harus diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = "Halaman Login";

            $this->load->view('auth/login', $data);
        } else {
            //validasi sukses

            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $query = $this->db->get_where('user', ['email' => $email]);
        $user = $query->row_array();

        //jika usernya ada
        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data['email'] = $user['email'];
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function daftar()
    {
        //membuat rule validation form
        $this->form_validation->set_rules('namaAwal', 'Nama', 'required|trim', [
            'required' => 'Kolom nama harus diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[user.email]', [
            'required' => 'Kolom email harus diisi!',
            'valid_email' => 'Alamat email harus valid!',
            'is_unique' => 'Alamat email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'required' => 'Kolom password harus diisi!',
            'min_length' => 'Password terlalu pendek!',
            'matches' => 'Password tidak sama!'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]', [
            'required' => 'Kolom konfirmasi password harus diisi!',
            'matches' => 'Password tidak sama!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            //set data dari session
            $query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
            $data['user'] = $query->row_array();
            //ambil data pengurus
            $query = $this->db->get('pengurus');
            $data['Pengurus'] = $query->result_array();
            $data['judul'] = "Halaman Registrasi";
            $this->load->view('auth/daftar', $data);
        } else {
            $data = array(
                'nama' => $this->input->post('namaAwal', true) . ' ' . $this->input->post('namaAkhir', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'pengurus' => $this->input->post('pengurus')
            );
            $this->db->insert('user', $data);
            $this->session->set_flashdata('auth', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat akun berhasil dibuat!</div>');
            redirect('home');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('auth', '<div class="alert alert-success lert-dismissible fade show" role="alert">Anda telah berhasil loguot!</div>');
        redirect('auth');
    }
}
