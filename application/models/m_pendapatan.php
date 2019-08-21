<?php
class M_pendapatan extends CI_Model
{ 
    function tampil_pendapatan($where)
    {
        $this->db->select('*');
        $this->db->from('pendapatan');
        $this->db->join('perawatan','pendapatan.no_perawatan = perawatan.no_perawatan');
        $this->db->where('status = 1');
        $this->db->where($where);
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $pendapatan[] = $data;
                }
            return $pendapatan;
            }
    }

    function tampil_faktur($where)
    {
        $this->db->select('*');
        $this->db->from('pendapatan');
        $this->db->join('pasien', 'pendapatan.no_pasien = pasien.no_pasien');
        $this->db->where($where);
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $pendapatan[] = $data;
                }
            return $pendapatan;
            }
    }

    function tampil_pendapatanPribadi($where, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pendapatan');
        $this->db->join('perawatan','pendapatan.no_perawatan = perawatan.no_perawatan');
        $this->db->where('username =', $where);
        $this->db->where('month(tanggal) =', $bulan);
        $this->db->where('year(tanggal) =', $tahun);
        $this->db->where('status = 1');
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $pendapatan[] = $data;
                }
            return $pendapatan;
            }
    }

    function tambah_pendapatan($data){
        $this->db->insert('pendapatan', $data);
    }

    function tampil_pembayaran($tanggal, $where){
        $this->db->select('*');
        $this->db->from('pendapatan');
        $this->db->join('perawatan','pendapatan.no_perawatan = perawatan.no_perawatan');
        $this->db->join('pasien','pendapatan.no_pasien = pasien.no_pasien');
        $this->db->where('tanggal =', $tanggal);
        $this->db->where($where);
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $pendapatan[] = $data;
                }
            return $pendapatan;
            }
    }

    function tampil_biayaPerawatan($tanggal, $where){
        $this->db->select('*');
        $this->db->from('perawatan');
        $this->db->join('pendapatan','pendapatan.no_perawatan = perawatan.no_perawatan');
        $this->db->where('tanggal =', $tanggal);
        $this->db->where($where);
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $pendapatan[] = $data;
                }
            return $pendapatan;
            }
    }

    function tampil_rangPembayaran($where){
        $this->db->select('*');
        $this->db->from('pendapatan_details');
        $this->db->join('stok_bahan', 'pendapatan_details.kode_bahan = stok_bahan.kode_bahan');
        $this->db->where($where);
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $pendapatan[] = $data;
                }
            return $pendapatan;
            }
    }

    function update_pendapatan($where, $data){
        $this->db->where($where);
        $this->db->update('pendapatan', $data);
    }

    function tambah_pendapatanDetails($data){
        $this->db->insert('pendapatan_details', $data);
    }
    
}
?>