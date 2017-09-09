<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

/**
 *
 */
class Posting extends Admin_Controller
{

     public function __construct()
        {
                parent::__construct();
                $this->load->database();
                $this->load->helper(array('form', 'url', 'file'));
                $this->load->library(array('upload','user_agent'));
                //error_reporting(E_ALL | E_STRICT);
                
        }

     

        public function index()

        {
               $this->data['urlkarir'] = site_url('admin/posting/karir');
               $this->data['urltugas'] = site_url('admin/posting/tugas');
               $this->data['urlcurhat'] = site_url('admin/posting/curhat');
               $this->data['urlberita'] = site_url('admin/posting/berita');

               $this->render('admin/posting/posting_master_view','admin_master');
        }

        public function karir($action = 'view', $id = null)
        {

            $this->data['page_title'] = "Karir";
            
            $this->data['urladd'] = site_url('admin/posting/karir/add');
            $this->data['back'] = site_url('admin/posting/karir/view');
            if($action == 'view')
            {
                $this->render('admin/posting/posting_view','admin_master');
                
            }
            else if ($action == 'add')
            {
                $this->data['upload_link'] = 'karir';
                $this->render('admin/posting/posting_view_add','admin_master');
            }
            else if ($action == 'edit')
            {
                $this->db->where('id_post',$id);
                $data = $this->db->get('posting', 1)->row();
                $this->data['judul'] = $data->judul_post;
                $this->data['teks'] = $data->konten_post;
                $this->data['id'] = $data->id_post;
                $this->render('admin/posting/posting_view_edit','admin_master');
            }

        }
        
        public function curhat($action = 'view', $id = null)
        {
            $this->data['page_title'] = "Curhat";
            $this->data['urladd'] = site_url('admin/posting/curhat/add');
            $this->data['back'] = site_url('admin/posting/curhat/view');
            if($action == 'view')
            {
                $this->render('admin/posting/posting_view','admin_master');
                
            }
            else if ($action == 'add')
            {
                $this->data['upload_link'] = 'curhat';
                $this->render('admin/posting/posting_view_add','admin_master');
            }
            else if ($action == 'edit')
            {
                $this->db->where('id_post',$id);
                $data = $this->db->get('posting', 1)->row();
                $this->data['judul'] = $data->judul_post;
                $this->data['teks'] = $data->konten_post;
                $this->data['id'] = $data->id_post;
                $this->render('admin/posting/posting_view_edit','admin_master');
            }
        }

        public function berita($action = 'view', $id = null)
        {
            $this->data['page_title'] = "Berita";
            $this->data['urladd'] = site_url('admin/posting/berita/add');
            $this->data['back'] = site_url('admin/posting/berita/view');
            if($action == 'view')
            {
                $this->render('admin/posting/posting_view','admin_master');
                
            }
            else if ($action == 'add')
            {
                $this->data['upload_link'] = 'berita';
                $this->render('admin/posting/posting_view_add','admin_master');
            }
            else if ($action == 'edit')
            {
                $this->db->where('id_post',$id);
                $data = $this->db->get('posting', 1)->row();
                $this->data['judul'] = $data->judul_post;
                $this->data['teks'] = $data->konten_post;
                $this->data['id'] = $data->id_post;
                $this->render('admin/posting/posting_view_edit','admin_master');
            }
        }

        public function tugas($action = 'view', $id = null)
        {
            $this->data['page_title'] = "Tugas";
            $this->data['urladd'] = site_url('admin/posting/tugas/add');
            $this->data['back'] = site_url('admin/posting/tugas/view');
            if($action == 'view')
            {
                $this->render('admin/posting/posting_view','admin_master');
                
            }
            else if ($action == 'add')
            {
                $this->data['upload_link'] = 'tugas';
                $this->render('admin/posting/posting_view_add','admin_master');
            }
            else if ($action == 'edit')
            {
                $this->db->where('id_post',$id);
                $data = $this->db->get('posting', 1)->row();
                $this->data['judul'] = $data->judul_post;
                $this->data['teks'] = $data->konten_post;
                $this->data['id'] = $data->id_post;
                $this->render('admin/posting/posting_view_edit','admin_master');
            }
        }

        public function get_posting_json($kat)
        {
            $this->db->where('kategori_post',$kat);
            $this->db->select('posting.*, users.*');
            $this->db->from('posting');
            $this->db->join('users', 'posting.id_user = users.id', 'left');
            $data = $this->db->get()->result();
            $no = 1;
            $datas = array();

            foreach ($data as $file) {
                $row = array();
                $row[] = $no;
                $row[] = $file->id_post;
                $row[] = $file->kategori_post;
                $row[] = $file->judul_post;
                $row[] = $file->deskripsi_post;
                $row[] = $file->username;
                $row[] = $file->waktu_post;
                
                $no++;
                $datas[] = $row;
            }
            echo json_encode(['data' => $datas]);
            //echo json_encode($data);
        }


        public function post_curhat($kategori)
        {
            $post_id = $this->add_post_curhat($kategori);
            
            if (!empty($_FILES)) 
            {
                $this->upload_attach($post_id);
            } 
        }

        private function upload_attach($post_id)
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
                              
                                $this->add_curhat_attach('file',$data,$post_id);       
                        //$this->__generate_thumbs($uploaded);
                        echo var_dump($_FILES);
                        
                        //return $uploaded;
                }else{
                        $this->session->set_flashdata('msg', 'Error, Attachment not uploaded!');
                        redirect('public/Curhat/tambah');
                }
        }
    
        private function add_curhat_attach($table, $data, $post_id)
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
    
        private function add_post_curhat($kategori)
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
                'kategori_post' => $kategori,
                'gambar_post' => '',
                'waktu_post' =>  $created_date
            );
            $this->db->insert('posting', $data_curhat);
            $id_post = $this->db->insert_id();
            return $id_post;
        }

        public function edit_post($id)
        {
            $judul = $this->input->post('judul',true);
            $konten = $this->input->post('teks',true);
            $data = array(
                'judul_post' => $judul,
                'konten_post' => $konten
            );
            $this->db->update('posting', $data, array('id_post' => $id));
            redirect($this->agent->referrer());
        }

        public function hapus($id)
        {
            $this->db->delete('posting', array('id_post' => $id),1);
            redirect($this->agent->referrer());
        }
}
