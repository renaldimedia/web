<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader {
    function __construct() {
        parent::__construct();
    }

    public function get_loaded_classes()
    {
        return $this->_ci_classes;
    }
    public function get_loaded_helpers()
    {
        $loaded_helpers = array();
        if(sizeof($this->_ci_helpers)!== 0) {
            foreach ($this->_ci_helpers as $key => $value)
            {
                $loaded_helpers[] = $key;
            }
        }
        return $loaded_helpers;
    }
    public function get_loaded_models()
    {
        return $this->_ci_models;
    }
    
    protected function render($the_view = NULL, $template = 'master')
    {
      $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);
      $this->load->view('templates/'.$template.'_view', $this->data);
    }
}
/* End of file 'MY_Loader' */
/* Location: ./application/core/MY_Loader.php */