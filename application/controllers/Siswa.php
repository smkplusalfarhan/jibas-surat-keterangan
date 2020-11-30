<?php defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->helper('url_helper');
		
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}

	}

	public function index()
	{
		$data['siswa'] = $this->siswa_model->get_all_siswa();
		$data['title'] = 'Daftar Peserta Didik';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('siswa/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL)
	{
		$data['siswa_item'] = $this->siswa_model->get_siswa($slug);

		if (empty($data['siswa_item'])) {
			show_404();
		}

		$data['title'] = $data['siswa_item']['title'];

		$this->load->view('templates/header', $data);
		$this->load->view('siswa/view', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{
		$this->siswa_model->destroy($id);
		$this->session->set_flashdata('delete', 'Data Peserta Didik berhasil dihapus!');

		redirect('/siswa');
	}
}
