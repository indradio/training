<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mes extends CI_Controller {

	public function index()
	{
		$this->load->view('mes/index');
    }

    public function kuesioner ()
    {
        date_default_timezone_set('asia/jakarta');
        $data = [
			'tanggal' => date('Y-m-d H:i:s'),
			'nama' => $this->input->post('nama'),
			'perusahaan' => $this->input->post('perusahaan'),
			'aplikasi' => $this->input->post('aplikasi'),
			'catatan' => $this->input->post('catatan')
		];
        $this->db->insert('kuesioner_mes', $data);
        
        redirect('mes/berhasil');
    }

    public function berhasil()
	{
		$this->load->view('mes/berhasil');
    }
}