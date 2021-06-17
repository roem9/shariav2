<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Lac extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Main_model');
    }

    public function index(){
        // navbar and sidebar
        $data['menu'] = "Lac";
        $data['title'] = "List LAC";

        // for modal 
        $data['modal'] = ["modal_lac"];
        
        // javascript 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "load_data/reload_lac.js",
            "modules/lac.js",
        ];

        $this->load->view("pages/lac", $data);
    }
    
    public function loadLac(){
        header('Content-Type: application/json');
        $output = $this->lac->loadLac();
        echo $output;
    }
    
    // pdf 
        public function pdf($id_lac){
            $lac = $this->Main_model->get_one("lac", ["md5(id_lac)" => $id_lac]);
            // require_once __DIR__ . '/vendor/autoload.php';

            // $mpdf = new \Mpdf\Mpdf();
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin_top' => '15', 'margin_left' => '25', 'margin_right' => '25', 'margin_bottom' => '30']);
            // $mpdf->WriteHTML('<h4><div align="center">List Marketing Freelance LAC '.$lac['nama_lac'].'</div></h4>');

            $mpdf->SetTitle("LAC-{$lac['nama_lac']}");
            $mpdf->WriteHTML('
                <table border="1" style="border-collapse:collapse">
                    <thead>
                        <tr height="20">
                            <th colspan="4" style="padding: 10px; border: 0mm solid black;"><center>List Marketing Freelance LAC '.$lac['nama_lac'].'</center></th>
                        </tr>
                        <tr>
                            <th style="padding: 5px; width: 5%">No</th>
                            <th style="padding: 5px; width: 65%">Nama Lengkap</th>
                            <th style="padding: 5px; width: 20%">Kode Unik</th>
                            <th style="padding: 5px; width: 10%">Status</th>
                        </tr>
                    </thead>
                    <tbody>');
            
            $marketing = $this->Main_model->get_all("marketing_si", ["md5(id_lac)" => $id_lac], "nama_marketing");
            
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
            $mpdf->Output("LAC-{$lac['nama_lac']}.pdf", "I");
        }
    // pdf 

    // get 
        public function get_detail_lac(){
            $id_lac = $this->input->post("id_lac");

            $lac = $this->Main_model->get_one("lac", ["id_lac" => $id_lac]);
            $data['lac'] = $lac;
            $data['lac']['link'] = "https://marketing.shariagrupindonesia.co.id/form/marketing/si/".md5($lac['id_lac']);
            $data['marketing']['total'] = $this->Main_model->get_all("marketing_si", ["id_lac" => $id_lac]);
            $data['marketing']['aktif'] = $this->Main_model->get_all("marketing_si", ["id_lac" => $id_lac, "status" => "aktif"], "nama_marketing");
            $data['marketing']['nonaktif'] = $this->Main_model->get_all("marketing_si", ["id_lac" => $id_lac, "status <>" => "aktif"], "nama_marketing");

            echo json_encode($data);
        }

        public function get_all(){
            $data = $this->Main_model->get_all("lac", ["status" => "aktif"], "nama_lac");
            echo json_encode($data);
        }
    // get 

    // add 
        public function add_lac(){
            $data = [
                "nama_lac" => $this->input->post("nama_lac"),
                "status" => "aktif"
            ];

            $query = $this->Main_model->add_data("lac", $data);
            if($query)
                echo json_encode(1);
            else 
                echo json_encode(0);
        }
    // add 

    // edit 
        public function edit_lac(){
            $id_lac = $this->input->post("id_lac");

            $data = [
                "nama_lac" => $this->input->post("nama_lac"),
                "status" => $this->input->post("status"),
            ];

            $data = $this->Main_model->edit_data("lac", ["id_lac" => $id_lac], $data);
            if($data){
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }

        public function pindah_lac(){
            $id_lac = $this->input->post('id_lac');
            $id_marketing = $this->input->post('id_marketing');

            foreach ($id_marketing as $id_marketing) {
                $data = $this->Main_model->edit_data("marketing_si", ['id_marketing' => $id_marketing], ["id_lac" => $id_lac]);
            }

            if($data){
                echo json_encode("1");
            } else {
                echo json_encode("0");
            }
        }
        

}

/* End of file Marketing.php */
