<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

</head>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Mi Sistema</a>
        </div>
        <ul class="nav navbar-nav">
            <?php if ($this->session->userdata('rol') == 2){?>
            <li class="active"><a href="<?php echo base_url('Welcome/indexuser')?>">Home</a></li>
            <?php } else if ($this->session->userdata('rol') == 1){?>
              <li class="active"><a href="">Home</a></li>
            <?php }?>
            <?php if ($this->session->userdata('rol') == 1){?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Configuraciones
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('Welcome/listar')?>">Usuarios</a></li>
                    <li><a href="<?php echo base_url('Welcome/index')?>">Insertar Regsitro</a></li>
                </ul>
            </li>
            <?php }else if ($this->session->userdata('rol') == 2){?>
            <?php }?>
            <li><a href="#">Page 2</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span
                        class="glyphicon glyphicon-user"></span><?php echo $this->session->userdata('nombre')?></a></li>
            <li><a href="<?php echo base_url('Auth/salir')?>"><span class="glyphicon glyphicon-log-in"></span>
                    logout</a></li>
        </ul>
    </div>
</nav>

<body>