<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getKuesioner()
    {
        $this->db->select('nama, perusahaan, aplikasi, catatan');
        $query = $this->db->get("kuesioner_mes");
        return $query->result_array();
    }
}