<?php

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengguna');
	}

	function index()
	{
		$data['status'] = "trying";
		$this->load->view('v_login', $data);
		
	}

  	function aksi_login()
  	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'pengguna.username' => $username,
			'password' => $password
			);
		$cek = $this->m_pengguna->cek_login($where);
		if($cek->num_rows() > 0){
			$data = $cek->row_array();
			$this->session->set_userdata('login');
			if ($data['akses'] =='dokter_pemilik') {
				$data_session = array(
					'username' =>  $this->m_pengguna->cek_dokter($where)->row()->username,
					'name' => $this->m_pengguna->cek_dokter($where)->row()->nama_dokter,
					'akses' => $this->m_pengguna->cek_dokter($where)->row()->akses,
					'status' => "login",
				);

				$this->session->set_userdata($data_session);
				redirect(base_url("index.php/DokterPemilik"));
			}
			elseif ($data['akses'] =='dokter') {
				$data_session = array(
					'username' =>  $this->m_pengguna->cek_dokter($where)->row()->username,
					'name' => $this->m_pengguna->cek_dokter($where)->row()->nama_dokter,
					'akses' => $this->m_pengguna->cek_dokter($where)->row()->akses,
					'status' => "login",
				);

				$this->session->set_userdata($data_session);
				redirect(base_url("index.php/Dokter"));
			}
			elseif ($data['akses'] =='perawat') {
				$data_session = array(
					'username' =>  $this->m_pengguna->cek_perawat($where)->row()->username,
					'name' => $this->m_pengguna->cek_perawat($where)->row()->nama_perawat,
					'akses' => $this->m_pengguna->cek_perawat($where)->row()->akses,
					'status' => "login",
				);

				$this->session->set_userdata($data_session);
				redirect(base_url("index.php/Perawat"));
			}

		}else{
			$this->session->set_flashdata('error', "<center class='alert alert-danger'><strong>Gagal Login!</strong> Username / Password yang anda masukkan salah.</center>");
			redirect(base_url("index.php/Login"));
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/Login'));
	}
}
