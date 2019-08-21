<?php
class M_pendapatanBersih extends CI_Model{
    
    public function tambah_pendapatanBersih($data, $tanggal)
    {
        $this->db->select('*');
        $this->db->from('pendapatan_bersih');
        $this->db->where('tanggal =', $tanggal);

        $query = $this->db->get();
        if ($query->num_rows()==0){
            $this->db->insert('pendapatan_bersih', $data);
        }
    }

    public function total_gaji($bulan, $tahun)
    {
        $this->db->select_sum('gaji');
        $this->db->from('gaji');
        $this->db->where('month(tanggal) = ', $bulan);
        $this->db->where('year(tanggal) = ', $tahun);
        $this->db->where('status = "Sudah Dibayarkan"');
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $gaji[] = $data;
                }
            return $gaji;
            }
    }

    public function total_pendapatan($bulan, $tahun)
    {
        $this->db->select_sum('total');
        $this->db->from('pendapatan');
        $this->db->where('month(tanggal) = ', $bulan);
        $this->db->where('year(tanggal) = ', $tahun);
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $pendapatan[] = $data;
                }
            return $pendapatan;
            }
    }

    public function total_pengeluaran($bulan, $tahun)
    {
        $this->db->select_sum('total');
        $this->db->from('pengeluaran');
        $this->db->where('month(tanggal) = ', $bulan);
        $this->db->where('year(tanggal) = ', $tahun);
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $pengeluaran[] = $data;
                }
            return $pengeluaran;
            }
    }

    public function pendapatanBersih($bulan, $tahun)
    {
        $data['gaji'] = $this->total_gaji($bulan, $tahun);
        $data['pendapatan'] = $this->total_pendapatan($bulan, $tahun);
        $data['pengeluaran'] = $this->total_pengeluaran($bulan, $tahun);

        foreach ($data['pendapatan'] as $p) {
            foreach ($data['pengeluaran'] as $q) {
                foreach ($data['gaji'] as $r) {
                    $day = date('31');
                    $day_today = date('d');
                    $today = date('Y-m-d');

                    if ($day == $day_today)
                    {
                        $data = array(
                            'tanggal' => $today,
                            'pendapatan_kotor' => $p->total,
                            'pengeluaran' => $q->total + $r->gaji,
                            'pendapatan_bersih' => $p->total - ($q->total + $r->gaji)
                        );

                    $this->tambah_pendapatanBersih($data, $today);
                    }   
                }  
            }   
        }  
    }

    public function tampil_pendapatanSemuaBersih()
    {
        $this->db->select('*');
        $this->db->from('pendapatan_bersih');
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $pendapatan_bersih[] = $data;
                }
            return $pendapatan_bersih;
            }
    }

    public function tampil_pendapatanBersih($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pendapatan_bersih');
        $this->db->where('month(tanggal) =', $bulan);
        $this->db->where('year(tanggal) =', $tahun);
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $pendapatan_bersih[] = $data;
                }
            return $pendapatan_bersih;
            }
    }
}
?>