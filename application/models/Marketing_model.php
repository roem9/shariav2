<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing_model extends MY_Model {
    public function loadMarketingSi($status){
        $level = $this->session->userdata('level');
        $this->datatables->select('id_marketing, a.status, kd_marketing, nama_marketing, nama_lac');
        $this->datatables->from("marketing_si as a");
        $this->datatables->join("lac as b", "a.id_lac = b.id_lac");
        $this->datatables->where("a.status", $status);
        $this->datatables->add_column('md5_id_marketing', '$1', 'md5(id_marketing)');
        if($level == "Super Admin"){
            if($status == "arsip"){
                $this->datatables->add_column('view','
                        <span class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                            '.tablerIcon("menu-2", "me-1").'
                            Menu
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item detailMarketing" data-bs-toggle="modal" href="#detailMarketing" data-id="$1">
                                '.tablerIcon("info-circle", "me-1").'
                                Detail Marketing
                            </a>
                            <a class="dropdown-item bukaArsipMarketing" href="javascript:void(0)" data-id="$1">
                                '.tablerIcon("archive", "me-1").'
                                Buka Arsip
                            </a>
                        </div>
                        </span>', 'id_marketing');
            } else {
                $this->datatables->add_column('view','
                        <span class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                            '.tablerIcon("menu-2", "me-1").'
                            Menu
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item detailMarketing" data-bs-toggle="modal" href="#detailMarketing" data-id="$1">
                                '.tablerIcon("info-circle", "me-1").'
                                Detail Marketing
                            </a>
                            <a class="dropdown-item arsipMarketing" href="javascript:void(0)" data-id="$1">
                                '.tablerIcon("archive", "me-1").'
                                Arsipkan
                            </a>
                            <a class="dropdown-item akadMarketing" data-bs-toggle="modal" href="#akadMarketing" data-id="$1">
                                '.tablerIcon("file-plus", "me-1").'
                                Buat Akad
                            </a>
                            <a href="'.base_url().'akad/member/marketingsi/$2" target="_blank" class="dropdown-item">
                                '.tablerIcon("files", "me-1").'
                                List Akad
                            </a>
                        </div>
                        </span>', 'id_marketing, md5(id_marketing)');
            }
        } else {
            $this->datatables->add_column('view','
                        <span class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                            '.tablerIcon("menu-2", "me-1").'
                            Menu
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item detailMarketing" data-bs-toggle="modal" href="#detailMarketing" data-id="$1">
                                '.tablerIcon("info-circle", "me-1").'
                                Detail Marketing
                            </a>
                        </div>
                        </span>', 'id_marketing');
        }
        return $this->datatables->generate();
    }

    public function loadMarketingAgency($status){
        $level = $this->session->userdata('level');
        $this->datatables->select('id_marketing, a.status, kd_marketing, nama_marketing, nama_agency');
        $this->datatables->from("marketing_agency as a");
        $this->datatables->join("agency as b", "a.id_agency = b.id_agency");
        $this->datatables->where("a.status", $status);
        $this->datatables->add_column('md5_id_marketing', '$1', 'md5(id_marketing)');
        if($level == "Super Admin"){
            if($status == "arsip"){
                $this->datatables->add_column('view','
                        <span class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                            '.tablerIcon("menu-2", "me-1").'
                            Menu
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item detailMarketing" data-bs-toggle="modal" href="#detailMarketing" data-id="$1">
                                '.tablerIcon("info-circle", "me-1").'
                                Detail
                            </a>
                            <a class="dropdown-item bukaArsipMarketing" href="javascript:void(0)" data-id="$1">
                                '.tablerIcon("archive", "me-1").'
                                Buka Arsip
                            </a>
                        </div>
                        </span>', 'id_marketing');
            } else {
                $this->datatables->add_column('view','
                        <span class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                            '.tablerIcon("menu-2", "me-1").'
                            Menu
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item detailMarketing" data-bs-toggle="modal" href="#detailMarketing" data-id="$1">
                                '.tablerIcon("info-circle", "me-1").'
                                Detail
                            </a>
                            <a class="dropdown-item arsipMarketing" href="javascript:void(0)" data-id="$1">
                                '.tablerIcon("archive", "me-1").'
                                Arsip
                            </a>
                            <a class="dropdown-item akadMarketing" data-bs-toggle="modal" href="#akadMarketing" data-id="$1">
                                '.tablerIcon("file-plus", "me-1").'
                                Buat Akad
                            </a>
                            <a href="'.base_url().'akad/member/marketingagency/$2" target="_blank" class="dropdown-item">
                                '.tablerIcon("files", "me-1").'
                                List Akad
                            </a>
                        </div>
                        </span>', 'id_marketing, md5(id_marketing)');
            }
        } else {
            $this->datatables->add_column('view','
                        <span class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                            '.tablerIcon("menu-2", "me-1").'
                            Menu
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item detailMarketing" data-bs-toggle="modal" href="#detailMarketing" data-id="$1">
                                '.tablerIcon("info-circle", "me-1").'
                                Detail
                            </a>
                        </div>
                        </span>', 'id_marketing');
        }
        return $this->datatables->generate();
    }
}

/* End of file Marketing_model.php */
