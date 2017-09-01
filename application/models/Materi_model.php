<?php
class Materi_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }
    public function get_list_file()
    {
        $query="SELECT `file`.`id_file`,`file`.`nama_file`, `file`.`semester` ,`jurusan`.`nama_jurusan`, `file`.`Matkul`, `file`.`upload_time`  FROM `file` 
        LEFT JOIN `jurusan` ON `file`.`id_jurusan` = `jurusan`.`id_jurusan`";
        return $this->db->query($query)->result();
    }
    public function get_file($id)
    {
        $query="SELECT `file`.* FROM `file` WHERE `file`.id_file = $id";
        return ($this->db->query($query)->row());
    }
 
}