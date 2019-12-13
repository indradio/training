<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function index()
	{
		date_default_timezone_set('asia/jakarta');
		$this->load->model("peserta_model");
		$data['title'] = 'Peserta';
		$data['peserta'] = $this->peserta_model->get_peserta();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('peserta/index', $data);
		$this->load->view('templates/footer');
    }
}