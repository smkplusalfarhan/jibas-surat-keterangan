<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sinkronisasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('surat_model');
        $this->load->model('setting_model');
        $this->load->model('sinkronisasi_model');
        $this->load->model('rombel_model');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $jbsakad = $this->load->database('jbsakad', TRUE);

        $data['jumlah_tahun_ajaran_aplikasi']   = $this->sinkronisasi_model->jumlah_tahun_ajaran();
        $data['jumlah_tahun_ajaran_jibas']      = $jbsakad->get('tahunajaran')->num_rows();
        $data['jumlah_siswa_aplikasi']          = $this->siswa_model->count();
        $data['jumlah_siswa_jibas']             = $this->sinkronisasi_model->jumlah_siswa_jibas();
        $data['jumlah_rombel_aplikasi']         = $this->rombel_model->count();
        $data['jumlah_rombel_jibas']            = $this->sinkronisasi_model->jumlah_rombel_jibas();
        $data['setting']                        = $this->setting_model->get_setting();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/sinkronisasi', $data);
        $this->load->view('templates/footer');
    }

    public function sinkron()
    {

        $this->sinkronisasi_model->sync();
        $this->session->set_flashdata('success', 'Data berhasil disinkron!');
        redirect('/sinkronisasi/index');
    }

}