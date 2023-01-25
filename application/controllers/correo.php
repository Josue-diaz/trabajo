<?php
    class correo extends CI_Controller{

        public function construct(){
            parent::construct();
        } 

        public function index(){
            $this->email->from('je863048@gmail.com','Trabajo de Residencia');
            $this->email->to('je863048@gmail.com');
            $this->email->subject('Prueba de correo');
            $this->email->message('Prueba envio de correo.');
            if($this->email->send()){
                echo "Correo enviado correctamente";
            }else{
                echo "Error al enviar el correo";
            }
        }

    }
?>

