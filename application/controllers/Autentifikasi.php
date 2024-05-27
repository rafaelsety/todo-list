<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentifikasi extends CI_Controller {


    public function __construct(){        
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules(array(

            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Harap mengisi kolom username',
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Harap mengisi kolom password',
                ]
            ],
        ));                  
        if($validation->run()){
            $post = $this->input->post();
            $data_user = $user->findByUsername($post['username']);            

            if ($data_user && password_verify($post['password'], $data_user->password)) {
                $data = [
                    'user_id' => $data_user->id,
                    'nama' => $data_user->nama,
                    'foto' => $data_user->foto,
                ];
                $this->session->set_userdata('login_session', $data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah');
                $this->template->load('template/auth', 'autentifikasi/login', null);
            }
        }else{            
            $this->template->load('template/auth', 'autentifikasi/login', null);
        }		
	}

      
    public function register(){
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if($validation->run()){
            $user->insert();
            $this->session->set_flashdata('message', 'Berhasil registrasi');
            redirect(site_url('login'));
        }else{
        $this->template->load('template/auth', 'autentifikasi/register', null);        
        }        
    }

    public function simpan(){
  
    }

    public function logout(){
        $this->session->unset_userdata('login_session');
        $this->session->sess_destroy();
        redirect('login');   
    }


}
