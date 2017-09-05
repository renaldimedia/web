<?php

class MY_Controller extends CI_Controller
{
  public $fb; 
    protected $data = array();
   
    function __construct()
    {
      parent::__construct();
      $this->data['page_title'] = 'CI App';
      $this->data['before_head'] = '';
      $this->data['before_body'] ='';
      $this->fb = new Facebook\Facebook([
        'app_id' => $this->config->item('facebook_app_id'),
        'app_secret' => $this->config->item('facebook_app_secret'),
        'default_graph_version' => 'v2.5'
      ]);
      // now we only need to build the object...
    
     
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