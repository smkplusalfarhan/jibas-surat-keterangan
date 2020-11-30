<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rombel_model');
        $this->load->model('surat_model');
        $this->load->model('setting_model');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        
    }
    public function index()
    {
        $data['jumlah_siswa']   = $this->siswa_model->count();
        $data['jumlah_surat']   = $this->surat_model->count();
        $data['jumlah_rombel']  = $this->rombel_model->count();
        $data['jumlah_pengguna']  = $this->setting_model->jumlah_pengguna();
        $data['setting']        = $this->setting_model->get_setting();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }
}