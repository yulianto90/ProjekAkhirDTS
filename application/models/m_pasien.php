<?php
class M_pasien extends CI_Model
{
	function tampil_pasien(){
		return $this->db->get('pasien');
	}

	function tampil_pasienByNo($where){
		return $this->db->from('pasien')->where($where)->get();
	}

	function tambah_pasien($data){
		$this->db->insert('pasien', $data);
	}
}