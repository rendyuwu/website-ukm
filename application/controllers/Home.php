<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
		$data['user'] = $query->row_array();
		$data['judul'] = 'Halaman Home';

		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}

	public function error()
	{
		$data['judul'] = 'Halaman Error';
		$this->load->view('templates/header', $data);
		$this->load->view('home/error');
		$this->load->view('templates/footer');
	}
}
