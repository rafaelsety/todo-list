<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {

    protected $user;

    public function __construct(){        
        parent::__construct();
        $this->load->model(['user_model', 'activity_model']);
        $this->load->library('form_validation');
        $this->load->helper('date'); 
         $this->user = $this->user_model->find($this->session->userdata('login_session')['user_id']);                
    }

	public function index()
	{                   
        $data = [
            'nama' => $this->user->nama,    
            'foto' => $this->user->foto,
            'url' => 'activity',
            'listToDo' => $this->activity_model->getToDo(),
            'listInProgress' => $this->activity_model->getInProgress(),
            'listDone' => $this->activity_model->getDone(),
        ];                
        $this->template->load('template/user', 'activity/index', $data);        
	}
     
    public function tambah()
    {
        $validation = $this->form_validation;
        $validation->set_rules($this->activity_model->rules()); 
        if($validation->run()){
            $post = $this->input->post();
            $data = [
                'user_id' => $this->user->id,
                'deskripsi' => $post['deskripsi'],
                'label' => $post['label'],
                'tanggal_dibuat' => date('Y-m-d', strtotime($post['tanggal_dibuat'])),                
            ];            
            $insert = $this->activity_model->insert($data);
            if($insert){
                redirect('activity');
            }else{
                $data = [
                    'nama' => $this->user->nama,    
                    'foto' => $this->user->foto,
                    'url' => 'activity',
                ];
                $this->template->load('template/user', 'activity/tambah', $data);
            }
        }else{            
            $data = [
                'nama' => $this->user->nama,    
                'foto' => $this->user->foto,
                'url' => 'activity',
            ];
            $this->template->load('template/user', 'activity/tambah', $data);
        }
    }

    public function edit($id){                
        $validation = $this->form_validation;
        $validation->set_rules($this->activity_model->rules()); 
        if($validation->run()){
            $post = $this->input->post();
            $data = [
                'user_id' => $this->user->id,
                'deskripsi' => $post['deskripsi'],
                'label' => $post['label'],
                'tanggal_dibuat' => date('Y-m-d', strtotime($post['tanggal_dibuat'])),                
            ];            
            $update = $this->activity_model->update($id, $data);
            if($update){
                redirect('activity');
            }else{
                $data = [
                    'nama' => $this->user->nama,    
                    'foto' => $this->user->foto,
                    'url' => 'activity',
                    'activity' => $this->activity_model->find($id),

                ];
                $this->template->load('template/user', 'activity/edit', $data);
            }
        }else{            
            $data = [
                'nama' => $this->user->nama,    
                'foto' => $this->user->foto,
                'url' => 'activity',
                'activity' => $this->activity_model->find($id),
            ];
            $this->template->load('template/user', 'activity/edit', $data);
        }
    }

    public function hapus($id){
        $delete = $this->activity_model->delete($id);
        if($delete){
            redirect('activity');
        }
    }

    public function next($id){
        $getData = $this->activity_model->find($id);
        
        if($getData->status == 'todo'){
            $status = 'progress';
        }elseif($getData->status == 'progress'){
            $status = 'done';
        }
        $data = [            
            'status' => $status,
        ];

        $update = $this->activity_model->update($id, $data);
        if($update){
            redirect('activity');
        }
    }
    public function back($id){
        $getData = $this->activity_model->find($id);
        
        if($getData->status == 'progress'){
            $status = 'todo';
        }elseif($getData->status == 'done'){
            $status = 'progress';
        }
        $data = [            
            'status' => $status,
        ];

        $update = $this->activity_model->update($id, $data);
        if($update){
            redirect('activity');
        }
    }
}
