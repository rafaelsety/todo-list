<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resume extends CI_Controller {

    protected $user;    

    public function __construct(){        
        parent::__construct();
        cek_login();
        $this->load->model(['user_model', 'kategori_model', 'resume_model']);
        $this->load->library('form_validation');
        $this->load->helper(['date', 'site_helper']); 
        $this->user = $this->user_model->find($this->session->userdata('login_session')['user_id']);                 
    }

	public function index()
	{                
        // Mendapatkan nilai dari query string 'kategori'
        $kategori = $this->input->get('kategori');
        // Memeriksa apakah 'kategori' ada dalam query string
        if ($kategori === NULL) {
            // Jika tidak ada, tambahkan ?kategori=semua ke URL
            redirect(current_url() . '?kategori=semua');
        }

        if($kategori == 'semua'){
            $dataResume = $this->resume_model->all();
        }else{
            $dataResume = $this->resume_model->findResumeBasedKategori($kategori);
        }

        foreach($dataResume as $key => $item){                 
            $dataResume[$key]['kategori'] = $this->resume_model->findKategoriForResume($item['id']);            
        }                   
        $data = [
            'nama' => $this->user->nama,    
            'foto' => $this->user->foto,
            'url' => 'resume',
            'dataResume' => $dataResume,
            'listKategori' => $this->kategori_model->getKategori(),
        ];    

        $this->template->load('template/user', 'resume/index', $data);        
	}

    public function tambah(){

        $validation = $this->form_validation;
        $validation->set_rules(array(
            [
                'field' => 'judul',
                'label' => 'judul',
                'rules' => 'required|trim|max_length[100]',
                'errors' => array(
                    'required' => 'Harap mengisi kolom judul',
                    'max_length' => 'Maksimal input 100',                    
                )
            ],
            [
                'field' => 'kategori[]',
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Harap memilih kolom kategori',                                   
                )
            ],           
            [
                'field' => 'deskripsi',
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Harap mengisi kolom deskripsi',
                    
                )
            ],
        ));   
        
        if($validation->run()){                        
            $data = [
                'judul' => $this->input->post('judul'),
                'slug' => slug($this->input->post('judul')),
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal_dibuat' => date('Y-m-d'),
            ];

            $insert = $this->resume_model->insert($data);
            
            if($insert){
                $resume_id = $this->db->insert_id();
                foreach($this->input->post('kategori') as $key => $kategori_id){
                    $dataKategori = [
                        'kategori_id' => $kategori_id,
                        'resume_id' => $resume_id,
                    ];
                    $this->db->insert('kategori_resume', $dataKategori);
                }                
                redirect('resume');
            }

        }else{          
            $data = [
                'nama' => $this->user->nama,    
                'foto' => $this->user->foto,
                'url' => 'resume',                
                'listKategori' => $this->kategori_model->getKategori(),
            ];    
        $this->template->load('template/user', 'resume/tambah', $data);  
        }
    }

    public function upload_image() {
        if(isset($_FILES['upload']['name'])) {            
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name']     = TRUE;

            $this->load->library('upload', $config);
            if($this->upload->do_upload('upload')) {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];

                $url = base_url('assets/uploads/' . $filename);
                $msg = 'Image successfully uploaded';
                $response = [
                    "uploaded" => true,
                    "url" => $url,
                    "message" => $msg
                ];
            } else {
                $msg = $this->upload->display_errors();
                $response = [
                    "uploaded" => false,
                    "message" => $msg
                ];
            }
            echo json_encode($response);
        }
    }

    public function lihat($slug){
        $dataResume = $this->resume_model->findBySlug($slug);
        $dataResume->kategori = $this->resume_model->findKategoriForResume($dataResume->id);        
        $data = [
            'nama' => $this->user->nama,    
            'foto' => $this->user->foto,
            'url' => 'resume',
            'data' => $dataResume,            
        ];    
        $this->template->load('template/user', 'resume/lihat', $data); 
    }

    public function edit($id)
    {
        $validation = $this->form_validation;
        $validation->set_rules(array(
            [
                'field' => 'judul',
                'label' => 'judul',
                'rules' => 'required|trim|max_length[100]',
                'errors' => array(
                    'required' => 'Harap mengisi kolom judul',
                    'max_length' => 'Maksimal input 100',                    
                )
            ],
            [
                'field' => 'kategori[]',
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Harap memilih kolom kategori',                                   
                )
            ],           
            [
                'field' => 'deskripsi',
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Harap mengisi kolom deskripsi',
                    
                )
            ],
        ));   
        
        if($validation->run()){                        
            $data = [
                'judul' => $this->input->post('judul'),
                'slug' => slug($this->input->post('judul')),
                'deskripsi' => $this->input->post('deskripsi'),                
            ];

            $update = $this->resume_model->update($id, $data);
            
            if($update){                
                // Menghapus kategori lama
                $this->db->delete('kategori_resume', ['resume_id' => $id]);

                foreach($this->input->post('kategori') as $key => $kategori_id){
                    $dataKategori = [
                        'kategori_id' => $kategori_id,
                        'resume_id' => $id,
                    ];
                    $this->db->insert('kategori_resume', $dataKategori);
                }                
                redirect('resume');
            }
        }else{        
            $dataResume = $this->resume_model->findById($id);        
            $dataResume->kategori = $this->resume_model->findKategoriForResume($dataResume->id);
            $data = [
                'nama' => $this->user->nama,    
                'foto' => $this->user->foto,
                'url' => 'resume',                
                'data' => $dataResume,            
                'listKategori' => $this->kategori_model->getKategori(),
            ];                
        $this->template->load('template/user', 'resume/edit', $data);  
        }
    }

    public function hapus($id){
        $delete = $this->resume_model->delete($id);
        if($delete){
            redirect('resume');
        }
    }
}
