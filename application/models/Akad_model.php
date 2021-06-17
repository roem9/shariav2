<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Akad_model extends MY_Model {

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

    public function loadAkad($table){
        if($table == "marketing_si"){
            $this->datatables->select("CONVERT(no_doc, UNSIGNED INTEGER) AS no_document, no_doc, nama_marketing as nama, kd_marketing, id_akad, tgl_akad, nama_lac as nama_bagian");
            $this->datatables->from("akad_marketing_si as a");
            $this->datatables->join("lac as b", "a.id_lac = b.id_lac");
            $this->datatables->add_column('no', '$1','no_doc_marketing_si(no_doc, tgl_akad)');
            $this->datatables->add_column('link', '
            <a href="'.base_url().'akad/marketing/si/$1" target="_blank" class="btn btn-success">'.tablerIcon("link", "me-1").' Link</a>','md5(id_akad)');
            $this->datatables->add_column('detail', '
                <span class="dropdown">
                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                    '.tablerIcon("menu-2", "me-1").'
                    Menu
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item detailAkadMarketing" data-bs-toggle="modal" href="#detailAkadMarketing" data-table="akad_marketing_si" data-id="$2">
                        '.tablerIcon("info-circle", "me-1").'
                        Detail Akad
                    </a>
                    <a class="dropdown-item" target="_blank" href="'.base_url().'akad/marketing/si/$1">
                        '.tablerIcon("link", "me-1").'
                        Link Akad
                    </a>
                </div>
                </span>', 'md5(id_akad), id_akad');

        } elseif($table == "marketing_agency") {
            $this->datatables->select("CONVERT(no_doc, UNSIGNED INTEGER) AS no_document, no_doc, nama_marketing as nama, kd_marketing, id_akad, a.tgl_akad, nama_agency as nama_bagian, a.id_agency");
            $this->datatables->from("akad_marketing_agency as a");
            $this->datatables->join("agency as b", "a.id_agency = b.id_agency");
            $this->datatables->add_column('no', '$1','no_doc_marketing_agency(no_doc, tgl_akad, id_agency)');
            $this->datatables->add_column('link', '
            <a href="'.base_url().'akad/marketing/agency/$1" target="_blank" class="btn btn-success">'.tablerIcon("link", "me-1").' Link</a>','md5(id_akad)');
            $this->datatables->add_column('detail', '
                <span class="dropdown">
                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                    '.tablerIcon("menu-2", "me-1").'
                    Menu
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item detailAkadMarketing" data-bs-toggle="modal" href="#detailAkadMarketing" data-table="akad_marketing_agency" data-id="$2">
                        '.tablerIcon("info-circle", "me-1").'
                        Detail Akad
                    </a>
                    <a class="dropdown-item" target="_blank" href="'.base_url().'akad/marketing/agency/$1">
                        '.tablerIcon("link", "me-1").'
                        Link Akad
                    </a>
                </div>
                </span>', 'md5(id_akad), id_akad');

        } elseif($table == "agency"){
            $this->datatables->select("CONVERT(no_doc, UNSIGNED INTEGER) AS no_document, no_doc, nama_agency as nama, id_agency, id_akad, tgl_akad, nama_batch as nama_bagian, no_batch");
            $this->datatables->from("akad_agency as a");
            $this->datatables->join("batch as b", "a.id_batch = b.id_batch");
            $this->datatables->add_column('no', '$1','no_doc_agency(no_doc, no_batch, tgl_akad)');
            $this->datatables->add_column('link', '
                <a href="'.base_url().'akad/agency/$1" target="_blank" class="btn btn-success">'.tablerIcon("link", "me-1").' Link</a>','md5(id_akad)');
            
            $this->datatables->add_column('detail', '
                <span class="dropdown">
                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                    '.tablerIcon("menu-2", "me-1").'
                    Menu
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item detailAkadAgency" data-bs-toggle="modal" href="#detailAkadAgency" data-table="akad_agency" data-id="$2">
                        '.tablerIcon("info-circle", "me-1").'
                        Detail Akad
                    </a>
                    <a class="dropdown-item" target="_blank" href="'.base_url().'akad/agency/$1">
                        '.tablerIcon("link", "me-1").'
                        Link Akad
                    </a>
                </div>
                </span>', 'md5(id_akad), id_akad');
        }
        
        $this->datatables->edit_column('tgl_akad', '$1','tgl_batch(tgl_akad)');
        return $this->datatables->generate();
    }
 
    public function get_akad(){
        $table = $this->input->post("table");
        $id_akad = $this->input->post("id_akad");

        $data = $this->Main_model->get_one($table, ["id_akad" => $id_akad]);
        return $data;
    }

    public function edit_akad(){
        $id_akad = $this->input->post("id_akad");
        $table = $this->input->post("table");

        unset($_POST['id_akad']);
        unset($_POST['table']);

        $data = $this->Main_model->edit_data($table, ["id_akad" => $id_akad], $_POST);

        if($data) return 1;
        else return 0;
    }

}

/* End of file Si_model.php */
