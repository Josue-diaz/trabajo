<div class="container">
    <h2>Tabla Usuarios</h2>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Usuarios</button>
    <table class="table table-hover" id="myTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registro de Perfil</h4>
            </div>
            <div class="modal-body">
                <form class="form-inline" action="">
                    <div class="form-group">
                        <label for="perfil">Nombre del Perfil:</label>
                        <input type="text" class="form-control" id="perfil" name="perfil">
                    </div>
                    <button type="button" class="btn btn-success" id="save"> Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
        </div>

    </div>
</div>

<script type='text/javascript'>
$(document).ready(function() {
    //alert('Hola mundo')
    //console.log('Hola mindo desde una consola')


    $('#save').click(function(e) {
        // evitar lo que pasaría por default
        e.preventDefault();

        //alert($("form").serialize());

        $.ajax({
            url: "<?php echo base_url('Perfiles/registrar') ?>",
            method: 'POST',
            data: $("form").serialize(),
            cache: false,
            //contentType: false,
            //processData: false,
            dataType: 'json',
            success: function(respuesta) {
                // var data = JSON.parse(respuesta);
                $('#myModal').modal('hide');
                $("form")[0].reset();
                console.log(respuesta);

            }
        })

    });

    $('#myTable').DataTable({
            /* "processing": true,
            "serverSide": true,
            "ordering": false,
            "responsive": true,
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5'
            ], */
            "ajax": {
                url: '<?php echo base_url('Perfiles/listar') ?>',
                type: 'POST'
            },
            /* "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ], */
        });

    });
    
</script>