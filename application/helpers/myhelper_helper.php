<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	function format_tgl($date)
	{
		$month = array(1 => 'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
			);
		$exp = explode('-', $date);

		return $exp[2].' '.$month[ (int) $exp[1] ].' '.$exp[0];
	}

	function format_waktu($date)
	{
		$month = array(1 => 'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
			);
		$exp = explode(' ', $date);
        $tgl = $exp[0];
        $waktu = $exp[1]; 
        $exp2 = explode('-', $tgl);

		return $exp2[2].' '.$month[ (int) $exp2[1] ].' '.$exp2[0].' '.$waktu;
	}
	
	function kode_bahan() {
    $ci = &get_instance();
    $chek = $ci->db->query("select kode_bahan from stok_bahan order by kode_bahan DESC");
	    if ($chek->num_rows() > 0) {
	        $chek=$chek->row_array();
	        $laskode = $chek['kode_bahan'];
	        $ambil = substr($laskode, 2, 3) + 1;
	        $newcode = "B" . sprintf("%03s", $ambil);
	        return $newcode;
	    }else{
	        return 'B001';  
	    }
	}

	function cmb_dinamis($name, $table, $field, $pk, $selected = NULL, $extra = NULL, $id) {
	    $ci = &get_instance();
	    $cmb = "<select name='$name' id='$id' class='form-control' onchange='$extra'>";
	    $data = $ci->db->get($table)->result();
	    $cmb .= "<option value='' selected disabled='disabled'>" . '- Pilih -' ."</option>";
	    foreach ($data as $row){
	        $cmb .= "<option value='" . $row->$pk . "'";
	        $cmb .= $selected == $row->$pk ? 'selected' : '';
	        $cmb .= ">" . $row->$field . "</option>";
	    }
	    $cmb .= "</select>";
	    return $cmb;
	}

	function total($field, $table){
		$ci = &get_instance();
		$sum = 0;
		$data = $ci->db->get($table)->result();
		foreach($data as $row){
 			$sum += $row->$field;
		}
	}