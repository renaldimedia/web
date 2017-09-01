<?php
defined('BASEPATH') OR exit('No direct access allowed!');

class Penelitian extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url','download'));
        //load template page
    }

    private function _get_penelitian($tahun = null)
    {
        if ($tahun === null )
        {
            $query="SELECT * FROM penelitian ORDER BY tahun_penelitian ASC";
            return $this->db->query($query)->result();
        }else
        {
            $query="SELECT * FROM penelitian WHERE tahun_penelitian = $tahun ORDER BY id_penelitian ASC";
            return $this->db->query($query)->result();
        }
        
    }

    private function _get_tahun_penelitian()
    {
        $query="SELECT DISTINCT tahun_penelitian FROM penelitian ORDER BY tahun_penelitian ASC";
        return $this->db->query($query)->result();
    }

    public function index($tahun = null)
    {
        $data = null;
        $tahuns = '';
        $list_tahun = $this->_get_tahun_penelitian();
        if ($tahun === null )
        {
            $data = $this->_get_penelitian();
            
        }else
        {
            $data = $this->_get_penelitian($tahun);
            $tahuns = 'Tahun '.$tahun;
        }
        
            $this->data['data'] = $data;
            $this->data['tahun'] = $tahuns;
            $this->data['url'] = $this->page->base_url();
            $this->data['list_tahun'] = $list_tahun;
        
        $this->render('public/penelitian_view');
    }

    

    
}