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
		if(!empty($pretest['email'])){
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
				$data['pretest'] = $this->db->get_where('pretest', ['email' => $this->session->userdata('email')])->row_array();
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
			'waktu_selesai' => date('Y-m-d H:i:s', strtotime('+30minute', strtotime( date('Y-m-d H:i:s')))),
			'nama' => $this->session->userdata('nama'),
			'email' => $this->session->userdata('email'),
			'total_basic' => 0,
			'total_intermediate' => 0,
			'total_hasil' => 0,
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
	}
	
	public function addquest (){
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
		$soal = $this->db->get_where('soal', ['no' => $this->input->post('no')])->row_array();
		if ($this->input->post('jawaban')==$this->input->post('options')){
			$hasil = $soal['bobot'];
		}else{
			$hasil = 0 ;
		}
		$total_hasil = $pretest['total_hasil'] + $hasil; 
		$total_im = $total_hasil - $pretest['total_basic'];

		if ($pretest['total_basic'] > 25 AND $total_im > 25){
			$level = 'ADVANCE';
		}elseif ($total_hasil > 25 AND $total_im < 26){
			$level = 'INTERMEDIATE';
		}else{
			$level = 'BASIC' ;
		}
		
		if ($this->input->post('no')==1){

			$this->db->set('soal_1', $this->input->post('id'));
			$this->db->set('jawaban_1', $this->input->post('options'));
			$this->db->set('hasil_1', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', 'BASIC');
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==2){

			$this->db->set('soal_2', $this->input->post('id'));
			$this->db->set('jawaban_2', $this->input->post('options'));
			$this->db->set('hasil_2', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', 'BASIC');
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==3){

			$this->db->set('soal_3', $this->input->post('id'));
			$this->db->set('jawaban_3', $this->input->post('options'));
			$this->db->set('hasil_3', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', 'BASIC');
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==4){

			$this->db->set('soal_4', $this->input->post('id'));
			$this->db->set('jawaban_4', $this->input->post('options'));
			$this->db->set('hasil_4', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', 'BASIC');
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==5){

			$this->db->set('soal_5', $this->input->post('id'));
			$this->db->set('jawaban_5', $this->input->post('options'));
			$this->db->set('hasil_5', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', 'BASIC');
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==6){

			$this->db->set('soal_6', $this->input->post('id'));
			$this->db->set('jawaban_6', $this->input->post('options'));
			$this->db->set('hasil_6', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', 'BASIC');
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==7){

			$this->db->set('soal_7', $this->input->post('id'));
			$this->db->set('jawaban_7', $this->input->post('options'));
			$this->db->set('hasil_7', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', 'BASIC');
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==8){

			$this->db->set('soal_8', $this->input->post('id'));
			$this->db->set('jawaban_8', $this->input->post('options'));
			$this->db->set('hasil_8', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', 'BASIC');
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==9){

			$this->db->set('soal_9', $this->input->post('id'));
			$this->db->set('jawaban_9', $this->input->post('options'));
			$this->db->set('hasil_9', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', 'BASIC');
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==10){

			$this->db->set('soal_10', $this->input->post('id'));
			$this->db->set('jawaban_10', $this->input->post('options'));
			$this->db->set('hasil_10', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', 'BASIC');
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==11){

			$this->db->set('soal_11', $this->input->post('id'));
			$this->db->set('jawaban_11', $this->input->post('options'));
			$this->db->set('hasil_11', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', 'BASIC');
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==12){

			$this->db->set('soal_12', $this->input->post('id'));
			$this->db->set('jawaban_12', $this->input->post('options'));
			$this->db->set('hasil_12', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', 'BASIC');
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==13){
			
			$this->db->set('soal_13', $this->input->post('id'));
			$this->db->set('jawaban_13', $this->input->post('options'));
			$this->db->set('hasil_13', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==14){

			$this->db->set('soal_14', $this->input->post('id'));
			$this->db->set('jawaban_14', $this->input->post('options'));
			$this->db->set('hasil_14', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==15){

			$this->db->set('soal_15', $this->input->post('id'));
			$this->db->set('jawaban_15', $this->input->post('options'));
			$this->db->set('hasil_15', $hasil);
			$this->db->set('total_basic', $total_hasil);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			if ($total_hasil>25)
			{
				redirect('pretest');
			}else{
				redirect('pretest/waktu_habis');
			}

		}elseif ($this->input->post('no')==16){

			$this->db->set('soal_16', $this->input->post('id'));
			$this->db->set('jawaban_16', $this->input->post('options'));
			$this->db->set('hasil_16', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==17){

			$this->db->set('soal_17', $this->input->post('id'));
			$this->db->set('jawaban_17', $this->input->post('options'));
			$this->db->set('hasil_17', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==18){

			$this->db->set('soal_18', $this->input->post('id'));
			$this->db->set('jawaban_18', $this->input->post('options'));
			$this->db->set('hasil_18', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==19){

			$this->db->set('soal_19', $this->input->post('id'));
			$this->db->set('jawaban_19', $this->input->post('options'));
			$this->db->set('hasil_19', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==20){

			$this->db->set('soal_20', $this->input->post('id'));
			$this->db->set('jawaban_20', $this->input->post('options'));
			$this->db->set('hasil_20', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==21){

			$this->db->set('soal_21', $this->input->post('id'));
			$this->db->set('jawaban_21', $this->input->post('options'));
			$this->db->set('hasil_21', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==22){

			$this->db->set('soal_22', $this->input->post('id'));
			$this->db->set('jawaban_22', $this->input->post('options'));
			$this->db->set('hasil_22', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==23){

			$this->db->set('soal_23', $this->input->post('id'));
			$this->db->set('jawaban_23', $this->input->post('options'));
			$this->db->set('hasil_23', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==24){

			$this->db->set('soal_24', $this->input->post('id'));
			$this->db->set('jawaban_24', $this->input->post('options'));
			$this->db->set('hasil_24', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==25){

			$this->db->set('soal_25', $this->input->post('id'));
			$this->db->set('jawaban_25', $this->input->post('options'));
			$this->db->set('hasil_25', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==26){

			$this->db->set('soal_26', $this->input->post('id'));
			$this->db->set('jawaban_26', $this->input->post('options'));
			$this->db->set('hasil_26', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==27){

			$this->db->set('soal_27', $this->input->post('id'));
			$this->db->set('jawaban_27', $this->input->post('options'));
			$this->db->set('hasil_27', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==28){

			$this->db->set('soal_28', $this->input->post('id'));
			$this->db->set('jawaban_28', $this->input->post('options'));
			$this->db->set('hasil_28', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==29){

			$this->db->set('soal_29', $this->input->post('id'));
			$this->db->set('jawaban_29', $this->input->post('options'));
			$this->db->set('hasil_29', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');
			
			redirect('pretest');
		}elseif ($this->input->post('no')==30){

			$this->db->set('soal_30', $this->input->post('id'));
			$this->db->set('jawaban_30', $this->input->post('options'));
			$this->db->set('hasil_30', $hasil);
			$this->db->set('total_intermediate', $total_im);
			$this->db->set('total_hasil', $total_hasil);
			$this->db->set('level', $level);
			$this->db->set('waktu_selesai', date('Y-m-d H:i:s'));
			$this->db->set('status', 9);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');

			$this->db->set('basic', $pretest['total_basic']);
			$this->db->set('intermediate', $total_im);
			$this->db->set('total', $total_hasil);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('peserta');

			$mulai = strtotime($pretest['waktu_mulai']);
			$selesai = strtotime(date('Y-m-d H:i:s'));
			$selisih = $selesai - $mulai;
			$durasi = floor($selisih / 60);

			$my_apikey = "NQXJ3HED5LW2XV440HCG";
			$destination = $this->session->userdata('phone');
			$message = "*Terima kasih, Anda telah menyelesaikan PRETEST*" .
				"\r\n\r\nNama : " . $this->session->userdata('nama') .
				"\r\nNilai : " . $total_hasil .
				"\r\nLevel : " . $level .
				"\r\nDurasi : " . $durasi ." Menit" .
				"\r\n\r\nIni adalah pesan otomatis, harap tidak membalas pesan ini".
				"\r\nUntuk informasi lebih lengkap dapat dilihat melalui link berikut https://training.winteq-astra.com";
			$api_url = "http://panel.apiwha.com/send_message.php";
			$api_url .= "?apikey=" . urlencode($my_apikey);
			$api_url .= "&number=" . urlencode($destination);
			$api_url .= "&text=" . urlencode($message);
			json_decode(file_get_contents($api_url, false));

			$my_apikey = "NQXJ3HED5LW2XV440HCG";
			$destination = '6281113306882';
			$message = "*".$this->session->userdata('nama')." telah menyelesaikan PRETEST*" .
				"\r\n\r\nEmail : " . $this->session->userdata('email') .
				"\r\nNilai : " . $total_hasil .
				"\r\nLevel : " . $level .
				"\r\nDurasi : " . $durasi ." Menit" .
				"\r\n\r\nIni adalah pesan otomatis, harap tidak membalas pesan ini".
				"\r\nUntuk informasi lebih lengkap dapat dilihat melalui link berikut https://training.winteq-astra.com";
			$api_url = "http://panel.apiwha.com/send_message.php";
			$api_url .= "?apikey=" . urlencode($my_apikey);
			$api_url .= "&number=" . urlencode($destination);
			$api_url .= "&text=" . urlencode($message);
			json_decode(file_get_contents($api_url, false));

			$my_apikey = "NQXJ3HED5LW2XV440HCG";
			$destination = '6281213124523';
			$message = "*".$this->session->userdata('nama')." telah menyelesaikan PRETEST*" .
				"\r\n\r\nEmail : " . $this->session->userdata('email') .
				"\r\nNilai : " . $total_hasil .
				"\r\nLevel : " . $level .
				"\r\nDurasi : " . $durasi ." Menit" .
				"\r\n\r\nIni adalah pesan otomatis, harap tidak membalas pesan ini".
				"\r\nUntuk informasi lebih lengkap dapat dilihat melalui link berikut https://training.winteq-astra.com";
			$api_url = "http://panel.apiwha.com/send_message.php";
			$api_url .= "?apikey=" . urlencode($my_apikey);
			$api_url .= "&number=" . urlencode($destination);
			$api_url .= "&text=" . urlencode($message);
			json_decode(file_get_contents($api_url, false));
			
			redirect('pretest');
		}
		
	}
	
	public function waktu_habis()
	{
		$pretest = $this->db->get_where('pretest', ['email' => $this->session->userdata('email')])->row_array();
		if ($pretest['total_basic'] > 25 AND $pretest['total_intermediate'] > 25){
			$level = 'ADVANCE';
		}elseif ($pretest['total_basic'] > 25 AND $pretest['total_intermediate'] < 25){
			$level = 'INTERMEDIATE';
		}else{
			$level = 'BASIC' ;
		}
			$this->db->set('level', $level);
			$this->db->set('status', 9);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('pretest');

			$this->db->set('basic', $pretest['total_basic']);
			$this->db->set('intermediate', $pretest['total_intermediate']);
			$this->db->set('total', $pretest['total_hasil']);
			$this->db->set('level', $level);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('peserta');

			$mulai = strtotime($pretest['waktu_mulai']);
			$selesai = strtotime($pretest['waktu_selesai']);
			$selisih = $selesai - $mulai;
			$durasi = floor($selisih / 60);

			// Kirim via Whatsapp
			$postData = array(
				'deviceid' => 'ed59bffb-7ffd-4ac2-b039-b4725fdd4010',
				'number' => $this->session->userdata('phone'),
				'message' => "*Terima kasih, Anda telah menyelesaikan PRETEST*" .
				"\r\n\r\nNama : " . $this->session->userdata('nama') .
				"\r\nNilai : " .$pretest['total_hasil'] .
				"\r\nLevel : " . $level .
				"\r\nDurasi : " . $durasi ." Menit" .
				"\r\n\r\nIni adalah pesan otomatis, harap tidak membalas pesan ini".
				"\r\nUntuk informasi lebih lengkap dapat dilihat melalui link berikut https://training.winteq-astra.com"
			);

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://ws.premiumfast.net/api/v1/message/send');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			$headers = array();
			$headers[] = 'Accept: application/json';
			$headers[] = 'Authorization: Bearer 4495c8929e574477a9167352d529969cded0eb310cd936ecafa011dc48f2921b';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			
			$result = curl_exec($ch);

			//WA to Anchila
			$postData = array(
				'deviceid' => 'ed59bffb-7ffd-4ac2-b039-b4725fdd4010',
				'number' => '6281113306882',
				'message' => "*".$this->session->userdata('nama')." telah menyelesaikan PRETEST*" .
				"\r\n\r\nEmail : " . $this->session->userdata('email') .
				"\r\nNilai : " .$pretest['total_hasil'] .
				"\r\nLevel : " . $level .
				"\r\nDurasi : " . $durasi ." Menit" .
				"\r\n\r\nIni adalah pesan otomatis, harap tidak membalas pesan ini".
				"\r\nUntuk informasi lebih lengkap dapat dilihat melalui link berikut https://training.winteq-astra.com"
			);

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://ws.premiumfast.net/api/v1/message/send');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			$headers = array();
			$headers[] = 'Accept: application/json';
			$headers[] = 'Authorization: Bearer 4495c8929e574477a9167352d529969cded0eb310cd936ecafa011dc48f2921b';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			
			$result = curl_exec($ch);

			//WA to Uzla
			$postData = array(
				'deviceid' => 'ed59bffb-7ffd-4ac2-b039-b4725fdd4010',
				'number' => '6281517999619',
				'message' => "*".$this->session->userdata('nama')." telah menyelesaikan PRETEST*" .
				"\r\n\r\nEmail : " . $this->session->userdata('email') .
				"\r\nNilai : " .$pretest['total_hasil'] .
				"\r\nLevel : " . $level .
				"\r\nDurasi : " . $durasi ." Menit" .
				"\r\n\r\nIni adalah pesan otomatis, harap tidak membalas pesan ini".
				"\r\nUntuk informasi lebih lengkap dapat dilihat melalui link berikut https://training.winteq-astra.com"
			);

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://ws.premiumfast.net/api/v1/message/send');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			$headers = array();
			$headers[] = 'Accept: application/json';
			$headers[] = 'Authorization: Bearer 4495c8929e574477a9167352d529969cded0eb310cd936ecafa011dc48f2921b';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			
			$result = curl_exec($ch);

			//WA to ABU
			$postData = array(
				'deviceid' => 'ed59bffb-7ffd-4ac2-b039-b4725fdd4010',
				'number' => '6281213124523',
				'message' => "*".$this->session->userdata('nama')." telah menyelesaikan PRETEST*" .
				"\r\n\r\nEmail : " . $this->session->userdata('email') .
				"\r\nNilai : " .$pretest['total_hasil'] .
				"\r\nLevel : " . $level .
				"\r\nDurasi : " . $durasi ." Menit" .
				"\r\n\r\nIni adalah pesan otomatis, harap tidak membalas pesan ini".
				"\r\nUntuk informasi lebih lengkap dapat dilihat melalui link berikut https://training.winteq-astra.com"
			);

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://ws.premiumfast.net/api/v1/message/send');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			$headers = array();
			$headers[] = 'Accept: application/json';
			$headers[] = 'Authorization: Bearer 4495c8929e574477a9167352d529969cded0eb310cd936ecafa011dc48f2921b';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			
			$result = curl_exec($ch);
			
			redirect('pretest');
	}

	public function hasil()
	{
		date_default_timezone_set('asia/jakarta');
		$this->load->model("pretest_model");
		$data['title'] = 'Hasil Pretest';
		$data['hasil'] = $this->pretest_model->get_allpretest();
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