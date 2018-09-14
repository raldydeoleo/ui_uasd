<?php /** @var  $usuario */?>

    <div class="col-md-8" xmlns="http://www.w3.org/1999/html">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h5 class="panel-title">Vista individual Usuario</h5>
            </div>


                <div class="panel-body" >
        <h1> Usuario :<?php echo $usuario->nombre_usuario ?> <br /> </h1>
        <h1> Clave :<?php /**  echo $usuario->clave_usuario */ ?> <br /></h1>


        <div></div>

         <?php


         $agree = array("name"=>"agree", "value"=>"0",'class'=>'form-control');

         $options = array(
            'id'=>'',
             'class'=>'form-control'

         );
         $shirts_on_sale = array('small', 'large');



         ?>

<?php
                    echo form_fieldset('Informacion del usuario');
                    echo "<div> Email:<?php echo nl2br($usuario->email_usuario) ?> </div>";
                    echo form_fieldset_close();
?>
                    <div class="form-group">
                        <div class="row"></div>
                            <div class="col-md-4">
                                <label>Permiso de usuario</label>

                                <?php echo form_dropdown($options); ?>
                            </div>

                            <div class="col-md-4">
                                <label>Activo</label>
                                <?php echo form_checkbox($agree); ?>

                            </div>
                            <div class="col-md-4">
                                <a class="btn btn-info" href="<?php echo base_url() ?>index.php/usuarios/listaUsuarios"> Volver atrás </a>
                            </div>

                    </div>


        </div>
</div>
</div>