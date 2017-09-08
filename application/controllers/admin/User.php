<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
 
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','ion_auth','user_agent'));
       $this->load->database();
    }

    public function index()
    {
    }

    public function login()
    {
      if ($this->ion_auth->logged_in() AND !$this->ion_auth->is_admin()){
        $this->logout();
      }
        $this->data['page_title'] = 'Login';
        if($this->input->post())
        {
          $this->load->library('form_validation');
          $this->form_validation->set_rules('identity', 'Identity', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');
          $this->form_validation->set_rules('remember','Remember me','integer');
          if($this->form_validation->run()===TRUE)
          {
            $remember = (bool) $this->input->post('remember');
            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
              redirect('admin', 'refresh');
            }
            else
            {
              $this->session->set_flashdata('message',$this->ion_auth->errors());
              redirect('admin/user/login', 'refresh');
            }
          }
        }
        $this->load->helper('form');
        $this->render('admin/login_view','admin_master');
    }
    public function logout()
    {
      $this->ion_auth->logout();
      redirect('admin/user/login', 'refresh');
    }
    
    public function facebook()
    {
      //if(!session_id()) {
        //session_start();
      //}
      
      $helper = $this->fb->getRedirectLoginHelper();
      if (isset($_GET['state'])) {
        $helper->getPersistentDataHandler()->set('state', $_GET['state']);
    }
      try
      {
        $accessToken = $helper->getAccessToken('http://localhost:80/web/admin/user/facebook');
      }
      catch(Facebook\Exceptions\FacebookResponseException $e)
      {
        // When Graph returns an error
        echo 'There was an error while trying to login using Facebook: ' . $e->getMessage();
        exit;
      }
      catch(Facebook\Exceptions\FacebookSDKException $e)
      {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }
     
      if (isset($accessToken))
      {
        $this->fb->setDefaultAccessToken($accessToken);
        try
        {
          $response = $this->fb->get('/me?fields=id,name,email,picture');
          $user = $response->getGraphUser(); // we retrieve the user data
        }
        catch(Facebook\Exceptions\FacebookResponseException $e)
        {
          // When Graph returns an error
          echo 'Could not retrieve user data: ' . $e->getMessage();
          exit;
        }
        catch(Facebook\Exceptions\FacebookSDKException $e)
        {
          // When validation fails or other local issues
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
        if($this->form_validation->valid_email($user['email']))
        {
          $this->load->model('user_model');
          if($this->user_model->login_with_facebook($user['email'], $user['name']))
          {
            redirect('public/curhat/');
          }
          else
          {
            redirect('public/curhat/');
          }
        }
      }
      else
      {
        echo 'oups... where is the access token???';
      }
    } 

    // public function facebook_logout()
    // {
    //   $token = $facebook->getAccessToken();
    //   $site_url = "http://localhost:80/web/admin/user/facebook";
    //   $url = 'https://www.facebook.com/logout.php?next=' . $site_url .
    //     '&access_token='.$token;
    //   session_destroy();
    // }
}
