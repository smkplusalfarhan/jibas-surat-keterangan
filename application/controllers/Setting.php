<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('surat_model');
        $this->load->model('setting_model');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }
    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('periode_aktif', 'Periode aktif', 'required');
        $this->form_validation->set_rules('kepala_sekolah', 'Kepala sekolah', 'required');
        $this->form_validation->set_rules('nama_sekolah', 'Nama sekolah', 'required');
        $this->form_validation->set_rules('alamat_sekolah', 'Alamat sekolah', 'required');
        $this->form_validation->set_rules('kecamatan_sekolah', 'Kecamatan sekolah', 'required');
        $this->form_validation->set_rules('kabupaten_sekolah', 'Kabupaten sekolah', 'required');
        $this->form_validation->set_rules('npsn_sekolah', 'NPSN sekolah', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['setting'] = $this->setting_model->get_setting();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/setting', $data);
            $this->load->view('templates/footer');

        } else {
            if (isset($_FILES['kop_surat'])) {
                
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'jpg|png';
                $config['file_name']            = 'kop_surat.jpg';
                $config['overwrite']            = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('kop_surat');
            }

            $this->setting_model->set_setting();
            redirect('setting');
        }

        
    }

    public function update()
    {
        
    }
}