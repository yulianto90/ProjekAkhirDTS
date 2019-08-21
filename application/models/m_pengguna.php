<?php
class M_pengguna extends CI_Model
{
    function cek_login($where){
    	$this->db->select('*');
    	$this->db->from('pengguna');
    	$this->db->where($where);
    	$query = $this->db->get();
		return $query;
    }

    function cek_dokter($where){
    	$this->db->select('*');
    	$this->db->from('pengguna');
    	$this->db->join('dokter', 'pengguna.username=dokter.username');
    	$this->db->where($where);
    	$query = $this->db->get();
		return $query;
    }

    function cek_perawat($where){
    	$this->db->select('*');
    	$this->db->from('pengguna');
    	$this->db->join('perawat', 'pengguna.username=perawat.username');
    	$this->db->where($where);
    	$query = $this->db->get();
		return $query;
    }
}