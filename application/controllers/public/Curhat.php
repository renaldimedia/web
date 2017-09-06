<?php defined('BASEPATH') or exit('No direct script access allowed');
 
class Curhat extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    public function index()
    {
       
        if (!session_id()) {
             session_start();
        }
    
    
    
        $helper = $this->fb->getRedirectLoginHelper();
        $permissions = ['public_profile','email']; // these are the permissions we ask from the Facebook user's profile
    
        $this->data['login_fb'] = anchor($helper->getLoginUrl('http://localhost:80/web/admin/user/facebook', $permissions), '<div class="btn btn-primary">
        <span class="fa fa-facebook-square"></span> Mulai Curhat!</div>');

       // $facebook->getLogoutUrl(array('next' =>'http://example.com/logout.php', 'access_token'=>$facebook->getAccessToken()));
    
        $this->render('public/curhat/curhat_view');
    }

  
    

    
}
