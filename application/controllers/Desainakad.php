<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desainakad extends CI_Controller {

    
    public function __construct(){
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->model('Agency_model');
        //Do your magic here
        
        // Load Pagination library
        $this->load->library('pagination');

        // var_dump($this->session->userdata('level'));
        if(!$this->session->userdata('sharia')){
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <svg width="24" height="24" class="alert-icon">
                                <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-alert-circle" />
                            </svg>
                        </div>
                        <div>
                            Anda harus login terlebih dahulu
                        </div>
                    </div>
                    <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            ');

			redirect(base_url("auth"));
		}
    }

    public function agency($form = ""){
        
        $this->load->helper('file');

        // navbar and sidebar
        $data['menu'] = "Desain";

        if($form == "form"){
            $data['dropdown'] = "AkadAgencyForm";
            $data['title'] = "Desain Akad Agency (Form)";
            $data['file'] = "agency_form";
            $data['string'] = read_file('./application/views/pages/akad/agency_form.php');
        } else {
            $data['dropdown'] = "AkadAgency";
            $data['title'] = "Desain Akad Agency";
            $data['file'] = "agency";
            $data['string'] = read_file('./application/views/pages/akad/agency.php');
        }

        $data['js'] = [
            "modules/other.js"
        ];
        
        $this->load->view("pages/desain_akad", $data);
    }

    public function marketing_si($form = ""){
        
        $this->load->helper('file');

        // navbar and sidebar
        $data['menu'] = "Desain";

        $data['js'] = [
            "modules/other.js"
        ];

        if($form == "form") {
            $data['title'] = "Desain Akad Marketing SI (Form)";
            $data['string'] = read_file('./application/views/pages/akad/marketing_si_form.php');
            $data['file'] = "marketing_si_form";
            $data['dropdown'] = "AkadSIForm";
        } else {
            $data['title'] = "Desain Akad Marketing SI";
            $data['string'] = read_file('./application/views/pages/akad/marketing_si.php');
            $data['file'] = "marketing_si";
            $data['dropdown'] = "AkadSI";
        }

        $this->load->view("pages/desain_akad", $data);
    }

    public function marketing_agency($form = ""){
        
        $this->load->helper('file');

        // navbar and sidebar
        $data['menu'] = "Desain";

        $data['js'] = [
            "modules/other.js"
        ];

        if($form == "form") {
            $data['title'] = "Desain Akad Marketing Agency (Form)";
            $data['string'] = read_file('./application/views/pages/akad/marketing_agency_form.php');
            $data['file'] = "marketing_agency_form";
            $data['dropdown'] = "AkadAgencyForm";
        } else {
            $data['title'] = "Desain Akad Marketing Agency";
            $data['string'] = read_file('./application/views/pages/akad/marketing_agency.php');
            $data['file'] = "marketing_agency";
            $data['dropdown'] = "AkadAgency";
        }

        $this->load->view("pages/desain_akad", $data);
    }

    public function edit_file(){
        $this->load->helper('file');
        $data = $this->input->post("text");
        $file = $this->input->post("file");
        if ( ! write_file('./application/views/pages/akad/'.$file.'.php', $data)){
            echo json_encode(0);
        }
        else{
            echo json_encode(1);
        }
    }
}

/* End of file Desainakad.php */
