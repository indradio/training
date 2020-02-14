<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index()
	{
		$this->load->view('beranda/index');
	}
	public function daftar()
	{
		date_default_timezone_set('asia/jakarta');
		$peserta = $this->db->get_where('peserta', ['email' => $this->input->post('email')])->row_array();
		if (empty($peserta)){
			$tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
			$tanggal_training = date('Y-m-d', strtotime($this->input->post('tanggal_training')));
			$this->load->helper('string');
			$password = random_string('alnum',8);
	
			if ($this->input->post('pendidikan')!='Lainnya')
			{
				$pendidikan = $this->input->post('pendidikan');
			}else{
				$pendidikan = $this->input->post('pendidikan_lainnya');
			}
	
			if ($this->input->post('jabatan')!='Lainnya')
			{
				$jabatan = $this->input->post('jabatan');
			}else{
				$jabatan = $this->input->post('jabatan_lainnya');
			}
	
			if ($this->input->post('merek')!='Lainnya')
			{
				$merek = $this->input->post('merek');
			}else{
				$merek = $this->input->post('merek_lainnya');
			}
	
			$data = [
				'tanggal' => date('Y-m-d H:i:s'),
				'nama' => $this->input->post('nama'),
				'gender' => $this->input->post('gender'),
				'makanan' => $this->input->post('makanan'),
				'email' => $this->input->post('email'),
				'phone' => '62'.$this->input->post('phone'),
				'tgl_lahir' => $tanggal_lahir,
				'pendidikan' => $pendidikan,
				'jurusan' => $this->input->post('jurusan'),
				'perusahaan' => $this->input->post('perusahaan'),
				'lokasi' => $this->input->post('lokasi'),
				'jabatan' => $jabatan,
				'masa_kerja' => $this->input->post('masa_kerja'),
				'tgl_training' => $tanggal_training,
				'program' => $this->input->post('program'),
				'merek' => $merek,
				'tipe' => $this->input->post('tipe'),
				'harapan' => $this->input->post('harapan'),
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'role_id' => '3',
				'status' => '1'
			];
			$this->db->insert('peserta', $data);
	
			// Konfigurasi email
			$config = [
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
				'protocol'  => 'smtp',
				'smtp_host' => 'smtp.gmail.com',
				'smtp_user' => 'indradio21@gmail.com',  // Email gmail
				'smtp_pass'   => 'sayalupa',  // Password gmail
				'smtp_crypto' => 'ssl',
				'smtp_port'   => 587,
				'crlf'    => "\r\n",
				'newline' => "\r\n"
			];
	
			// Load library email dan konfigurasinya
			$this->load->library('email', $config);
	
			// Email dan nama pengirim
			$this->email->from('no-reply@winteq-astra.com', 'Winteq Technical Training Programs');
	
			// Email penerima
			$this->email->to($this->input->post('email')); // Ganti dengan email tujuan
	
			// Lampiran email, isi dengan url/path file
			// $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');
	
			// Subject email
			$this->email->subject('Terima kasih, Pendaftaran anda telah berhasil');
	
			// Isi email
			$this->email->message("Dear ".$this->input->post('nama') ."<p>Password anda : ".$password."<p>Silahkan mengikuti PRETEST di link berikut <a href='https://training.winteq-astra.com/pretest' target='_blank'>Winteq Technical Training Programs (PRETEST)</a>");
			
			// Kirim via Whatsapp
	
			$my_apikey = "NQXJ3HED5LW2XV440HCG";
			$destination = '62'.$this->input->post('phone');
			$message = "*Terima kasih, Pendaftaran anda telah berhasil*" .
				"\r\nSelamat datang di Winteq Technical Training Program" .
				"\r\nUntuk mengikuti training ini, silahkan anda menyelesaikan PRETEST yang telah kami siapkan." .
				"\r\n\r\nPassword anda : ". $password .
				"\r\n\r\nSilahkan login di alamat berikut https://training.winteq-astra.com/pretest".
				"\r\n\r\nIni adalah pesan otomatis, harap tidak membalas pesan ini".
				"\r\nUntuk informasi lebih lengkap dapat dilihat melalui link berikut https://training.winteq-astra.com";
			$api_url = "http://panel.apiwha.com/send_message.php";
			$api_url .= "?apikey=" . urlencode($my_apikey);
			$api_url .= "&number=" . urlencode($destination);
			$api_url .= "&text=" . urlencode($message);
			json_decode(file_get_contents($api_url, false));

			$my_apikey = "NQXJ3HED5LW2XV440HCG";
			$destination = '6281113306882';
			$message = "*Pendaftaran Peserta Training*" .
				"\r\n\r\nNama : " . $this->input->post('nama') .
				"\r\nEmail : " . $this->input->post('email') .
				"\r\nPhone : 0" . $this->input->post('phone') .
				"\r\nTgl Lahir : " . date('d F Y', strtotime($this->input->post('tanggal_lahir'))) .
				"\r\nTingkat Pendidikan : " . $pendidikan .
				"\r\nJurusan : " . $this->input->post('jurusan') .
				"\r\nPerusahaan : " . $this->input->post('perusahaan') .
				"\r\nLokasi : " . $this->input->post('lokasi') .
				"\r\nJabatan : " . $jabatan .
				"\r\nMasa Kerja : " . $this->input->post('masa_kerja') .
				"\r\nPassword : ". $password .
				"\r\n\r\nTanggal Training : " . date('d M Y', strtotime($this->input->post('tanggal_training'))) .
				"\r\nProgram Training : " . $this->input->post('program') .
				"\r\nMerek PLC : " . $merek ." (".$this->input->post('tipe').")".
				"\r\nHarapan : " . $this->input->post('harapan') .
				"\r\nMakanan : " . $this->input->post('makanan') .
				"\r\nUntuk informasi lebih lengkap dapat dilihat melalui link berikut https://training.winteq-astra.com";
			$api_url = "http://panel.apiwha.com/send_message.php";
			$api_url .= "?apikey=" . urlencode($my_apikey);
			$api_url .= "&number=" . urlencode($destination);
			$api_url .= "&text=" . urlencode($message);
			json_decode(file_get_contents($api_url, false));

			$my_apikey = "NQXJ3HED5LW2XV440HCG";
			$destination = '6281213124523';
			$message = "*Pendaftaran Peserta Training*" .
				"\r\n\r\nNama : " . $this->input->post('nama') .
				"\r\nEmail : " . $this->input->post('email') .
				"\r\nPhone : 0" . $this->input->post('phone') .
				"\r\nTgl Lahir : " . date('d F Y', strtotime($this->input->post('tanggal_lahir'))) .
				"\r\nTingkat Pendidikan : " . $pendidikan .
				"\r\nJurusan : " . $this->input->post('jurusan') .
				"\r\nPerusahaan : " . $this->input->post('perusahaan') .
				"\r\nLokasi : " . $this->input->post('lokasi') .
				"\r\nJabatan : " . $jabatan .
				"\r\nMasa Kerja : " . $this->input->post('masa_kerja') .
				"\r\nPassword : ". $password .
				"\r\n\r\nTanggal Training : " . date('d M Y', strtotime($this->input->post('tanggal_training'))) .
				"\r\nProgram Training : " . $this->input->post('program') .
				"\r\nMerek PLC : " . $merek ." (".$this->input->post('tipe').")".
				"\r\nHarapan : " . $this->input->post('harapan') .
				"\r\nMakanan : " . $this->input->post('makanan') .
				"\r\nUntuk informasi lebih lengkap dapat dilihat melalui link berikut https://training.winteq-astra.com";
			$api_url = "http://panel.apiwha.com/send_message.php";
			$api_url .= "?apikey=" . urlencode($my_apikey);
			$api_url .= "&number=" . urlencode($destination);
			$api_url .= "&text=" . urlencode($message);
			json_decode(file_get_contents($api_url, false));
	
			redirect('beranda/berhasil/' . $password);
		}else{
		  $this->load->view('beranda/gagal');
		}	
	}

	public function checkEmail()
	{
		 $this->load->model('Beranda_model');
		 if($this->Beranda_model->getEmail($_POST['email'])){
		  echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
		  </i> This Email is already registered</span></label>';
		 }
		 else {
		  echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Email is available</span></label>';
		 }
	}

	public function berhasil($password)
	{
        $data['password']=$password;
		$this->load->view('beranda/berhasil',$data);
	}
}
