<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akad extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->model('Akad_model', 'akad');
    }

    public function agency($id_akad){
        $akad =  $this->Main_model->get_one("akad_agency", ["md5(id_akad)" => $id_akad]);
        $akad['hari'] = $this->Main_model->hari_ini(date("D", strtotime($akad['tgl_akad'])));
        $akad['tgl'] = $this->Main_model->tgl_indo(date('d-m-Y', strtotime($akad['tgl_akad'])));
        $akad['tahun'] = date('Y', strtotime($akad['tgl_akad']));
        $akad['bulan'] = getRomawi(date('m', strtotime($akad['tgl_akad'])));

        $batch = $this->Main_model->get_one("batch", ["id_batch" => $akad['id_batch']]);

        if($akad['no_doc'] != ""){
            $akad['doc'] = "{$akad['no_doc']}/SGI/SI-AP/B-{$batch['no_batch']}/{$akad['bulan']}/{$akad['tahun']}";
        } else {
            $akad['doc'] = "";
        }
        
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin_top' => '43', 'margin_left' => '25', 'margin_right' => '25', 'margin_bottom' => '35']);
    
        $mpdf->SetDefaultBodyCSS('background', "url('assets/img/kop.png')");
        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

        $mpdf->SetHTMLFooter('
        <table width="100%" style="font-size: 12px; margin-bottom: 13px;">
            <tr>
                <td align="right">Halaman <b>{PAGENO}</b> dari <b>{nbpg}</b></td>
            </tr>
        </table>');
        
        $mpdf->SetTitle("{$akad['nama_agency']}");
        $mpdf->WriteHTML($this->load->view('pages/akad/agency', $akad, TRUE));
        $mpdf->Output("{$akad['nama_agency']}.pdf", "I");
    }

    public function marketing($tipe, $id_akad){
        if($tipe == "si"){
            $akad =  $this->Main_model->get_one("akad_marketing_si", ["md5(id_akad)" => $id_akad]);
            
            $akad['akad'] = tgl_akad(date('j-m-Y', strtotime($akad['tgl_akad'])));
            $akad['masa_awal'] = bulan_tahun(date('j-m-Y', strtotime($akad['tgl_akad'])));
            $akad['masa_akhir'] = bulan_tahun(date('j-m-Y', strtotime("+1 years", strtotime($akad['tgl_akad']))));
        } else {
            $akad =  $this->Main_model->get_one("akad_marketing_agency", ["md5(id_akad)" => $id_akad]);
            $akad['agency'] = $this->Main_model->get_one("agency", ["id_agency" => $akad['id_agency']]);
            
            $akad['akad'] = tgl_akad(date('j-m-Y', strtotime($akad['tgl_akad'])));
            $akad['masa_awal'] = bulan_tahun(date('j-m-Y', strtotime($akad['tgl_akad'])));
            $akad['masa_akhir'] = bulan_tahun(date('j-m-Y', strtotime("+".$akad['periode']." months", strtotime($akad['tgl_akad']))));
        }

        $akad['hari'] = $this->Main_model->hari_ini(date("D", strtotime($akad['tgl_akad'])));
        
        $akad['tgl'] = $this->Main_model->tgl_indo(date('d-m-Y', strtotime($akad['tgl_akad'])));
        $akad['tahun'] = date('Y', strtotime($akad['tgl_akad']));
        $akad['bulan'] = getRomawi(date('m', strtotime($akad['tgl_akad'])));


        if($tipe == "si"){
            $akad['no_doc'] = "{$akad['no_doc']}/SGI/SI-MF/{$akad['bulan']}/{$akad['tahun']}";
        } else {
            // $akad['no_doc'] = "{$akad['no_doc']}/SGI/SI-MF-AP/B-/{$akad['bulan']}/{$akad['tahun']}";
            $akad['no_doc'] = no_doc_marketing_agency($akad['no_doc'], $akad['tgl_akad'], $akad['id_agency']);
        }
        
        if($tipe == "si"){
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin_top' => '55', 'margin_left' => '25', 'margin_right' => '25', 'margin_bottom' => '35']);
        } else {
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin_top' => '65', 'margin_left' => '25', 'margin_right' => '25', 'margin_bottom' => '35']);
        }
    
        if($tipe == "si"){
            $mpdf->SetDefaultBodyCSS('background', "url('assets/img/kop.png')");
        } else {
            $mpdf->SetDefaultBodyCSS('background', "url('assets/img/kop_agency.jpg')");
        }

        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

        $mpdf->SetHTMLFooter('
        <table width="100%" style="font-size: 12px; margin-bottom: 13px;">
            <tr>
                <td align="right">Halaman <b>{PAGENO}</b> dari <b>{nbpg}</b></td>
            </tr>
        </table>');
        
        $mpdf->SetTitle("{$akad['nama_marketing']}");
        if($tipe == "si"){
            $mpdf->WriteHTML($this->load->view('pages/akad/marketing_si', $akad, TRUE));
        } else {
            $mpdf->SetHTMLHeader('
            <div style="
                position: absolute; top: 61px; left: 65px; width:150px;
            ">
                <img src="'.base_url().'assets/logo/'.$akad["agency"]["id_agency"].'.png" alt="" width="150">
            </div>
                <div style="
                    position: absolute; top: 144px; right: 10px; width: 400px;
                ">
                    '.$akad["agency"]["alamat"].'
                </div>
            ');
            $mpdf->WriteHTML($this->load->view('pages/akad/marketing_agency', $akad, TRUE));
        }
        $mpdf->Output("{$akad['nama_marketing']}.pdf", "I");
    }

    public function list($tipe){
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
		} else {
            $data['js'] = [
                "ajax.js",
                "function.js",
                "helper.js",
                "load_data/reload_akad_marketing.js",
                "modules/akad.js"
            ];

            // for modal 
            $data['modal'] = ["modal_akad"];
    
            if($tipe == "marketing_si"){
                $data['title'] = "List Akad Marketing Sharia Institute";
                $data['menu'] = "Akad";
                $data['dropdown'] = "listAkadMarketingSI";
                $data['table'] = "marketing_si";
                $this->load->view("pages/akad_marketing", $data);
            } elseif($tipe == "marketing_agency"){
                $data['title'] = "List Akad Marketing Agency";
                $data['menu'] = "Akad";
                $data['dropdown'] = "listAkadMarketingAgency";
                $data['table'] = "marketing_agency";
                $this->load->view("pages/akad_marketing", $data);
            } elseif($tipe == "agency"){
                $data['title'] = "List Akad Agency";
                $data['menu'] = "Akad";
                $data['dropdown'] = "listAkadAgency";
                $data['table'] = "agency";
                $this->load->view("pages/akad_marketing", $data);
            }
        }
    }

    public function member($tipe, $id){
        if($tipe == "agency"){
            $akad = $this->akad->get_all("akad_agency", ["md5(id_agency)" => $id]);

            $agency = $this->akad->get_one("agency", ["md5(id_agency)" => $id]);
            $data['title'] = "List Akad Agency " . $agency['nama_agency'];

            $data['akad'] = [];
            foreach ($akad as $i => $akad) {
                $batch = $this->akad->get_one("batch", ["id_batch" => $akad['id_batch']]);
                $no_doc = no_doc_agency($akad['no_doc'], $batch['no_batch'], $akad['tgl_akad']);

                if($akad['no_doc'] != ""){
                    $data['akad'][$i] = '
                        <div class="list-group-item bg-white shadow mb-3">
                            <div class="row align-items-center">
                                    <p>
                                        <svg width="24" height="24">
                                            <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-calendar" />
                                        </svg>
                                        '.tgl_batch($akad["tgl_akad"]).'
                                    </p>
                                    <p>
                                        <svg width="24" height="24">
                                            <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-id" />
                                        </svg>
                                        '.$no_doc.'
                                    </p>
                                    <div class="d-flex justify-content-end">
                                        <a href="'.base_url().'akad/agency/'.md5($akad['id_akad']).'" target="_blank" class="btn btn-primary">
                                            <svg width="24" height="24">
                                                <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-file-text" />
                                            </svg>
                                            Akad
                                        </a>
                                    </div>
                            </div>
                        </div>';
                } else {
                    $data['akad'][$i] = '
                        <div class="list-group-item bg-white shadow mb-3">
                            <div class="row align-items-center">
                                    <p>
                                        <svg width="24" height="24">
                                            <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-calendar" />
                                        </svg>
                                        '.tgl_batch($akad["tgl_akad"]).'
                                    </p>
                                    <div class="d-flex justify-content-end">
                                        <a href="'.base_url().'akad/agency/'.md5($akad['id_akad']).'" target="_blank" class="btn btn-primary">
                                            <svg width="24" height="24">
                                                <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-file-text" />
                                            </svg>
                                            Akad
                                        </a>
                                    </div>
                            </div>
                        </div>';
                }
            }
        } else if($tipe == "marketingsi"){
            $akad = $this->akad->get_all("akad_marketing_si", ["md5(id_marketing)" => $id]);
            
            $marketing = $this->akad->get_one("marketing_si", ["md5(id_marketing)" => $id]);
            $data['title'] = "List Akad " . $marketing['nama_marketing'];

            $data['akad'] = [];
            foreach ($akad as $i => $akad) {
                $no_doc = no_doc_marketing_si($akad['no_doc'], $akad['tgl_akad']);
                $data['akad'][$i] = '
                    <div class="list-group-item bg-white shadow mb-3">
                        <div class="row align-items-center">
                                <p>
                                    <svg width="24" height="24">
                                        <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-calendar" />
                                    </svg>
                                    '.tgl_batch($akad["tgl_akad"]).'
                                </p>
                                <p>
                                    <svg width="24" height="24">
                                        <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-id" />
                                    </svg>
                                    '.$no_doc.'
                                </p>
                                <div class="d-flex justify-content-end">
                                    <a href="'.base_url().'akad/marketing/si/'.md5($akad['id_akad']).'" target="_blank" class="btn btn-primary">
                                        <svg width="24" height="24">
                                            <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-file-text" />
                                        </svg>
                                        Akad
                                    </a>
                                </div>
                        </div>
                    </div>';
            }
        } else if($tipe == "marketingagency"){
            $akad = $this->akad->get_all("akad_marketing_agency", ["md5(id_marketing)" => $id]);
            
            $marketing = $this->akad->get_one("marketing_agency", ["md5(id_marketing)" => $id]);
            $data['title'] = "List Akad " . $marketing['nama_marketing'];

            $data['akad'] = [];
            foreach ($akad as $i => $akad) {
                $no_doc = no_doc_marketing_agency($akad['no_doc'], $akad['tgl_akad'], $akad['id_agency']);
                $data['akad'][$i] = '
                    <div class="list-group-item bg-white shadow mb-3">
                        <div class="row align-items-center">
                                <p>
                                    <svg width="24" height="24">
                                        <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-calendar" />
                                    </svg>
                                    '.tgl_batch($akad["tgl_akad"]).'
                                </p>
                                <p>
                                    <svg width="24" height="24">
                                        <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-id" />
                                    </svg>
                                    '.$no_doc.'
                                </p>
                                <div class="d-flex justify-content-end">
                                    <a href="'.base_url().'akad/marketing/agency/'.md5($akad['id_akad']).'" target="_blank" class="btn btn-primary">
                                        <svg width="24" height="24">
                                            <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-file-text" />
                                        </svg>
                                        Akad
                                    </a>
                                </div>
                        </div>
                    </div>';
            }
        }

        $this->load->view("pages/list-akad", $data);
    }

    public function loadAkad($table){
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
		} else {
            header('Content-Type: application/json');
            $output = $this->akad->loadAkad($table);
            echo $output;
        }
    }

    public function get_akad(){
        $data = $this->akad->get_akad();
        echo json_encode($data);
    }

    public function edit_akad(){
        $data = $this->akad->edit_akad();
        echo json_encode($data);
    }

}

/* End of file Akad.php */
