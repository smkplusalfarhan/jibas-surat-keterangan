<?php

class Rombel_model extends CI_Model
{
    public function count()
    {
        $this->db->select('rombel.*');
        $this->db->from('rombel');
        $this->db->join('tahun_ajaran', 'tahun_ajaran.id = rombel.tahun_ajaran_id');
        $this->db->where('tahun_ajaran.aktif', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_rombel()
    {
        $this->db->select('rombel.*');
        $this->db->from('rombel');
        $this->db->join('tahun_ajaran', 'tahun_ajaran.id = rombel.tahun_ajaran_id');
        $this->db->where('tahun_ajaran.aktif', 1);
        $query = $this->db->get();
        return $query->result();
    }
}