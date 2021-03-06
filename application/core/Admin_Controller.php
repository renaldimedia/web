<?php

class Admin_Controller extends MY_Controller
{
    
  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
    if (!$this->ion_auth->logged_in() OR !$this->ion_auth->in_group(1, $this->ion_auth->get_user_id()))
    {
      //redirect them to the login page
      redirect('admin/user/login', 'refresh');
    }
    
    $this->data['current_user'] = $this->ion_auth->user()->row();
    $this->data['current_user_menu'] = '';
    $current_user = $this->ion_auth->user()->row();
    // if($this->ion_auth->in_group('admin'))
    // {
    //   $this->data['current_user_menu'] = $this->load->view('templates/_parts/user_menu_admin_view.php', NULL, TRUE);
    // }
    $this->data['page_title'] = 'CI App - Dashboard';
  }
  protected function render($the_view = NULL, $template = 'admin_master')
  {
    $this->render_menu();
    if($this->ion_auth->in_group(1, $this->ion_auth->get_user_id()))
    {parent::render($the_view, $template);}
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
    $this->data['menu'] = $this->bootstrap_menuadm($items);
    //$this->db->close();
  }

  function bootstrap_menuadm($array, $class1 = "dropdown",$induk_menu = 0, $parents = array())
  {
      if ($induk_menu==0) {
          foreach ($array as $element) {
              if (($element['induk_menu'] != 0) && !in_array($element['induk_menu'], $parents)) {
                  $parents[] = $element['induk_menu'];
              }
          }
      }
        $menu_html = '';
      foreach ($array as $element) {
          if ($element['induk_menu']==$induk_menu) {
              if (in_array($element['id_menu'], $parents)) {
                  $menu_html .= '<li class="'.$class1.'">';
                  $menu_html .= '<a id="'.$element['id_menu'].'" href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#demo'.$element['id_menu'].'" role="button" aria-expanded="true"><i class=""'.$element['class'].'>'.$element['nama_menu'].' </i><i class="fa fa-fw fa-caret-down"></i></a>';
              } else {
                  $menu_html .= '<li>';
                  $menu_html .= '<a id="'.$element['id_menu'].'" href="' .base_url().$element['link'] . '"><i class="'.$element['class'].'"> </i> '.$element['nama_menu'] . '</a>';
              }
              if (in_array($element['id_menu'], $parents)) {
                  $menu_html .= '<ul id="demo'.$element['id_menu'].'" class="dropdown-menu collapse">';
                  $menu_html .= $this->bootstrap_menuadm($array, "dropdown-menu" ,$element['id_menu'], $parents);
                  $menu_html .= '</ul>';
              }
              $menu_html .= '</li>';
          }
      }
        return $menu_html;
  }
  
 
}