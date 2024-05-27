<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "user";

    public $id;
    public $email;
    public $username;
    public $nama;
    public $password;
    public $foto = "default.jpg";

    public function rules($isEdit = false)
    {

        return [
            [
            'field' => 'email',
            'label' => 'Email',
            'rules' => $isEdit ? 'required|trim|valid_email|max_length[50]' : 'required|valid_email|max_length[50]|is_unique[user.email]',
            'errors' => array(
                'required' => 'Harap mengisi kolom email',
                'max_length' => 'Maksimal input 50',
                'valid_email' => 'Format email salah',
                'is_unique' => 'Email sudah terdaftar',
            )
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => $isEdit ? 'required|trim|max_length[20]' : 'required|max_length[20]|is_unique[user.username]',
                'errors' => array(
                    'required' => 'Harap mengisi kolom username',
                    'max_length' => 'Maksimal input 20',                    
                    'is_unique' => 'Username sudah terdaftar',
                )
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim|max_length[60]',
                'errors' => array(
                    'required' => 'Harap mengisi kolom nama',
                    'max_length' => 'Maksimal input 60',                                        
                )
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'Harap mengisi kolom password',                                                            
                )
            ],        
        ];
    }

    public function all()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function find($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function findByUsername($username)
    {
        return $this->db->get_where($this->_table, ['username' => $username])->row();
    }

    public function insert()
    {
        $data = $this->input->post();        
        $this->email = $data["email"];
        $this->username = $data["username"];
        $this->nama = $data["nama"];
        $this->password = password_hash($data["password"], PASSWORD_DEFAULT);        
        return $this->db->insert($this->_table, $this);
    }

    public function update($id, $data)
    {                
        return $this->db->update($this->_table, $data, array('id' => $id));
    } 
    
    public function updatePassword($id, $password_baru){
        $this->password = $password_baru;
        return $this->db->update($this->_table, $this->password, array('id' => $id));
    }
}