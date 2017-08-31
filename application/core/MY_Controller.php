<?php

class MY_Controller extends CI_Controller
{
    protected $data = array();
    function __construct()
    {
      parent::__construct();
      $this->data['page_title'] = 'CI App';
      $this->data['before_head'] = '';
      $this->data['before_body'] ='';
    }
   
    protected function render($the_view = NULL, $template = 'master')
    {
      if($template == 'json' || $this->input->is_ajax_request())
      {
        header('Content-Type: application/json');
        echo json_encode($this->data);
      }
      else
      {
        $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);;
        $this->load->view('templates/'.$template.'_view', $this->data);
      }
    }
}