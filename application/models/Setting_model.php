<?php 

class Setting_model extends CI_Model
{
    public function get_setting()
    {
        $query = $this->db->get('setting');
        return $query->row();
    }

    public function set_setting()
    {
        $data = array(
            'periode_aktif' => $this->input->post('periode_aktif'),
            'kepala_sekolah' => $this->input->post('kepala_sekolah'),
            'nama_sekolah' => $this->input->post('nama_sekolah'),
            'alamat_sekolah' => $this->input->post('alamat_sekolah'),
            'kecamatan_sekolah' => $this->input->post('kecamatan_sekolah'),
            'kabupaten_sekolah' => $this->input->post('kabupaten_sekolah'),
            'npsn_sekolah' => $this->input->post('npsn_sekolah')
        );

        return $this->db->update('setting', $data);
    }

    public function get_periode()
    {
        // $this->db->select('*');
        return $this->db->get('setting');
    }

    public function jumlah_pengguna()
    {
        $query = $this->db->get('users');
        return $query->num_rows();
    }
}