<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->model("Main_model");
    
        // Load Pagination library
        $this->load->library('pagination');
        
        if(!$this->session->userdata('admintoafl')){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Maaf Anda harus login terlebih dahulu<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div');
			redirect(base_url("auth"));
		}
    }
    
    public function index(){
        // navbar and sidebar
        $data['menu'] = "Tes";

        // for title and header 
        $data['title'] = "List Tes";

        // for modal 
        $data['modal'] = ["modal_tes"];
        
        // javascript 
        $data['js'] = [
            "modules/other.js", 
            "modules/tes.js",
            "load_data/reload_tes.js",
        ];

        $this->load->view("pages/tes/list-tes", $data);
    }

    public function hasil($id){
        // navbar and sidebar
        $data['menu'] = "Tes";

        // for title and header 
        $data['title'] = "List Hasil Tes";

        $respon = $this->Main_model->get_all("peserta_toafl", ["md5(id_tes)" => $id]);
        $data['respon'] = [];
        foreach ($respon as $i => $respon) {
            $data['respon'][$i] = $respon;
            $jawaban = explode("###", $respon['text']);
            $data['respon'][$i]['text'] = $jawaban;
        }

        $this->load->view("pages/tes/hasil-tes", $data);
    }

    public function loadRecord($rowno=0){
        // Row per page
        $rowperpage = 6;
    
        // Row position
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }
     
        // All records count
        // $allcount = $this->Tes_model->getrecordCount();
        $allcount = COUNT($this->Main_model->get_all("tes", ["hapus" => 0], "tgl_tes", "DESC"));
    
        // Get records
        $record = $this->Main_model->get_all_limit("tes", ["hapus" => 0], "tgl_tes", "DESC", $rowno, $rowperpage);
        foreach ($record as $i => $record) {
            $users_record[$i] = $record;
            $users_record[$i]['id_hasil'] = md5($record['id_tes']);
            $users_record[$i]['link'] = 'https://toafl.id/soal/id/'.md5("MuhammadRum".$record['id_tes']);
            $users_record[$i]['tgl_tes'] = date("d-M-Y", strtotime($record['tgl_tes']));
            $users_record[$i]['peserta'] = COUNT($this->Main_model->get_all("peserta_toafl", ["id_tes" => $record['id_tes']]));
        }
        // $users_record = $this->Tes_model->getData($rowno,$rowperpage);
     
        // Pagination Configuration
        $config['base_url'] = base_url().'tes/loadRecord';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '>>';
        $config['prev_link']        = '<<';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination pagination-md justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
    
        // Initialize
        $this->pagination->initialize($config);
    
        // Initialize $data Array
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
        $data['total_rows'] = $allcount;
    
        echo json_encode($data);
     
    }
    
    // add 
        public function add_tes(){
            $data = [
                "tgl_tes" => $this->input->post("tgl_tes"),
                "tipe_soal" => $this->input->post("tipe_soal"),
                "password" => $this->input->post("password"),
                "status" => "Berjalan",
            ];

            $data = $this->Main_model->add_data("tes", $data);
            if($data){
                echo json_encode("1");
            } else {
                echo json_encode("0");
            }
        }
    // add 
    
    // get 
        public function get_tes(){
            $id_tes = $this->input->post("id_tes");

            $data = $this->Main_model->get_one("tes", ["id_tes" => $id_tes]);
            echo json_encode($data);
        }
    // get 

    // edit 
        public function edit_tes(){
            $id_tes = $this->input->post("id_tes");
            
            $data = [
                "tgl_tes" => $this->input->post("tgl_tes"),
                "tipe_soal" => $this->input->post("tipe_soal"),
                "password" => $this->input->post("password"),
                "status" => $this->input->post("status"),
            ];

            $data = $this->Main_model->edit_data("tes", ["id_tes" => $id_tes], $data);
            if($data){
                echo json_encode("1");
            } else {
                echo json_encode("0");
            }
        }
    // edit 

    // delete 
        public function hapus_tes(){
            $id_tes = $this->input->post("id_tes");

            $data = $this->Main_model->edit_data("tes", ["id_tes" => $id_tes], ["hapus" => 1]);
            if($data){
                echo json_encode("1");
            } else {
                echo json_encode("0");
            }
        }
    // delete

}

/* End of file Tes.php */
