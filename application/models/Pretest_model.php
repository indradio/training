<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pretest_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_questions()
    {
        $this->db->where('no', '1');
        $this->db->where('tipe', '1');
        $query = $this->db->get("soal");
        return $query->row_array();
    }
}