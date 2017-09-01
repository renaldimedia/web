<?php
defined('BASEPATH') OR exit('No direct access allowed!');

class Publics extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    private function latest_file()
    {
        $query = "SELECT * FROM file ORDER BY file.upload_time DESC LIMIT 5";
        $data = $this->db->query($query);
        return $data->result();
    }

    public function index()
    {
            $this->page->template('public/templates/site_tpl');
            $this->page->header('templates/public/templates/nav_tpl');
            $file_terbaru = $this->latest_file();
            $this->page->view('home', array(
                'add' => $this->page->base_url('/home'),
                'file' => $file_terbaru
            ));
    }

    
}