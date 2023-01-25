<?php

class Auth extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index(){
        $this->load->view('view_login');

    }

    public function ingresar(){
    
        $usuario = trim($this->input->post('email'));
        $password = trim($this->input->post('pwd'));

        if ($this->verificarUsuario($usuario) == true)
        {
            $is_session = $this->Auth_model->selectUser($usuario, $password);

            if (!$is_session){
                $this->session->set_flashdata('warning', 'El usuario y/o contraseña no coiciden');
                
                redirect('Auth');
            
        }else{

            $params = array(
                'id' => $is_session['id_preregistro'],
                'nombre' => $is_session['nombre'].'&nbsp'. $is_session['apaterno'].'&nbsp'. $is_session['amaterno'],
                'correo' => $is_session['correo'],
                'rol' => $is_session['rol'],
                'acceso' => true
            );  
                if($params['rol']==1){
                    $datos = array(
                        'id'=> $result['id_preregistro'],
                        'rol'=> $result['rol']
                    );
                    $this->session->set_userdata($datos);
                    $this->session->set_userdata($params);
                    $this->session->set_flashdata('success', 'Bienvenido'.' &nbsp'.$params['nombre']);
                    redirect('registro');
                    
                }else {
                    $datos = array(
                        'id'=> $result['id_preregistro'],
                        'rol'=> $result['rol']
                    );

                    $this->session->set_userdata($datos);
                    $this->session->set_userdata($params);
                    $this->session->set_flashdata('success', 'Bienvenido'.' &nbsp'.$params['nombre']);
                    redirect('welcome/indexuser');
                    
                } 
            
            //$this->session->set_userdata($params);
            //$this->session->set_flashdata('success', 'Bienvenido'.' &nbsp'.$params['nombre']);
            //print_r($is_session);

        } 
        
        }else{
            $this->session->set_flashdata('error', 'el usuario no existe');
            
            redirect('Auth');
            
            //echo 'el usuario no existe';
        }

    }

    public function verificarUsuario($dato){
        return $this->Auth_model->verificaExistencia($dato);
    }

    public function salir(){
        $vars = array('id','correo','nombre','acceso');
        $this->session->unset_userdata($params);
        $this->session->sess_destroy();
        redirect('Auth');
        
    }
}