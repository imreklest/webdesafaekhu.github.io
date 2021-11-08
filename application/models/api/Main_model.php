<?php
 
class Main_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function get_artikel_terbaru(){
        $select = "artikel.JUDUL, artikel.ID, artikel.CREATED_ON as WAKTU, artikel.GAMBAR_ADMIN as GAMBAR_KECIL,
                    artikel.GAMBAR_FULL, artikel.KATEGORI,artikel.UNGGULAN_DESA";
        $this->db->select($select);
        $this->db->order_by('CREATED_ON','DESC');
        $this->db->from('artikel');
        $this->db->where('TENTANG_DESA',null);
        $this->db->where('SLUG_URL !=','selamat-datang-di-website-resmi-desa-asrikaton');
        $data = $this->db->get()->result();
        foreach ($data as $key => $value) {
            $value->WAKTU = tgl_indo_singkatan($value->WAKTU);
            $url_foto = !empty($value->GAMBAR_KECIL)?$value->GAMBAR_KECIL:default_thumbnail;
            $url_foto_full = !empty($value->GAMBAR_FULL)?$value->GAMBAR_FULL:default_thumbnail;
            $value->GAMBAR_KECIL = base_url($url_foto);
            $value->GAMBAR_FULL = base_url($url_foto_full);

            $kategori = '';

            if(empty($value->UNGGULAN_DESA)){
                if(!empty($value->KATEGORI)){
                    $kategori_array = explode(',', $value->KATEGORI); 
                    $array_nama_kategori = []; 
                    $data_kategori = $this->db->where_in('KODE_KAT',$kategori_array)->get('web_kategori')->result();
                    foreach ($data_kategori as $k => $v) {
                        $array_nama_kategori[] = $v->NAMA;
                    }
                    $kategori = implode(', ', $array_nama_kategori);
                }
            }else{
                    $array_nama_kategori = []; 
                    $data_kategori = $this->db->where('ID',$value->UNGGULAN_DESA)->get('menu_unggulan_desa')->result();
                    foreach ($data_kategori as $k => $v) {
                        $array_nama_kategori[] = $v->NAMA;
                    }
                    $kategori = implode(', ', $array_nama_kategori);
            }
            

            $value->KATEGORI = $kategori;
        }
        return $data;
    }

    function get_post_kategori($param,$limit=""){
        $kategori = $this->get_kategori_by_slug($param);
        $kode_kat = $kategori->KODE_KAT;
        $select = "artikel.JUDUL, artikel.ID, artikel.CREATED_ON as WAKTU, artikel.GAMBAR_ADMIN as GAMBAR_KECIL,
                    artikel.GAMBAR_FULL, artikel.KATEGORI";
        $this->db->select($select);
        $this->db->order_by('CREATED_ON','DESC');
        $this->db->from('artikel');
        if(!empty($limit)){
            $this->db->limit($limit);
        }
        if(!empty($kode_kat)){
            $this->db->like('KATEGORI',$kode_kat);
        }
       $data = $this->db->get()->result();
        foreach ($data as $key => $value) {
            $value->WAKTU = tgl_indo_singkatan($value->WAKTU);
            $url_foto = !empty($value->GAMBAR_KECIL)?$value->GAMBAR_KECIL:default_thumbnail;
            $url_foto_full = !empty($value->GAMBAR_FULL)?$value->GAMBAR_FULL:default_thumbnail;
            $value->GAMBAR_KECIL = base_url($url_foto);
            $value->GAMBAR_FULL = base_url($url_foto_full);

            $kategori = '';
            if(!empty($value->KATEGORI)){
                $kategori_array = explode(',', $value->KATEGORI); 
                $array_nama_kategori = []; 
                $data_kategori = $this->db->where_in('KODE_KAT',$kategori_array)->get('web_kategori')->result();
                foreach ($data_kategori as $k => $v) {
                    $array_nama_kategori[] = $v->NAMA;
                }
                $kategori = implode(', ', $array_nama_kategori);
            }
            

            $value->KATEGORI = $kategori;
        }
        return $data;
    }

     function get_kategori_by_slug($slug_kategori){
        $data = $this->db->where('SLUG_URL_KAT',$slug_kategori)->get('web_kategori');
        if($data->num_rows()>0){
            return $data->row();
        }else{
            return false;
        }
    }

    function get_detail_artikel($id_artikel){
    	 $select = "artikel.JUDUL, artikel.ID, artikel.CREATED_ON as WAKTU, artikel.GAMBAR_ADMIN as GAMBAR_KECIL,
                    artikel.GAMBAR_FULL, artikel.KATEGORI,artikel.KONTEN";
        $this->db->select($select);
        $this->db->from('artikel');
        $this->db->where('ID',$id_artikel);
        $data = $this->db->get()->row();
        $url_foto = !empty($data->GAMBAR_KECIL)?$data->GAMBAR_KECIL:default_thumbnail;
        $url_foto_full = !empty($data->GAMBAR_FULL)?$data->GAMBAR_FULL:default_thumbnail;
        $data->GAMBAR_KECIL = base_url($url_foto);
        $data->GAMBAR_FULL = base_url($url_foto_full);
        $data->WAKTU = waktu_lalu($data->WAKTU);
        return $data;
    }
    
}
