<?php
class Resep_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    public function get_all_resep() {
        $query = $this->db->get('tbl_resep');
        return $query->result();
    }
}
