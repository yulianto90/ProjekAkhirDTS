<?php
class M_rekamMedis extends CI_Model
{
	function rekam_medis($where){
		$this->db->select('*');
		$this->db->from('pasien');
		$this->db->join('rekam_medis','pasien.no_pasien = rekam_medis.no_pasien');
		$this->db->where($where);
		$query = $this->db->get();
			if ($query->num_rows()>0){
				foreach ($query->result() as $data) {
					$rekam_medis[] = $data;
				}
			return $rekam_medis;
			}
	}

	function tambah_keluhan($data){
		$this->db->insert('rekam_medis', $data);
	}

	function tambah_diagnosa($tanggal, $where, $data){
		$this->db->where('tanggal =', $tanggal);
		$this->db->where($where);
		$this->db->update('rekam_medis', $data);
	}

}