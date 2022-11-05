<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Main extends CI_Controller { 
        public function index() 
        {
            // $this->load->view('partials/header');
            $data['title'] = "Image Upload";
            $this->load->view('partials/header', $data);
            $this->load->view('main');
            // $this->load->view('partials/footer');
        }
    }
?>