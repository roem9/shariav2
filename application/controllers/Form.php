<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Main_model');
        $this->load->model('Si_model');
    }

    public function marketing($tipe, $id, $periode = ""){

        $this->load->helper('myhelper_helper');
        
        $date = date("d-m-Y");
        $data['hari'] = hari_ini(date("D", strtotime($date)));
        $data['tgl'] = tgl_akad(date('j-m-Y', strtotime($date)));
        $data['masa_awal'] = bulan_tahun(date('j-m-Y', strtotime($date)));
        $data['masa_akhir'] = bulan_tahun(date('j-m-Y', strtotime("+1 years", strtotime($date))));
        
        $data['js'] = [
            "modules/other.js"
        ];

        $data['tipe'] = $tipe;

        if($tipe == "si"){
            $data['title'] = "Form Marketing Sharia Institute";
            $lac = $this->Main_model->get_one("lac", ["md5(id_lac)" => $id]);
            if($lac){
                $data['id'] = $id;
                $data['nama'] = $lac['nama_lac'];
                $this->load->view("pages/form_marketing", $data);
            } else {
                $this->load->view("pages/blank", $data);
            }
        } else if($tipe == "agency"){
            if($periode == "p-3" || $periode == "p-6" || $periode == "p-12") {
                $data['periode'] = str_replace("p-", "", $periode);
                
                $data['masa_akhir'] = bulan_tahun(date('j-m-Y', strtotime("+".$data['periode']." months", strtotime($date))));
                $data['title'] = "Form Marketing Agency Partner";
                $agency = $this->Main_model->get_one("agency", ["md5(id_agency)" => $id]);
                if($agency){
                    $data['id'] = $id;
                    $data['nama'] = $agency['nama_agency'];
                    $data['agency'] = $agency;
                    $this->load->view("pages/form_marketing_agency", $data);
                } else {
                    $data['title'] = "Link Error";
                    $this->load->view("pages/blank", $data);
                }
            } else {
                $data['title'] = "Link Error";
                $this->load->view("pages/blank", $data);
            }
        }
    }

    public function agency($id){

        $this->load->helper('myhelper_helper');

        $data['js'] = [
            "modules/other.js"
        ];
        
        $batch = $this->Main_model->get_one("batch", ["md5(id_batch)" => $id, "status" => 1]);
        
        if($batch){
            // $date = $batch['tgl_batch'];
            $date = date("Y-m-d");
            $data['hari'] = hari_ini(date("D", strtotime($date)));
            $data['tgl'] = tgl_akad(date('j-m-Y', strtotime($date)));
            $data['masa_awal'] = bulan_tahun(date('j-m-Y', strtotime($date)));
            $data['masa_akhir'] = bulan_tahun(date('j-m-Y', strtotime("+1 years", strtotime($date))));
            $data['title'] = "Form Data Agency ".$batch['nama_batch'];
            $data['id'] = $id;
            // $data['tgl_batch'] = tgl_indo(date("d-m-Y", strtotime($batch['tgl_batch'])));
            $data['tgl_batch'] = tgl_indo(date("d-m-Y", strtotime($date)));
            $data['nama_batch'] = $batch['nama_batch'];
            $this->load->view("pages/form_agency", $data);
        } else {
            $data['title'] = "Link Error";
            $this->load->view("pages/blank", $data);
        }
    }

    public function check_data_agency(){
        $email = $this->input->post("email");
        $no_hp = $this->input->post("no_hp");
        $no_wa = $this->input->post("no_wa");

        $cek_email = $this->Main_model->get_one("agency", ["email" => $email]);
        if($cek_email) {
            echo json_encode("Maaf, Email Anda telah digunakan");
            exit();
        }

        $cek_no_hp = $this->Main_model->get_one("agency", ["no_hp" => $no_hp]);
        if($cek_no_hp) {
            echo json_encode("Maaf, No. Handphone Anda telah digunakan");
            exit();
        }
        
        $cek_no_wa = $this->Main_model->get_one("agency", ["no_wa" => $no_wa]);
        if($cek_no_wa) {
            echo json_encode("Maaf, No. Whatsapp Anda telah digunakan");
            exit();
        }
    }

    public function check_data(){
        $email = $this->input->post("email");
        $no_hp = $this->input->post("no_hp");
        $no_wa = $this->input->post("no_wa");

        $cek_email = $this->Main_model->get_one("marketing_si", ["email" => $email]);
        if($cek_email) {
            echo json_encode("Maaf, Email Anda telah digunakan");
            exit();
        } else {
            $cek_email = $this->Main_model->get_one("marketing_agency", ["email" => $email]);
            if($cek_email){
                echo json_encode("Maaf, Email Anda telah digunakan");
                exit();
            }
        }

        $cek_no_hp = $this->Main_model->get_one("marketing_si", ["no_hp" => $no_hp]);
        if($cek_no_hp) {
            echo json_encode("Maaf, No. Handphone Anda telah digunakan");
            exit();
        } else {
            $cek_no_hp = $this->Main_model->get_one("marketing_agency", ["no_hp" => $no_hp]);
            if($cek_no_hp){
                echo json_encode("Maaf, No. Handphone Anda telah digunakan");
                exit();
            }
        }
        
        $cek_no_wa = $this->Main_model->get_one("marketing_si", ["no_wa" => $no_wa]);
        if($cek_no_wa) {
            echo json_encode("Maaf, No. Whatsapp Anda telah digunakan");
            exit();
        } else {
            $cek_no_wa = $this->Main_model->get_one("marketing_agency", ["no_wa" => $no_wa]);
            if($cek_no_wa){
                echo json_encode("Maaf, No. Whatsapp Anda telah digunakan");
                exit();
            }
        }
    }

    public function add_marketing(){
        $tipe = $this->input->post("tipe");
        $id = $this->input->post("id");

        $connected = fopen("http://www.google.com:80/","r");
        if($connected){
            if($tipe == "si") {
                unset($_POST['tipe']);
                $lac = $this->Main_model->get_one("lac", ["md5(id_lac)" => $id]);
                if($lac) {
                    $kd_marketing = $this->Si_model->getKdMarketingSi();
    
                    $alamat = ucwords($this->input->post("alamat", true));
                    $rt = ucwords($this->input->post("rt", true));
                    $rw = ucwords($this->input->post("rw", true));
                    $kel_desa = $this->input->post("kel_desa", true);
                    $kel = ucwords($this->input->post("kel", true));
                    $kec = ucwords($this->input->post("kec", true));
                    $kab_kota = ucwords($this->input->post("kab_kota", true));
                    $provinsi = ucwords($this->input->post("provinsi", true));
    
                    $alamat_lengkap = $alamat . ' RT. ' . $rt . ' / RW. ' . $rw . ', ' . $kel_desa . ' ' . $kel . ', Kec. ' . $kec . ' - ' . $kab_kota . ' Provinsi ' . $provinsi;
    
                    $data = [
                        "kd_marketing" => $kd_marketing,
                        "alamat" => $this->input->post("alamat"),
                        "an_rek" => $this->input->post("an_rek"),
                        "nama_bank" => $this->input->post("nama_bank"),
                        "cabang_bank" => $this->input->post("cabang_bank"),
                        "email" => $this->input->post("email"),
                        "domisili" => $this->input->post("domisili"),
                        "no_ktp" => $this->input->post("no_ktp"),
                        "id_lac" => $lac['id_lac'],
                        "alamat" => $alamat_lengkap,
                        "nama_marketing" => $this->input->post("nama"),
                        "no_hp" => $this->input->post("no_hp"),
                        "no_rek" => $this->input->post("no_rek"),
                        "no_wa" => $this->input->post("no_wa"),
                        "no_npwp" => $this->input->post("npwp"),
                        "t4_lahir" => $this->input->post("t4_lahir"),
                        "tgl_lahir" => $this->input->post("tgl_lahir"),
                        "tgl_masuk" => $this->input->post("tgl_masuk"),
                    ]; 
    
                    $id = $this->Main_model->add_data("marketing_si", $data);
                    $data['id_marketing'] = $id;

                    // tambah data ke akad 
                    unset($data['tgl_masuk']);
                    $data['tgl_akad'] = date("Y-m-d");
                    $this->db->select("CONVERT(no_doc, UNSIGNED INTEGER) AS num");
                    $this->db->from("akad_marketing_si");
                    $this->db->where("YEAR(tgl_input)", date('Y'));
                    $this->db->order_by("num", "DESC");
                    $doc = $this->db->get()->row_array();

                    if($doc) $no = $doc['num']+1;
                    else $no = 1;

                    if($no > 0 && $no < 10) $no_doc = "00".$no;
                    elseif($no >= 10 && $no < 100) $no_doc = "0".$no;
                    elseif($no >= 100) $no_doc = $no;
                    $data['no_doc'] = $no_doc;
                    $this->Main_model->add_data("akad_marketing_si", $data);


                    $this->load->config('email');
                    $this->load->library('email');
                    
                    $email = $this->input->post("email", TRUE);
                    $from = $this->config->item('smtp_user');
    
                    $to = $email;
                    $subject = 'AGENCY PROPERTY MEMBER OF SHARIA GRUP INDONESIA';
                    $message = "
                    Terima kasih untuk Anda atas registrasi untuk Kode Unik Marketing<br><br>
                    Anda telah terdaftar dengan Nomor Kode Unik Marketing (KUM) : {$kd_marketing} <br><br>
                    Dan tergabung dalam Team Agency Sharia Institute Member of Sharia Grup Indonesia<br><br>
                    Silahkan disimpan dengan baik dan diingat untuk Kode Unik Marketingnya<br><br>
                    Kode Unik Marketing ini digunakan dengan baik dan bijak,<br><br>
                    PERHATIAN! : KODE UNIK MARKETING INI BERLAKU HANYA DI DALAM NAUNGAN TEAM MEMBER OF SHARIA GRUP INDONESIA<br><br>
                    Silahkan mengakses link akad Anda melalui link ini : " . base_url() . "akad/member/marketingsi/" . md5($id) ."<br><br>
                    Terima Kasih banyak, kami do'akan selalu Anda makin closing rutin property setiap bulan dari satuan hingga puluhan unit, makin kaya berkah melimpah serta selalu bersyukur kepada Allah<br><br>
                    Aamiin...<br><br>
                    Akhirul Kalam,<br><br>
                    Jazakumullah Khair<br><br>
                    Sharia Grup Indonesia,<br><br>
                    Menjadi Perusahaan Berbasis Syariah No Satu di Indonesia";
    
                    $this->email->set_newline("\r\n");
                    $this->email->from($from);
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    $this->email->send();
                }
            }
            else {
                $table = "marketing_agency";
                
                unset($_POST['tipe']);
                $agency = $this->Main_model->get_one("agency", ["md5(id_agency)" => $id]);
                if($agency) {
                    $kd_marketing = $this->Si_model->getKdMarketingAgency();
    
                    $alamat = ucwords($this->input->post("alamat", true));
                    $rt = ucwords($this->input->post("rt", true));
                    $rw = ucwords($this->input->post("rw", true));
                    $kel_desa = $this->input->post("kel_desa", true);
                    $kel = ucwords($this->input->post("kel", true));
                    $kec = ucwords($this->input->post("kec", true));
                    $kab_kota = ucwords($this->input->post("kab_kota", true));
                    $provinsi = ucwords($this->input->post("provinsi", true));
    
                    $alamat_lengkap = $alamat . ' RT. ' . $rt . ' / RW. ' . $rw . ', ' . $kel_desa . ' ' . $kel . ', Kec. ' . $kec . ' - ' . $kab_kota . ' Provinsi ' . $provinsi;
    
                    $data = [
                        "kd_marketing" => $kd_marketing,
                        "alamat" => $this->input->post("alamat"),
                        "an_rek" => $this->input->post("an_rek"),
                        "nama_bank" => $this->input->post("nama_bank"),
                        "cabang_bank" => $this->input->post("cabang_bank"),
                        "email" => $this->input->post("email"),
                        "domisili" => $this->input->post("domisili"),
                        "no_ktp" => $this->input->post("no_ktp"),
                        "id_agency" => $agency['id_agency'],
                        "alamat" => $alamat_lengkap,
                        "nama_marketing" => $this->input->post("nama"),
                        "no_hp" => $this->input->post("no_hp"),
                        "no_rek" => $this->input->post("no_rek"),
                        "no_wa" => $this->input->post("no_wa"),
                        "no_npwp" => $this->input->post("npwp"),
                        "t4_lahir" => $this->input->post("t4_lahir"),
                        "tgl_lahir" => $this->input->post("tgl_lahir"),
                        "tgl_masuk" => $this->input->post("tgl_masuk"),
                    ]; 
    
                    $id = $this->Main_model->add_data("marketing_agency", $data);
                    $data['id_marketing'] = $id;

                    // tambah data ke akad 
                    unset($data['tgl_masuk']);
                    $data['tgl_akad'] = date("Y-m-d");
                    $this->db->select("CONVERT(no_doc, UNSIGNED INTEGER) AS num");
                    $this->db->from("akad_marketing_agency");
                    $this->db->where("YEAR(tgl_input)", date('Y'));
                    $this->db->order_by("num", "DESC");
                    $doc = $this->db->get()->row_array();

                    if($doc) $no = $doc['num']+1;
                    else $no = 1;

                    if($no > 0 && $no < 10) $no_doc = "00".$no;
                    elseif($no >= 10 && $no < 100) $no_doc = "0".$no;
                    elseif($no >= 100) $no_doc = $no;
                    $data['no_doc'] = $no_doc;

                    $data['periode'] = $this->input->post("periode");
                    
                    $this->Main_model->add_data("akad_marketing_agency", $data);


                    $this->load->config('email');
                    $this->load->library('email');
                    
                    $email = $this->input->post("email", TRUE);
                    $from = $this->config->item('smtp_user');
    
                    $to = $email;
                    $subject = 'AGENCY PROPERTY MEMBER OF SHARIA GRUP INDONESIA';
                    $message = "
                    Terima kasih untuk Anda atas registrasi untuk Kode Unik Marketing<br><br>
                    Anda telah terdaftar dengan Nomor Kode Unik Marketing (KUM) : {$kd_marketing} <br><br>
                    Dan tergabung dalam Team Agency {$agency['nama_agency']} Member of Sharia Grup Indonesia<br><br>
                    Silahkan disimpan dengan baik dan diingat untuk Kode Unik Marketingnya<br><br>
                    Kode Unik Marketing ini digunakan dengan baik dan bijak,<br><br>
                    PERHATIAN! : KODE UNIK MARKETING INI BERLAKU HANYA DI DALAM NAUNGAN TEAM MEMBER OF SHARIA GRUP INDONESIA<br><br>
                    Silahkan mengakses link akad Anda melalui link ini : " . base_url() . "akad/member/marketingagency/" . md5($id) ."<br><br>
                    Terima Kasih banyak, kami do'akan selalu Anda makin closing rutin property setiap bulan dari satuan hingga puluhan unit, makin kaya berkah melimpah serta selalu bersyukur kepada Allah<br><br>
                    Aamiin...<br><br>
                    Akhirul Kalam,<br><br>
                    Jazakumullah Khair<br><br>
                    Sharia Grup Indonesia,<br><br>
                    Menjadi Perusahaan Berbasis Syariah No Satu di Indonesia";
    
                    $this->email->set_newline("\r\n");
                    $this->email->from($from);
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    $this->email->send();
                }
            }

            $this->session->set_flashdata('msg', '
                <div class="alert alert-important alert-success alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <svg width="24" height="24" class="alert-icon">
                                <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-check" />
                            </svg>
                        </div>
                        <div>
                            Berhasil mendaftarkan data marketing Anda. Silahkan mengecek inbox atau spam pada email Anda untuk mendapatkan kode marketing
                        </div>
                    </div>
                    <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                </div>');

        } else {
            $this->session->set_flashdata('msg', '
            <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <svg width="24" height="24" class="alert-icon">
                            <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-alert-circle" />
                        </svg>
                    </div>
                    <div>
                        Gagal mendaftarkan data marketing
                    </div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function add_agency(){
        $id = $this->input->post("id");
        
        $connected = fopen("http://www.google.com:80/","r");
        if($connected){
            $batch = $this->Main_model->get_one("batch", ["md5(id_batch)" => $id]);
            if($batch) {
                $alamat = ucwords($this->input->post("alamat", true));
                $rt = ucwords($this->input->post("rt", true));
                $rw = ucwords($this->input->post("rw", true));
                $kel_desa = $this->input->post("kel_desa", true);
                $kel = ucwords($this->input->post("kel", true));
                $kec = ucwords($this->input->post("kec", true));
                $kab_kota = ucwords($this->input->post("kab_kota", true));
                $provinsi = ucwords($this->input->post("provinsi", true));

                $alamat_lengkap = $alamat . ' RT. ' . $rt . ' / RW. ' . $rw . ', ' . $kel_desa . ' ' . $kel . ', Kec. ' . $kec . ' - ' . $kab_kota . ' Provinsi ' . $provinsi;

                $data = [
                    "nama_agency" => $this->input->post("nama_agency"),
                    "nama_pemilik" => $this->input->post("nama_pemilik"),
                    "email" => $this->input->post("email"),
                    "no_wa" => $this->input->post("no_wa"),
                    "no_hp" => $this->input->post("no_hp"),
                    "no_ktp" => $this->input->post("no_ktp"),
                    "alamat" => $alamat_lengkap,
                    "nama_bank" => $this->input->post("nama_bank"),
                    "cabang_bank" => $this->input->post("cabang_bank"),
                    "no_rek" => $this->input->post("no_rek"),
                    "an_rek" => $this->input->post("an_rek"),
                    "npwp" => $this->input->post("npwp"),
                    "tgl_akad" => $batch['tgl_batch'],
                    "id_batch" => $batch['id_batch'],
                    "status" => "konfirm"
                ]; 

                $id_agency = $this->Main_model->add_data("agency", $data);

                $file = reArrayFiles($_FILES['file']);
                foreach ($file as $i => $file) {
                    $id_img = $this->Main_model->get_one("img_agency", "", "id_img", "DESC");
    
                    $nama_file   = $file['name']; // Nama Audio
                    $size        = $file['size'];// Size Audio
                    $error       = $file['error'];
                    $tipe_audio  = $file['type']; //tipe audio untuk filter
                    $folder      = "./assets/myimg/"; //folder tujuan upload
                    $valid       = array('jpg','png','jpeg', 'JPG', 'PNG', 'JPEG'); //Format File yang di ijinkan Masuk ke server
                    
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
    
                            $img_agency = $id_img['id_img'] + 1 .".".$tipe_audio;
    
                            $tmp = $file['tmp_name'];
                            if(move_uploaded_file($tmp, $folder.$img_agency)){
                                $data = [
                                    "nama_file" => $img_agency,
                                    "id_agency" => $id_agency
                                ];
                                    
                                $this->Main_model->add_data("img_agency", $data);
                            }
                        }
                    }
                }

                $this->load->config('email');
                $this->load->library('email');
                
                $email = $this->input->post("email", TRUE);
                $from = $this->config->item('smtp_user');

                $to = $email;
                $subject = 'AGENCY PROPERTY SHARIA GRUP INDONESIA';
                $message = '            
                            <p><b>SELAMAT DATANG DI SHARIA GRUP INDONESIA</b></p><br>
                            <p>Assalamua\'alaikum Warahmatullahi Wabarakatuh</p><br>
                            <p>Terima kasih sudah melakukan registrasi di Agency Property Member of Sharia Grup Indonesia.</p>
                            <p>Permintaan Anda telah dikirimkan ke sistem kami.</p> 
                            <p>Anda akan menerima email konfirmasi ketika registrasi Anda telah disetujui.</p>
                            <p>Silahkan menunggu konfirmasi selanjutnya selama 2 x 24 Jam.</p><br><br><br><br><br>
                            
                            <p>Hormat kami, </p>
                            <p>Sharia Grup Indonesia<br>
                            Recruitment Administrator</p>
                            <p>Jalan Darul Quran Ruko C09-C10,<br>
                            Loji, Bogor Barat, Kota Bogor. 16117</p>';

                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();                    
            }

            $this->session->set_flashdata('msg', '
                <div class="alert alert-important alert-success alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <svg width="24" height="24" class="alert-icon">
                                <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-check" />
                            </svg>
                        </div>
                        <div>
                            Berhasil mendaftarkan data Anda. Silahkan mengecek inbox atau spam pada email Anda untuk mendapatkan pemberitahuan dari Admin kami.
                        </div>
                    </div>
                    <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                </div>');

        } else {
            $this->session->set_flashdata('msg', '
            <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <svg width="24" height="24" class="alert-icon">
                            <use xlink:href="'.base_url().'assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-alert-circle" />
                        </svg>
                    </div>
                    <div>
                        Gagal mendaftarkan data Anda
                    </div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function send_email(){
        $this->load->config('email');
        $this->load->library('email');
        $email = "muhammadrum04@gmail.com";
        $from = $this->config->item('smtp_user');
        $this->email->from($from);
        $this->email->to($email);

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $data = $this->email->send();

        var_dump($data);
    }
}

/* End of file Akad.php */