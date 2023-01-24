<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registro extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('registro_model'); //aqui cargamos nuetro modelo
		// include 
		
	}
	

	public function index()
	{
		$this->load->view('view_header');
		$this->load->view('welcome_message');
		$this->load->view('view_footer');
		
	}
    public function registrar(){
		if($this->input->post('rol')=='Administrador'){
			$roles=1;
		}else{
			$roles=2;
		}
			$datos = array(
			'nombre' => strtoupper(trim($this->input->post('nombre'))),
			'apaterno' => strtoupper(trim($this->input->post('apaterno'))),
			'amaterno' => strtoupper(trim($this->input->post('amaterno'))),
			'correo' => trim($this->input->post('email')),
			'contrasenia' => password_hash(trim($this->input->post('pwd')), PASSWORD_DEFAULT),
			'rol' => intval ($roles));
			
			
			if ($this->registro_model->validaremail($datos['correo'])){
				echo 'el correo ya existe';
			}else{
				$result = $this->registro_model->insert($datos);
				if ($result == TRUE){
					redirect('Welcome/listar');
				}else{
					echo 'llamar a soporte';
		}
	}
}
}