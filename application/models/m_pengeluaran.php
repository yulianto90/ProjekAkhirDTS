<?php
class M_pengeluaran extends CI_Model
{
    function tampil_pengeluaran($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->where('month(tanggal) =', $bulan);
        $this->db->where('year(tanggal) =', $tahun);
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $pengeluaran[] = $data;
                }
            return $pengeluaran;
            }
    }

    function tambah_pengeluaran($data)
    {
        $this->db->insert('pengeluaran', $data);
    }

    function hapus_pengeluaranBahan($where){
        $this->db->where($where);
        $this->db->delete('pengeluaran');
    }
}
?>