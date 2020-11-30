<?php

class Surat_model extends CI_Model
{
    public function get_all_surat()
    {
        $this->db->select('surat.*, siswa.*');
        $this->db->from('surat');
        $this->db->join('siswa', 'siswa.id = surat.siswa_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function count()
    {
        $query = $this->db->get('surat');
        return $query->num_rows();
    }

    public function get_surat($id)
    {

        $this->db->select('surat.*, siswa.*');
        $this->db->from('surat');
        $this->db->join('siswa', 'siswa.id = surat.siswa_id');
        $this->db->where('surat_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function set_surat()
    {
        $this->db->select('periode_aktif');
        $this->db->from('setting');
        $query = $this->db->get();
        $periode = $query->row();

        $id_rombel = $this->input->post('rombel');
        $rombel = $this->db->get_where('rombel', array('id' => $id_rombel))->row();

        $date = date('Y-m-d');
        $data = array(
            'tanggal_surat' => $date,
            'siswa_id' => $this->input->post('siswa_id'),
            'keperluan' => $this->input->post('keperluan'),
            'periode' => $periode->periode_aktif,
            'rombel' => $rombel->nama_rombel,
        );

        return $this->db->insert('surat', $data);
    }

    public function delete_surat($id)
    {
        return $this->db->delete('surat', array('surat_id' => $id));
    }
}