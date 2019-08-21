<?php
class M_gaji extends CI_Model
{
        public function tambah_gaji($data, $where)
    {
        $this->db->select('*');
        $this->db->from('gaji');
        $this->db->where($where);

        $query = $this->db->get();
        if ($query->num_rows()==0){
            $this->db->insert('gaji', $data);
        }
    }

    public function gaji($where, $bulan, $tahun)
    {
        $this->db->select_sum('total');
        $this->db->from('pendapatan');
        $this->db->where('username =', $where);
        $this->db->where('month(tanggal) = ', $bulan);
        $this->db->where('year(tanggal) = ', $tahun);
        
        $query = $this->db->get();
        foreach ($query->result_array() as $data) {
            $day = date('1');
            $day_today = date('d');
            $today = date('Y-m-d');

            if ($day == $day_today)
            {
                $data = array(
                    'username' => $this->session->userdata('username'),
                    'tanggal' => $today,
                    'gaji' => $data['total'] * 0.4
                );
            $where = array(
                'username' => $this->session->userdata('username'),
                'tanggal' => $today,
            );
            $this->tambah_gaji($data, $where);

            }   
        }  
    }

    public function tampil_semuaGaji($where)
    {
        $this->db->select('*');
        $this->db->from('gaji');
        $this->db->where('username =', $where);
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $gaji[] = $data;
                }
            return $gaji;
            }
    }

    public function tampil_gaji($where, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('gaji');
        $this->db->where('username =', $where);
        $this->db->where('month(tanggal) =', $bulan);
        $this->db->where('year(tanggal) =', $tahun);
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $gaji[] = $data;
                }
            return $gaji;
            }
    }

    public function ubah_status($where)
    {
        $this->db->set('status', 'Sudah Dibayarkan');
        $this->db->where($where);
        $this->db->update('gaji');
    }

    public function gajiPerawat($where, $bulan, $tahun)
    {
        $day = date('1');
        $day_today = date('d');
        $today = date('Y-m-d');

        if ($day == $day_today)
        {
            $data = array(
               'username' => $this->session->userdata('username'),
               'tanggal' => $today,
               'gaji' => 1500000
                );
            $where = array(
                'username' => $this->session->userdata('username'),
                'tanggal' => $today,
            );
            $this->tambah_gaji($data, $where);

        }   
         
    }
    
    public function tampil_gajiDok()
    {
        $this->db->select('*');
        $this->db->from('gaji');
        $this->db->join('dokter', 'gaji.username = dokter.username');
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $gaji[] = $data;
                }
            return $gaji;
            }
    }

    public function tampil_gajiDokter($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('gaji');
        $this->db->join('dokter', 'gaji.username = dokter.username');
        $this->db->where('month(tanggal) =', $bulan);
        $this->db->where('year(tanggal) =', $tahun);
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $gaji[] = $data;
                }
            return $gaji;
            }
    }

    public function tampil_gajiPer()
    {
        $this->db->select('*');
        $this->db->from('gaji');
        $this->db->join('perawat', 'gaji.username = perawat.username');
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $gaji[] = $data;
                }
            return $gaji;
            }
    }

    public function tampil_gajiPerawat($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('gaji');
        $this->db->join('perawat', 'gaji.username = perawat.username');
        $this->db->where('month(tanggal) =', $bulan);
        $this->db->where('year(tanggal) =', $tahun);
        $query = $this->db->get();
            if ($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $gaji[] = $data;
                }
            return $gaji;
            }
    }
}
?>