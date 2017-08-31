<?php

class Admin_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->data['page_title'] = 'CI App - Dashboard';
    $this->load->library('ion_auth');
    if (!$this->ion_auth->logged_in())
    {
      //redirect them to the login page
      redirect('admin/user/login', 'refresh');
    }
  }
 
  protected function render($the_view = NULL, $template = 'admin_master')
  {
    $this->render_menu();
    parent::render($the_view, $template);
  }

  protected function render_menu()
  {
    $this->load->database();
    $query = "SELECT m.* 
                  FROM menu AS m
                  WHERE is_root = 1
                  ORDER BY m.id_menu	
              ";
    $items = $this->db->query($query)->result_array();
    $this->data['menu'] = bootstrap_menu($items);
    $this->db->close();
  }
 
}