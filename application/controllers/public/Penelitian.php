<?php
defined('BASEPATH') or exit('No direct access allowed!');

class Penelitian extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url','download','paging'));
        //load template page
    }

    private function _get_penelitian($tahun = null, $offset, $limit)
    {
        //$offset = (int)$start * (int)$limit;
        if ($tahun === null or $tahun === '0') {
            $this->db->limit($limit, $offset);
            $q = $this->db->get('penelitian');
            $data = $q->result_array();
            return  $data;
        } else {
            $this->db->limit($limit, $offset);
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

    public function index($tahun = null)
    {
        //redirect link (for always show "hal/{page-number}")
        if (uri_string() == "public/penelitian") {
            redirect(site_url().'public/penelitian/hal/');
        } elseif (uri_string() == "public/penelitian/tahun/$tahun") {
            redirect(site_url()."public/penelitian/tahun/$tahun/hal/$pages");
        }
        $this->load->library('pagination');
        
        $datas = null;
        // show year if param not null
        $tahuns = '';
        //get list of year
        $list_tahun = $this->_get_tahun_penelitian();
        //default uri segment = 4
        $config['uri_segment'] = 4;
        $config['per_page'] = 5;// ONE OF MY PROBLEM
        $config['base_url'] = site_url().'public/penelitian/';
        if ($tahun === null or $tahun === '0') {
            //if param null use default uri segment
            $pagew = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;//if segment 4 null then page number is 0
            $offset = ($pagew  > 0) ? (($pagew - 1) * $config['per_page']) : $pagew;
            $datas = $this->_get_penelitian($tahun, ($offset), $config['per_page']);
            $config['base_url'] = site_url().'public/penelitian/hal/';
        } else {
            //if param not null use uri segment 6
            $pagew = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
            $offset = ($pagew  > 0) ? (($pagew - 1) * $config['per_page']) : $pagew;
            $datas = $this->_get_penelitian($tahun, ($offset), $config['per_page']);
            //show year
            $tahuns = 'Tahun '.$tahun;
            //use this base_url (segment 6)
            $config['base_url'] = site_url().'public/penelitian/tahun/'.$tahun.'/hal/';
            $config['uri_segment'] = 6;
        }
        //using page number (not offset)
        $config['use_page_numbers'] = TRUE;

            
         
            
        //all data i need        
        $this->data['data'] = $datas;
        $this->data['tahun'] = $tahuns;
        $this->data['url'] = $this->page->base_url('penelitian');
        $this->data['list_tahun'] = $list_tahun;
        $config['total_rows'] = $this->db->get('penelitian')->num_rows();


        //debug only

                //just show total rows ON VIEW
                $this->data['tot'] = $config['total_rows'];

            //debug only end
       
           
        if ($config['total_rows'] <=0) {
            $this->data['msg'] = 'NO DATA!';
        } else {
            $this->data['msg'] = '';
        }


        



        $this->pagination->initialize($config);
        
        $pagination = $this->pagination->create_links();
        $this->data['pagination'] = $pagination;
        $this->render('public/penelitian_view');
    }

    function create_paging()
    {
        $url_str = uri_string();
        $urls = '';
        if (strpos($url_str, '/hal/') !== false) {
            $urls = $url_str.'/0';
        } else {
            $urls = $url_str;
        }
    }
}
