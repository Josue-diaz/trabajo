<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-primary">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Crud</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="<?php echo base_url() ?>">Home</a></li>
      <li><a href="<?php echo base_url('welcome/listar') ?>">Listar</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <h2>Lista de registro</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Correo</th>
        <th><center>Acciones</center></th>
      </tr>
    </thead>
    <tbody>
        <?php #var_dump($preregistro); ?>
        <?php foreach($preregistros as $row) { ?>
            <tr>
                <td><?php echo $row['id_preregistro']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apaterno']; ?></td>
                <td><?php echo $row['amaterno']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td><a href="<?php echo base_url('welcome/actualizar').'/'.$row['id_preregistro']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td><a href="<?php echo base_url('welcome/eliminar').'/'.$row['id_preregistro']; ?>"><span class="glyphicon glyphicon-erase"></span></a></td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
