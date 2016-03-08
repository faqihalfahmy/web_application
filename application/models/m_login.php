<?php
class M_login extends CI_Model{
    private $table="login";
    
    function cek($username,$password){
        $this->db->where("user",$username);
        $this->db->where("password",$password);
        return $this->db->get("login");
    }
    
    function semua(){
        return $this->db->get("login");
    }
    
    function cekKode($kode){
        $this->db->where("user",$kode);
        return $this->db->get("login");
    }
    
    function cekId($kode){
        $this->db->where("id_login",$kode);
        return $this->db->get("login");
    }

}