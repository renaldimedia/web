<?php defined('BASEPATH') or exit('No direct script access allowed');
 
class Curhat extends Public_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('user_agent','upload'));
        $this->load->helper(array('form', 'url', 'file', 'download'));
        
    }
 
    public function index($hal = 1)
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
       
         $pagew = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
         $offset = ($pagew  > 0) ? (($pagew - 1) * $config['per_page']) : $pagew;
         $this->db->where('kategori_post', 'curhat');
         $this->db->order_by("waktu_post desc");
         $data = $this->db->get('posting', $config['per_page'],$offset)->result();
         $count_komentar = array();
         $data_count = count($data);
         for($i=0;$i<$data_count;$i++)
         {
             $id_post = $data[$i]->id_post;
             $this->db->where('id_post', $id_post);
             $count = $this->db->get('komentar')->num_rows();
             $count_komentar[$id_post] = $count;
         }
         $this->data['count_komentar'] = $count_komentar;
         $this->data['data'] = $data;
         $config['uri_segment'] = 4;
        
         $config['base_url'] = site_url().'public/curhat/hal';
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

    public function edit($id)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect(base_url().'public/curhat');
        }
        $url = site_url('public/Curhat');
        $this->data['back'] = $url;
        $this->db->where('id_post',$id);
        $data = $this->db->get('posting', 1)->row();
        $this->data['data'] = $data;

        $this->render('public/curhat/curhat_view_edit');
    }

    public function edit_post($id)
    {

        $judul = $this->input->post('judulCurhat',true);
        $konten = $this->input->post('teksCurhat',true);
        $data = array(
            'judul_post' => $judul,
            'konten_post' => $konten
        );
        $this->db->update('posting', $data, array('id_post' => $id));
        redirect($this->agent->referrer());
    }

    public function do_upload_multi()
    {
        $post_id = $this->add_post_curhat();
        
        if (!empty($_FILES)) 
        {
             //Configure upload.
            
             $this->upload->initialize(array(
                "allowed_types" => "pdf|doc|docx|xls|xlsx|ppt|pptx|rar|7zip|zip|tar|gz|jpg|png|jpeg",
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
                              
                                $this->add_curhat('file',$data,$post_id);       
                        //$this->__generate_thumbs($uploaded);
                        echo var_dump($_FILES);
                        
                        //return $uploaded;
                }else{
                        $this->session->set_flashdata('msg', 'Error, Attachment not uploaded!');
                        redirect('public/Curhat/tambah');
                }
        } 
    }

    private function add_curhat($table, $data, $post_id)
    {
        
            $data_count = count($data);
            for ($i=0; $i<$data_count; $i++) {
                $this->db->insert($table, $data[$i]);
                $data_curhat_attach = array(
                    'id_attach' => '',
                    'id_post' => $post_id,
                    'id_file' => $this->db->insert_id()
                );
                $this->db->insert('attachment', $data_curhat_attach);
            }
       
    }

    private function add_post_curhat()
    {
        $created_date = date("Y-m-d H:i:s");
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

    private function get_komentar_post($id_post)
    {
        $this->db->where('id_post', $id_post);
        $this->db->select('komentar.*, users.*');
        $this->db->from('komentar');
        $this->db->join('users', 'komentar.id_user = users.id', 'left');
        $data = $this->db->get()->result();
        return $data;
    }

    public function detail($id)
    {
        $this->db->where('id_post', $id);
        $this->db->select('posting.*, users.*');
        $this->db->from('posting');
        $this->db->join('users', 'posting.id_user = users.id', 'left');
        $data = $this->db->get()->row();
        $attachment = $this->get_attach_post($data->id_post);
        $komentar = $this->get_komentar_post($data->id_post);
        $this->data['komentar'] = $komentar;
        $this->data['attach'] = $attachment;
        $this->data['data'] = $data;
        if (!session_id()) {
            session_start();
       }
       $helper = $this->fb->getRedirectLoginHelper();
        $permissions = ['public_profile','email']; // these are the permissions we ask from the Facebook user's profile
        $button_login_fb = anchor($helper->getLoginUrl('http://localhost:80/web/admin/user/facebook', $permissions), '<div class="btn btn-primary">
        <span class="fa fa-facebook-square"></span> Login untuk komentar!</div>');
        $this->data['login_fb'] = $button_login_fb;
        
        $this->render('public/curhat/curhat_view_detail');
    }

    private function get_attach_post($id_post)
    {
        $this->db->where('id_post', $id_post);
        $this->db->select('attachment.*, file.*');
        $this->db->from('attachment');
        $this->db->join('file', 'attachment.id_file = file.id_file', 'left');
        $data = $this->db->get()->result();
        return $data;
    }

    public function add_komentar($id_post)
    {
        $teksKomentar = $this->input->post('komentar');
        $userId = $this->ion_auth->get_user_id();
        $created_date = date("Y-m-d H:i:s");
        $komentar = array(
            'id_komentar' =>'',
            'id_user' => $userId,
            'konten_komentar' => $teksKomentar,
            'induk' => 0,
            'waktu_komentar' => $created_date,
            'id_post' => $id_post
        );

        $this->db->insert('komentar', $komentar);
        redirect($this->agent->referrer());
    }

    public function download_attachment($id_file)
    {
        $this->db->where('id_file',$id_file);
        $query = $this->db->get('file',1)->row();
        $file = $query->nama_file;
        $pth    =   file_get_contents(base_url()."uploads/$file");
        force_download($file, $pth);
    }
}
