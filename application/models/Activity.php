<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {

    protected $user;

    public function __construct(){        
        parent::__construct();
        $this->load->model('user_model', 'activity_model');
        $this->load->library('form_validation');
         $this->user = $this->user_model->find($this->session->userdata('login_session')['user_id']);                
    }

	public function index()
	{                   
        $data = [
            'nama' => $this->user->nama,    
            'foto' => $this->user->foto,
            'url' => 'activity',
        ];
        $this->template->load('template/user', 'activity/index', $data);        
	}
     
    public function tambah()
    {
        $validation = $this->form_validation;
        $validation->set_rules(array(
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
        )); 
        if($validation->run()){
            $post = $this->input->post();
            $data = [
                'deskripsi' => $post['deskripsi'],
                'label' => $post['label'],
                'tanggal_dibur' => $post['tanggal_dibuat'],
            ];
            
        }else{            
            $data = [
                'nama' => $this->user->nama,    
                'foto' => $this->user->foto,
                'url' => 'activity',
            ];
            $this->template->load('template/user', 'activity/tambah', $data);
        }


    }
}
