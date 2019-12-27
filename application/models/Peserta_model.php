<?php defined('BASEPATH') or exit('No direct script access allowed');

class Peserta_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_allpeserta()
    {
        $this->db->order_by('id', "DESC");
        $query = $this->db->get("peserta");
        return $query->result_array();
    }
}