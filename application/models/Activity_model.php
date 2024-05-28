<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends CI_Model
{
    private $_table = "activity";

    public $id;    
    public $user_id ;

    public function __construct(){
        $this->user_id = $this->session->userdata('login_session')['user_id']; 
    }

    public function rules()
    {
        return [
            [
                'field' => 'deskripsi',
                'label' => 'deskripsi',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Harap mengisi kolom deksripsi',                    
                )
                ],
                [
                    'field' => 'label',
                    'label' => 'Label',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'Harap memilih kolom label',                    
                    )
                ],  
                [
                    'field' => 'tanggal_dibuat',
                    'label' => 'Atur tanggal',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'Harap memilih kolom tanggal',                    
                    )
                ],       
        ];
    }

    public function all()
    {
        return $this->db->get_where($this->_table, ['user_id' => $this->user_id])->result();
    }
    
    public function getToDo(){
        return $this->db->get_where($this->_table, ['user_id' => $this->user_id, 'status' => 'todo'])->result();

    }

    public function getInProgress(){
        return $this->db->get_where($this->_table, ['user_id' => $this->user_id, 'status' => 'progress'])->result();

    }

    public function getDone(){
        return $this->db->get_where($this->_table, ['user_id' => $this->user_id, 'status' => 'done'])->result();
    }

    public function find($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }
 
    public function insert($data)
    {        
        return $this->db->insert($this->_table, $data);
    }

    public function update($id, $data)
    {                
        return $this->db->update($this->_table, $data, array('id' => $id));
    } 
    
    public function delete($id)
    {
        return $this->db->delete($this->_table, ['id' => $id]);
    }

    public function get_activity_status_count_last_4_days()
    {
        $query = $this->db->query("
            SELECT 
                DATE(tanggal_dibuat) as date, 
                status, 
                COUNT(*) as count 
            FROM 
                activity 
            WHERE 
                DATE(tanggal_dibuat) >= DATE(NOW()) - INTERVAL 4 DAY 
            GROUP BY 
                DATE(tanggal_dibuat), status
        ");

        return $query->result_array();
    }

    public function get_last_6_activity_excluding_done()
    {
        $this->db->select('*');
        $this->db->from('activity');
        $this->db->where('status !=', 'done');
        $this->db->order_by('tanggal_dibuat', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();        
        return $query->result();
    }

      
}