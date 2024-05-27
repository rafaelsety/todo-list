<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    protected $user;

    public function __construct(){        
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
         $this->user = $this->user_model->find($this->session->userdata('login_session')['user_id']);                

    }

	public function index()
	{                   
        $data = [
            'nama' => $this->user->nama,
            'username' => $this->user->username,
            'email' => $this->user->email,
            'foto' => $this->user->foto,
            'url' => 'profil',
        ];
        $this->template->load('template/user', 'profil/index', $data);        
	}

    private function _config()
    {
        $config['upload_path']      = "./assets/img/";
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['encrypt_name']     = TRUE;
        $config['max_size']         = '2048';

        $this->load->library('upload', $config);
    }

    private function _validasi(){
        $validation = $this->form_validation;
        $post = $this->input->post();
        $validation->set_rules(array(
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => $this->user->email == $post['email'] ? '' : 'required|valid_email|max_length[50]|is_unique[user.email]',
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
                    'rules' => $this->user->username == $post['username'] ? '' : 'required|max_length[20]|is_unique[user.username]',
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
        ));   
    }


    public function ubah_profil(){
        if($this->input->post('username') == null){
            $data = [
                'nama' => $this->user->nama,
                'username' => $this->user->username,
                'email' => $this->user->email,
                'foto' => $this->user->foto,
                'url' => 'profil',

            ];
            $this->template->load('template/user', 'profil/ubah-profil', $data);
        }else{
            
            $this->_validasi();
            if($this->form_validation->run()){
                $post = $this->input->post();
                $data = [
                    'nama' => $post['nama'],
                    'username' => $post['username'],
                    'email' => $post['email'],                        
                ];
                if (!empty($_FILES['foto']['name'])) {      
                    $this->_config();                    
                    if ($this->upload->do_upload('foto') == false) {
                        echo $this->upload->display_errors();
                        die;
                    } else {
                        if ($this->user->foto != 'default.jpg') {
                            $old_image = FCPATH . 'assets/img/' . $this->user->foto;
                            if (!unlink($old_image)) {
                                $this->sessiont->set_flashdata('foto', 'Gagal menyimpan foto');
                                redirect('profile/setting');
                            }
                        }
                        
                        $data['foto'] = $this->upload->data('file_name');                    
                    }
                }
                $update = $this->user_model->update($this->user->id, $data);
                if ($update) {                        
                    $this->session->set_flashdata('message', 'Profil berhasil diubah');
                } 
                redirect('profil');
            }else{
                $data = [
                    'nama' => $this->user->nama,
                    'username' => $this->user->username,
                    'email' => $this->user->email,
                    'foto' => $this->user->foto,
                    'url' => 'profil',
                ];
                $this->template->load('template/user', 'profil/ubah-profil', $data);
            }                
        }          
    }

    public function ubah_password(){
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[3]|differs[password_lama]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'matches[password_baru]');        
        if ($this->form_validation->run() == false) {
            $data['title'] = "Ubah Password";
            $this->template->load('template/user', 'profil/ubah-password', $data);
        } else {
            $input = $this->input->post(null, true);
            if (password_verify($input['password_lama'], $this->user->password)) {
                $new_pass = ['password' => password_hash($input['password_baru'], PASSWORD_DEFAULT)];
                $query = $this->user_model->updatePassword($this->user->id, $new_pass);
                if ($query) {
                    $this->session->set_flashdata('message','password berhasil diubah.');
                    redirect('profil');
                } 
            } else {
                $this->session->set_flashdata('password_lama', 'Password lama salah');
            }
            redirect('profil/ubah-password');
        }
    }         
}
