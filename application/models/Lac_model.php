<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lac_model extends MY_Model {

    public function loadLac(){
        $level = $this->session->userdata('level');
        $this->datatables->select("id_lac, status, nama_lac, 
            (select count(id_marketing) from marketing_si where a.id_lac = id_lac) as marketing,
            (select count(id_marketing) from marketing_si where a.id_lac = id_lac AND status = 'aktif') as marketing_aktif,
            (select count(id_marketing) from marketing_si where a.id_lac = id_lac AND status <> 'aktif') as marketing_nonaktif,
        ");
        $this->datatables->from("lac as a");
        $this->datatables->add_column('pdf','
                    <a href="'.base_url().'lac/pdf/$1" target="_blank">
                        <svg width="24" height="24" class="text-danger">
                            <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-file-text" />
                        </svg> 
                    </a>', 'md5(id_lac)');
        $this->datatables->add_column('view','
                <span class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                        '.tablerIcon("menu-2", "me-1").'
                        Menu
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item detailLac" data-bs-toggle="modal" href="#detailLac" data-id="$1">
                            '.tablerIcon("info-circle", "me-1").'
                            Detail LAC
                        </a>
                    </div>
                </span>', 'id_lac');
        return $this->datatables->generate();
    }
}

/* End of file Si_model.php */
