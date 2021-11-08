<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	protected $data = [];
	function __construct(){
	    parent::__construct();
	    $this->load->library(array('fungsi_helper','pagination'));
	    $this->load->model('Main_model','main_model');
	    $this->main_model->log_visitor($_SERVER['REMOTE_ADDR'],$_SERVER['HTTP_USER_AGENT']);
	    $data = [];
	    $data['informasi_desa'] = $this->db->get('informasi_desa')->row();
	    $data['kategori_footer'] = $this->db->get('web_kategori')->result();
	    $data['menu_ttg_desa'] = $this->main_model->get_tentang_desa();
	    $data['menu_unggulan_desa'] = $this->main_model->get_unggulan_desa();
	    $data['artikel_populer_footer'] = $this->db->limit(2)->order_by('JUM_VIEW','DESC')->get('artikel')->result();
	    $data['artikel_populer_sidebar'] = $this->db->limit(5)->order_by('JUM_VIEW','DESC')->get('artikel')->result_array();

	    // harus ditaroh paling bawah untuk ngeload variable data
	   
	    $data['footer'] = $this->load->view('web/footer',$data,TRUE);
	    $this->data = $data;

	}

	function set_header($data){
	    $this->data['header'] = $this->load->view('web/header',$data,TRUE);
	}

	public function index(){
		$query_slide = $this->db->where('IS_SLIDE',1)->get('artikel');
		$data = [
					'query_slide' => $query_slide
				];
		//konfigurasi paginatio
        $data['post_terbaru'] = $this->db->order_by('CREATED_ON','DESC')->get('artikel',7); 
        $data['berita_terbaru'] = $this->db->like('KATEGORI',31582248759)->order_by('CREATED_ON','DESC')->get('artikel',7); 
		$data['sambutan_kades'] = $this->db->get('sambutan');
		$this->data['content'] = $this->load->view('web/beranda',$data,TRUE);
		$this->data['page_title'] = 'Beranda';
		$this->data['kode_menu'] = 'beranda';
		$this->set_header($this->data);
		$this->load->view('web/main',$this->data);
	}

	public function post($param){
		$data = [];
		$query_post = $this->db->where('SLUG_URL',$param)->get('artikel');
		if($query_post->num_rows()==0){
			redirect(base_url());
		}
		$this->main_model->update_view_post($query_post->row()->ID);
		$query_post_rand = $this->db->where('ID !=',$query_post->row()->ID)->order_by('rand()')->limit(3)->get('artikel');
        $data['post'] = $query_post->row_array(); 
        $data['post_lain'] = $query_post_rand->result_array(); 
		$this->data['content'] = $this->load->view('web/detail_post',$data,TRUE);
		$this->data['page_title'] = $data['post']['JUDUL'];
		$this->data['meta_desc'] = $data['post']['META_DESC'];
		$this->data['meta_keyword'] = $data['post']['META_KEYWORD'];
		$this->data['kode_menu'] = '';
		$this->set_header($this->data);
		$this->load->view('web/main',$this->data);
	}

	public function kategori($param){
		
		$data = [];
		//konfigurasi pagination
		$config = $this->fungsi_helper->pagination_style();
       
       
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        
 
        // Membuat Style pagination untuk BootStrap v4
        
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        if($param == 'all'){
        	$config['base_url'] = site_url('kategori/'.$param); //site url
        	$postingan = $this->main_model->get_post_kategori($config["per_page"], $data['page'],'');
        	$data['postingan'] = $postingan;
        	$config['total_rows'] = $postingan->num_rows(); //total row
	    	$nama_kategori = ucwords(str_replace('-', ' ', $param));
	    	$judul_halaman = 'Semua Postingan';
        }else{
        	$config['base_url'] = site_url('kategori/'.$param); //site url
        	$kategori = $this->main_model->get_kategori_by_slug($param);
			if(!$kategori){
				redirect(base_url());
			}
			$postingan = $this->main_model->get_post_kategori($config["per_page"], $data['page'],$kategori->KODE_KAT);
        	$data['postingan'] = $postingan;
        	$config['total_rows'] = $postingan->num_rows(); //total row
	    	$nama_kategori = ucwords(str_replace('-', ' ', $param));
	    	$judul_halaman = 'Post Kategori : '.$nama_kategori;
        }

        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $this->pagination->initialize($config);
        
    	
    	$data['pagination'] = $this->pagination->create_links();  
 
		$data['page_title'] = $judul_halaman;
		$this->data['content'] = $this->load->view('web/kategori',$data,TRUE);
		$this->data['page_title'] = $judul_halaman;
		$this->data['kode_menu'] = $param;
		$this->set_header($this->data);
		$this->load->view('web/main',$this->data);
	}

	public function sambutan_kades(){
		$data = [];
		$query_post = $this->db->get('sambutan');
		if($query_post->num_rows()==0){
			redirect(base_url());
		}
        $data['sambutan'] = $query_post->row_array(); 
		$this->data['content'] = $this->load->view('web/detail_sambutan',$data,TRUE);
		$this->data['page_title'] = "Sambutan Kepala Desa Asrikaton";
		$this->data['meta_desc'] = "Sambutan Kepala Desa Asrikaton";
		$this->data['page_title'] = 'Beranda';
		$this->data['kode_menu'] = 'beranda';
		$this->set_header($this->data);
		$this->load->view('web/main',$this->data);
	}

	public function unggulan_desa($param){
		
		$data = [];
		//konfigurasi pagination
		$config = $this->fungsi_helper->pagination_style();
       
       
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        
 
        // Membuat Style pagination untuk BootStrap v4
        
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
       
    	$config['base_url'] = site_url('unggulan_desa/'.$param); //site url
    	$kategori = $this->main_model->get_menu_unggulan_by_slug($param);
		if(!$kategori){
			redirect(base_url());
		}
		$postingan = $this->main_model->get_post_unggulan($config["per_page"], $data['page'],$kategori->ID);
    	$data['postingan'] = $postingan;
    	$config['total_rows'] = $postingan->num_rows(); //total row
    	$nama_unggulan = ucwords(str_replace('-', ' ', $param));
    	$judul_halaman = 'Unggulan Desa : '.$nama_unggulan;
        

        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $this->pagination->initialize($config);
        
    	
    	$data['pagination'] = $this->pagination->create_links();  
 
		$data['page_title'] = $judul_halaman;
		$this->data['content'] = $this->load->view('web/kategori',$data,TRUE);
		$this->data['page_title'] = $judul_halaman;
		$this->data['kode_menu'] = $param;
		$this->set_header($this->data);
		$this->load->view('web/main',$this->data);
	}

	public function kontak(){
		$data = [];
		$this->data['content'] = $this->load->view('web/kontak',$data,TRUE);
		$this->data['page_title'] = 'Kontak Info';
		$this->data['kode_menu'] = 'kontak';
		$this->set_header($this->data);
		$this->load->view('web/main',$this->data);
	}

}
