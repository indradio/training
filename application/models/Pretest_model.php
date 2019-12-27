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
                    if($t['soal_4']){
                        if($t['soal_5']){
                            if($t['soal_6']){
                                if($t['soal_7']){
                                    if($t['soal_8']){
                                        if($t['soal_9']){
                                            if($t['soal_10']){
                                                if($t['soal_11']){
                                                    if($t['soal_12']){
                                                        if($t['soal_13']){
                                                            if($t['soal_14']){
                                                                if($t['soal_15']){
                                                                    if($t['soal_16']){
                                                                        if($t['soal_17']){
                                                                            if($t['soal_18']){
                                                                                if($t['soal_19']){
                                                                                    if($t['soal_20']){
                                                                                        if($t['soal_21']){
                                                                                            if($t['soal_22']){
                                                                                                if($t['soal_23']){
                                                                                                    if($t['soal_24']){
                                                                                                        if($t['soal_25']){
                                                                                                            if($t['soal_26']){
                                                                                                                if($t['soal_27']){
                                                                                                                    if($t['soal_28']){
                                                                                                                        if($t['soal_29']){
                                                                                                                            if($t['soal_30']){
                                                                                                                                $no = 0 ;  
                                                                                                                            }else{
                                                                                                                                $no = 30 ;
                                                                                                                            }
                                                                                                                        }else{
                                                                                                                            $no = 29 ;
                                                                                                                        }
                                                                                                                    }else{
                                                                                                                        $no = 28 ;
                                                                                                                    }
                                                                                                                }else{
                                                                                                                    $no = 27 ;
                                                                                                                }
                                                                                                            }else{
                                                                                                                $no = 26 ;
                                                                                                            }
                                                                                                        }else{
                                                                                                            $no = 25 ;
                                                                                                        }
                                                                                                    }else{
                                                                                                        $no = 24 ;
                                                                                                    }
                                                                                                }else{
                                                                                                    $no = 23 ;
                                                                                                }
                                                                                            }else{
                                                                                                $no = 22 ;
                                                                                            }
                                                                                        }else{
                                                                                            $no = 21 ;
                                                                                        }
                                                                                    }else{
                                                                                        $no = 20 ;
                                                                                    }
                                                                                }else{
                                                                                    $no = 19 ;
                                                                                }
                                                                            }else{
                                                                                $no = 18 ;
                                                                            }
                                                                        }else{
                                                                            $no = 17 ;
                                                                        }
                                                                    }else{
                                                                        $no = 16 ;
                                                                    }
                                                                }else{
                                                                    $no = 15 ;
                                                                }
                                                            }else{
                                                                $no = 14 ;
                                                            }
                                                        }else{
                                                            $no = 13 ;
                                                        }
                                                    }else{
                                                        $no = 12 ;
                                                    }
                                                }else{
                                                    $no = 11 ;
                                                }
                                            }else{
                                                $no = 10 ;
                                            }
                                        }else{
                                            $no = 9 ;
                                        }
                                    }else{
                                        $no = 8 ;
                                    }
                                }else{
                                    $no = 7 ;
                                }
                            }else{
                                $no = 6 ;
                            }
                        }else{
                            $no = 5 ;
                        }
                    }else{
                        $no = 4 ;
                    }
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
    public function get_pretest()
    {
        $this->db->where('email', $this->session->userdata('email'));
        $query = $this->db->get("pretest");
        return $query->row_array();
    }

    public function get_allpretest()
    {   
        $this->db->order_by('id', "DESC");
        $query = $this->db->get("pretest");
        return $query->result_array();
    }
}