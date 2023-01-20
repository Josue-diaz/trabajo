<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_model'); //aqui cargamos nuetro modelo
		// include 
	}
	

	public function index()
	{
		$this->load->view('welcome_message');
		
	}

	public function listar()
	{
		#print_r($this->Welcome_model->readData());
		$data['preregistros'] = $this->Welcome_model->readData();
		$this->load->view('view_registro', $data);
	}

	public function registrar(){
		#print_r($_POST);
		#var_dump($_POST);

		$datos = array(
			'nombre' => strtoupper(trim($this->input->post('nombre'))),
			'apaterno' => strtoupper(trim($this->input->post('apaterno'))),
			'amaterno' => strtoupper(trim($this->input->post('amaterno'))),
			'correo' => trim($this->input->post('email')),
			'contrasenia' => md5(trim($this->input->post('pwd'))));
			
			if ($this->Welcome_model->validaremail($datos['correo'])){
				echo 'el correo ya existe';
			}else{
				$result = $this->Welcome_model->insert($datos);
				if ($result == TRUE){
					redirect('Welcome/listar');
				}else{
					echo 'llamar a soporte';
		}
	}
}


	public function actualizar($id)
	{
		$data['preregistro'] = $this->Welcome_model->fetch($id);
	#	var_dump($data);exit();
		$this->load->view('view_editar', $data);
	}
	
	public function eliminar($id){
		$this->Welcome_model->delete($id);
		redirect('Welcome/listar');
		
		
	}

	public function update()
	{

		$datos = array(
			'nombre' => strtoupper(trim($this->input->post('nombre'))),
			'apaterno' => strtoupper(trim($this->input->post('apellidop'))),
			'amaterno' => strtoupper(trim($this->input->post('apellidom'))),
			'correo' => trim($this->input->post('email')),
			'contrasenia' => md5(trim($this->input->post('pwd'))));

			$id = $this->input->post('id_preregistro');

		$result = $this->Welcome_model->update($id, $datos);
		if ($result == TRUE) {
			redirect('Welcome/listar');
		}else{
			echo 'Contacta a soporte';
		}
	}
	
}