<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ukm extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Crud_model');
		$this->load->library('form_validation');
		$this->load->library('pagination');

		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	public function index($ukm)
	{
		//membuat redirect untuk index selain ukm yg terdaftar
		if (!in_array($ukm, array("Clan486", "ECS", "Hipmis", "KKI", "Futsal"))) {
			redirect('home/error');
		}

		//Ambil data keyword
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//Pagination, config setup
		$this->db->like('nama', $data['keyword']);
		$this->db->or_like('nim', $data['keyword']);
		$this->db->or_like('jurusan', $data['keyword']);
		$this->db->or_like('jabatan', $data['keyword']);
		$this->db->or_like('email', $data['keyword']);
		$this->db->or_like('telp', $data['keyword']);
		$this->db->from(strtolower($ukm));
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 6;
		$config['base_url'] = 'http://ukm.co/ukm/index/' . $ukm;

		//Initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data = array(
			'judul' => 'Anggota Ukm',
			'ukm' => $ukm,
			'start' => $this->uri->segment(4),
			'total_rows' => $config['total_rows'],
			'anggotaUkm' => $this->Crud_model->getAnggota($ukm, $config['per_page'], $data['start'], $data['keyword'])
		);

		//ambil data user dari database dengan session
		$query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
		$data['user'] = $query->row_array();
		$user = $data['user'];

		$data['akses'] = $this->_akses($ukm, $user);

		$this->load->view('templates/header', $data);
		$this->load->view('ukm/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah($ukm)
	{
		//membuat redirect untuk tambah selain ukm yg terdaftar
		if (!in_array($ukm, array("Clan486", "ECS", "Hipmis", "KKI", "Futsal"))) {
			redirect('home/error');
		}

		//membuat rule validation form
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Kolom nama harus diisi!'
		]);
		$this->form_validation->set_rules('nim', 'Nim', 'required|trim|is_unique[' . strtolower($ukm) . '.nim]', [
			'required' => 'Kolom nim harus diisi!',
			'is_unique' => 'Nim sudah terdaftar!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[' . strtolower($ukm) . '.email]', [
			'required' => 'Kolom email harus diisi!',
			'valid_email' => 'Alamat email harus valid!',
			'is_unique' => 'Alamat email sudah terdaftar!'
		]);
		$this->form_validation->set_rules('telp', 'No Telp', 'required|numeric|trim', [
			'required' => 'Kolom No Telp harus diisi!',
			'numeric' => 'No Telp harus berupa angka!'
		]);

		//membuat kondisi berhasil dan gagal form validation
		if ($this->form_validation->run() == FALSE) {

			$data = array(
				'judul' => 'Tambah Data Anggota',
				'Jurusan' => $this->Crud_model->getJurusan(),
				'Jabatan' => $this->Crud_model->getJabatan(),
				'ukm' => $ukm
			);
			$this->load->view('templates/header', $data);
			$this->load->view('ukm/tambah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Crud_model->tambahAnggotaUkm($ukm);
			$this->session->set_flashdata('flash', 'Ditambahkan');

			redirect('ukm/index/' . $ukm);
		}
	}

	public function hapus($ukm, $id)
	{
		//membuat redirect untuk hapus selain ukm yg terdaftar
		if (!in_array($ukm, array("Clan486", "ECS", "Hipmis", "KKI", "Futsal"))) {
			redirect('home/error');
		}
		$this->Crud_model->hapusAnggotaUkm($ukm, $id);
		$this->session->set_flashdata('flash', 'Dihapus');

		redirect('ukm/index/' . $ukm);
	}

	public function detail($ukm, $id)
	{
		if (!in_array($ukm, array("Clan486", "ECS", "Hipmis", "KKI", "Futsal"))) {
			redirect('home/error');
		}
		$data = array(
			'judul' => 'Detail Anggota',
			'detailAnggota' => $this->Crud_model->detailAnggotaUkmById($ukm, $id),
			'ukm' => $ukm
		);
		$this->load->view('templates/header', $data);
		$this->load->view('ukm/detail', $data);
		$this->load->view('templates/footer');
	}

	public function ubah($ukm, $id)
	{
		//membuat redirect untuk ubah selain ukm yg terdaftar
		if (!in_array($ukm, array("Clan486", "ECS", "Hipmis", "KKI", "Futsal"))) {
			redirect('home/error');
		}

		//membuat rule validation form
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Kolom nama harus diisi!'
		]);
		$this->form_validation->set_rules('nim', 'Nim', 'required|trim', [
			'required' => 'Kolom nim harus diisi!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim', [
			'required' => 'Kolom email harus diisi!',
			'valid_email' => 'Alamat email harus valid!'
		]);
		$this->form_validation->set_rules('telp', 'No Telp', 'required|trim', [
			'required' => 'Kolom No Telp harus diisi!',
			'numeric' => 'No Telp harus berupa angka!'
		]);

		//membuat kondisi berhasil dan gagal form validation
		if ($this->form_validation->run() == FALSE) {

			$data = array(
				'judul' => 'Ubah Data Anggota',
				'Jurusan' => $this->Crud_model->getJurusan(),
				'Jabatan' => $this->Crud_model->getJabatan(),
				'ukm' => $ukm,
				'detailAnggota' => $this->Crud_model->detailAnggotaUkmById($ukm, $id)
			);
			$this->load->view('templates/header', $data);
			$this->load->view('ukm/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Crud_model->ubahAnggotaUkm($ukm);
			$this->session->set_flashdata('flash', 'Diubah');

			redirect('ukm/index/' . $ukm);
		}
	}

	private function _akses($ukm, $user)
	{
		if ("Admin" == $user['pengurus'] || $ukm == $user['pengurus']) {
			return 1;
		} else {
			return 0;
		}
	}
}
