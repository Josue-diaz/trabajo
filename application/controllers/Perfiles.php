<?php

class Perfiles extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Perfiles_model');
    }


    public function index()
    {
        $this->load->view('view_header');
        $this->load->view('view_perfiles');
        $this->load->view('view_footer');
    }


    public function registrar()
    {
        //var_dump($_POST);
        //print_r($_POST);
        //die();
        //exit();

        //echo $this->input->post('perfil');

        
        if ($this->input->post('action') == 'editar') {
            # code...
            $datos = array(
                'nombre_perfil' => trim($this->input->post('perfil'))
            );
            $id  = $this->input->post('id_perfil');
            $response = $this->Perfiles_model->update($id, $datos);
            if ($response == TRUE) {
                # code...
                echo  json_encode("Actualizado correctamente");
            } else {
    
                echo  json_encode("No fue posible realizar el resgistro, conacta a soporte");
            }

        }else{
            $datos = array(
                'nombre_perfil' => trim($this->input->post('perfil'))
            );
            $response = $this->Perfiles_model->insert($datos);
            if ($response == TRUE) {
                # code...
                echo  json_encode("Regitro exitoso");
            } else {
    
                echo  json_encode("No fue posible realizar el resgistro, conacta a soporte");
            }
        }

        
    }

    public function listar()
    {

        $objLista =  $this->Perfiles_model->readData();
        $data = array();

        foreach ($objLista as $key) {
            $botones = '<button type="button" id="'.$key['id_perfil'].'" class="btn btn-info update"><span class="glyphicon glyphicon-pencil"></span> Editar</button>&nbsp&nbsp&nbsp<button type="button" class="btn btn-danger delete" id="'.$key['id_perfil'].'"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>';

            $row = array();
            $row[] = $key['id_perfil'];
            $row[] = $key['nombre_perfil'];
            $row[] = $botones;
            $data[] = $row;
        }
        $result  = array('data' => $data);
        echo json_encode($result);

    }

    public function actualizar()
	{
        $idback =  $this->input->post('idback');
		$data = $this->Perfiles_model->fetch($idback);
        //print_r($data);
        echo json_encode($data);
	}

     public function eliminar(){
        $idback = $this->input->post('idback');
        if ($this->Perfiles_model->verId($idback) == FALSE ){
            $data = $this->Perfiles_model->delete($idback);
            echo json_encode('ELIMINADO');
        }else{
            echo json_encode('LLAVE FORANEA');
        }
    }  
	}
