<?php
class Public_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
    $this->data['page_title'] = 'Web Dosen';
    $this->load->helpers('menu');
  }

  protected function render($the_view = NULL, $template = 'public_master')
  {
    $this->render_menu();
    parent::render($the_view, $template);
  }

  protected function render_menu()
  {
    $this->load->database();
    $query = "SELECT m.* 
                  FROM menu AS m
                  WHERE is_root = 0
                  ORDER BY m.id_menu	
              ";
    $items = $this->db->query($query)->result_array();
    $this->data['data_debug'] = json_encode($items);
    $this->data['menu'] = bootstrap_menu($items);
    $this->db->close();
  }
}