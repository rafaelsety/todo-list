<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    protected $user;    

    public function __construct(){        
        parent::__construct();
        cek_login();

        $this->load->model(['user_model', 'kategori_model']);
        $this->load->library('form_validation');        
        $this->user = $this->user_model->find($this->session->userdata('login_session')['user_id']);                 
    }

	public function index()
	{                        
        $data = [
            'nama' => $this->user->nama,    
            'foto' => $this->user->foto,
            'url' => 'resume',            
            'list' => $this->kategori_model->getKategori(),
        ];    

        $this->template->load('template/user', 'kategori/index', $data);        
	}

    public function tambah(){
        $validation = $this->form_validation;
        $validation->set_rules(array(
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim|max_length[40]',
                    'errors' => array(
                        'required' => 'Harap mengisi kolom nama',
                        'max_length' => 'Maksimal input 40',                                        
                    )
            ]
        ));

        if($validation->run()){
            $data= [
                'nama' => $this->input->post('nama'),                
            ];
            $insert = $this->kategori_model->insert($data);
            if($insert){
                redirect('kategori');
            }
        }else{
            $data = [
                'nama' => $this->user->nama,    
                'foto' => $this->user->foto,
                'url' => 'resume',            
                'list' => $this->kategori_model->getKategori(),
            ];    
    
            $this->template->load('template/user', 'kategori/tambah', $data);   
        }
    }

    public function edit($id){
        
        $validation = $this->form_validation;
        $validation->set_rules(array(
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim|max_length[40]',
                    'errors' => array(
                        'required' => 'Harap mengisi kolom nama',
                        'max_length' => 'Maksimal input 40',                                        
                    )
            ]
        ));

        if($validation->run()){
            $data= [
                'nama' => $this->input->post('nama'),                
            ];
            $update = $this->kategori_model->update($id, $data);
            if($update){
                redirect('kategori');
            }
        }else{
            $data = [
                'nama' => $this->user->nama,    
                'foto' => $this->user->foto,
                'url' => 'resume',            
                'data' => $this->kategori_model->findById($id),
            ];    
    
            $this->template->load('template/user', 'kategori/edit', $data);   
        }
    }

    public function hapus($id){
        $delete = $this->kategori_model->delete($id);
        if($delete){
            redirect('kategori');
        }
    }

}
