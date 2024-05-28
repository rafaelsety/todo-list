<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Resume_model extends CI_Model
{
    public $_table = "resume";

    public $id;    
    public $user_id ;

    public function __construct(){
        $this->user_id = $this->session->userdata('login_session')['user_id']; 
    }

    public function all()
    {        
        return $this->db->where(['user_id' => $this->user_id])->order_by('id', 'DESC')->get($this->_table)->result_array();
    }
    
    public function findResumeBasedKategori($kategori){
        $this->db->select(['resume.judul as judul', 'resume.id as id', 'resume.slug as slug']);
        $this->db->from($this->_table);
        $this->db->join('kategori_resume', 'resume.id = kategori_resume.resume_id');
        $this->db->join('kategori', 'kategori.id = kategori_resume.kategori_id');
        $this->db->where(['resume.user_id'=> $this->user_id, 'kategori.id' => $kategori]);
        $this->db->order_by('resume.id', 'DESC');        
        return $this->db->get()->result_array();
    }

    public function findKategoriForResume($resume_id){
        $this->db->select('*')->from('kategori_resume');
        $this->db->join('kategori', 'kategori.id = kategori_resume.kategori_id');
        $this->db->where('kategori_resume.resume_id', $resume_id);    
        return $this->db->get()->result_array();
    }
    public function findById($id){
        return $this->db->get_where($this->_table, ['id' => $id])->row();
    }

    public function insert($data){
        $data['user_id'] = $this->user_id;
        return $this->db->insert($this->_table, $data);
    }

    public function update($id, $data){        
        return $this->db->update($this->_table, $data, ['id' => $id]);
    }

    public function findBySlug($slug){
        return $this->db->get_where($this->_table, ['slug' => $slug, 'user_id' => $this->user_id])->row();
    }
    public function delete($id){
        return $this->db->delete($this->_table, ['id' => $id]);
    }
}