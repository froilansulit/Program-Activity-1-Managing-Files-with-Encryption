<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class FilesModel extends CI_Model {

        function insertFiles($data) 
        {
            return $this->db->insert('file_explorer', $data);
        }

        function getFiles() {
            $query = $this->db->get('file_explorer');
            return $query->result();
        }

        function verifyFile($data)
        {
            return $this->db->query("SELECT * FROM file_explorer WHERE id = ?", array($data))->row_array();
        }

        function verifyKey($id, $encryptionKey)
        {
            // return $this->db->query("SELECT * FROM file_explorer WHERE id = ?", array($data))->row_array();

            return $this->db->query("SELECT * FROM file_explorer WHERE id = ? AND encryption_key = ?", array($id, $encryptionKey))->row_array();
        }
    }
?>