<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('akses') != "dokter"){
			$this->session->sess_destroy();
			redirect(base_url("index.php/Login"));
		}
		
		$this->load->model('m_pasien');
		$this->load->model('m_stokBahan');
		$this->load->model('m_pendapatan');
		$this->load->model('m_rekamMedis');
		$this->load->model('m_antrian');
		$this->load->model('m_gaji');

	}

	public function index()
	{
		$where = $this->session->userdata('username'); 
		$data['antrian'] = $this->m_antrian->tampil_antrianDokter($where);
		$data['perawatan'] = $this->m_antrian->tampil_antrianPerawatan($where);
		$this->load->view('dokter/v_daftarAntrian', $data);
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
		$this->load->view('dokter/v_pasienPerawatan', $data);
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
		redirect(base_url('index.php/dokter/'));
	}

	//pasien
	public function daftarPasien()
	{
		$data['pasien'] = $this->m_pasien->tampil_pasien()->result();
		$this->load->view('dokter/v_daftarPasien', $data);
	}

	public function profilPasien($no_pasien)
	{
		$where = array('pasien.no_pasien' => $no_pasien);
		$data['pasien'] = $this->m_pasien->tampil_pasienByNo($where)->result();
		$data['rekam_medis'] = $this->m_rekamMedis->rekam_medis($where);
		$this->load->view('dokter/v_profilPasien', $data);
	}

	public function pasienPerawatan($no_pasien)
	{
		$where = array('pasien.no_pasien' => $no_pasien);
		$data['pasien'] = $this->m_pasien->tampil_pasienByNo($where)->result();
		$data['rekam_medis'] = $this->m_rekamMedis->rekam_medis($where);
		$this->load->view('dokter/v_pasienPerawatan', $data);
	}

	//stok bahan
	public function daftarStokBahan()
	{
		$this->m_stokBahan->expired();
		$data['bahan'] = $this->m_stokBahan->tampil_stokBahan();
		$this->load->view('dokter/v_daftarStokBahan', $data);
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

        $this->load->view('dokter/v_daftarPendapatanPribadi', $data);
    }

    //gaji
    public function gaji()
    {
    	$where = $this->session->userdata('username'); 
    	$bulan = date('m')-1;
    	$tahun = date('Y');

    	$this->m_gaji->gaji($where, $bulan, $tahun);
		$this->load->view('dokter/v_gaji');
    }

    public function showGajiDokter()
	{
	    $bulan = $_GET['bulan'];
	    $tahun = $_GET['tahun'];

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
