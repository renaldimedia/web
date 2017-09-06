<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

/**
 *
 */
class Research extends Admin_Controller
{
    public function __construct()
    {
            parent::__construct();
            $this->load->model('Penelitian_model','uploads');
            $this->load->database();
            $this->load->helper(array('form', 'url', 'file'));
            $this->load->library('upload');
            //error_reporting(E_ALL | E_STRICT);
    }

    public function index()
    {
        $this->data['urladd'] = site_url('admin/research/add');
        $this->render('admin/research/list_penelitian','admin_master');
    }

    public function edit($id)
    {
        $data = $this->uploads->get_penelitian_by_id($id);
        $this->data['data'] = $data;
        $this->render('admin/research/penelitian_edit','admin_master');
        
    }

    public function add()
    {
        $this->render('admin/research/penelitian_add','admin_master');
    }

    public function form_edit_file($id)
    {
            $data = array(  
                    'nama_file' => $this->input->get_post('namaFile', TRUE),
                    'id_jurusan' => $kategori->id_jurusan,
                    'Matkul' => $kategori->nama_matkul,
                    'semester' => $kategori->semester,
                    'deskripsi_file' => $this->input->get_post('deskripsi', TRUE),
                    );
                    $this->db->where('id_file', $id);
            if ($this->db->update('file',$data))
            {
                    $this->session->set_flashdata('msg', 'Edit file '.$nama_file.' berhasil');
                    redirect('admin/Research');
            }else
            {
                        $this->session->set_flashdata('msg', 'Gagal edit file '.$nama_file.'');
                        redirect('admin/Research');
            }


                         
    }

    public function hapus($id)
    {
        $query = "SELECT `penelitian`.id_file FROM `penelitian` WHERE `penelitian`.id_penelitian = ?;";
        // $query_delete = "DELETE from `file` WHERE `file`.id_file = ?;";
         
         $nama_file = $this->db->query($query, $id)->row();
         $namaf = $nama_file->nama_file;
         $path_to_file = './uploads/'.$namaf;
                 if(unlink($path_to_file)) {
                 //echo 'deleted successfully';
                         
                         $this->session->set_flashdata('msg', 'File terhapus!');
                         $this->db->where('id_penelitian',$id);
                         $this->db->delete('penelitian');
                         redirect('admin/research');
                 }
                 else {
                 //echo 'errors occured';
                         $this->session->set_flashdata('msg', 'Error, file tidak terhapus');
                         $this->db->where('id_penelitian',$id);
                         $this->db->delete('penelitian');
                         redirect('admin/research');
                 }



    }

//     private function _generate_thumbs($data)
//         {
//                 for($i=0; $i<count($data); $i++) {
//                         $pdfname = $data[$i]['file_name'];
//                         // $fileone = realpath($pdfname);
                        
//                         // if (!is_readable($fileone)) {
//                         //     echo 'file not readable';
//                         // }else{
//                         putenv( 'PATH=' . getenv('PATH') . ':/usr/local/bin:/usr/bin' );        
//                         $myurl = './uploads/'.$pdfname.'[0]';
//                         $image = new Imagick($myurl);
//                         $image->setOption('density','400');
//                         $image->setResolution( 1200, 1900 );
//                         // set background to white (Imagick doesn't know how to deal with transparent background if you don't instruct it)
//                         $image->setImageBackgroundColor(new ImagickPixel('white'));

//                         // flattens multiple layers
//                         $image = $image->mergeImageLayers(Imagick::LAYERMETHOD_FLATTEN);
//                         $image->setImageFormat( "jpg" );
//                         $image->setOption('resize','25%');
//                         $image->writeImage('./uploads/thumbs/'.$pdfname.'.jpg');
                        
//                 }
//         }

        private function __insert_to_db($table, $data)
        {               
                $this->db->insert_batch($table, $data);
        }        

       

        public function do_upload_multi_penelitian()
        {
                if (isset($_FILES))
                {
                        $this->upload->initialize(array(
                                "allowed_types" => "pdf",
                                "upload_path"   => "./uploads/",
                        ));

                        if($this->upload->do_multi_upload("files")) {
                                $uploaded = $this->upload->get_multi_upload_data();
                                $data =array();
                                
                                for($i=0; $i<count($uploaded); $i++) {
                                        $data[$i] = array(  
                                                   'id_penelitian' => '',
                                                   'judul_penelitian' => '',
                                                   'tahun_penelitian' => $this->input->get_post('tahun', TRUE),
                                                   'nama_peneliti' => '',
                                                   'instansi' => '',
                                                   'no_issn' => '',
                                                   'publisher' => '',
                                                   'volume'=> '',
                                                   'id_file'=>  $uploaded[$i]['file_name'],
                                                   'thumbnail' => $uploaded[$i]['file_name'].'.jpg'
                                                   );
                                        }
                                        $this->db->insert_batch('penelitian',$data);
                                
                                //$this->_generate_thumbs($uploaded);
                                
                                chmod('./uploads/', 777);
                                $this->session->set_flashdata('msg', 'File Uploaded!');
                                redirect('admin/Research/add');
                                // echo '<pre>';
                                // var_export($data);
                                // echo '</pre>';
                        }else{
                                $this->session->set_flashdata('msg', 'Error, Nothing Uploaded!');
                                redirect('admin/Research/add');
                        }
                }else 
                {
                        $this->session->set_flashdata('msg', 'Error, Pilih File!');
                        redirect('admin/Research/add');
                }        

        }
        // public function get_json_penelitian(){
        //         $list = $this->uploads->get_all_penelitian();
        //         $no = 1;
        //         $data = array();
        //         foreach ($list as $file) {
        //             $row = array();
        //             $row[] = $no;
        //             $row[] = $file->id_penelitian;
        //             $row[] = $file->id_file;
        //             $row[] = $file->judul_penelitian;
        //             $row[] = $file->tahun_penelitian;
        //             $row[] = $file->nama_peneliti;
        //             $row[] = $file->no_issn;
        //             $row[] = $file->instansi;
        //             $row[] = $file->publisher;
        //             $row[] = $file->volume;
        //             $row[] = $file->abstrak;
        //             $row[] = $file->thumbnail;
        //             $no++;
        //             $data[] = $row;
        //         }
        //         echo json_encode(['data' => $data]);
        // }
    }