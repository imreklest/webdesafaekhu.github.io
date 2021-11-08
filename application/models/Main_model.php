<?php
 
class Main_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function get_artikel_semua($limit, $start){
        $query = $this->db->order_by('CREATED_ON','DESC')->get('artikel', $limit, $start);
        return $query;
    }

    function get_post_kategori($limit, $start,$kode_kat=''){
        $query = $this->db->order_by('CREATED_ON','DESC');
        if(!empty($kode_kat)){
    		$this->db->like('KATEGORI',$kode_kat);
    	}
        return $query->get('artikel', $limit, $start);
    }

    function get_kategori_by_slug($slug_kategori){
    	$data = $this->db->where('SLUG_URL_KAT',$slug_kategori)->get('web_kategori');
    	if($data->num_rows()>0){
    		return $data->row();
    	}else{
    		return false;
    	}
    }

    function log_visitor($ip,$user_agent) {
		$cek = $this->db->query("SELECT ID FROM wb_visitor WHERE IP=? AND USER_AGENT=? AND DATE(VISIT_TIME)=CURDATE()",[$ip,$user_agent]);
		if ($cek->num_rows()) {
			return $this->db->query("UPDATE wb_visitor SET VISIT_COUNT=VISIT_COUNT+1,VISIT_LAST_TIME=NOW() WHERE ID=?",[$cek->row()->ID]);
		} else {
			return $this->db->query("INSERT INTO wb_visitor (IP,USER_AGENT,VISIT_TIME) VALUES (?,?,NOW())",[$ip,$user_agent]);
		}
	}

	function update_view_post($id_post){
		$this->db->where('ID',$id_post)->set('JUM_VIEW', '`JUM_VIEW`+ 1', FALSE)->update('artikel');
	}

    function get_tentang_desa(){
        $this->db->select('tentang_desa.*,artikel.SLUG_URL')
                ->from('tentang_desa')
                ->join('artikel','artikel.TENTANG_DESA=tentang_desa.ID','left');
        return $this->db->get()->result_array();
    }

     function get_unggulan_desa(){
        $this->db->select('menu_unggulan_desa.*')
                ->from('menu_unggulan_desa');
        return $this->db->get()->result_array();
    }


    function get_menu_unggulan_by_slug($slug_kategori){
    	$data = $this->db->where('SLUG_URL',$slug_kategori)->get('menu_unggulan_desa');
    	if($data->num_rows()>0){
    		return $data->row();
    	}else{
    		return false;
    	}
    }

    function get_post_unggulan($limit, $start,$id=''){
        $query = $this->db->order_by('CREATED_ON','DESC');
    	$this->db->like('UNGGULAN_DESA',$id);
        return $query->get('artikel', $limit, $start);
    }
    
}
