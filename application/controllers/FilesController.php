<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class FilesController extends CI_Controller { 

        public function __construct() 
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->data['title'] = "File Exlorer";
            $this->load->model('FilesModel');
            $this->files = new FilesModel;
        }

        public function index() {
            $this->load->view('partials/header', $this->data);
            $data['products'] = $this->product->getProducts();
            $this->load->view('products/index', $data);
            $this->load->view('partials/footer');
        }

        public function new() 
        {
            $this->load->view('partials/header', $this->data);
            $this->load->view('file_exlorer/new');
            $this->load->view('partials/footer');
        }

        public function create() {

            $this->form_validation->set_rules('encryption_key', 'Encryption Key', 'trim|required|alpha_numeric');
            $this->form_validation->set_rules('confirm_encryption', 'Confirm Encryption Key', 'trim|required|alpha_numeric|matches[encryption_key]');

            $originalFilename = $_FILES['file_data']['name'];
            $newName = time()."".str_replace(' ', '-', $originalFilename);
            $config = 
            [
                'upload_path' => './file_storage/',
                'allowed_types' => 'jpg|png|txt|pdf',
                'file_name' => $newName,
                'max_size' => 2000,
            ];

            $this->load->library('upload', $config);
            
            if ($this->form_validation->run())
            {
                if ( ! $this->upload->do_upload('file_data'))
                {
                    $fileError = array('fileError' => $this->upload->display_errors());
                    $this->load->view('partials/header', $this->data);
                    $this->load->view('file_exlorer/new', $fileError);
                    $this->load->view('partials/footer');
                }
                else
                {
                    $fileName = $this->upload->data('file_name');
                    $data = [
                        'filename' => $fileName,
                        'encryption_key' => html_escape($this->input->post('encryption_key'))
                    ];
                    $result = $this->files->insertFiles($data);
                    $this->session->set_flashdata('status', 'Files Inserted Successfully');
                    redirect(base_url('files/add'));
                }
            }
            else { $this->new(); }
        }
    }
?>