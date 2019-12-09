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
        $t = $this->db->get_where('pretest', ['email' => $this->session->userdata('email')])->row_array();

        if($t['soal_1']){
            if($t['soal_2']){
                if($t['soal_3']){
                    $no = 4 ;  
                }else{
                    $no = 3 ;
                }
            }else{
                $no = 2 ;
            }
        }else{
            $no = 1 ;
        }

        $this->db->where('no', $no);
        $this->db->where('tipe', 'A');
        $query = $this->db->get("soal");
        return $query->row_array();
    }
}