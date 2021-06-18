<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agency_model extends MY_Model {
    public function __construct(){
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->database();
    }

    function loadBatch(){
        $this->datatables->select("id_batch, nama_batch, tgl_batch, status,
            (select count(id_agency) from agency where a.id_batch = id_batch AND status <> 'konfirm') as agency,
        ");
        $this->datatables->from("batch as a");
        $this->datatables->add_column('link', '
            <button class="copy btn btn-success" data-clipboard-text="https://marketing.shariagrupindonesia.co.id/form/agency/$1">
                '.tablerIcon("copy", "me-1").'
                Salin Link
            </button>','md5(id_batch), id_batch');

        if($this->session->userdata("level") == "Super Admin"){
            $this->datatables->add_column('detail', '
                <span class="dropdown">
                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                    '.tablerIcon("menu-2", "me-1").'
                    Menu
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item editBatch" data-bs-toggle="modal" href="#editBatch" data-id="$1">
                        '.tablerIcon("info-circle", "me-1").'
                        Edit Batch
                    </a>
                    <a class="dropdown-item" href="'.base_url().'agency/batch/$2">
                        '.tablerIcon("building-community", "me-1").'
                        List Agency
                    </a>
                </div>
                </span>', 'id_batch, md5(id_batch)');
        } else {
            $this->datatables->add_column('detail', '
                <span class="dropdown">
                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                    '.tablerIcon("menu-2", "me-1").'
                    Menu
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="'.base_url().'agency/batch/$2">
                        '.tablerIcon("building-community", "me-1").'
                        List Agency
                    </a>
                </div>
                </span>', 'id_batch, md5(id_batch)');
        }
        $this->datatables->edit_column('tgl_batch', '$1', 'tgl_batch(tgl_batch)');
        return $this->datatables->generate();
    }

    function loadAgencyKonfirmasi(){
        $this->datatables->select("nama_agency, nama_pemilik, id_agency, nama_batch");
        $this->datatables->where(["a.status" => "konfirm", "a.hapus" => 0]);
        $this->datatables->from("agency as a");
        $this->datatables->join("batch as b", "a.id_batch = b.id_batch");
        $this->datatables->add_column('action', '
            <a href="#profileAgency" data-bs-toggle="modal" class="btn btn-success btnKonfirmasi" data-id="$1">
                <svg width="24" height="24" class="me-1">
                    <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-check" />
                </svg>
                Konfirmasi
            </a>','id_agency');
        return $this->datatables->generate();
    }

    function loadAgency($id_batch = ""){
        $this->datatables->select("nama_agency, a.status, id_agency, nama_pemilik,
        (select count(id_marketing) from marketing_agency where a.id_agency = id_agency) as marketing,
        (select count(id_marketing) from marketing_agency where a.id_agency = id_agency AND status = 'aktif') as marketing_aktif,
        (select count(id_marketing) from marketing_agency where a.id_agency = id_agency AND status <> 'aktif') as marketing_nonaktif,
        nama_batch");
        $this->datatables->from("agency as a");
        $this->datatables->join("batch as b", "a.id_batch = b.id_batch");
        $this->datatables->where("a.status <>", "konfirm");
        
        if($id_batch != ""){
            $this->datatables->where("md5(a.id_batch)", $id_batch);
        }

        $this->datatables->add_column('md5_id_agency', '$1', 'md5(id_agency)');
        $this->datatables->add_column('foto', '<a href="#uploadLogo" data-bs-toggle="modal" data-id="$1" class="uploadLogo"><span class="avatar avatar-sm" style="background-image: url('.base_url().'assets/logo/$1.png?t='.time().')"></span></a>', 'id_agency');
        $this->datatables->add_column('pdf', '
            <a href="'.base_url().'agency/pdf/$1" target="_blank">
                <svg width="24" height="24" class="text-danger">
                    <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-file-text" />
                </svg> 
            </a>','md5(id_agency)');
        if($this->session->userdata("level") == "Super Admin") {
            $this->datatables->add_column('action', '
            <span class="dropdown">
            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                '.tablerIcon("menu-2", "me-1").'
                Menu
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item profileAgency" data-bs-toggle="modal" href="#profileAgency" data-id="$1">
                    '.tablerIcon("info-circle", "me-1").'
                    Detail Agency
                </a>
                <a class="dropdown-item detailAgency" data-bs-toggle="modal" href="#detailAgency" data-id="$1">
                    '.tablerIcon("users", "me-1").'
                    List Marketing
                </a>
                <a class="dropdown-item uploadGambar" data-bs-toggle="modal" href="#uploadGambar" data-id="$1">
                    '.tablerIcon("photo", "me-1").'
                    Upload Gambar
                </a>
                <a class="dropdown-item akadAgency" href="#akadAgency" data-bs-toggle="modal" data-id="$1">
                    '.tablerIcon("file-plus", "me-1").'
                    Tambah Akad
                </a>
                <a class="dropdown-item" href="'.base_url().'akad/member/agency/$2" target="_blank">
                    '.tablerIcon("files", "me-1").'
                    List Akad
                </a>
            </div>
            </span>', 'id_agency, md5(id_agency)');
        } else {
            $this->datatables->add_column('action', '
            <span class="dropdown">
            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                '.tablerIcon("menu-2", "me-1").'
                Menu
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item profileAgency" data-bs-toggle="modal" href="#profileAgency" data-id="$1">
                    '.tablerIcon("info-circle", "me-1").'
                    Detail Agency
                </a>
                <a class="dropdown-item" href="'.base_url().'akad/member/agency/$2" target="_blank">
                    '.tablerIcon("files", "me-1").'
                    List Akad
                </a>
            </div>
            </span>', 'id_agency, md5(id_agency)');
        }
        return $this->datatables->generate();
    }

    function edit_batch(){
        $id_batch = $this->input->post("id_batch");
        unset($_POST['id_batch']);

        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $data = $this->edit_data("batch", ["id_batch" => $id_batch], $data);
        if($data){
            return 1;
        } else {
            return 0;
        }
    }

    function add_batch(){
        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = $this->input->post($key);
        }

        $data['status'] = 1;

        $query = $this->Main_model->add_data("batch", $data);
        if($query)
            return 1;
        else 
            return 0;
    }
}

/* End of file Agency_model.php */
