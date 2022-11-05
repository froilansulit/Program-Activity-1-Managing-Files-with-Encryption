<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class ProductModel extends CI_Model {

        public function insertProduct($data) 
        {
            return $this->db->insert('products', $data);
        }

        public function getProducts() {
            $query = $this->db->get('products');
            return $query->result();
        }
    }
?>