<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('auth/index');
    }

    public function login()
    {
        $password = $this->input->post('pwd');
        $email = $this->input->post('email');
        $peserta = $this->db->get_where('peserta', ['email' => $email])->row_array();
        //die;

        if ($peserta) {
            if (password_verify($password, $peserta['password'])) {
                $data = [
                    'nama' => $peserta['nama'],
                    'email' => $peserta['email'],
                    'phone' => $peserta['phone'],
                    'perusahaan' => $peserta['perusahaan'],
                    'role_id' => $peserta['role_id'],
                    'status' => $peserta['status']
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('message', 'masuk');
                redirect('pretest');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Password kamu SALAH.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Maaf!</strong> NPK Tidak ditemukan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            // redirect('auth');
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Terima kasih!</strong> Telah menggunakan RAISA.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('auth');
    }
}