<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class FilesModel extends CI_Model {

        public function insertFiles($data) 
        {
            return $this->db->insert('file_explorer', $data);
        }

        public function getProducts() {
            $query = $this->db->get('products');
            return $query->result();
        }
    }
?>