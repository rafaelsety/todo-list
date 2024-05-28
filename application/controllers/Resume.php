<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resume extends CI_Controller {

    protected $user;

    public function __construct(){        
        parent::__construct();
        $this->load->model(['user_model', 'kategori_model']);
        $this->load->library('form_validation');
        $this->load->helper('date'); 
         $this->user = $this->user_model->find($this->session->userdata('login_session')['user_id']);                
    }

	public function index()
	{                   
        $data = [
            'nama' => $this->user->nama,    
            'foto' => $this->user->foto,
            'url' => 'resume',
            'listKategori' => $this->kategori_model->getKategori(),
        ];                
        $this->template->load('template/user', 'resume/index', $data);        
	}
}
