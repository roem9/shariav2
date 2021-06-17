<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Si_model extends CI_Model {

    // var $table = 'user';
    // var $column_order = array(null,'a.status','kd_marketing','nama_marketing','nama_lac'); //set column field database for datatable orderable
    // var $column_search = array('a.status','kd_marketing','nama_marketing','nama_lac'); //set column field database for datatable searchable 
    // var $order = array('kd_marketing' => 'asc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->database();
    }
 
    private function _get_datatables_query($table, $status)
    {
        if($table == "marketing_si"){
            
            $column_order = array(null,'a.status','kd_marketing','nama_marketing','nama_lac'); //set column field database for datatable orderable
            $column_search = array('a.status','kd_marketing','nama_marketing','nama_lac'); //set column field database for datatable searchable 
            $order = array('kd_marketing' => 'asc'); // default order 

            $this->db->select("id_marketing, a.status, kd_marketing, nama_marketing, nama_lac");
            $this->db->from("marketing_si as a");
            $this->db->join("lac as b", "a.id_lac = b.id_lac");
            $this->db->where("a.status", $status);
        } else {
            $column_order = array(null,'a.status','kd_marketing','nama_marketing','nama_agency'); //set column field database for datatable orderable
            $column_search = array('a.status','kd_marketing','nama_marketing','nama_agency'); //set column field database for datatable searchable 
            $order = array('kd_marketing' => 'asc'); // default order 

            $this->db->select("id_marketing, a.status, kd_marketing, nama_marketing, nama_agency");
            $this->db->from("marketing_agency as a");
            $this->db->join("agency as b", "a.id_agency = b.id_agency");
            $this->db->where("a.status", $status);
        }
 
        $i = 0;
     
        foreach ($column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 

        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($table, $status)
    {
        $this->_get_datatables_query($table, $status);
        if($_POST['length'] -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($table, $status)
    {
        $this->_get_datatables_query($table, $status);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($table, $status)
    {
        if($table == "marketing_si"){
            $this->db->select("id_marketing, a.status, kd_marketing, nama_marketing, nama_lac");
            $this->db->from("marketing_si as a");
            $this->db->join("lac as b", "a.id_lac = b.id_lac");
            $this->db->where("a.status", $status);
        } else {
            $this->db->select("id_marketing, a.status, kd_marketing, nama_marketing, nama_agency");
            $this->db->from("marketing_agency as a");
            $this->db->join("agency as b", "a.id_agency = b.id_agency");
            $this->db->where("a.status", $status);
        }
        return $this->db->count_all_results();
    }

    public function getKdMarketingAgency(){
        
        $mm = date('m');
        $yy = date('y');

        $kd = 0;

        $this->db->select("SUBSTRING(kd_marketing, 6, 5) as kd_marketing");
        $this->db->from("marketing_agency");
        $this->db->where("SUBSTRING(kd_marketing, 1, 2) = ", $yy);
        $this->db->order_by("kd_marketing", "desc");
        
        $kode = $this->db->get()->row_array();

        if($kode){
            $kd = $kode['kd_marketing'] + 1;
        } else {
            $kd = 1;
        }
                
        if ( $kd < 10 ) {
            $urut = "000".$kd;
        } else if ( $kd >= 10 && $kd < 100 ){
            $urut = "00".$kd;
        } else if ( $kd >= 100 && $kd < 1000) {
            $urut = "0".$kd;
        } else if ( $kd >= 1000 && $kd < 9999) {
            $urut = $kd;
        }

        $kd_marketing = $yy . $mm . "." . $urut;
        
        return $kd_marketing;
    }

    public function getKdMarketingSi(){
        
        $mm = date('m');
        $yy = date('y');

        $kd = 0;

        $this->db->select("SUBSTRING(kd_marketing, 8, 4) as kd_marketing");
        $this->db->from("marketing_si");
        $this->db->where("SUBSTRING(kd_marketing, 4, 2) = ", $yy);
        $this->db->order_by("kd_marketing", "desc");
        
        $kode = $this->db->get()->row_array();

        var_dump($kode);

        if($kode){
            $kd = $kode['kd_marketing'] + 1;
        } else {
            $kd = 1;
        }
                
        if ( $kd < 10 ) {
            $urut = "000".$kd;
        } else if ( $kd >= 10 && $kd < 100 ){
            $urut = "00".$kd;
        } else if ( $kd >= 100 && $kd < 1000) {
            $urut = "0".$kd;
        } else if ( $kd >= 1000 && $kd < 9999) {
            $urut = $kd;
        }

        $kd_marketing = $mm . "." . $yy . "." . $urut;
        
        return $kd_marketing;
    }

}

/* End of file Si_model.php */
