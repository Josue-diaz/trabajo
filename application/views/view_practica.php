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

    <div class="container">
        <h2> Bienvenido</h3>
            <div class="row">
                <div class="col-sm-4">
                    <form>
                        <input type="text" name="saludo" id="saludo">
                        <button type="button" onclick="saludame()">Envia saludo</button>
                    </form>
                </div>
                <div class="col-sm-8">
                    <span id="mensajes">
                        <div class="alert alert-info">
                            <strong>Hola!</strong> Selecciona un tipo de operación.
                        </div>
                    </span>
                    <br>
                    <form id="formulario">

                        <label class="radio-inline"><input type="radio" id="suma" name="optradio" value="suma">Sumar</label>
                        <label class="radio-inline"><input type="radio" id="resta" name="optradio" value="resta">Restar</label>
                        <label class="radio-inline"><input type="radio" id="multiplica" name="optradio" value="multiplica">Multiplicar</label>
                        <label class="radio-inline"><input type="radio" id="divide" name="optradio" value="divide">dividir</label>

                        <div class="form-group">
                            <label for="numero1">Numero A</label>
                            <input type="number" class="form-control" id="numero1">
                        </div>
                        <div class="form-group">
                            <label for="numero2">Numero B</label>
                            <input type="number" class="form-control" id="numero2">
                        </div>
                        <button type="button" onclick="operaciones()">Calcular</button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <h2>Validando datos</h2>
                    <form id="frmRegistro">
                        <?php echo validation_errors(); ?>
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="apaterno">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="apaterno" name="apaterno">
                        </div>
                        <div class="form-group">
                            <label for="amaterno">Apellido Materno:</label>
                            <input type="text" class="form-control" id="amaterno" name="amaterno">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                        <div class="form-group">
                            <label for="pwd2">Password:</label>
                            <input type="password" class="form-control" id="pwd2" name="pwd2">
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
                <div class="col-sm-6"></div>
            </div>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {

        // tipo de variables que podemos encontrar
        //var, let , cons

        //var saludo  = 'Hola a todos';

        //Esta seria una manera de imprimir una variable y/o resuktado
        //alert(saludo)
        //console.log(saludo)

        //var numero1 = 10;
        //var numero2 = 5;
        //var suma = numero1 + numero2;
        //alert('el valor de la suma es '+suma)

        $('#frmRegistro').on("submit", function(e) {
            e.preventDefault();
            let dataString = $('#frmRegistro').serialize();
            // alert(dataString)
            $.ajax({
                url: "<?php echo base_url('Practicas/registrar') ?>",
                method: 'POST',
                data: dataString,
                success: function(response) {
                    console.log(response)

                    
                }
            })
        });


    });

    function operaciones() {
        var a = parseInt(document.getElementById('numero1').value);
        var b = parseInt(document.getElementById('numero2').value);

        var opcion = $('input:radio[name=optradio]:checked').val();
        if (opcion === 'suma') {
            //alert(a + b);
            suma = a + b;
            document.getElementById("mensajes").innerHTML = '<div class="alert alert-success"><strong>Resultado!</strong> El resultado es: ' + suma + '</div>';
        } else if (opcion === 'resta') {
            //alert( a - b);
            resta = a - b;
            document.getElementById("mensajes").innerHTML = 'el resultado es ' + resta;
        } else if (opcion === 'multiplica') {
            //alert (a * b);
            multiplica = a * b
            document.getElementById("mensajes").innerHTML = 'el resultado es ' + multiplica;
        } else if (opcion === 'divide') {
            //alert(a / b);
            divide = a / b;
            document.getElementById("mensajes").innerHTML = 'el resultado es ' + divide;
        } else {
            return 0;
        }


        setTimeout(function() {
            //$('#mensajes').hide("slow");
            //$('#mensajes > div').removeClass('alert alert-success');
            //$('#mensajes').html('');
            //$("#mensajes").removeAttr("style").none();
            //$("#mensajes").show();
            limpiar()
        }, 2000);



    }

    function limpiar() {
        $('#mensajes').html('<div class="alert alert-info">' +
            '<strong>Hola!</strong> Selecciona un tipo de operación.' +
            '</div>');
        // document.getElementById('numero1').value = "";
        // document.getElementById('numero2').value = "";

        document.getElementById("formulario").reset();

    }

    function saludame() {
        var saludo = document.getElementById("saludo").value;
        alert(saludo);
    }

    function sumar() {
        var a = document.getElementById('numero1').value;
        var b = document.getElementById('numero2').value;
        var suma = parseInt(a) + parseInt(b);
        return alert(suma);
    }
</script>