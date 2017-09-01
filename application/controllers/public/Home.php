<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Home extends Public_Controller
{
 
  function __construct()
  {
    parent::__construct();
  }
 
  public function index()
  {
        $this->data['file'] = $this->latest_file();
        $this->render('public/home_view');
  }

  private function latest_file()
  {
      $this->load->database();
      $query = "SELECT * FROM file ORDER BY file.upload_time DESC LIMIT 5";
      $data = $this->db->query($query);
      return $data->result();
  }
}