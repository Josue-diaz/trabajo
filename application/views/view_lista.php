<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestor Lista Tareas</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="/" class="navbar-brand">Lista de Tareas</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row area-contenido">
            <div class="col-md-2 col-xs-2 col-lg col-sm-2"></div>

            <div class="col-md-8 col-xs-8 col-lg-8 col-sm-8">
                <div class="row area-entrada">
                    <div class="col-md-1"></div>
                    <div class="form-group col-md-9">
                        <input type="text" class="form-control" id="recordatorio"
                        placeholder="Nueva tarea...">
                    </div>
                    <div class="form-group col-md-1">
                        <button class="btn btn-primary" onclick="listaTareas.agregarTareaClick();">Agregar</button>
                    </div>
                    <div class="col-md-1"></div>
                </div>

                <ul class="list-group" id="listaTareas">

                </ul>
            </div>

            <div class="col-md-2 col-xs-2 col-lg-2 col-sm-2"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/script.js') ?>"></script>
</body>

</html>