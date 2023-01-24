<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('id')){
            redirect('Auth');
         }
		$this->load->model('Welcome_model'); //aqui cargamos nuetro modelo
		// include 
		
	}
	

	public function index()
	{
		$this->load->view('view_header');
		$this->load->view('welcome_message');
		$this->load->view('view_footer');
		
	}
	
	public function indexuser(){
		$this->load->view('view_header');
		$this->load->view('view_usuario');
		$this->load->view('view_footer');
	}

	public function listar()
	{
		$data['preregistros'] = $this->Welcome_model->readData();
		$this->load->view('view_header');
		#print_r($this->Welcome_model->readData());
		$this->load->view('view_registro', $data);
		$this->load->view('view_footer');
	}

// 	public function registrar(){
// 		if($this->input->post('rol')=='Administrador'){
// 			$roles=1;
// 		}else{
// 			$roles=2;
// 		}
// 			$datos = array(
// 			'nombre' => strtoupper(trim($this->input->post('nombre'))),
// 			'apaterno' => strtoupper(trim($this->input->post('apaterno'))),
// 			'amaterno' => strtoupper(trim($this->input->post('amaterno'))),
// 			'correo' => trim($this->input->post('email')),
// 			'contrasenia' => password_hash(trim($this->input->post('pwd')), PASSWORD_DEFAULT),
// 			'rol' => intval ($roles));
			
			
// 			if ($this->Welcome_model->validaremail($datos['correo'])){
// 				echo 'el correo ya existe';
// 			}else{
// 				$result = $this->Welcome_model->insert($datos);
// 				if ($result == TRUE){
// 					redirect('Welcome/listar');
// 				}else{
// 					echo 'llamar a soporte';
// 		}
// 	}
// }

	public function actualizar($id)
	{
		$data['preregistro'] = $this->Welcome_model->fetch($id);
	#	var_dump($data);exit();
		$this->load->view('view_header');
		$this->load->view('view_editar', $data);
		$this->load->view('view_footer');
	}
	
	public function eliminar($id){
		$this->Welcome_model->delete($id);
		redirect('Welcome/listar');
		
		
	}

	public function update()
	{
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
			'contrasenia' => trim($this->input->post('pwd')),
			'rol' => intval ($roles));
	

		$id = $this->input->post('id_preregistro');

		$result = $this->Welcome_model->update($id, $datos);
		if ($result == TRUE) {
			redirect('Welcome/listar');
		}else{
			echo 'Contacta a soporte';
		}
	}
}