<?php

class Sinkronisasi_model extends CI_Model
{
    public function sync()
    {
        $query = $this->load->database('jbsakad', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $this->load->helper('date');

        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        $tahun_ajaran = $query->get('tahunajaran')->result();

        foreach ($tahun_ajaran as $item) {
            $data = array(
                'id' => $item->replid,
                'tahun_ajaran' => $item->tahunajaran,
                'aktif' => $item->aktif,
            );

            $this->db->replace('tahun_ajaran', $data);
        }

        $rombel = $query->get('kelas')->result();

        foreach ($rombel as $item) {
            $data = array(
                'id' => $item->replid,
                'nama_rombel' => $item->kelas,
                'tahun_ajaran_id' => $item->idtahunajaran,
                'aktif' => $item->aktif,
            );

            $this->db->replace('rombel', $data);
        }

        $query->select('siswa.*');
        $query->from('siswa');
        $query->join('kelas', 'kelas.replid = siswa.idkelas');
        $query->join('tahunajaran', 'tahunajaran.replid = kelas.idtahunajaran');
        $query->where('tahunajaran.aktif', 1);
        $query->where('siswa.aktif', 1);
        $siswa = $query->get()->result();

        foreach ($siswa as $item) {
            $data = array(
                'id' => $item->replid,
                'nipd' => $item->nis,
                'nama' => strtoupper($item->nama),
                'nik' => $item->nik,
                'nisn' => $item->nisn,
                'tempat_lahir' => ucfirst(strtolower(($item->tmplahir))),
                'tanggal_lahir' => $item->tgllahir,
                'lp' => $item->kelamin,
                'rombel_id' => $item->idkelas,
                'ayah' => strtoupper($item->namaayah),
                'ibu' => strtoupper($item->namaibu),
                'alamat' => $item->alamatsiswa,
            );

            $this->db->replace('siswa', $data);
        }

        $this->db->query('SET FOREIGN_KEY_CHECKS=1');

        $waktu = date('Y-m-d H:i:s');

        $this->db->set('sinkron', $waktu);
        $this->db->update('setting');
        

        return true;
    }

    public function jumlah_tahun_ajaran()
    {
        $query = $this->db->get('tahun_ajaran');
        return $query->num_rows();
    }

    public function jumlah_siswa_jibas()
    {
        $query = $this->load->database('jbsakad', TRUE);

        $query->select('siswa.replid');
        $query->from('siswa');
        $query->join('kelas', 'kelas.replid = siswa.idkelas');
        $query->join('tahunajaran', 'tahunajaran.replid = kelas.idtahunajaran');
        $query->where('tahunajaran.aktif', 1);
        $query->where('siswa.aktif', 1);
        return $query->get()->num_rows();
    }

    public function jumlah_rombel_jibas()
    {
        $query = $this->load->database('jbsakad', TRUE);

        $query->select('kelas.replid');
        $query->from('kelas');
        $query->join('tahunajaran', 'tahunajaran.replid = kelas.idtahunajaran');
        $query->where('tahunajaran.aktif', 1);
        return $query->get()->num_rows();
    }

}