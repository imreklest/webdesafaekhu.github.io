<?php
defined('BASEPATH') OR exit('No direct sript access allowed');

class Fungsi_helper{
	function __construct()
	{
		$this->ci = &get_instance();
	}

	function uploadImage($upload_path,$name_input,$name_image)
	{
		if (!is_dir($upload_path)) mkdir($upload_path,0777,true);
		$config['upload_path']          = $upload_path;
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = $name_image;
		$config['overwrite']			= true;
	    $config['max_size']             = 2000; // 2MB
	    $this->ci->load->library('upload', $config);
	    $this->ci->upload->initialize($config);
	    if ($this->ci->upload->do_upload($name_input)) {
	    	return $this->ci->upload->data("file_name");
	    }
	    return false;
	}

	function uploadFile($upload_path,$name_input,$name_file)
	{
		if (!is_dir($upload_path)) mkdir($upload_path,0777,true);
		$config['upload_path']          = $upload_path;
		$config['allowed_types']        = '*';
		$config['file_name']            = $name_file;
		$config['overwrite']			= true;
		$config_video['max_size']       = 20000;
		$this->ci->load->library('upload', $config);
		$this->ci->upload->initialize($config);
		if ($this->ci->upload->do_upload($name_input)) {
			return $this->ci->upload->data("file_name");
		}
		return $error = array('error' => $this->ci->upload->display_errors());
	}

	function resize_image($image,$width,$height){
		$this->ci->load->library('image_lib');
		$config['image_library'] = 'gd2';
	    $config['source_image'] = $image;
	    $config['create_thumb'] = FALSE;
	    $config['maintain_ratio'] = TRUE;
	    $config['width']     = $width;
	    $config['height']   = $height;

	    $this->ci->image_lib->clear();
	    $this->ci->image_lib->initialize($config);
	    return $this->ci->image_lib->resize();
	}

	function delete_directory($dirname){
		if (is_dir($dirname))
			$dir_handle = opendir($dirname);
		if (!$dir_handle)
			return false;
		while($file = readdir($dir_handle)) {
			if ($file != "." && $file != "..") {
				if (!is_dir($dirname."/".$file))
					unlink($dirname."/".$file);
				else
					$this->delete_directory($dirname.'/'.$file);
			}
		}
		closedir($dir_handle);
		rmdir($dirname);
		return true;
	}
	
	function waktu_lalu($timestamp)
	{
		$selisih = time() - $timestamp ;
		$detik = $selisih ;
		$menit = round($selisih / 60 );
		$jam = round($selisih / 3600 );
		$hari = round($selisih / 86400 );
		$minggu = round($selisih / 604800 );
		$bulan = round($selisih / 2419200 );
		$tahun = round($selisih / 29030400 );
		if ($detik <= 60) {
			$waktu = $detik.' seconds ago';
		} else if ($menit <= 60) {
			$waktu = $menit.' minutes ago';
		} else if ($jam <= 24) {
			$waktu = $jam.' hours ago';
		} else if ($hari <= 7) {
			$waktu = $hari.' days ago';
		} else if ($minggu <= 4) {
			$waktu = $minggu.' weeks ago';
		} else if ($bulan <= 12) {
			$waktu = $bulan.' months ago';
		} else {
			$waktu = $tahun.' years ago';
		}
		return $waktu;
	}


	function waktu_depan($timestamp)
	{
		$selisih = $timestamp - time();
		$detik = $selisih ;
		$menit = round($selisih / 60 );
		$jam = round($selisih / 3600 );
		$hari = round($selisih / 86400 );
		$minggu = round($selisih / 604800 );
		$bulan = round($selisih / 2419200 );
		$tahun = round($selisih / 29030400 );
		if ($detik <= 60) {
			$waktu = $detik.' seconds';
		} else if ($menit <= 60) {
			$waktu = $menit.' minutes';
		} else if ($jam <= 24) {
			$waktu = $jam.' hours';
		} else if ($hari <= 7) {
			$waktu = $hari.' days';
		} else if ($minggu <= 4) {
			$waktu = $minggu.' weeks';
		} else if ($bulan <= 12) {
			$waktu = $bulan.' months';
		} else {
			$waktu = $tahun.' years';
		}
		return $waktu;
	}

	function tgl_indo_singkatan($datetime){
		$tanggal = date('Y-m-d',strtotime($datetime));
		$jam     = date('H:i:s',strtotime($datetime));
		$bulan = array (
			1 =>'Jan',
			'Feb',
			'Mar',
			'Apr',
			'Mei',
			'Juni',
			'Juli',
			'Agt',
			'Sept',
			'Okt',
			'Nov',
			'Des'
		);
		$pecahkan = explode('-', $tanggal);
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}

	function tgl_indo($datetime){
		$tanggal = date('Y-m-d',strtotime($datetime));
		$jam     = date('H:i:s',strtotime($datetime));
		$bulan = array (
			1 =>   'Januari',
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
		$pecahkan = explode('-', $tanggal);
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}
	

	function remove_ptag($str){
		$teks = str_replace(['<p>','</p>'],['',''],$str);;
		return $teks;
	}

	function custom_message(){
		$this->ci->form_validation->set_message('required', 'Input {field} tidak boleh kosong.');
		$this->ci->form_validation->set_message('numeric', 'Input {field} harus berupa angka saja.');
		$this->ci->form_validation->set_message('max_length', 'Input {field} tidak boleh lebih dari {param} karakter.');
		$this->ci->form_validation->set_message('matches', 'Input {field} harus sama dengan {param}.');
		$this->ci->form_validation->set_message('valid_email', 'Input {field} tidak sesuai dengan format email.');
		$this->ci->form_validation->set_message('is_unique', 'Input {field} sudah ada yang pakai.');
		return $this;
	}

	function custom_message2(){
		$this->ci->form_validation->set_message('required', '{field} tidak boleh kosong.');
		$this->ci->form_validation->set_message('numeric', '{field} harus berupa angka saja.');
		$this->ci->form_validation->set_message('max_length', '{field} tidak boleh lebih dari {param} karakter.');
		$this->ci->form_validation->set_message('min_length', '{field} harus lebih dari {param} karakter.');
		$this->ci->form_validation->set_message('matches', '{field} harus sama dengan {param}.');
		$this->ci->form_validation->set_message('valid_email', '{field} tidak sesuai dengan format email.');
		$this->ci->form_validation->set_message('is_unique', '{field} sudah ada yang pakai.');
		return $this;
	}

	function pagination_style(){
		$config = [];
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        return $config;
	}
	
	

}