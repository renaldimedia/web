<?php

class Admin_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->data['page_title'] = 'CI App - Dashboard';
  }
 
  protected function render($the_view = NULL, $template = 'admin_master')
  {
    parent::render($the_view, $template);
  }
}