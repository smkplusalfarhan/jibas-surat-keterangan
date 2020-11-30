<?php

class Siswa_Model extends CI_Model
{
    function get_siswa_by_rombel($id)
    {
        $hasil = $this->db->query("SELECT * FROM siswa WHERE rombel_id='$id' ORDER BY nama ASC");
        return $hasil->result();
    }

    public function get_all_siswa()
    {
        $this->db->select('siswa.*, rombel.nama_rombel');
        $this->db->from('siswa');
        $this->db->join('rombel', 'rombel.id = siswa.rombel_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_siswa_by_nipd($nipd)
    {
        $this->db->select('siswa.*, rombel.nama_rombel');
        $this->db->from('siswa');
        $this->db->join('rombel', 'rombel.id = siswa.rombel_id');
        $this->db->where('nipd', $nipd);
        $query = $this->db->get();
        return $query->row();
    }

    public function destroy($id)
    {
        return $this->db->delete('siswa', array('id' => $id));
    }

    public function count()
    {
        $query = $this->db->get('siswa');
        return $query->num_rows();
    }
}