<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index(){
        
        redirect(base_url('agency/batch'),'refresh');
        
    }
}

/* End of file Home.php */
