<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') OR exit('No direct script access allowed');

class Agency extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->model('Agency_model', 'agency');

        if(!$this->session->userdata('sharia') && $this->uri->segment(2) != "akad"){
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

    public function upload_bukti(){
        $agency = $this->Main_model->get_all("agency", ["bukti_transfer <>" => ""]);
        foreach ($agency as $agency) {
            $data = [
                "id_agency" => $agency['id_agency'],
                "nama_file" => $agency['bukti_transfer']
            ];

            $this->Main_model->add_data("img_agency", $data);
        }

        echo "selesai";
    }

    public function upload_ktp(){
        $agency = $this->Main_model->get_all("agency", ["foto_ktp <>" => ""]);
        foreach ($agency as $agency) {
            $data = [
                "id_agency" => $agency['id_agency'],
                "nama_file" => $agency['foto_ktp']
            ];

            $this->Main_model->add_data("img_agency", $data);
        }

        echo "selesai";
    }

    public function upload_akad(){
        $agency = $this->Main_model->get_all("agency");

        $i = 1;
        foreach ($agency as $agency) {
            unset($agency['bukti_transfer']);
            unset($agency['foto_ktp']);
            unset($agency['status']);
            unset($agency['akad']);
            unset($agency['hapus']);

            if($i > 0 && $i < 10) $no_doc = "00".$i;
            elseif($i >= 10 && $i < 100) $no_doc = "0".$i;
            elseif($i >= 100) $no_doc = $i;

            // $agency['no_doc'] = $no_doc;
            $data = $agency;

            $this->Main_model->add_data("akad_agency", $data);

            $i++;
        }

        echo "selesai";
    }

    public function akad($id){
        redirect(base_url("akad/member/agency/".md5($id)));
    }

    public function batch($id = ""){
        $batch = $this->Main_model->get_one("batch", ["md5(id_batch)" => $id]);
        $data['dropdown'] = "listBatch";

        if($batch){
            $data['title'] = "List Agency ".$batch['nama_batch'];
            $data['menu'] = "Batch";
            
            // for modal 
            $data['modal'] = ["modal_agency"];
            
            // javascript 
            $data['js'] = [
                "ajax.js",
                "function.js",
                "helper.js",
                "load_data/reload_agency.js",
                "modules/agency.js",
            ];

            $this->load->view("pages/agency", $data);

        } else {
            $data['title'] = "List Batch";
            $data['menu'] = "Batch";

            // for modal 
            $data['modal'] = ["modal_batch"];
            
            // javascript 
            $data['js'] = [
                "ajax.js",
                "function.js",
                "helper.js",
                "load_data/reload_batch.js",
                "modules/batch.js",
            ];

            $this->load->view("pages/batch", $data);
        }
    }

    public function list(){
        $data['dropdown'] = "listAgency";
        $data['title'] = "List Agency";
        $data['menu'] = "Batch";
        
        // for modal 
        $data['modal'] = ["modal_agency"];
        
        // javascript 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "load_data/reload_all_agency.js",
            "modules/agency.js",
        ];

        $this->load->view("pages/all-agency", $data);
    }

    public function konfirmasi(){
        $data['dropdown'] = "listBatchKonfirmasi";

        $data['title'] = "List Konfirmasi Agency";
        $data['menu'] = "Batch";
        
        // for modal 
        $data['modal'] = ["modal_konfirmasi_agency"];
        
        // javascript 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "load_data/reload_konfirmasi_agency.js",
            "modules/konfirmasi_agency.js",
        ];

        $this->load->view("pages/konfirmasi_agency", $data);
    }

    public function loadBatch($rowno=0){
        header('Content-Type: application/json');
        $output = $this->agency->loadBatch();
        echo $output;
    }

    public function loadAgency($id_batch){
        header('Content-Type: application/json');
        $output = $this->agency->loadAgency($id_batch);
        echo $output;
    }

    public function loadAllAgency(){
        header('Content-Type: application/json');
        $output = $this->agency->loadAgency();
        echo $output;
    }

    public function loadAgencyKonfirmasi($rowno=0){
        header('Content-Type: application/json');
        $output = $this->agency->loadAgencyKonfirmasi();
        echo $output;
    }
    
    // pdf 
        public function pdf($id_agency){
            $agency = $this->Main_model->get_one("agency", ["md5(id_agency)" => $id_agency]);
            // require_once __DIR__ . '/vendor/autoload.php';

            // $mpdf = new \Mpdf\Mpdf();
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin_top' => '15', 'margin_left' => '25', 'margin_right' => '25', 'margin_bottom' => '30']);
            // $mpdf->WriteHTML('<h4><div align="center">List Marketing Freelance LAC '.$lac['nama_lac'].'</div></h4>');

            $mpdf->SetTitle("Agency-{$agency['nama_agency']}");
            $mpdf->WriteHTML('
                <table border="1" style="border-collapse:collapse">
                    <thead>
                        <tr height="20">
                            <th colspan="4" style="padding: 10px; border: 0mm solid black;"><center>List Marketing Agency Partner '.$agency['nama_agency'].'</center></th>
                        </tr>
                        <tr>
                            <th style="padding: 5px; width: 5%">No</th>
                            <th style="padding: 5px; width: 65%">Nama Lengkap</th>
                            <th style="padding: 5px; width: 20%">Kode Unik</th>
                            <th style="padding: 5px; width: 10%">Status</th>
                        </tr>
                    </thead>
                    <tbody>');
            
            $marketing = $this->Main_model->get_all("marketing_agency", ["md5(id_agency)" => $id_agency], "nama_marketing");
            
            $i = 1;
            foreach ($marketing as $marketing) {
                $nama = ucwords(strtolower($marketing['nama_marketing']));

                $mpdf->WriteHTML("
                    <tr>
                        <td style='padding: 5px'><center>{$i}</center></td>
                        <td style='padding: 5px'>{$nama}</td>
                        <td style='padding: 5px'><center>{$marketing['kd_marketing']}</center></td>
                        <td style='padding: 5px'><center>{$marketing['status']}</center></td>
                    </tr>");
                
                $i++;
            }
            $mpdf->WriteHTML('
                    </tbody>
                </table>
            ');
            $mpdf->Output("Agency-{$agency['nama_agency']}.pdf", "I");

        }
    // pdf 

    // get 
        public function get_batch(){
            $id_batch = $this->input->post("id_batch");
            $data = $this->Main_model->get_one("batch", ["id_batch" => $id_batch]);
            echo json_encode($data);
        } 

        public function get_agency(){
            $id_agency = $this->input->post("id_agency");
            $data = $this->Main_model->get_one("agency", ["id_agency" => $id_agency]);
            echo json_encode($data);
        }

        public function get_detail_agency(){
            $id_agency = $this->input->post("id_agency");

            $agency = $this->Main_model->get_one("agency", ["id_agency" => $id_agency]);
            $data['agency'] = $agency;
            $data['agency']['link'] = "https://marketing.shariagrupindonesia.co.id/form/marketing/agency/".md5($agency['id_agency']);
            $data['agency']['link1'] = "https://marketing.shariagrupindonesia.co.id/form/marketing/agency/".md5($agency['id_agency'])."/p-3";
            $data['agency']['link2'] = "https://marketing.shariagrupindonesia.co.id/form/marketing/agency/".md5($agency['id_agency'])."/p-6";
            $data['agency']['link3'] = "https://marketing.shariagrupindonesia.co.id/form/marketing/agency/".md5($agency['id_agency'])."/p-12";
            $data['marketing']['total'] = $this->Main_model->get_all("marketing_agency", ["id_agency" => $id_agency]);
            $data['marketing']['aktif'] = $this->Main_model->get_all("marketing_agency", ["id_agency" => $id_agency, "status" => "aktif"], "nama_marketing");
            $data['marketing']['nonaktif'] = $this->Main_model->get_all("marketing_agency", ["id_agency" => $id_agency, "status <>" => "aktif"], "nama_marketing");

            echo json_encode($data);
        }

        public function get_image(){
            $id_agency = $this->input->post("id_agency");

            $data = $this->Main_model->get_all("img_agency", ["id_agency" => $id_agency]);
            echo json_encode($data);
        }

        public function get_akad(){
            $id_agency = $this->input->post("id_agency");

            $akad = $this->Main_model->get_all("akad_agency", ["id_agency" => $id_agency]);
            foreach ($akad as $i => $akad) {
                $batch = $this->Main_model->get_one("batch", ["id_batch" => $akad['id_batch']]);
                $tahun = date('Y', strtotime($akad['tgl_akad']));
                $bulan = getRomawi(date('m', strtotime($akad['tgl_akad'])));
                $data[$i] = $akad;

                if($akad['no_doc'] != ""){
                    // $akad['doc'] = "{$akad['no_doc']}/SGI/SI-AP/B-{$batch['no_batch']}/{$akad['bulan']}/{$akad['tahun']}";
                    $data[$i]['doc'] = "{$akad['no_doc']}/SGI/SI-AP/B-{$batch['no_batch']}/{$bulan}/{$tahun}";
                } else {
                    $data[$i]['doc'] = "";
                }
                
                $data[$i]['link'] = md5($akad['id_akad']);
                $data[$i]['tgl_akad'] = $this->Main_model->hari_ini(date("D", strtotime($akad['tgl_akad']))).", ".$this->Main_model->tgl_indo(date('d-m-Y', strtotime($akad['tgl_akad'])));
            }
            echo json_encode($data);
        }
    // get 

    // add 
        public function add_batch(){
            $data = $this->agency->add_batch();
            echo json_encode($data);
        }

        public function upload_data(){
            if(isset($_FILES['file']['name'])) {

                $id = $this->Main_model->get_one("img_agency", "", "id_img", "DESC");

                $nama_file = $_FILES['file'] ['name']; // Nama Audio
                $size        = $_FILES['file'] ['size'];// Size Audio
                $error       = $_FILES['file'] ['error'];
                $tipe_audio  = $_FILES['file'] ['type']; //tipe audio untuk filter
                $folder      = "./assets/myimg/"; //folder tujuan upload
                $valid       = array('jpg','png','gif','jpeg', 'JPG', 'PNG', 'GIF', 'JPEG'); //Format File yang di ijinkan Masuk ke server
                
                if(strlen($nama_file)){   
                     // Perintah untuk mengecek format gambar
                     list($txt, $ext) = explode(".", $nama_file);
                     if(in_array($ext,$valid)){   

                         // Perintah untuk mengupload file dan memberi nama baru
                        switch ($tipe_audio) {
                            case 'image/jpeg':
                                $tipe_audio = "jpg";
                                break;
                            case 'image/png':
                                $tipe_audio = "png";
                                break;
                            case 'image/gif':
                                $tipe_audio = "gif";
                                break;
                            default:
                                break;
                        }

                         $img_agency = $id['id_img'] + 1 .".".$tipe_audio;

                         $tmp = $_FILES['file']['tmp_name'];
                        
                         
                        if(move_uploaded_file($tmp, $folder.$img_agency)){   
                            $data = [
                                "nama_file" => $img_agency,
                                "id_agency" => $this->input->post("id_agency")
                            ];
                            
                            $this->Main_model->add_data("img_agency", $data);
                            echo json_encode(1);
                            
                        } else { // Jika Audio Gagal Di upload 
                            echo json_encode(0);
                        }
                     } else{ 
                        echo json_encode(2);
                    }
            
                }
                
            }
        }

        public function upload_logo(){
            if(isset($_FILES['file']['name'])) {

                $id = $this->input->post("id_agency");

                $nama_file = $_FILES['file']['name']; // Nama Audio
                $size        = $_FILES['file']['size'];// Size Audio
                $error       = $_FILES['file']['error'];
                $tipe_img  = $_FILES['file']['type']; //tipe audio untuk filter
                $folder      = "./assets/logo/"; //folder tujuan upload
                $valid       = array('png', 'PNG'); //Format File yang di ijinkan Masuk ke server
                
                if(strlen($nama_file)){   
                     // Perintah untuk mengecek format gambar
                     list($txt, $ext) = explode(".", $nama_file);
                     if(in_array($ext,$valid)){   

                         // Perintah untuk mengupload file dan memberi nama baru
                        switch ($tipe_img) {
                            case 'image/jpeg':
                                $tipe_img = "jpg";
                                break;
                            case 'image/png':
                                $tipe_img = "png";
                                break;
                            case 'image/gif':
                                $tipe_img = "gif";
                                break;
                            default:
                                break;
                        }

                         $img_agency = $id.".".$tipe_img;

                         $tmp = $_FILES['file']['tmp_name'];
                        
                         
                        if(move_uploaded_file($tmp, $folder.$img_agency)){
                            echo json_encode(1);
                        } else { // Jika Audio Gagal Di upload 
                            echo json_encode(0);
                        }
                     } else{ 
                        echo json_encode(2);
                    }
            
                }
                
            }
        }

        public function add_akad(){
            $id_agency = $this->input->post("id_agency");
            $waktu = $this->input->post("waktu");
            $tgl_akad = $this->input->post("tgl_akad");

            $agency = $this->Main_model->get_one("agency", ["id_agency" => $id_agency]);
            unset($agency['bukti_transfer']);
            unset($agency['foto_ktp']);
            unset($agency['status']);
            unset($agency['akad']);
            unset($agency['hapus']);

            $this->db->select("CONVERT(no_doc, UNSIGNED INTEGER) AS num");
            $this->db->from("akad_agency");
            // $this->db->where("id_batch", $agency['id_batch']);
            $this->db->where("YEAR(tgl_akad)", date("Y", strtotime($tgl_akad)));
            $this->db->order_by("num", "DESC");
            $data = $this->db->get()->row_array();

            if($data) $no = $data['num']+1;
            else $no = 1;

            if($no > 0 && $no < 10) $no_doc = "00".$no;
            elseif($no >= 10 && $no < 100) $no_doc = "0".$no;
            elseif($no >= 100) $no_doc = $no;

            $agency['no_doc'] = $no_doc;
            $agency['tgl_akad'] = $this->input->post("tgl_akad");
            $agency['waktu'] = $this->input->post("waktu");

            $data = $this->Main_model->add_data("akad_agency", $agency);
            if($data) echo json_encode(1);
            else echo json_encode(0);
        }
    // add 

    // edit 
        public function edit_batch(){
            $data = $this->agency->edit_batch();
            echo json_encode($data);
        }

        public function edit_agency(){
            $id_agency = $this->input->post("id_agency");
            
            unset($_POST['id_agency']);
            $data = $this->Main_model->edit_data("agency", ["id_agency" => $id_agency], $_POST);

            if($data) echo json_encode(1);
            else echo json_encode(0);
        }

        public function change_status_batch(){
            $id_batch = $this->input->post("id_batch");
            $status = $this->input->post("status");

            $data = $this->Main_model->edit_data("batch", ["id_batch" => $id_batch], ["status" => $status]);

            if($data) echo json_encode(1);
            else echo json_encode(0);
        }

        public function konfirmasi_agency(){
            $id_agency = $this->input->post("id_agency");

            $connected = fopen("http://www.google.com:80/","r");
            if($connected){
                $agency = $this->Main_model->get_one("agency", ["id_agency" => $id_agency]);
                unset($agency['bukti_transfer']);
                unset($agency['foto_ktp']);
                unset($agency['status']);
                unset($agency['akad']);
                unset($agency['hapus']);

                $this->db->select("CONVERT(no_doc, UNSIGNED INTEGER) AS num");
                $this->db->from("akad_agency");
                $this->db->where("id_batch", $agency['id_batch']);
                $this->db->order_by("num", "DESC");
                $data = $this->db->get()->row_array();

                if($data) $no = $data['num']+1;
                else $no = 1;

                if($no > 0 && $no < 10) $no_doc = "00".$no;
                elseif($no >= 10 && $no < 100) $no_doc = "0".$no;
                elseif($no >= 100) $no_doc = $no;

                $agency['no_doc'] = $no_doc;

                $id_akad = $this->Main_model->add_data("akad_agency", $agency);

                $this->load->config('email');
                $this->load->library('email');
                
                $email = $agency['email'];
                $from = $this->config->item('smtp_user');

                $to = $email;
                $subject = 'AGENCY PROPERTY MEMBER OF SHARIA GRUP INDONESIA';
                $message = "
                    <p>AGENCY PROPERTY MEMBER OF SHARIA GRUP INDONESIA</p><br>
                    <p>Assalamua'alaikum Warahmatullahi Wabarakatuh</p><br>
                    <p>Selamat!</p>
                    <p>Terima Kasih Telah Mendaftar</p>

                    <table>
                        <tr>
                            <td>Nama Anda</td>
                            <td>: {$agency['nama_pemilik']}</td>
                        </tr>
                        <tr>
                            <td>No. WhatsApp</td>
                            <td>: {$agency['no_wa']}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {$agency['email']}</td>
                        </tr>
                        <tr>
                            <td>URL Akad</td>
                            <td>: " . base_url() . "akad/member/agency/" . md5($id_agency) ."</td>
                        </tr>
                    </table>
                    <br><br><br><br><br>
                    <p>Hormat kami,<br>
                    Sharia Grup Indonesia<br>
                    Recruitment Administrator</p>
                    
                    <p>Jalan Darul Quran Ruko C09-C10,<br>
                    Loji, Bogor Barat, Kota Bogor. 16117</p>";

                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();

                $data = $this->Main_model->edit_data("agency", ["id_agency" => $id_agency], ["status" => "aktif"]);
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }
    // edit 

    // delete
        public function delete_agency(){
            $id_agency = $this->input->post("id_agency");

            $connected = fopen("http://www.google.com:80/","r");
            if($connected){
                $agency = $this->Main_model->get_one("agency", ["id_agency" => $id_agency]);
                
                $this->load->config('email');
                $this->load->library('email');
                
                $email = $agency['email'];
                $from = $this->config->item('smtp_user');

                $to = $email;
                $subject = 'AGENCY PROPERTY MEMBER OF SHARIA GRUP INDONESIA';
                $message = '
                    <p><b>AGENCY PROPERTY MEMBER OF SHARIA GRUP INDONESIA</b></p><br>
                    <p>Assalamua\'alaikum Warahmatullahi Wabarakatuh</p><br>
                    <p>Mohon maaf, setelah meninjau registrasi Anda,
                    saat ini kami tidak dapat menerima Anda untuk bergabung menjadi Agency Property.</p>
                    <p>Kami tidak menyetujui registrasi Anda karena alasan-alasan yang tercantum dibawah ini:</p>
                    <p>1. Data Anda belum terdaftar oleh Admin kami.<br>
                    2. Data Anda telah didaftarkan sebelumnya (Data Ganda).</p><br><br><br><br><br><br><br><br><br><br>
                    <p>Hormat kami,<br>
                    Sharia Grup Indonesia<br>
                    Recruitment Administrator</p>
                    <p>Jalan Darul Quran Ruko C09-C10,<br>
                    Loji, Bogor Barat, Kota Bogor. 16117</p>';

                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();

                $data = $this->Main_model->edit_data("agency", ["id_agency" => $id_agency], ["hapus" => 1]);
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }
    // delete

    // export excel 
    public function export(){
        $spreadsheet = new Spreadsheet;
        // $semua_agency = $this->marketing->get_all_join_table("marketing_agency", "agency", "id_agency", "", "left");
        // $this->db->select("kd_marketing, nama_marketing, nama_agency, a.no_ktp, domisili, a.alamat, a.email, a.no_wa, a.no_hp, a.nama_bank, a.cabang_bank, a.no_rek, a.an_rek, a.no_npwp, a.status");
        $this->db->from("agency as a");
        $semua_agency = $this->db->get()->result_array();

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'LIST AGENCY')
                    ->setCellValue('A2', 'No')
                    ->setCellValue('B2', 'Nama Agency')
                    ->setCellValue('C2', 'KD Agency')
                    ->setCellValue('D2', 'Nama Pemilik')
                    ->setCellValue('E2', 'No. KTP')
                    ->setCellValue('F2', 'Alamat')
                    ->setCellValue('G2', 'Email')
                    ->setCellValue('H2', 'No. WA')
                    ->setCellValue('I2', 'No. HP')
                    ->setCellValue('J2', 'Nama Bank')
                    ->setCellValue('K2', 'Cabang Bank')
                    ->setCellValue('L2', 'No. Rekening')
                    ->setCellValue('M2', 'A.N. Rekening')
                    ->setCellValue('N2', 'No. NPWP')
                    ->setCellValue('O2', 'Status');

        $spreadsheet->getActiveSheet()->mergeCells('A1:O1');
        
        $kolom = 3;
        $nomor = 1;
        foreach($semua_agency as $agency) {

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $nomor)
                        ->setCellValue('B' . $kolom, $agency['nama_agency'])
                        ->setCellValue('C' . $kolom, kode_agency($agency['id_agency'], $agency['id_batch']))
                        ->setCellValue('D' . $kolom, $agency['nama_pemilik'])
                        ->setCellValue('E' . $kolom, " ".$agency['no_ktp'])
                        ->setCellValue('F' . $kolom, $agency['alamat'])
                        ->setCellValue('G' . $kolom, $agency['email'])
                        ->setCellValue('H' . $kolom, " ".$agency['no_wa'])
                        ->setCellValue('I' . $kolom, " ".$agency['no_hp'])
                        ->setCellValue('J' . $kolom, $agency['nama_bank'])
                        ->setCellValue('K' . $kolom, $agency['cabang_bank'])
                        ->setCellValue('L' . $kolom, " ".$agency['no_rek'])
                        ->setCellValue('M' . $kolom, $agency['an_rek'])
                        ->setCellValue('N' . $kolom, " ".$agency['npwp'])
                        ->setCellValue('O' . $kolom, $agency['status']);

            $kolom++;
            $nomor++;
        }

        foreach(range('A','N') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data agency.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

}

/* End of file Agency.php */
