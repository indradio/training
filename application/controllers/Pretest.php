<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pretest extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		is_logged_in();
		$this->load->model('mes_model');
    }

	public function index()
	{
		date_default_timezone_set('asia/jakarta');
		$pretest = $this->db->get_where('pretest', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Pretest';
		if($pretest['email']){
			if($pretest['status']==1){
				$this->load->model("pretest_model");
				$data['soal'] = $this->pretest_model->get_questions();
				$data['pretest'] = $this->pretest_model->get_pretest();
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('pretest/pretest', $data);
				$this->load->view('templates/footer');
			}else{
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('pretest/selesai', $data);
				$this->load->view('templates/footer');
			}
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('pretest/mulai', $data);
			$this->load->view('templates/footer');
		}

		// $data['title'] = 'Dashboard';
		// $this->load->view('templates/header');
		// $this->load->view('templates/sidebar', $data);
		// $this->load->view('templates/navbar', $data);
		// $this->load->view('pretest/index', $data);
		// $this->load->view('templates/footer');
	}

	public function mulai()
	{
		date_default_timezone_set('asia/jakarta');
		$data = [
			'waktu_mulai' => date('Y-m-d H:i:s'),
			'waktu_selesai' => date('Y-m-d H:i:s', strtotime('+15minute', strtotime( date('Y-m-d H:i:s')))),
			'nama' => $this->session->userdata('nama'),
			'email' => $this->session->userdata('email'),
			'status' => 1
		];
		$this->db->insert('pretest', $data);
		redirect('pretest');
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

	public function jawab()
	{
		date_default_timezone_set('asia/jakarta');
		$pretest = $this->db->get_where('pretest', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->input->post('jawaban')==$this->input->post('options')){
			$hasil = 1 ;
		}else{
			$hasil = 0 ;
		}
		$total_hasil = $pretest['total_hasil'] + $hasil; 
		
		if ($this->input->post('no')==1){

			$this->db->set('soal_1', $this->input->post('id'));
			$this->db->set('jawaban_1', $this->input->post('options'));
			$this->db->set('hasil_1', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==2){

			$this->db->set('soal_2', $this->input->post('id'));
			$this->db->set('jawaban_2', $this->input->post('options'));
			$this->db->set('hasil_2', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==3){

			$this->db->set('soal_3', $this->input->post('id'));
			$this->db->set('jawaban_3', $this->input->post('options'));
			$this->db->set('hasil_3', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==4){

			$this->db->set('soal_4', $this->input->post('id'));
			$this->db->set('jawaban_4', $this->input->post('options'));
			$this->db->set('hasil_4', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==5){

			$this->db->set('soal_5', $this->input->post('id'));
			$this->db->set('jawaban_5', $this->input->post('options'));
			$this->db->set('hasil_5', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==6){

			$this->db->set('soal_6', $this->input->post('id'));
			$this->db->set('jawaban_6', $this->input->post('options'));
			$this->db->set('hasil_6', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==7){

			$this->db->set('soal_7', $this->input->post('id'));
			$this->db->set('jawaban_7', $this->input->post('options'));
			$this->db->set('hasil_7', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==8){

			$this->db->set('soal_8', $this->input->post('id'));
			$this->db->set('jawaban_8', $this->input->post('options'));
			$this->db->set('hasil_8', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==9){

			$this->db->set('soal_9', $this->input->post('id'));
			$this->db->set('jawaban_9', $this->input->post('options'));
			$this->db->set('hasil_9', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==10){

			$this->db->set('soal_10', $this->input->post('id'));
			$this->db->set('jawaban_10', $this->input->post('options'));
			$this->db->set('hasil_10', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==11){

			$this->db->set('soal_11', $this->input->post('id'));
			$this->db->set('jawaban_11', $this->input->post('options'));
			$this->db->set('hasil_11', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==12){

			$this->db->set('soal_12', $this->input->post('id'));
			$this->db->set('jawaban_12', $this->input->post('options'));
			$this->db->set('hasil_12', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==13){

			$this->db->set('soal_13', $this->input->post('id'));
			$this->db->set('jawaban_13', $this->input->post('options'));
			$this->db->set('hasil_13', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==14){

			$this->db->set('soal_14', $this->input->post('id'));
			$this->db->set('jawaban_14', $this->input->post('options'));
			$this->db->set('hasil_14', $hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==15){

			$this->db->set('soal_15', $this->input->post('id'));
			$this->db->set('jawaban_15', $this->input->post('options'));
			$this->db->set('hasil_15', $hasil);
			$this->db->set('waktu_selesai', date('Y-m-d H:i:s'));
			$this->db->set('status', 9);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}
		
	}
	
	public function waktu_habis()
	{
			$this->db->set('status', 9);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
	}

	public function hasil()
	{
		date_default_timezone_set('asia/jakarta');
		$this->load->model("pretest_model");
		$data['title'] = 'Hasil Pretest';
		// $data['hasil'] = $this->pretest_model->get_hasil();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pretest/hasil', $data);
		$this->load->view('templates/footer');
	}

	public function kuesioner_mes()
	{
		date_default_timezone_set('asia/jakarta');
		$this->load->model("mes_model");
		$data['title'] = 'Kuesioner MES';
		$data['kuesioner'] = $this->mes_model->getKuesioner();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pretest/kuesioner_mes', $data);
		$this->load->view('templates/footer');
	}

	public function kuesioner_export()
    {
		 $filename = 'KuesionerMES.csv'; 
		 header("Content-Description: File Transfer"); 
		 header("Content-Disposition: attachment; filename=$filename"); 
		 header("Content-Type: application/csv; ");
		 
		 // get data 
		 $usersData = $this->mes_model->getKuesioner();
	  
		 // file creation 
		 $file = fopen('php://output', 'w');
	   
		 $header = array("Nama","Perusahaan","Aplikasi MES","Catatan"); 
		 fputcsv($file, $header);
		 foreach ($usersData as $key=>$line){ 
		   fputcsv($file,$line); 
		 }
		 fclose($file); 
		 exit; 
    }
}