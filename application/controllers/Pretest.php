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
	
	public function pretest()
	{
		date_default_timezone_set('asia/jakarta');
		$this->load->model("pretest_model");
		$data['title'] = 'Pretest';
		$data['soal'] = $this->pretest_model->get_questions();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pretest/pretest', $data);
		$this->load->view('templates/footer');
	}

	public function mulai()
	{
		date_default_timezone_set('asia/jakarta');
		$data = [
			'tanggal' => date('Y-m-d H:i:s'),
			'nama' => $this->session->userdata('nama'),
			'email' => $this->session->userdata('email')
		];
		$this->db->insert('pretest', $data);
		redirect('pretest/test');
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
	
	public function jawab()
	{
		if ($this->input->post('jawaban')==$this->input->post('options')){
			$hasil = 1 ;
		}else{
			$hasil = 0 ;
		} 
		
		if ($this->input->post('no')==1){

			$this->db->set('soal_1', $this->input->post('id'));
			$this->db->set('jawaban_1', $this->input->post('options'));
			$this->db->set('hasil_1', $hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest/test');
		}elseif ($this->input->post('no')==2){

			$this->db->set('soal_2', $this->input->post('id'));
			$this->db->set('jawaban_2', $this->input->post('options'));
			$this->db->set('hasil_2', $hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest/test');
		}elseif ($this->input->post('no')==3){

			$this->db->set('soal_3', $this->input->post('id'));
			$this->db->set('jawaban_3', $this->input->post('options'));
			$this->db->set('hasil_3', $hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest/test');
		}
		
    }
}