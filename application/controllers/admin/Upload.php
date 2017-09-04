<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

/**
 *
 */
class Upload extends Admin_Controller
{

     public function __construct()
        {
                parent::__construct();
                $this->load->model('Upload_model','uploads');
                $this->load->database();
                $this->load->helper(array('form', 'url', 'file'));
                $this->load->library(array('upload','user_agent'));
                //error_reporting(E_ALL | E_STRICT);
                
        }

     

        public function index()

        {
               $this->data['urladd'] = site_url('admin/upload/add');
                $this->render('admin/materi/list_materi','admin_master');
        }
        public function get_file(){
                        $list = $this->uploads->get_list_file();
                        $no = 1;
                        $data = array();
                        foreach ($list as $file) {
                            $row = array();
                            $row[] = $no;
                            $row[] = $file->id_file;
                            $row[] = $file->nama_file;
                            $row[] = $file->nama_jurusan;
                            $row[] = $file->nama_matkul;
                            $row[] = $file->upload_time;
                            $row[] = $file->id_materi;
                            $no++;
                            $data[] = $row;
                        }
                    
                        echo json_encode(['data' => $data]);
             
        }
        function start_upload()
        {
                $created_date = date("Y-m-d H:i:s");
                // $query_kategori = "SELECT ms.*,mk.*,j.* FROM `matkul_semester` as ms
                // LEFT JOIN `mata_kuliah` as mk ON ms.id_matkul = mk.id_matkul
                // LEFT JOIN `jurusan` AS j ON ms.id_jurusan = j.id_jurusan
                // WHERE ms.id_matkul_semester = ?";
                
                // $kategori = ($this->db->query($query_kategori, $this->input->get_post('kategori', TRUE))->row());
                $kategori = $this->uploads->get_kategori_by_input($this->input->get_post('kategori', TRUE))->row();
                $namaTambahan = $this->input->get_post('namaAdd', TRUE);
                if ($namaTambahan !== null)
                {
                        $namaTambahan = '_';
                }
                $count = count($_FILES['files']['name']);
                $nama = array();
                for($i=0 ;$i < $count ;$i++){
                        $path = $_FILES['files']['name'][$i];
                        $ext = pathinfo($path, PATHINFO_EXTENSION);
                      $nama[] = 'Materi_'.($i + 1).'_'.$kategori->semester.'_'.$kategori->nama_jurusan.'_'.$kategori->nama_matkul.'_'.$namaTambahan.'_'.$created_date.'.'.$ext;
                }
                return $nama;
        }
        public function add()
        {
                // $query_kategori = "SELECT ms.*,mk.*,j.* FROM `matkul_semester` as ms
                //                     LEFT JOIN `mata_kuliah` as mk ON ms.id_matkul = mk.id_matkul
                //                     LEFT JOIN `jurusan` AS j ON ms.id_jurusan = j.id_jurusan";
                // $kategori = $this->db->query($query_kategori); 
                $kategori = $this->uploads->get_kategori();
                $this->data['kategori'] =  $kategori;
                $this->data['back'] = $this->agent->referrer();
                $this->data['error'] = '';
                $this->render('admin/materi/materi_index','admin_master');    
        }

        public function edit_file($id)
        {
                // $query_kategori = "SELECT ms.*,mk.*,j.* FROM `matkul_semester` as ms
                // LEFT JOIN `mata_kuliah` as mk ON ms.id_matkul = mk.id_matkul
                // LEFT JOIN `jurusan` AS j ON ms.id_jurusan = j.id_jurusan";
                // $kategori = $this->db->query($query_kategori)->result(); 
                $kategori = $this->uploads->get_kategori();
                $files = $this->uploads->get_file($id);
                $html = '';
                foreach ($kategori as $data):
                        if ($data->nama_matkul == $files->nama_matkul)
                        {
                                $html .= '<optgroup label="'.$data->nama_jurusan.'">
                                <option value="'.$data->id_matkul_semester.'" id="matkul-'.$data->nama_matkul.'" selected="selected">'.$data->nama_matkul.'</option>    
                                </optgroup>';
                        } else
                        {
                                $html .= '<optgroup label="'.$data->nama_jurusan.'">
                                <option value="'.$data->id_matkul_semester.'" id="matkul-'.$data->nama_matkul.'">'.$data->nama_matkul.'</option>    
                                </optgroup>';
                        }
                endforeach;
                $this->data['error'] = ' ';
                $this->data['kategori'] = $html;
                $this->data['back'] = base_url().'admin/upload/';
                $this->data['data'] = $files;
                $this->render('admin/materi/materi_edit');
                        

        }

        public function form_edit_file($id)
        {
                $query_kategori = "SELECT ms.*,mk.*,j.* FROM `matkul_semester` as ms
                LEFT JOIN `mata_kuliah` as mk ON ms.id_matkul = mk.id_matkul
                LEFT JOIN `jurusan` AS j ON ms.id_jurusan = j.id_jurusan
                WHERE ms.id_matkul_semester = ?";
               
                $kategori = ($this->db->query($query_kategori, $this->input->get_post('kategori', TRUE))->row());   
                $data = array(  
                        //'nama_file' => $this->input->get_post('namaFile', TRUE),
                        // 'id_jurusan' => $kategori->id_jurusan,
                        // 'Matkul' => $kategori->nama_matkul,
                        // 'semester' => $kategori->semester,
                        'deskripsi_file' => $this->input->get_post('deskripsi', TRUE),
                        );
                        $this->db->update('materi',array('id_matkul_semester' => $this->input->post('kategori')));
                        $this->db->where('id_file', $id);
                if ($this->db->update('file',$data))
                {
                        $this->session->set_flashdata('msg', 'Edit file '.$nama_file.' berhasil');
                        redirect('admin/upload');
                }


                             
        }

        public function hapus($id_materi)
        {       
               
                $idFile = $this->uploads->get_materi_by_id($id_materi);

                $query = "SELECT `file`.nama_file FROM `file` WHERE `file`.id_file = ?;";
               // $query_delete = "DELETE from `file` WHERE `file`.id_file = ?;";
                
                $nama_file = $this->db->query($query, $idFile->id_file)->row();


                $namaf = $nama_file->nama_file;
                $path_to_file = './uploads/'.$namaf;
                // echo $nama_file->nama_file.'-'.$path_to_file;
                // unlink($path_to_file);
               //if(is_writable($path_to_file)){        
                       //echo "true";

                $this->db->where('id_materi', $id_materi);
                $this->db->delete('materi');
                if(is_file($path_to_file)){
                        if(unlink($path_to_file)) {
                                //echo 'deleted successfully';
                                        
                                        $this->session->set_flashdata('msg', 'File terhapus!');
                                        $this->db->where('id_file',$idFile);
                                        $this->db->delete('file');
                                        redirect('admin/upload');
                                }
                                else {
                                //echo 'errors occured';
                                        $this->session->set_flashdata('msg', 'Error, file tidak terhapus');
                                        // $this->db->where('id_file',$id);
                                        // $this->db->delete('file');
                                        redirect('admin/upload');
                                }
                }else {
                       //echo "false";
                       $this->db->where('id_file',$idFile->id_file);
                       $this->db->delete('file');
                        $this->session->set_flashdata('msg', 'Error file not found or already deleted!  ');
                        redirect('admin/upload');
                }


        }


        function do_upload_multi()
        {      
                if (isset($_FILES)){
                        
                        $rename = $this->input->get_post('rename',TRUE);
                        if ($rename === "rename")
                        {
                                $nama = $this->start_upload();
                                //Configure upload.
                                $this->upload->initialize(array(
                                        "allowed_types" => "pdf|doc|docx|xls|xlsx|ppt|pptx",
                                        "upload_path"   => "./uploads/",
                                        "file_name" => $nama
                                ));
                        }else
                        {
                                $this->upload->initialize(array(
                                        "allowed_types" => "pdf|doc|docx|xls|xlsx|ppt|pptx",
                                        "upload_path"   => "./uploads/",
                                ));
                        }
                        
                        
                        // $query_kategori = "SELECT ms.*,mk.*,j.* FROM `matkul_semester` as ms
                        // LEFT JOIN `mata_kuliah` as mk ON ms.id_matkul = mk.id_matkul
                        // LEFT JOIN `jurusan` AS j ON ms.id_jurusan = j.id_jurusan
                        // WHERE ms.id_matkul_semester = ?";
                       
                        //$kategori = ($this->db->query($query_kategori, $this->input->get_post('kategori', TRUE))->row());
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
                                                           'kategori_file' => 'Materi',
                                                           'deskripsi_file' => $this->input->get_post('deskripsi', TRUE),
                                                           'upload_time'=> $created_date,
                                                           'thumbnail' => $uploaded[$i]['file_name'].'.jpg'
                                                           );
                                                }

                                                $this->__insert_to_db('file',$data);       
                                        //$this->__generate_thumbs($uploaded);
                                        
                                        chmod('./files/', 777);
                                        $this->session->set_flashdata('msg', 'File Uploaded!');
                                        redirect('admin/upload/add');
                                        // echo '<pre>';
                                        // var_export($data);
                                        // echo '</pre>';
                                }else{
                                        $this->session->set_flashdata('msg', 'Error, Nothing Uploaded!');
                                        redirect('admin/upload/add');
                                }
                }else{
                        $this->session->set_flashdata('msg', 'Error, No File Provided!');
                        redirect('admin/upload/add');
                }
        }

        // private function __generate_thumbs($data)
        // {
        //         for($i=0; $i<count($data); $i++) {
        //                 $pdfname = $data[$i]['file_name'];
        //                 $myurl = './uploads/'.$pdfname.'[0]';
        //                 $image = new Imagick($myurl);
        //                 $image->setOption('density','288');
        //                 $image->setResolution( 1200, 1900 );
        //                 // set background to white (Imagick doesn't know how to deal with transparent background if you don't instruct it)
        //                 $image->setImageBackgroundColor(new ImagickPixel('white'));

        //                 // flattens multiple layers
        //                 $image = $image->mergeImageLayers(Imagick::LAYERMETHOD_FLATTEN);
        //                 $image->setImageFormat( "jpg" );
        //                 $image->setOption('resize','25%');
        //                 $image->writeImage('./uploads/thumbs/'.$pdfname.'.jpg');
        //         }
        // }

        private function __insert_to_db($table, $data)
        {               
                $id_kat = $this->input->post('kategori');
                //$this->db->insert_batch($table, $data);
               
                for($i=0; $i<count($data); $i++) {
                        $this->db->insert($table, $data[$i]);
                        $data_materi = array(
                                'id_materi' => '',
                                'id_matkul_semester' => $id_kat,
                                'id_file' => $this->db->insert_id()
                        );
                        $this->db->insert('materi', $data_materi);
                }
        }        



      
        // public function insert_dummy()
        // {
        //         $created_date = date("Y-m-d H:i:s");
        //         for($i=0; $i<1000; $i++) {
        //                 $data[$i] = array(  
        //                            'id_file' => '',
        //                            'nama_file' => 'file-'.$i,
        //                            'kategori_file' => 'Materi',
        //                            'id_jurusan' => 1,
        //                            'Matkul' => '',
        //                            'semester' => '',
        //                            'deskripsi_file' => '',
        //                            'upload_time'=> $created_date,
        //                            'thumbnail' => ''
        //                            );
        //                 }

        //                 $this->db->insert_batch('file', $data);
        // }
        
}
