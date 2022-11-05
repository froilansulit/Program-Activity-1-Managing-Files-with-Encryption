<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class ProductController extends CI_Controller { 

        public function __construct() 
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->data['title'] = "Image Upload";
            $this->load->model('ProductModel');
            $this->product = new ProductModel;
        }

        public function index() {
            $this->load->view('partials/header', $this->data);
            $data['products'] = $this->product->getProducts();
            $this->load->view('products/index', $data);
            $this->load->view('partials/footer');
        }

        public function new() 
        {
            // $data['title'] = "Image Upload";
            $this->load->view('partials/header', $this->data);
            $this->load->view('products/create');
            $this->load->view('partials/footer');
        }

        public function create() {
            $this->form_validation->set_rules('name', 'Product Name', 'required');
            $this->form_validation->set_rules('description', 'Product Description', 'required');
            $this->form_validation->set_rules('price', 'Product Price', 'required');
            
            // $this->form_validation->set_rules('product_image', 'Product Image', 'required');
            
            $originalFilename = $_FILES['product_image']['name'];
            $newName = time()."".str_replace(' ', '-', $originalFilename);
            $config = 
            [
                'upload_path' => './images/',
                'allowed_types' => 'jpg|png',
                'file_name' => $newName,
                'max_size' => 2000,
                // 'max_width' => 1024,
                // 'max_height' => 768
            ];

            $this->load->library('upload', $config);
            
            if ($this->form_validation->run())
            {
                if ( ! $this->upload->do_upload('product_image'))
                {
                    $imageError = array('imageError' => $this->upload->display_errors());
                    $this->load->view('partials/header', $this->data);
                    $this->load->view('products/create', $imageError);
                    $this->load->view('partials/footer');
                }
                else
                {
                    $productFilename = $this->upload->data('file_name');
                    $data = [
                        'name' => $this->input->post('name'),
                        'description' => $this->input->post('description'),
                        'price' => $this->input->post('price'),
                        'product_image' => $productFilename
                    ];
                    $result = $this->product->insertProduct($data);
                    $this->session->set_flashdata('status', 'Product Inserted Successfully');
                    redirect(base_url('products/add'));
                }
            }
            else { $this->new(); }
        }
    }
?>