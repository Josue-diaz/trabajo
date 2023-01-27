<?php

class practicas extends CI_Controller{

    function __construct(){
        parent::__construct();
        //$this->load->model('');
    }

    public function viewEjemplo(){
        $this->load->view('view_practica');

    }
    public function registrar()
    {
        /* 
        1.- Corresponde al campo en el front
        2.- Dato que se insertara como mensaje de error
        3.- Regla y/o reglas a validar
        */
        $messageData = array('success' => false, 'messages' => array());
        $config = array(
            array(
                'field' => 'nombre', 'label' => 'Nombre',
                'rules' => 'required|trim|max_length[50]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]'
            ),
            array(
                'field' => 'apaterno', 'label' => 'Apellido Paterno',
                'rules' => 'required|trim|max_length[30]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]'
            ),
            array(
                'field' => 'amaterno', 'label' => 'Apellido Materno',
                'rules' => 'required|trim|max_length[30]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]'
            ),
            array(
                'field' => 'email', 'label' => 'Email',
                'rules' => 'required|trim|valid_email|is_unique[preregistro.email]'
            ),
            array(
                'field' => 'pwd', 'label' => 'Contraseña',
                'rules' => 'required|trim|min_length[8]'
            ),
            array(
                'field' => 'pwd2', 'label' => 'Contraseña',
                'rules' => 'required|trim|min_length[8]|matches[pwd]'
            )
        );
        //$this->form_validation->set_rules('nombre', 'nombre', 'required|trim');
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<p class="text-danger" id="message">', '</p>');
        if ($this->form_validation->run() == FALSE) {

            $messageData['success'] = false;
            foreach ($_POST as $key => $value) {
                $messageData['messages'][$key] = form_error($key);
            }
        } else {
            $datos = array(
                'nombre' => trim($this->input->post('nombre')),
                'apaterno' => $this->input->post('apaterno'),
                'amaterno' => $this->input->post('amaterno'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('pwd')
            );
                $messageData['success'] = true;
                $messageData['messages'] = "<div class=\"alert alert-success\"><strong>Registro exitoso!</strong></div>";
        }
        echo json_encode($messageData);
    }
}
