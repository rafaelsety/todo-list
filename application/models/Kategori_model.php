<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public $_table = "kategori";

    public $id;    
    public $user_id ;

    public function __construct(){
        $this->user_id = $this->session->userdata('login_session')['user_id']; 
    }

    public function all()
    {
        return $this->db->get_where($this->_table, ['user_id' => $this->user_id])->result();
    }
    
    public function getKategori(){
        return $this->db->get_where($this->_table, ['user_id' => $this->user_id,])->result();
    }
}