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
}