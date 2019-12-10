<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pretest extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		is_logged_in();
    }

	public function index()
	{
		$data['title'] = 'Dashboard';
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pretest/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function test()
	{
		date_default_timezone_set('asia/jakarta');
		$this->load->model("pretest_model");
		$data['title'] = 'Pretest';
		$data['soal'] = $this->pretest_model->get_questions();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pretest/test', $data);
		$this->load->view('templates/footer');
    }

    public function soal()
    {
    	date_default_timezone_set('asia/jakarta');
		$this->load->model("pretest_model");
		$data['title'] = 'Soal';
		 $data['soal'] = $this->db->get('soal')->result_array();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pretest/soal', $data);
		$this->load->view('templates/footer');
    }public function addquest (){
    	 $data = [
                    'no' => $this->input->post('no'),
                    'pertanyaan' =>$this->input->post('pertanyaan'),
                    'pilihan_a' =>$this->input->post('pa'),
                    'pilihan_b' => $this->input->post('pb'),
                    'pilihan_c' => $this->input->post('pc'),
                    'pilihan_d' => $this->input->post('pd'),
                    'jawaban' => $this->input->post('jawaban'),
                    'level' => $this->input->post('level'),
                    'tipe' =>$this->input->post('tipe'),
                ];
                $this->db->insert('soal', $data);
                redirect('Pretest/soal');
    }
    public function updateques()
    {
    	# code...
    }
}