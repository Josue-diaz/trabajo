<?php

class registro_model extends CI_Model {

    function __construct() {
        parent::__construct();
        #$this->load->database();
    }

    private $table  = 'preregistro' ;

    public function insert($data)
    {
        $isOkey = $this->db->insert($this->table, $data);
        return ($isOkey == true) ? true : false;
    }
    function validaremail($email) {
        $query = $this->db->get_where($this->table, array('correo' => $email));
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}