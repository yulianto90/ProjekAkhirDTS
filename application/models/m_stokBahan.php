<?php
class M_stokBahan extends CI_Model{

	function tampil_stokBahan(){
		$this->db->select('*');
		$this->db->from('stok_bahan');
		$this->db->join('satuan_bahan','stok_bahan.no_satuan = satuan_bahan.no_satuan');
		$this->db->order_by('stok_bahan.stok', 'asc');
		$query = $this->db->get();
			if ($query->num_rows()>0){
				foreach ($query->result() as $data) {
					$tampil_stokBahan[] = $data;
				}
			return $tampil_stokBahan;
			}
	}

	function tampil_stokBahanByNo($where){
		$this->db->select('*');
		$this->db->from('stok_bahan');
		$this->db->join('satuan_bahan','stok_bahan.no_satuan = satuan_bahan.no_satuan');
		$this->db->where($where);
		$query = $this->db->get();
			if ($query->num_rows()>0){
				foreach ($query->result() as $data) {
					$tampil_stokBahan = array(
						'nama_bahan' => $data->nama_bahan,
            			'satuan' => $data->satuan,
            			'stok' => $data->stok,
            			'harga_jual'=> $data->harga_jual,
            			'harga_pokok'=> $data->harga_pokok
					);
				}
			return $tampil_stokBahan;
			}
	}
	
	function tambah_stokBahan($data){
		$this->db->insert('stok_bahan', $data);
	}

	function edit_stokBahan($where){		
		return $this->db->get_where('stok_bahan', $where);
	}

	function update_stokBahan($where, $data){
		$this->db->where($where);
		$this->db->update('stok_bahan', $data);
	}	

	function hapus_stokBahan($where){
		$this->db->where($where);
		$this->db->delete('stok_bahan');
	}

	function tampil_stokByPerawatan(){
		$this->db->select('*');
		$this->db->from('stok_bahan');
		$this->db->join('perawatan', 'stok_bahan.no_perawatan = perawatan.no_perawatan');
		$query = $this->db->get();
			if ($query->num_rows()>0){
				foreach ($query->result() as $data) {
					$tampil_stokBahan[] = $data;
				}
			return $tampil_stokBahan;
			}
	}

	public function expired()
	{
		$this->db->select('*');
		$this->db->from('stok_bahan');
		$query = $this->db->get();
		foreach ($query->result_array() as $data) {
			$today = date_create(date('Y-m-d'));
			$expired = date_create($data['expired']);
			$diff = date_diff($expired, $today);
			$diffr = (int) $diff->format("%R%a");
			if ($diffr>=0)
			{

				$where = array('kode_bahan' => $data['kode_bahan']);
				$this->hapus_stokBahan($where);
				$this->load->model('m_pengeluaran');
				$data = array(
					'kode_bahan' => $data['kode_bahan'],
					'nama_bahan' => $data['nama_bahan'],
					'jumlah' => $data['stok'],
					'harga_pokok' => $data['harga_pokok'],
					'total' => $data['stok'] * $data['harga_pokok'],
					'tanggal' => $data['expired']
				);

			$this->m_pengeluaran->tambah_pengeluaran($data);

			}
			
		}
	}
}