<?php defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getEmail($email)
    {
        $query = $this->db->get_where('peserta', ['email' =>  $email]);
        if($query->num_rows()>0){
            return true;
           }
           else 
           {
            return false;
           }
    }
}