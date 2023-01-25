<?php
if($this->session->flashdata('success')){?>
    <div class="alert alert-success">
        <strong>
            <?php echo $this->session->flashdata('success')?></p>
        </strong>
    </div>
    <?php }
    echo 'Bienvenido a la vista del usuario'
    ?>


