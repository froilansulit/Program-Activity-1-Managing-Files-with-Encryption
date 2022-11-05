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
            $this->session->sess_destroy();
            $this->load->view('partials/header', $this->data);
            $data['files'] = $this->files->getFiles();
            $this->load->view('file_exlorer/index', $data);
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
                    redirect(base_url('files'));
                }
            }
            else { $this->new(); }
        }

        public function accessFile($data) {
            // $data['id'] = $id;

            $result = $this->files->verifyFile($data);
            // var_dump($result);

            $this->load->view('partials/header', $this->data);
            $this->load->view('file_exlorer/access', $result);
            $this->load->view('partials/footer');
        }

        public function verify() {
            $this->form_validation->set_rules('verify_key', 'Encryption Key', 'trim|required|alpha_numeric');

            if ($this->form_validation->run())
            {
                $encryptionKey = html_escape($this->input->post('verify_key'));
                $id = html_escape($this->input->post('access_id'));
                $result = $this->files->verifyKey($id, $encryptionKey);
                // var_dump($result);

                if($result != NULL) {
                    // $this->session->set_flashdata('success_info', "Information updated successfully!");
                    // redirect('/users/edit');
                    echo "Hello";
                    $this->session->set_userdata('access_granted', TRUE);
                    redirect(base_url('files/show/'.$id));
                }
                else {
                    $this->session->set_flashdata('error', 'Invalid Encryption Key, Please Try again.');
                    redirect(base_url('files/access/'.$id));
                }
            }
            else { 
                $this->accessFile($this->input->post('access_id')); 
            }

        //    echo html_escape($this->input->post('access_id'));
        }

        public function show($id) {

            $isGranted = $this->session->userdata('access_granted');
            if ($isGranted != TRUE) {
                redirect(base_url('files'));
            }
            else {
                $result = $this->files->verifyFile($id);
                $this->load->view('partials/header', $this->data);
                $this->load->view('file_exlorer/show', $result);
                $this->load->view('partials/footer');
            }
        }
    }
?>