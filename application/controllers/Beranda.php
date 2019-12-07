<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('beranda/index');
	}
	public function daftar()
	{
		date_default_timezone_set('asia/jakarta');

		$this->load->helper('string');
		$password = random_string('alnum',8);

		$data = [
			'tanggal' => date('Y-m-d H:i:s'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'tgl_lahir' => $this->input->post('tanggal_lahir'),
			'perusahaan' => $this->input->post('perusahaan'),
			'lokasi' => $this->input->post('lokasi'),
			'jabatan' => $this->input->post('jabatan'),
			'masa_kerja' => $this->input->post('masa_kerja'),
			'program' => $this->input->post('program'),
			'merek' => $this->input->post('merek'),
			'tipe' => $this->input->post('tipe'),
			'password' => password_hash($password, PASSWORD_DEFAULT),
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
        $this->email->message("Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter.<br><br> Klik <strong><a href='https://masrud.com/post/kirim-email-dengan-smtp-gmail' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

        // Tampilkan pesan sukses atau error
        // if ($this->email->send()) {
		// 	echo 'Sukses! email berhasil dikirim.';
        // } else {
        //     echo 'Error! email tidak dapat dikirim.';
		// }

		$my_apikey = "NQXJ3HED5LW2XV440HCG";
		$destination = $this->input->post('phone');
		$message = "*Terima kasih, Pendaftaran anda telah berhasil*" .
			"\r\n Password". $password .
			"\r\nUntuk informasi lebih lengkap dapat dilihat melalui link berikut https://training.winteq-astra.com";
		$api_url = "http://panel.apiwha.com/send_message.php";
		$api_url .= "?apikey=" . urlencode($my_apikey);
		$api_url .= "&number=" . urlencode($destination);
		$api_url .= "&text=" . urlencode($message);
		json_decode(file_get_contents($api_url, false));

		redirect('https://training.winteq-astra.com/');
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
}
