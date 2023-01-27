<?php

class Prueba extends CI_Controller

    {

        function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            $this->load->view('view_lista');
        }
    }