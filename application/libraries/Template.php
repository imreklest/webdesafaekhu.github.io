<?php
defined('BASEPATH') OR exit('No direct sript access allowed');

class Template{
	function __construct()
	{
		$this->ci = &get_instance();
	}

	function admin($template,$data,$modal='')
	{
		$data['app_name'] = app_name;
		
		$data['session'] = $this->ci->cek_login->get_session();
		$layout['content'] = $this->ci->load->view($template, $data, TRUE);
		$layout['navbar'] = $this->ci->load->view('admin/layout/navbar_v', $data, TRUE);
		$layout['sidebar'] = $this->ci->load->view('admin/layout/sidebar_v', $data, TRUE);

		if(!empty($modal)){
			$layout['modal'] = $this->ci->load->view($modal, $data, TRUE);
		}else{
			$layout['modal'] = '';
		}
		$this->ci->load->view('admin/layout/layout_v', $layout);
	}


}