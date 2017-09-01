<?php
defined('BASEPATH') or exit('No direct access allowed!');

class Materi extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper(array('url','download'));
        $this->load->model('Materi_model', 'uploads');
        // //load template page
        // $this->page->template('public/templates/site_tpl');
        // $this->page->header('templates/public/templates/nav_tpl');
    }

    public function index()
    {
        $this->render('public/materi_view');
    }

  


    public function get_file(){
        $this->load->database('default');
                        $list = $this->uploads->get_list_file();
                        //echo ($list->num_rows());
                        $no = 1;
                        $data = array();
                        foreach ($list as $file) {
                            $row = array();
                            $row[] = $no;
                            $row[] = $file->id_file;
                            $row[] = $file->nama_file;
                            $row[] = $file->nama_jurusan;
                            $row[] = $file->semester;
                            $row[] = $file->Matkul;
                            $row[] = $file->upload_time;
                            $no++;
                            $data[] = $row;
                        }
                    
                        echo json_encode(['data' => $data]);
             
        }

  
    public function download_file($file)
    {
        $pth    =   file_get_contents(base_url()."files/$file");
        force_download($file, $pth);
    }

    
}
