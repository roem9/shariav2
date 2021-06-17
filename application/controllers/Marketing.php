<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->model('Si_model');
        //Do your magic here
    }

    public function si($arsip=""){
        // navbar and sidebar
        $data['menu'] = "Marketing";

        // using in marketing.js 
        $data['table'] = "marketing_si";

        if($arsip == "arsip"){
            // for title and header 
            $data['title'] = "List Arsip Marketing Sharia Institute";
            $data['dropdown'] = "arsipSi";
            $data['status'] = "arsip";
        } else {
            $data['title'] = "List Marketing Sharia Institute";
            $data['dropdown'] = "SI";
            $data['status'] = "aktif";
        }

        // for modal 
        $data['modal'] = ["modal_marketing"];
        
        // javascript 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "load_data/reload_marketing_si.js",
            "modules/marketing.js",
        ];

        $this->load->view("pages/marketing", $data);
    }

    public function agency($arsip=""){
        // navbar and sidebar
        $data['menu'] = "Marketing";

        // using in marketing.js 
        $data['table'] = "marketing_agency";

        if($arsip == "arsip"){
            // for title and header 
            $data['title'] = "List Arsip Marketing Agency Partner";
            $data['dropdown'] = "arsipAgency";
            $data['status'] = "arsip";
        } else {
            $data['title'] = "List Marketing Agency Partner";
            $data['dropdown'] = "Agency";
            $data['status'] = "aktif";
        }

        // for modal 
        $data['modal'] = ["modal_marketing"];
        
        // javascript 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "load_data/reload_marketing_agency.js",
            "modules/marketing.js",
        ];

        $this->load->view("pages/marketing", $data);
    }

    public function loadMarketingSi($status = "aktif"){
        header('Content-Type: application/json');
        $output = $this->marketing->loadMarketingSi($status);
        echo $output;
    }

    public function loadMarketingAgency($status = "aktif"){
        header('Content-Type: application/json');
        $output = $this->marketing->loadMarketingAgency($status);
        echo $output;
    }

    // excel
        public function export($table){
            $spreadsheet = new Spreadsheet;

            if($table == "marketing_si"){
                // $semua_marketing = $this->marketing->get_all_join_table("marketing_si", "lac", "id_lac", "", "left");
                $this->db->select("kd_marketing, nama_marketing, nama_lac, a.no_ktp, domisili, a.alamat, a.email, a.no_wa, a.no_hp, nama_bank, cabang_bank, no_rek, an_rek, no_npwp, a.status");
                $this->db->from("marketing_si as a");
                $this->db->join("lac as b", "a.id_lac = b.id_lac");
                $semua_marketing = $this->db->get()->result_array();
    
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A1', 'LIST MARKETING SHARIA INSTITUTE')
                            ->setCellValue('A2', 'No')
                            ->setCellValue('B2', 'KD Marketing')
                            ->setCellValue('C2', 'Nama Marketing')
                            ->setCellValue('D2', 'Nama LAC')
                            ->setCellValue('E2', 'No. KTP')
                            ->setCellValue('F2', 'Domisili')
                            ->setCellValue('G2', 'Alamat')
                            ->setCellValue('H2', 'Email')
                            ->setCellValue('I2', 'No. WA')
                            ->setCellValue('J2', 'No. HP')
                            ->setCellValue('K2', 'Nama Bank')
                            ->setCellValue('L2', 'Cabang Bank')
                            ->setCellValue('M2', 'No. Rekening')
                            ->setCellValue('N2', 'A.N. Rekening')
                            ->setCellValue('O2', 'No. NPWP')
                            ->setCellValue('P2', 'Status');

                $spreadsheet->getActiveSheet()->mergeCells('A1:O1');
                
                $kolom = 3;
                $nomor = 1;
                foreach($semua_marketing as $marketing) {
        
                        $spreadsheet->setActiveSheetIndex(0)
                                    ->setCellValue('A' . $kolom, $nomor)
                                    ->setCellValue('B' . $kolom, $marketing['kd_marketing'])
                                    ->setCellValue('C' . $kolom, $marketing['nama_marketing'])
                                    ->setCellValue('D' . $kolom, $marketing['nama_lac'])
                                    ->setCellValue('E' . $kolom, " ".$marketing['no_ktp'])
                                    ->setCellValue('F' . $kolom, $marketing['domisili'])
                                    ->setCellValue('G' . $kolom, $marketing['alamat'])
                                    ->setCellValue('H' . $kolom, $marketing['email'])
                                    ->setCellValue('I' . $kolom, " ".$marketing['no_wa'])
                                    ->setCellValue('J' . $kolom, " ".$marketing['no_hp'])
                                    ->setCellValue('K' . $kolom, $marketing['nama_bank'])
                                    ->setCellValue('L' . $kolom, $marketing['cabang_bank'])
                                    ->setCellValue('M' . $kolom, " ".$marketing['no_rek'])
                                    ->setCellValue('N' . $kolom, $marketing['an_rek'])
                                    ->setCellValue('O' . $kolom, " ".$marketing['no_npwp'])
                                    ->setCellValue('P' . $kolom, $marketing['status']);
        
                        $kolom++;
                        $nomor++;
                }

                foreach(range('A','P') as $columnID) {
                    $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                        ->setAutoSize(true);
                }

            } else if($table == "marketing_agency"){
                // $semua_marketing = $this->marketing->get_all_join_table("marketing_agency", "agency", "id_agency", "", "left");
                $this->db->select("kd_marketing, nama_marketing, nama_agency, a.no_ktp, domisili, a.alamat, a.email, a.no_wa, a.no_hp, a.nama_bank, a.cabang_bank, a.no_rek, a.an_rek, a.no_npwp, a.status");
                $this->db->from("marketing_agency as a");
                $this->db->join("agency as b", "a.id_agency = b.id_agency");
                $semua_marketing = $this->db->get()->result_array();
    
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A1', 'LIST MARKETING AGENCY')
                            ->setCellValue('A2', 'No')
                            ->setCellValue('B2', 'KD Marketing')
                            ->setCellValue('C2', 'Nama Marketing')
                            ->setCellValue('D2', 'Nama Agency')
                            ->setCellValue('E2', 'No. KTP')
                            ->setCellValue('F2', 'Domisili')
                            ->setCellValue('G2', 'Alamat')
                            ->setCellValue('H2', 'Email')
                            ->setCellValue('I2', 'No. WA')
                            ->setCellValue('J2', 'No. HP')
                            ->setCellValue('K2', 'Nama Bank')
                            ->setCellValue('L2', 'Cabang Bank')
                            ->setCellValue('M2', 'No. Rekening')
                            ->setCellValue('N2', 'A.N. Rekening')
                            ->setCellValue('O2', 'No. NPWP')
                            ->setCellValue('P2', 'Status');

                $spreadsheet->getActiveSheet()->mergeCells('A1:O1');
                
                $kolom = 3;
                $nomor = 1;
                foreach($semua_marketing as $marketing) {
        
                    $spreadsheet->setActiveSheetIndex(0)
                                ->setCellValue('A' . $kolom, $nomor)
                                ->setCellValue('B' . $kolom, $marketing['kd_marketing'])
                                ->setCellValue('C' . $kolom, $marketing['nama_marketing'])
                                ->setCellValue('D' . $kolom, $marketing['nama_agency'])
                                ->setCellValue('E' . $kolom, " ".$marketing['no_ktp'])
                                ->setCellValue('F' . $kolom, $marketing['domisili'])
                                ->setCellValue('G' . $kolom, $marketing['alamat'])
                                ->setCellValue('H' . $kolom, $marketing['email'])
                                ->setCellValue('I' . $kolom, " ".$marketing['no_wa'])
                                ->setCellValue('J' . $kolom, " ".$marketing['no_hp'])
                                ->setCellValue('K' . $kolom, $marketing['nama_bank'])
                                ->setCellValue('L' . $kolom, $marketing['cabang_bank'])
                                ->setCellValue('M' . $kolom, " ".$marketing['no_rek'])
                                ->setCellValue('N' . $kolom, $marketing['an_rek'])
                                ->setCellValue('O' . $kolom, " ".$marketing['no_npwp'])
                                ->setCellValue('P' . $kolom, $marketing['status']);
    
                    $kolom++;
                    $nomor++;
                }

                foreach(range('A','P') as $columnID) {
                    $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                        ->setAutoSize(true);
                }
            }

            $writer = new Xlsx($spreadsheet);
    
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="data '.$table.'.xlsx"');
            header('Cache-Control: max-age=0');
    
            $writer->save('php://output');
        }
    // excel

    // add 
        public function add_akad(){
            $table = $this->input->post("table");
            $id_marketing = $this->input->post("id_marketing");
            $tgl_akad = $this->input->post("tgl_akad");

            $marketing = $this->Main_model->get_one($table, ["id_marketing" => $id_marketing]);
            
            unset($marketing['tgl_masuk']);
            unset($marketing['status']);

            $this->db->select("CONVERT(no_doc, UNSIGNED INTEGER) AS num");
            $this->db->from("akad_".$table);
            $this->db->where("YEAR(tgl_akad)", date("Y", strtotime($tgl_akad)));
            $this->db->order_by("num", "DESC");
            $data = $this->db->get()->row_array();

            if($data) $no = $data['num']+1;
            else $no = 1;

            if($no > 0 && $no < 10) $no_doc = "00".$no;
            elseif($no >= 10 && $no < 100) $no_doc = "0".$no;
            elseif($no >= 100) $no_doc = $no;

            $marketing['no_doc'] = $no_doc;
            $marketing['tgl_akad'] = $this->input->post("tgl_akad");

            if($table == "marketing_agency") {
                $marketing['periode'] = $this->input->post("periode");
            }

            $data = $this->Main_model->add_data("akad_".$table, $marketing);
            if($data) echo json_encode(1);
            else echo json_encode(0);
        }
    // add

    // get 
        public function get_marketing(){
            $table = $this->input->post("table");
            $id_marketing = $this->input->post("id_marketing");

            $data = $this->Main_model->get_one($table, ["id_marketing" => $id_marketing]);

            echo json_encode($data);
        }

        public function get_akad(){
            $table = $this->input->post("table");
            $id_marketing = $this->input->post("id_marketing");

            $data = [];
            $akad = $this->Main_model->get_all("akad_".$table, ["id_marketing" => $id_marketing]);
            foreach ($akad as $i => $akad) {
                $akad['tahun'] = date('Y', strtotime($akad['tgl_akad']));
                $akad['bulan'] = getRomawi(date('m', strtotime($akad['tgl_akad'])));
                $data[$i] = $akad;

                if($table == "marketing_si"){
                    $data[$i]['doc'] = "{$akad['no_doc']}/SGI/SI-MF/{$akad['bulan']}/{$akad['tahun']}";
                } else if($table == "marketing_agency"){
                    $data[$i]['doc'] = no_doc_marketing_agency($akad['no_doc'], $akad['tgl_akad'], $akad['id_agency']);
                }

                $data[$i]['link'] = md5($akad['id_akad']);
                $data[$i]['tgl_akad'] = $this->Main_model->hari_ini(date("D", strtotime($akad['tgl_akad']))).", ".$this->Main_model->tgl_indo(date('d-m-Y', strtotime($akad['tgl_akad'])));
            }
            echo json_encode($data);
        }
    // get 

    // edit 
        public function edit_marketing(){
            $table = $this->input->post("table");
            $id_marketing = $this->input->post("id_marketing");

            unset($_POST['id_marketing']);
            unset($_POST['table']);

            $data = [];
            foreach ($_POST as $key => $value) {
                $data[$key] = $this->input->post($key);
            }

            $data = $this->Main_model->edit_data($table, ["id_marketing" => $id_marketing], $data);
            if($data){
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }

        public function arsip(){
            $table = $this->input->post("table");
            $id_marketing = $this->input->post("id_marketing");

            $data = $this->Main_model->edit_data($table, ["id_marketing" => $id_marketing], ["status" => "arsip"]);
            if($data){
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }

        public function buka_arsip(){
            $table = $this->input->post("table");
            $id_marketing = $this->input->post("id_marketing");

            $data = $this->Main_model->edit_data($table, ["id_marketing" => $id_marketing], ["status" => "aktif"]);
            if($data){
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }

        

}

/* End of file Marketing.php */
