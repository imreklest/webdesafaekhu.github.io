<?php
 
class Cek_login extends CI_Model {
	public $id_klien;
	public $id_akun;
	public $id_pegawai = '';
	public $kode_jabatan = '';
	public $tipe_login;
	
	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('web_desa_session')) 
		{
			$this->session->set_flashdata('alert', "Silahkan Login Terlebih Dahulu");
			redirect('login_app');
		}
		$session = $this->session->userdata['web_desa_session']['user'];
		$this->id_klien = $session->ID_KLIEN;
		$this->id_akun = $session->ID_AKUN;


		if($session->TIPE == 'pegawai'){
			$this->kode_jabatan = $session->KODE_JABATAN;
			$this->id_pegawai = $session->ID;
		}

		$this->tipe_login = $session->TIPE;
		
	}

	function get_session(){
		return $this->session->userdata['web_desa_session']['user'];
	}
	
}