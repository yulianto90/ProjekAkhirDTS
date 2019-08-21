<?php
class M_antrian extends CI_Model
{
	function tampil_antrian()
	{
		$this->db->select('*');
		$this->db->from('antrian');
		$this->db->join('pengguna','antrian.username = pengguna.username');
		$this->db->join('pasien','antrian.no_pasien = pasien.no_pasien');
		$this->db->where('status = 1');
		$this->db->order_by('no_antrian', 'asc');
		$query = $this->db->get();
			if ($query->num_rows()>0){
				foreach ($query->result() as $data) {
					$antrian[] = $data;
				}
			return $antrian;
			}
	}

	function tampil_antrianDokter($where)
	{
		$this->db->select('*');
		$this->db->from('antrian');
		$this->db->join('pengguna','antrian.username = pengguna.username');
		$this->db->join('pasien','antrian.no_pasien = pasien.no_pasien');
		$this->db->where('status = 1');
		$this->db->where('antrian.username', $where);
		$this->db->order_by('no_antrian', 'asc');
		$query = $this->db->get();
			if ($query->num_rows()>0){
				foreach ($query->result() as $data) {
					$antrian[] = $data;
				}
			return $antrian;
			}
	}

	function tampil_antrianPerawatan($where)
	{
		$this->db->select('*');
		$this->db->from('antrian');
		$this->db->join('pengguna','antrian.username = pengguna.username');
		$this->db->join('pasien','antrian.no_pasien = pasien.no_pasien');
		$this->db->where('status = 2');
		$this->db->where('antrian.username', $where);
		$this->db->order_by('no_antrian', 'asc');
		$query = $this->db->get();
			if ($query->num_rows()>0){
				foreach ($query->result() as $data) {
					$antrian[] = $data;
				}
			return $antrian;
			}
	}

	function tampil_antrianPerawat()
	{
		$this->db->select('*');
		$this->db->from('antrian');
		$this->db->join('pengguna','antrian.username = pengguna.username');
		$this->db->join('pasien','antrian.no_pasien = pasien.no_pasien');
		$this->db->where('status = 2');
		$this->db->order_by('no_antrian', 'asc');
		$query = $this->db->get();
			if ($query->num_rows()>0){
				foreach ($query->result() as $data) {
					$antrian[] = $data;
				}
			return $antrian;
			}
	}

	function tampil_antrianPembayaran()
	{
		$this->db->select('*');
		$this->db->from('antrian');
		$this->db->join('pengguna','antrian.username = pengguna.username');
		$this->db->join('pasien','antrian.no_pasien = pasien.no_pasien');
		$this->db->where('status = 3');
		$this->db->order_by('no_antrian', 'asc');
		$query = $this->db->get();
			if ($query->num_rows()>0){
				foreach ($query->result() as $data) {
					$antrian[] = $data;
				}
			return $antrian;
			}
	}

	function tampil_antrianSelesai($where)
	{
		$this->db->select('*');
		$this->db->from('antrian');
		$this->db->join('pengguna','antrian.username = pengguna.username');
		$this->db->join('pasien','antrian.no_pasien = pasien.no_pasien');
		$this->db->join('pendapatan','antrian.no_pasien = pendapatan.no_pasien');
		$this->db->where('antrian.status = 0');
		$this->db->where('tanggal =', $where);
		$this->db->order_by('no_antrian', 'asc');
		$query = $this->db->get();
			if ($query->num_rows()>0){
				foreach ($query->result() as $data) {
					$antrian[] = $data;
				}
			return $antrian;
			}
	}

	function tampil_antrianByNo($where){
		return $this->db->from('antrian')->where($where)->get();
	}

	function tambah_antrian($data){
		$this->db->insert('antrian', $data);
	}

	function reset_antrian(){
		return $this->db->truncate('antrian');
	}

	function ubah_statusPerawatan($where)
	{
		$this->db->set('status', 2);
		$this->db->where($where);
		$this->db->update('antrian');
	}	

	function ubah_statusSelesai($where)
	{
		$this->db->set('status', 3);
		$this->db->where($where);
		$this->db->update('antrian');
	}

	function ubah_statusSelesaiPembayaran($where)
	{
		$this->db->set('status', 0);
		$this->db->where($where);
		$this->db->update('antrian');
	}

}
?>