<?php
defined('BASEPATH') or exit('No direct access allowed!');

class Penelitian extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url','download'));
        //load template page
    }

    private function _get_penelitian($tahun = null, $start, $limit)
    {
        if ($tahun === null or $tahun === '0') {
            $this->db->limit($limit, $start);
            
            //$this->db->where('', 0);
            
            $q = $this->db->get('penelitian');
            $data = $q->result_array();
            return  $data;
        } else {
            $this->db->limit($limit, $start);
            
            $this->db->where('tahun_penelitian', $tahun);
            
            $q = $this->db->get('penelitian');
            $data = $q->result_array();
            return  $data;
        }
    }

    private function _get_tahun_penelitian()
    {
        $query="SELECT DISTINCT tahun_penelitian FROM penelitian ORDER BY tahun_penelitian ASC";
        return $this->db->query($query)->result();
    }

    public function index($tahun = null, $pages = 0)
    {
        $data = null;
        $tahuns = '';
        $list_tahun = $this->_get_tahun_penelitian();
        //$page = $this->uri->segment(5);

        $config['per_pages'] = 4;
        if ($pages == 0) {
            $page = $pages;
        } elseif ($pages > 0) {
            $page = $pages * ($config['per_pages']);
        }
        if ($tahun === null or $tahun === '0') {
            $data = $this->_get_penelitian($tahun, ($page), $config['per_pages']);
        } else {
            $data = $this->_get_penelitian($tahun, ($page), $config['per_pages']);
            $tahuns = 'Tahun '.$tahun;
        }
            //debug only
            // $this->data['segment'] = ($page);
            // $this->data['tahunss'] = $tahun;
            //debug only end

            

            $this->data['data'] = $data;
            $this->data['tahun'] = $tahuns;
            $this->data['url'] = $this->page->base_url('penelitian');
            $this->data['list_tahun'] = $list_tahun;
            $data_count = count($data);
            
        if ($data_count <=0) {
            $this->data['msg'] = 'NO DATA!';
        }else{ $this->data['msg'] = '';}
       
        $this->render('public/penelitian_view');
    }
}
