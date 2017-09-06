<?php defined('BASEPATH') or exit('No direct script access allowed');
 
class Curhat extends Public_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('user_agent','upload'));
        $this->load->helper(array('form', 'url', 'file'));
    }
 
    public function index()
    {
        $this->load->library('pagination');
        $url_add = site_url('public/Curhat/tambah');
        //$this->data['url_add'] = $url_add;

        // login 3rd party
        if (!session_id()) {
             session_start();
        }
        $helper = $this->fb->getRedirectLoginHelper();
        $permissions = ['public_profile','email']; // these are the permissions we ask from the Facebook user's profile
        $button_login_fb = anchor($helper->getLoginUrl('http://localhost:80/web/admin/user/facebook', $permissions), '<div class="btn btn-primary">
        <span class="fa fa-facebook-square"></span> Mulai Curhat!</div>');
        $button_add_curhat = '<div class="btn btn-success" style="color:#fff;"><a href="'.$url_add.'" style="color:#fff;"><span class="glyphicon glyphicon-plus"></span> Curhat Baru   
        </a></div>';
        $button_appear = '';
        if (!$this->ion_auth->logged_in()) {
            //jika belum login, muncul tombol login fb
            $button_appear = $button_login_fb;
        } else {
            // jika login, muncul tombol add curhat
            $button_appear = $button_add_curhat;
        }
         
        $this->data['button'] = $button_appear;
         // login 3rd party end
      
         //pagination
         $config['per_page'] = 5;// ONE OF MY PROBLEM
       
         $pagew = ($this->uri->segment(3)) ? $this->uri->segment(6) : 1;
         $offset = ($pagew  > 0) ? (($pagew - 1) * $config['per_page']) : $pagew;
         $this->db->where('kategori_post', 'curhat');

         $data = $this->db->get('posting', $config['per_page'],$offset)->result();
         $this->data['data'] = $data;
         $config['uri_segment'] = 3;
        
         $config['base_url'] = site_url().'public/Curhat/';
         $config['use_page_numbers'] = TRUE;
         $this->db->where('kategori_post', 'curhat');
         $config['total_rows'] = $this->db->get('posting')->num_rows();
         $this->pagination->initialize($config);
         
         $pagination = $this->pagination->create_links();
         $this->data['pagination'] = $pagination;
         //pagination end
        
        $this->render('public/curhat/curhat_view');
    }

    public function tambah()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect(base_url().'public/curhat');
        }
        $url = site_url('public/Curhat');
        $this->data['back'] = $url;


        $this->render('public/curhat/curhat_view_add');
    }

    public function do_upload_multi()
    {
        $post_id = $this->add_post_curhat();
        if (!empty($_FILES)) 
        {
             //Configure upload.
            
             $this->upload->initialize(array(
                "allowed_types" => "pdf|doc|docx|xls|xlsx|ppt|pptx|rar|7zip|zip|tar|gz",
                "upload_path"   => "./uploads/",
            ));
            $created_date = date("Y-m-d H:i:s");
            //Perform upload.
                if($this->upload->do_multi_upload("files")) {
                        $uploaded = $this->upload->get_multi_upload_data();
                        $data =array();
                        //$this->__insert_to_db($uploaded,$kategori);
                        for($i=0; $i<count($uploaded); $i++) {
                                $data[$i] = array(  
                                           'id_file' => '',
                                           'nama_file' => $uploaded[$i]['file_name'],
                                           'kategori_file' => 'attachment',
                                           'deskripsi_file' => $this->input->get_post('deskripsi', TRUE),
                                           'upload_time'=> $created_date,
                                           'thumbnail' => $uploaded[$i]['file_name'].'.jpg'
                                           );
                                }
                                $post_id = $this->add_post_curhat();
                                $this->add_curhat('file',$data,$post_id);       
                        //$this->__generate_thumbs($uploaded);
                        
                        chmod('./uploads/', 777);
                        //return $uploaded;
                }else{
                        $this->session->set_flashdata('msg', 'Error, Attachment not uploaded!');
                        redirect('public/Curhat/tambah');
                }
        } 
    }

    private function add_curhat($table = null, $data = null, $post_id)
    {
        
        $created_date = date("Y-m-d H:i:s");
        if ($post_id !== null) {
            
        } else 
        {
            $data_count = count($data);
            for ($i=0; $i<$data_count; $i++) {
                $this->db->insert($table, $data[$i]);
                $data_curhat_attach = array(
                    'id_attach' => '',
                    'id_post' => $id_post,
                    'id_file' => $this->db->insert_id()
                );
            }
        }
       
    }

    private function add_post_curhat()
    {
        $judul = $this->input->post('judulCurhat');
        $teks = $this->input->post('teksCurhat');
        $userId = $this->ion_auth->get_user_id();
        $data_upload = null;
        $data_curhat = array (
            'id_post' => '',
            'judul_post' => $judul,
            'deskripsi_post' => '',
            'konten_post' => $teks,
            'id_user' => $userId,
            'kategori_post' => 'curhat',
            'gambar_post' => '',
            'waktu_post' =>  $created_date
        );
        $this->db->insert('posting', $data_curhat);
        $id_post = $this->db->insert_id();
        return $id_post;
    }
}
