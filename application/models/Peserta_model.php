<?php defined('BASEPATH') or exit('No direct script access allowed');

class Peserta_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_peserta()
    {
        $query = $this->db->get("peserta");
        return $query->row_array();
    }
}