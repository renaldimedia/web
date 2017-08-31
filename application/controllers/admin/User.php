<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
    }

    public function index()
    {
    }

    public function login()
    {
        $this->data['page_title'] = 'Login';
        if ($this->input->post()) {
            //here we will verify the inputs;
        }
        $this->load->helper('form');
        $this->render('admin/login_view', 'admin_master');
    }
    public function logout()
    {
      $this->ion_auth->logout();
      redirect('admin/user/login', 'refresh');
    }
}
