<?php
class Public_Controller extends MY_Controller
{
  
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('ion_auth');
  
    $this->data['page_title'] = 'Web Dosen';
    $this->load->helpers('menu');
    
  }

  protected function render($the_view = NULL, $template = 'public_master')
  {
    $this->render_menu();
    $html = ' <ul class="nav navbar-nav navbar-default navbar-right">
    <li class="dropdown multi-level">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu">
            <li>
                <a href="#">Logout</a>
            </li>
            <li class="divider"></li>
            <li><a href="#">Password</a>
            </li>
        </ul>
    </li>
</ul>';
$this->load->database();
    // $userId = $this->ion_auth->get_user_id();
    // if ($this->ion_auth->logged_in() AND $this->ion_auth->in_group(1,$userId)){
    //   $this->data['admin_nav'] = $html;
    // }
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