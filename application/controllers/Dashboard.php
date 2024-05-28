<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	protected $user;
	public function __construct(){
        parent::__construct();
        cek_login();
        $this->load->model(['user_model', 'activity_model']);

		$this->user = $this->user_model->find($this->session->userdata('login_session')['user_id']);                 

	}
	public function index()
	{
        $activity = $this->activity_model->get_activity_status_count_last_4_days();

        // Olah data untuk chart
        $dates = [];
        $statuses = ['todo', 'progress', 'done'];
        $data = [];

        // Inisialisasi data chart
        foreach ($statuses as $status) {
            $data[$status] = array_fill(0, 4, 0);
        }

        // Isi data chart
        foreach ($activity as $item) {
            $date = $item['date'];
            $status = $item['status'];
            $count = $item['count'];

            if (!in_array($date, $dates)) {
                $dates[] = $date;
            }

            $index = array_search($date, $dates);
            $data[$status][$index] = $count;
        }

		$data = [
            'nama' => $this->user->nama,
            'username' => $this->user->username,
            'email' => $this->user->email,
            'foto' => $this->user->foto,
            'url' => 'dashboard',
            'chart_data' => array(
                'dates' => $dates,
                'data' => $data
            ),
            'listActivity' => $this->activity_model->get_last_6_activity_excluding_done(),
            
        ];
		$this->load->view('dashboard', $data);
	}
}
