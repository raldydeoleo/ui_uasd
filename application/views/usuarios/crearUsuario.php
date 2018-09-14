<div class="col-md-11">
 <div class="panel panel-default">

    <div class="panel-body">
     <div class="col-md-12">
        <div class="col-md-12">
            <div class="panel-primary">
                <div class="panel-heading">

                    <h4 class="panel-title">Registro de Usuario</h4>
                </div>
            </div>


            <?=form_open(base_url().'usuarios/insertar_usuario');

//creamos los arrays que compondran nuestro formulario

$nombre_usuario = array(
    'name' => 'nombre_usuario',
    'id' => 'nombre_usuario',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('nombre_usuario')
);

$clave_usuario = array(
    'name' => 'clave_usuario',
    'id' => 'clave_usuario',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('clave_usuario')
);

            $email_usuario = array(
                'name' => 'email_usuario',
                'id' => 'email_usuario',
                'class' => 'form-control',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('email_usuario')
            );

//el botón submit de nuestro formulario
$submit = array(
    'name' => 'submit',
    'id' => 'submit',
    'class' => 'form-control',
    'class' => 'btn btn-primary',
    'value' => 'Registrar',
    'title' => 'Registrar'
);

            //el botón cancelar de nuestro formulario
            $cancel = array(
                'name' => 'cancel',
                'id' => 'cancel',
                'class' => 'form-control',
                'class' => 'btn btn-danger',
                'value' => 'Cancelar',
                'title' => 'Cancelar'
            );

?>
<?php
echo form_fieldset('Nuevo usuario');
?>

            <form class="form-horizontal form-bordered">

                <div class="form-group">

                    <div class="col-md-3">
                        <?php echo form_label('Usuario: '); ?>
                        <div class="input-group col-sm-12">
                            <?php echo form_input($nombre_usuario); ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <?php echo form_label('Clave: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($clave_usuario); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <?php echo form_label('Email: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($email_usuario); ?>
                        </div>
                    </div>

                    <div class="col-md-3">               
                        <a href="#" class="pull-right">
                                <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
                            </a>

                            </div>
                  
                    </div>

                    <div class="form-group">
                    <div class="col-md-8">
                               <div> <a class="btn btn-success" href="<?php echo base_url() ?>index.php/usuarios/listaUsuarios"> Ver Listado </a> </div>

                               </div>

                    <div class="col-md-2">
                     <div class="input-group mb15 col-sm-12">
                            <?php echo form_reset($cancel);
                            //nuestro boton submit
                            ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_submit($submit);
                            //nuestro boton submit
                            ?>

                        </div>
                    </div>
                    </div>
                </div>

</form>


    <?php
    echo form_close();
    ?>

<?php
echo form_fieldset_close();
?>
        </div>
    </div>
</div>
</div>


