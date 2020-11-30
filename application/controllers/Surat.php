<?php defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('surat_model');
        $this->load->model('rombel_model');
        $this->load->model('setting_model');
        $this->load->library('pdf');
        $this->load->helper('tgl_indo');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }

    function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('rombel', 'Rombel', 'required');
        $this->form_validation->set_rules('siswa_id', 'Siswa', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['rombel'] = $this->rombel_model->get_rombel();
            $data['surat'] = $this->surat_model->get_all_surat();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('surat/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->surat_model->set_surat();
            $this->session->set_flashdata('success', 'Surat Keterangan berhasil dibuat!');
            redirect('surat');
        }
    }

    function get_siswa()
    {
        $id = $this->input->post('id');
        $data = $this->siswa_model->get_siswa_by_rombel($id);
        echo json_encode($data);
    }

    public function delete($id)
    {
        $this->surat_model->delete_surat($id);
        $this->session->set_flashdata('delete', 'Surat Keterangan berhasil dihapus!');

        redirect('surat');
    }

    function pdf($id)
    {
        $surat = $this->surat_model->get_surat($id);
        $setting = $this->setting_model->get_setting();
        $logo = base_url().'assets/images/kop_surat.jpg';
        $ttd_kepsek = base_url().'assets/images/ttd_kepsek.png';
        $tinggi_baris = 6;

        // var_dump($surat);

        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->SetMargins(25, 10, 30);
        $pdf->AddPage();
        $pdf->Image($logo, 23, 10, 0, 0, 'JPG');
        // $pdf->Image($ttd_kepsek, 120, 203, 50, 0, 'PNG');
        $pdf->ln(50);
        $pdf->SetFont('Times', 'BU', 16);
        $pdf->Cell(0, $tinggi_baris, 'S U R A T   K E T E R A N G A N', 0, 1, 'C');
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(0, $tinggi_baris, 'Nomor : '.$surat->surat_id. '/SKt-01/SMKP-ALFA/' . akhir_nomor_surat($surat->tanggal_surat), 0, 1, 'C');
        $pdf->ln(3);
        $pdf->SetFont('Times', '', 12);
        $pdf->MultiCell(160, $tinggi_baris, "Yang bertanda tangan di bawah ini, Kepala $setting->nama_sekolah $setting->kecamatan_sekolah $setting->kabupaten_sekolah, menerangkan bahwa :", 0, 'J');
        $pdf->ln(3);
        $pdf->Cell(46, $tinggi_baris, '       nama peserta didik', 0, 0);
        $pdf->Cell(2, $tinggi_baris, ':', 0, 0);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(0, $tinggi_baris, $surat->nama, 0, 1);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(46, $tinggi_baris, '       tempat, tanggal lahir', 0, 0);
        $pdf->Cell(2, $tinggi_baris, ':', 0, 0);
        $pdf->Cell(0, $tinggi_baris, $surat->tempat_lahir .', '.date_indo($surat->tanggal_lahir), 0, 1);
        $pdf->Cell(46, $tinggi_baris, '       NIK', 0, 0);
        $pdf->Cell(2, $tinggi_baris, ':', 0, 0);
        $pdf->Cell(0, $tinggi_baris, $surat->nik, 0, 1);
        $pdf->Cell(46, $tinggi_baris, '       NIPD/NISN', 0, 0);
        $pdf->Cell(2, $tinggi_baris, ':', 0, 0);
        $pdf->Cell(0, $tinggi_baris, $surat->nipd . ' / ' . $surat->nisn, 0, 1);
        $pdf->Cell(46, $tinggi_baris, '       jenis kelamin', 0, 0);
        $pdf->Cell(2, $tinggi_baris, ':', 0, 0);
        $pdf->Cell(0, $tinggi_baris, $surat->lp == 'l' ? 'Laki-laki' : 'Perempuan', 0, 1);
        $pdf->Cell(46, $tinggi_baris, '       rombel', 0, 0);
        $pdf->Cell(2, $tinggi_baris, ':', 0, 0);
        $pdf->Cell(0, $tinggi_baris, $surat->rombel, 0, 1);
        $pdf->Cell(46, $tinggi_baris, '       nama orang tua/wali', 0, 0);
        $pdf->Cell(2, $tinggi_baris, ':', 0, 0);
        $pdf->Cell(0, $tinggi_baris, $surat->ayah . ' / ' . $surat->ibu, 0, 1);
        $pdf->Cell(46, $tinggi_baris, '       alamat', 0, 0);
        $pdf->Cell(2, $tinggi_baris, ':', 0, 0);
        $pdf->MultiCell(110, $tinggi_baris, $surat->alamat, 0, 1);
        $pdf->ln(3);
        $pdf->MultiCell(160, $tinggi_baris, "adalah benar-benar salah satu peserta didik di $setting->nama_sekolah $setting->kecamatan_sekolah $setting->kabupaten_sekolah pada $setting->periode_aktif dan sampai saat surat ini dibuat masih aktif melaksanakan Kegiatan Belajar Mengajar. Surat ini dibuat untuk keperluan mengurusi persyaratan dalam $surat->keperluan.", 0, 'J');
        $pdf->ln(3);
        $pdf->MultiCell(160, $tinggi_baris, "Demikian surat keterangan ini kami buat agar diketahui adanya dan dipergunakan sebagaimana mestinya.", 0, 'J');
        $pdf->ln(12);
        $pdf->Cell(100, $tinggi_baris, '', 0, 0);
        $pdf->Cell(0, $tinggi_baris, 'Sukabumi, ' . date_indo($surat->tanggal_surat), 0, 1);
        $pdf->Cell(100, $tinggi_baris, '', 0, 0);
        $pdf->Cell(0, $tinggi_baris, 'Kepala sekolah,', 0, 1);
        $pdf->Cell(100, $tinggi_baris, '', 0, 0);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(0, 40, $setting->kepala_sekolah, 0, 0);

        $pdf->Output('D', 'surket_' . $surat->rombel . '_' .$surat->nama.'.pdf');
    }
}