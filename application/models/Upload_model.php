<?php
class Upload_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_materi_by_id($id)
    {
        $query_materi = "SELECT `materi`.id_file FROM `materi` WHERE `materi`.id_materi = ?;";
        return ($this->db->query($query_materi, $id)->row());
    }

    public function get_list_file()
    {
        $query="SELECT `materi`.*,`file`.*,`matkul_semester`.*,`jurusan`.*,`mata_kuliah`.*   FROM `materi` 
        LEFT JOIN `file` ON `materi`.`id_file` = `file`.`id_file`
        LEFT JOIN `matkul_semester` ON `materi`.`id_matkul_semester` = `matkul_semester`.`id_matkul_semester`
        LEFT JOIN `jurusan` ON `matkul_semester`.`id_jurusan` = `jurusan`.`id_jurusan`
        LEFT JOIN `mata_kuliah` ON `matkul_semester`.`id_matkul` = `mata_kuliah`.`id_matkul`";
        return ($this->db->query($query)->result());
    }
    public function get_file($id)
    {
        $query="SELECT `materi`.*,`file`.*,`matkul_semester`.*,`jurusan`.*,`mata_kuliah`.*   FROM `materi` 
        LEFT JOIN `file` ON `materi`.`id_file` = `file`.`id_file`
        LEFT JOIN `matkul_semester` ON `materi`.`id_matkul_semester` = `matkul_semester`.`id_matkul_semester`
        LEFT JOIN `jurusan` ON `matkul_semester`.`id_jurusan` = `jurusan`.`id_jurusan`
        LEFT JOIN `mata_kuliah` ON `matkul_semester`.`id_matkul` = `mata_kuliah`.`id_matkul` WHERE `file`.id_file = $id";
        return ($this->db->query($query)->row());
    }
    public function get_kategori_by_input($matkul_semester)
    {
        $query_kategori = "SELECT ms.*,mk.*,j.* FROM `matkul_semester` as ms
        LEFT JOIN `mata_kuliah` as mk ON ms.id_matkul = mk.id_matkul
        LEFT JOIN `jurusan` AS j ON ms.id_jurusan = j.id_jurusan
        WHERE ms.id_matkul_semester = ?";
        
        $kategori = ($this->db->query($query_kategori, $input));
        return $kategori;
    }
    public function get_kategori()
    {
        $query_kategori = "SELECT ms.*,mk.*,j.* FROM `matkul_semester` as ms
        LEFT JOIN `mata_kuliah` as mk ON ms.id_matkul = mk.id_matkul
        LEFT JOIN `jurusan` AS j ON ms.id_jurusan = j.id_jurusan";
        $kategori = $this->db->query($query_kategori)->result(); 
        return $kategori;
    }
 
}