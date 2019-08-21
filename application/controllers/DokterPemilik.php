<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DokterPemilik extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('akses') != "dokter_pemilik"){
			$this->session->sess_destroy();
			redirect(base_url("index.php/Login"));
		}
		
		$this->load->model('m_pasien');
		$this->load->model('m_stokBahan');
		$this->load->model('m_pendapatan');
		$this->load->model('m_pendapatanBersih');
		$this->load->model('m_rekamMedis');
		$this->load->model('m_antrian');
		$this->load->model('m_pengeluaran');
		$this->load->model('m_gaji');
	}

	public function index()
	{
		$where = $this->session->userdata('username'); 
		$data['antrian'] = $this->m_antrian->tampil_antrianDokter($where);
		$data['perawatan'] = $this->m_antrian->tampil_antrianPerawatan($where);
		$this->load->view('dokterPemilik/v_daftarAntrian', $data);
	}

	//antrian
	public function statusPerawatan($no_pasien)
	{
		$where1 = array('no_pasien' => $no_pasien);
		$where2 = array('pasien.no_pasien' => $no_pasien);
		//ubah status perawatan
		$data['perawatan'] = $this->m_antrian->ubah_statusPerawatan($where1);
		//tampil profil
		$data['pasien'] = $this->m_pasien->tampil_pasienByNo($where2)->result();
		$data['rekam_medis'] = $this->m_rekamMedis->rekam_medis($where2);
		$this->load->view('dokterPemilik/v_pasienPerawatan', $data);
	}

	public function statusSelesai($no_pasien)
	{
		$diagnosa = $this->input->post('diagnosa');
		$no_perawatan = $this->input->post('no_perawatan');
		$regio = $this->input->post('regio');
		$keterangan = $this->input->post('keterangan');
		$tanggal = date("Y-m-d");
		$where = array('no_pasien' => $no_pasien);
		//ubah status selesai
		$data['selesai'] = $this->m_antrian->ubah_statusSelesai($where);
 		//diagnosa
		$data = array(
			'diagnosa' => $diagnosa,
			'keterangan' => $keterangan
			);
		$this->m_rekamMedis->tambah_diagnosa($tanggal, $where, $data); 
		//tambah pendapatan
		$data = array(
			'no_pasien' => $no_pasien,
			'username' => $this->session->userdata('username'),
			'no_perawatan' => $no_perawatan,
			'regio' => $regio,
			'tanggal' => $tanggal,
			);
		$this->m_pendapatan->tambah_pendapatan($data); 
		//ubah status selesai
		$data['selesai'] = $this->m_antrian->ubah_statusSelesai($where);
		redirect(base_url('index.php/DokterPemilik/'));
	}

	//pasien
	public function daftarPasien()
	{
		$data['pasien'] = $this->m_pasien->tampil_pasien()->result();
		$this->load->view('dokterPemilik/v_daftarPasien', $data);
	}

	public function profilPasien($no_pasien)
	{
		$where = array('pasien.no_pasien' => $no_pasien);
		$data['pasien'] = $this->m_pasien->tampil_pasienByNo($where)->result();
		$data['rekam_medis'] = $this->m_rekamMedis->rekam_medis($where);
		$this->load->view('dokterPemilik/v_profilPasien', $data);
	}

	public function pasienPerawatan($no_pasien)
	{
		$where = array('pasien.no_pasien' => $no_pasien);
		$data['pasien'] = $this->m_pasien->tampil_pasienByNo($where)->result();
		$data['rekam_medis'] = $this->m_rekamMedis->rekam_medis($where);
		$this->load->view('dokterPemilik/v_pasienPerawatan', $data);
	}

	//stok bahan
	public function daftarStokBahan()
	{
		$this->m_stokBahan->expired();
		$data['bahan'] = $this->m_stokBahan->tampil_stokBahan();
		$this->load->view('dokterPemilik/v_daftarStokBahan', $data);
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
		redirect(base_url('index.php/DokterPemilik/daftarPengeluaran'));
	}

	function editStokBahan($kode_bahan)
	{
		$where = array('kode_bahan' => $kode_bahan);
		$data['bahan'] = $this->m_stokBahan->edit_stokBahan($where)->result();
		$this->load->view('dokterPemilik/v_editStokBahan', $data);
	}

	public function updateStokBahan()
	{
		$kode_bahan = $this->input->post('kode_bahan');
		$nama_bahan = $this->input->post('nama_bahan');
		$stok = $this->input->post('stok');
		$stok_minimal = $this->input->post('stok_minimal');
		$no_satuan = $this->input->post('no_satuan');
		$harga_pokok = $this->input->post('harga_pokok');
		$harga_jual = $this->input->post('harga_jual');
		$no_perawatan = $this->input->post('no_perawatan');
		$expired = $this->input->post('expired');
 
		$data = array(
			'nama_bahan' => $nama_bahan,
			'stok' => $stok,
			'stok_minimal' => $stok_minimal,
			'no_satuan' => $no_satuan,
			'harga_pokok' => $harga_pokok,
			'harga_jual' => $harga_jual,
			'no_perawatan' => $no_perawatan,
			'expired' => $expired,
			);
		$where = array('kode_bahan' => $kode_bahan);
		$this->m_stokBahan->update_stokBahan($where, $data);
		redirect(base_url('index.php/DokterPemilik/daftarStokBahan'));
	}

	public function hapusStokBahan($kode_bahan)
	{
		$where = array('kode_bahan' => $kode_bahan);
		$this->m_stokBahan->hapus_stokBahan($where);
		redirect(base_url('index.php/DokterPemilik/daftarStokBahan'));
	}

	//pendapatan
	public function daftarPendapatanPribadi()
    {
    	$month = date('m');
	    $year = date('Y');

	    $where = $this->session->userdata('username'); 
        $data['pendapatan'] = $this->m_pendapatan->tampil_pendapatanPribadi($where, $month, $year);

    	if (isset($_GET['bulan']) and isset($_GET['tahun'])) {
    	
	    	$bulan = $_GET['bulan'];
		    $tahun = $_GET['tahun'];

		    if ($bulan == 0 && $tahun == 0) {
		    	$data['pendapatan'] = $this->m_pendapatan->tampil_pendapatanPribadi($where, $month, $year);
		    }
		    else
		    {
		      	$data['pendapatan'] = $this->m_pendapatan->tampil_pendapatanPribadi($where, $bulan, $tahun);
		    }
	    }

        $this->load->view('dokterPemilik/v_daftarPendapatanPribadi', $data);
    }

    public function daftarPendapatan()
    {
    	$bul = date('m')-1;
    	$thn = date('Y');

    	$this->m_pendapatanBersih->pendapatanBersih($bul, $thn);
    	$data['pendapatanBersih'] = $this->m_pendapatanBersih->tampil_pendapatanSemuaBersih();

        $where1 = array('month(tanggal)' => date('m'),
	    				'year(tanggal)' => date('Y')
	    			);

	    $data['pendapatan'] = $this->m_pendapatan->tampil_pendapatan($where1);

    	if (isset($_GET['bulan']) and isset($_GET['tahun'])) {
    	
    		$where2 = array('month(tanggal)' => $_GET['bulan'],
	    				'year(tanggal)' => $_GET['tahun']
	    			);

		    if ($bulan == 0 && $tahun == 0) {
		    	$data['pendapatan'] = $this->m_pendapatan->tampil_pendapatan($where2);
		    }
		    else
		    {
		      	$data['pendapatan'] = $this->m_pendapatan->tampil_pendapatan($where2);
		    }
	    }

        $this->load->view('dokterPemilik/v_daftarPendapatan', $data);
    }
   
    public function showPendapatanBersih()
	{
	    $bulan = $_GET['bulan'];
	    $tahun = $_GET['tahun'];

	    $month = date('m');
	    $year = date('Y'); 

	    if ($bulan == 0 && $tahun == 0) {
	    	$data = $this->m_pendapatanBersih->tampil_pendapatanSemuaBersih();
	    }
	    else
	    {
	      $data = $this->m_pendapatanBersih->tampil_pendapatanBersih($bulan, $tahun);
	    }
	    if (!empty($data)) 
	    {
	      foreach ($data as $row): ?>
	      <tr>
	        <td><?php echo format_tgl($row->tanggal) ?></td>
            <td><?php echo number_format($row->pendapatan_kotor)?></td>
            <td><?php echo number_format($row->pengeluaran)?></td>
            <td><?php echo number_format($row->pendapatan_bersih)?></td>
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

        $this->load->view('dokterPemilik/v_pengeluaran', $data);
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
		redirect(base_url('index.php/DokterPemilik/daftarPengeluaran'));
    }
    
    public function hapusPengeluaranBahan($no_pengeluaran)
	{
		$where = array('no_pengeluaran' => $no_pengeluaran);
		$this->m_pengeluaran->hapus_pengeluaranBahan($where);
		redirect(base_url('index.php/dokterPemilik/daftarPengeluaran'));
	}

    //gaji
    public function gaji()
    {
		$this->load->view('dokterPemilik/v_gaji');
    }

    public function showGajiDokter()
	{
	    $bulan = $_GET['bulan'];
	    $tahun = $_GET['tahun'];

	    if ($bulan == 0 && $tahun == 0) {
	    	$data = $this->m_gaji->tampil_gajiDok();
	    }
	    else
	    {
	      $data = $this->m_gaji->tampil_gajiDokter($bulan, $tahun);
	    }
	    if (!empty($data)) 
	    {
	      foreach ($data as $row): ?>
	      <tr>
	        <td><?php echo $row->nama_dokter ?></td>
	        <td><?php echo format_tgl($row->tanggal) ?></td>
	        <td><?php echo $row->gaji ?></td>
	        <td><?php 
	        	if ($row->status == 'Belum Dibayarkan') {?>
                    <a href="<?php echo base_url() . 'index.php/dokterPemilik/statusGaji/' . $row->no_gaji; ?>">
                        <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Belum Dibayarkan"> 
                            Belum Dibayarkan</i> 
                    	</button>
                    </a>
                <?php } else
                {
                    echo $row->status;
                }?> </td>
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

	public function showGajiPerawat()
	{
	    $bulan = $_GET['bulan'];
	    $tahun = $_GET['tahun'];

	    if ($bulan == 0 && $tahun == 0) {
	    	$data = $this->m_gaji->tampil_gajiPer();
	    }
	    else
	    {
	      $data = $this->m_gaji->tampil_gajiPerawat($bulan, $tahun);
	    }
	    if (!empty($data)) 
	    {
	      foreach ($data as $row): ?>
	      <tr>
	        <td><?php echo $row->nama_perawat ?></td>
	        <td><?php echo format_tgl($row->tanggal) ?></td>
	        <td><?php echo $row->gaji ?></td>
	        <td><?php 
	        	if ($row->status == 'Belum Dibayarkan') {?>
                    <a href="<?php echo base_url() . 'index.php/dokterPemilik/statusGaji/' . $row->no_gaji; ?>">
                        <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Belum Dibayarkan"> 
                            Belum Dibayarkan</i> 
                    	</button>
                    </a>
                <?php } else
                {
                    echo $row->status;
                }?> </td>
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

    public function statusGaji($no_gaji)
    {
    	$where = array('no_gaji' => $no_gaji);
    	$this->m_gaji->ubah_status($where);
		redirect(base_url('index.php/DokterPemilik/gaji'));
    }

}
