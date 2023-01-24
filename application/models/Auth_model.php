<?php

class Auth_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    private $table = 'preregistro';

    public function  selectUser($usuario, $password){
        
        //$rstQuery = $this->db->get_where($this->table, array('correo' => $usuario, 'contrasenia' => $password));
      $rstQuery = $this->db->get_where($this->table, array('correo' => $usuario));
      
      if($rstQuery->num_rows() == 1){
        $result = $rstQuery->row_array();

        if(password_verify($password, $result['contrasenia']) == true){
            return $result;
        }else{
            return false;
        }
      }else{
        return false;
      }
    }

    public function logAccess(){

    }

    public function verificaExistencia($usuario){
        $rstQuery = $this->db->get_where($this->table, array('correo' => $usuario));
        if ($rstQuery->num_rows() > 0){
            return  true;
        }else{
            return false;
        }
    }
}