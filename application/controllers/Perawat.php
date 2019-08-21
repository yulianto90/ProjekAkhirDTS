<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawat extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('akses') != "perawat"){
			$this->session->sess_destroy();
			redirect(base_url("index.php/Login"));
		}

		$this->load->model('m_pasien');
		$this->load->model('m_stokBahan');
		$this->load->model('m_perawatan');
		$this->load->model('m_rekamMedis');
		$this->load->model('m_antrian');
		$this->load->model('m_pendapatan');
		$this->load->model('m_pengeluaran');
		$this->load->model('m_gaji');
	}

	public function index()
	{
		$data['pasien'] = $this->m_pasien->tampil_pasien()->result();
		$this->load->view('perawat/v_daftarPasien', $data);
	}

	//pasien
	public function tambahPasien()
	{
		$nama = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		$riwayat_alergi = $this->input->post('riwayat_alergi');
		$penyakit = $this->input->post('penyakit');
		$no_hp = $this->input->post('no_hp');
		$today = date('Y-m-d');
 
		$data = array(
			'nama' => $nama,
			'tgl_lahir' => $tgl_lahir,
			'umur' => $today - $tgl_lahir,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan,
			'riwayat_alergi' => $riwayat_alergi,
			'penyakit' => $penyakit,
			'no_hp' => $no_hp,
			);
		$this->m_pasien->tambah_pasien($data);
		redirect(base_url('index.php/Perawat/'));
	}

	public function cetakKartu($no_pasien)
	{
		$where = array('pasien.no_pasien' => $no_pasien);
		$data['pasien'] = $this->m_pasien->tampil_pasienByNo($where)->result();
		$this->load->view('perawat/v_cetakKartu', $data);
	}
	public function cetakRekamMedis($no_pasien)
	{
		$where = array('pasien.no_pasien' => $no_pasien);
		$data['pasien'] = $this->m_pasien->tampil_pasienByNo($where)->result();
		$data['rekam_medis'] = $this->m_rekamMedis->rekam_medis($where);
		$this->load->view('perawat/v_cetakRekamMedis', $data);
	}	

	//antrian
	public function daftarAntrian()
	{
		$data['antrian'] = $this->m_antrian->tampil_antrian();
		$data['perawatan'] = $this->m_antrian->tampil_antrianPerawat();
		$data['pembayaran'] = $this->m_antrian->tampil_antrianPembayaran();
		$where = date("Y-m-d");
		$data['selesai'] = $this->m_antrian->tampil_antrianSelesai($where);
		$this->load->view('perawat/v_daftarAntrian', $data);
	}

	public function tambahAntrian()
	{
		$username = $this->input->post('username');
		$no_pasien = $this->input->post('no_pasien');
		$keluhan = $this->input->post('keluhan');
		$date = date("Y-m-d");
		$dates = date("Y-m-d H:i:s");
 
 		//keluhan
		$data = array(
			'no_pasien' => $no_pasien,
			'keluhan' => $keluhan,
			'tanggal' => $date
			);
		$this->m_rekamMedis->tambah_keluhan($data); 

 		//antrian
		$data2 = array(
			'username' => $username,
			'no_pasien' => $no_pasien,
			'waktu' => $dates
			);
		$this->m_antrian->tambah_antrian($data2);
		redirect(base_url('index.php/Perawat/daftarAntrian'));
	}

	public function cetakAntrian($no_antrian)
	{
		$where = array('no_antrian' => $no_antrian);
		$data['antrian'] = $this->m_antrian->tampil_antrianByNo($where)->result();
		$this->load->view('perawat/v_cetakNoAntrian', $data);
	}

	public function resetAntrian()
	{
		$this->m_antrian->reset_antrian();
		redirect(base_url('index.php/Perawat/daftarAntrian'));
	}

	//pembayaran
	public function pembayaran($no_pasien)
	{
		$tanggal = date("Y-m-d");
		$where = array('pendapatan.no_pasien' => $no_pasien);
		$data['pembayaran'] = $this->m_pendapatan->tampil_pembayaran($tanggal, $where);
		$data['perawatan'] = $this->m_pendapatan->tampil_biayaPerawatan($tanggal, $where);
		$data['bahan'] = $this->m_stokBahan->tampil_stokByPerawatan();
		$this->load->view('perawat/v_pembayaran', $data);
	}

	function add_to_cart(){ //fungsi Add To Cart
		$data = array(
			'id' => $this->input->post('produk_id'), 
			'name' => $this->input->post('produk_nama'), 
			'price' => $this->input->post('produk_harga'), 
			'qty' => $this->input->post('quantity'), 
		);
		$this->cart->insert($data);
		echo $this->show_cart(); //tampilkan cart setelah added
	}

	function show_cart(){ //Fungsi untuk menampilkan Cart
		$output = '';
		$no = 0;
		foreach ($this->cart->contents() as $items) {
			$no++;
			$output .='
				<tr>
					<td>'.$items['name'].'</td>
					<td>'.number_format($items['price']).'</td>
					<td>'.$items['qty'].'</td>
					<td>'.number_format($items['subtotal']).'</td>
					<td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
				</tr>
			';
		}
		$output .= '
			<tr>
				<th colspan="3">Total</th>
				<th colspan="2" class="total" id="total">'.$this->cart->total().'</th>
			</tr>
		';
		return $output;
	}

	function load_cart(){ //load data cart
		echo $this->show_cart();
	}

	function hapus_cart(){ //fungsi untuk menghapus item cart
		$data = array(
			'rowid' => $this->input->post('row_id'), 
			'qty' => 0, 
		);
		$this->cart->update($data);
		echo $this->show_cart();
	}

	public function proses($no_faktur, $no_pasien) 
    {
    	$tanggal = date("Y-m-d");
		$where = array('pendapatan.no_pasien' => $no_pasien);
		$data['perawatan'] = $this->m_pendapatan->tampil_biayaPerawatan($tanggal, $where);

    	$where1 = array('no_pasien' => $no_pasien);
    	$data['selesaiPembayaran'] = $this->m_antrian->ubah_statusSelesaiPembayaran($where1);

    	$where2 = array('no_faktur' => $no_faktur);
    	foreach($data['perawatan'] as $u){
	    	$data1 = array(
					'total' => $this->cart->total() + $u->biaya,
					'status' => 1
					);
	    	$this->m_pendapatan->update_pendapatan($where2, $data1);
    	}
 		foreach ($this->cart->contents() as $items) {
			$data2 = array(
					'no_faktur' => $no_faktur,
					'kode_bahan' => $items['id'],
					'harga_jual' => $items['price'],
					'jumlah' => $items['qty']
				);
			$this->m_pendapatan->tambah_pendapatanDetails($data2);
			
        }
        $this->cart->destroy();
        redirect(base_url('index.php/Perawat/rangPembayaran/'. $no_faktur . '/'. $no_pasien));
        // redirect(base_url('index.php/perawat/daftarAntrian'));
    }

   	public function rangPembayaran($no_faktur) 
   	{
   		$tanggal = date('Y-m-d');
		$where = array(
			'no_faktur' => $no_faktur
			);

		$data['no_faktur'] = $this->m_pendapatan->tampil_faktur($where);
   		$data['rangPembayaran'] = $this->m_pendapatan->tampil_rangPembayaran($where);
   		$data['rangkuman'] = $this->m_pendapatan->tampil_pendapatan($where);
   		$this->load->view('perawat/v_rangPembayaran', $data);
   	} 

    public function cetakKwitansi($no_faktur)
	{
		$tanggal = date('Y-m-d');
		$where = array(
			'no_faktur' => $no_faktur
			);

		$data['no_faktur'] = $this->m_pendapatan->tampil_faktur($where);
   		$data['rangPembayaran'] = $this->m_pendapatan->tampil_rangPembayaran($where);
   		$data['rangkuman'] = $this->m_pendapatan->tampil_pendapatan($where);

		$this->load->view('perawat/v_cetakKwitansi', $data);
	}

	//stok bahan
	public function daftarStokBahan()
	{
		$this->m_stokBahan->expired();
		$data['bahan'] = $this->m_stokBahan->tampil_stokBahan();
		$this->load->view('perawat/v_daftarStokBahan', $data);
	}

	//perawatan
	public function daftarPerawatan()
	{
		$data['perawatan'] = $this->m_perawatan->tampil_perawatan();
		$this->load->view('perawat/v_daftarPerawatan', $data);
	}

	//pengeluaran
    public function daftarPengeluaran()
    {
    	$month = date('m');
	    $year = date('Y');

	    $data['pengeluaran'] = $this->m_pengeluaran->tampil_pengeluaran($month, $year);

    	if (isset($_GET['bulan']) and isset($_GET['tahun'])) {
    	
	    	$bulan = $_GET['bulan'];
		    $tahun = $_GET['tahun'];

		    if ($bulan == 0 && $tahun == 0) {
		    	$data['pengeluaran'] = $this->m_pengeluaran->tampil_pengeluaran($month, $year);
		    }
		    else
		    {
		      	$data['pengeluaran'] = $this->m_pengeluaran->tampil_pengeluaran($bulan, $tahun);
		    }
	    }

        $this->load->view('perawat/v_pengeluaran', $data);
    }
    
    public function form_pengeluaran_autocomplit() 
    {
        $kode_bahan = $_GET['kode_bahan'];
        $where = array('kode_bahan' => $kode_bahan);
        $data = $this->m_stokBahan->tampil_stokBahanByNo($where);
        echo json_encode($data);
    }

    public function tambahPengeluaran()
    {
    	$kode_bahan = $this->input->post('kode_bahan');
    	$nama_bahan = $this->input->post('nama_bahan');
		$jumlah = $this->input->post('jumlah');
		$harga_pokok = $this->input->post('harga_pokok');
		$total = $this->input->post('total');
		$tanggal = $this->input->post('tanggal');
 
		$data = array(
			'kode_bahan' => $kode_bahan,
			'nama_bahan' => $nama_bahan,
			'jumlah' => $jumlah,
			'harga_pokok' => $harga_pokok,
			'total' => $total,
			'tanggal' => $tanggal,
			);
		$this->m_pengeluaran->tambah_pengeluaran($data);
		redirect(base_url('index.php/perawat/daftarPengeluaran'));
    }

    public function tambahStokBahan()
	{
		$nama_bahan = $this->input->post('nama_bahan');
		$stok = $this->input->post('jumlah1');
		$stok_minimal = $this->input->post('stok_minimal');
		$no_satuan = $this->input->post('no_satuan');
		$harga_pokok = $this->input->post('harga_pokok1');
		$harga_jual = $this->input->post('harga_jual');
		$no_perawatan = $this->input->post('no_perawatan');
		$expired = $this->input->post('expired');
 		$kode_bahan = kode_bahan();

		$data1 = array(
			'kode_bahan' => $kode_bahan,
			'nama_bahan' => $nama_bahan,
			'stok_minimal' => $stok_minimal,
			'no_satuan' => $no_satuan,
			'harga_pokok' => $harga_pokok,
			'harga_jual' => $harga_jual,
			'no_perawatan' => $no_perawatan,
			'expired' => $expired,
			);
		$this->m_stokBahan->tambah_stokBahan($data1);

		$total = $this->input->post('total1');
		$tanggal = $this->input->post('tanggal');
 
		$data2 = array(
			'kode_bahan' => $kode_bahan,
			'nama_bahan' => $nama_bahan,
			'jumlah' => $stok,
			'harga_pokok' => $harga_pokok,
			'total' => $total,
			'tanggal' => $tanggal,
			);
		$this->m_pengeluaran->tambah_pengeluaran($data2);
		redirect(base_url('index.php/perawat/daftarPengeluaran'));
	}

	public function hapusPengeluaranBahan($no_pengeluaran)
	{
		$where = array('no_pengeluaran' => $no_pengeluaran);
		$this->m_pengeluaran->hapus_pengeluaranBahan($where);
		redirect(base_url('index.php/perawat/daftarPengeluaran'));
	}

    //gaji
    public function gaji()
    {
    	$where = $this->session->userdata('username'); 
    	$month = date('m')-1;
    	$year = date('Y');
    	$data = $this->m_gaji->gajiPerawat($where, $month, $year);
		$this->load->view('perawat/v_gaji');
    }

    public function showGajiPerawat()
	{
	    $bulan = $_GET['bulan'];
	    $tahun = $_GET['tahun'];

	    $month = date('m');
	    $year = date('Y');
	    $where = $this->session->userdata('username'); 

	    if ($bulan == 0 && $tahun == 0) {
	    	$data = $this->m_gaji->tampil_semuaGaji($where);
	    }
	    else
	    {
	      $data = $this->m_gaji->tampil_gaji($where, $bulan, $tahun);
	    }
	    if (!empty($data)) 
	    {
	      foreach ($data as $row): ?>
	      <tr>
	        <td><?php echo format_tgl($row->tanggal) ?></td>
	        <td><?php echo $row->gaji ?></td>
	        <td><?php echo $row->status ?> </td>
	      </tr>
	      <?php endforeach ?> <?php
	    }
	    else
	    {
	      ?>
	        <tr><td colspan="4" align="center">Tidak ada data</td></tr>
	      <?php
	    }
	    
	}


}

