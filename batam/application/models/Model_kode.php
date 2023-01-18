<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kode extends CI_Model {

    function get_kodadm(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_admin,3)) AS kd_max FROM tbl_admin");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "00001";
        }
        return "ADM".$kd;
    }

    function get_kodkapal(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_kapal,3)) AS kd_max FROM tbl_kapal");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "KAP".$kd;
    }

    function get_kodtujuan(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_tujuan,3)) AS kd_max FROM tbl_tujuan");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "TJ".$kd;
    }

     function get_kodjadwal(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_jadwal,3)) AS kd_max FROM tbl_jadwal");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "J".$kd;
    }

    function get_kodeOrder(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_order,3)) AS kd_max FROM tbl_order");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "ORD".$kd;
    }

    function get_kodekelas(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_kelas,3)) AS kd_max FROM tbl_kelas");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "KEL".$kd;
    }




    

    
    
    function get_kodpel(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_pelanggan,3)) AS kd_max FROM tbl_pelanggan");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "00001";
        }
        return "PL".$kd;
    }
    function get_kodkon(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_konfirmasi,3)) AS kd_max FROM tbl_konfirmasi");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "00001";
        }
        return "KF".$kd;
    } 

    function get_kodbank(){
        $q = $this->db->query("SELECT MAX(RIGHT(kd_bank,3)) AS kd_max FROM tbl_bank");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "00001";
        }
        return "BNK".$kd;
    }
}

/* End of file getkod_model.php */
/* Location: ./application/models/getkod_model.php */