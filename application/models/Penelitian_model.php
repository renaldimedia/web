<?php
class Penelitian_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }
    public function get_all_penelitian()
    {
        $query="SELECT * FROM `penelitian`";
        return ($this->db->query($query)->result());
    }
    public function get_penelitian_by_id($id)
    {
        $query="SELECT `penelitian`.* FROM `penelitian` WHERE `penelitian`.id_penelitian = $id";
        return ($this->db->query($query)->row());
    }
    public function get_penelitian_by_year($year)
    {
        $query="SELECT `penelitian`.* FROM `penelitian` WHERE `penelitian`.tahun = $year";
        return ($this->db->query($query)->result());
    }
 
}
