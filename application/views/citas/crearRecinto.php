<?/**
 * @var array $servicios
 * @var array $piezas
 */?>

<div class="col-md-11">

    <div class="panel panel-primary">
            <div class="panel-heading ">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h4 class="panel-title">Crear Recinto</h4>
            
                <?=form_open(base_url().'recintos/insertar_recinto');

//creamos los arrays que compondran nuestro formulario


$nombre_recinto = array(
    'name' => 'nombre_recinto',
    'id' => 'nombre_recinto',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('nombre_recinto')
);

$cuidad_recinto = array(
    'name' => 'cuidad_recinto',
    'id' => 'cuidad_recinto',
    'class' => 'form-control',
    'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('cuidad_recinto')
);

//Botón cancel formulario cancela creacion
$cancel = array(
    'name' => 'cancel',
    'id' => 'cancel',
    'class' => 'form-control',
    'class' => 'btn btn-danger',
    'value' => 'Cancelar',
    'title' => 'Cancelar'
);
//Botón submit formulario crear
$submit = array(
    'name' => 'submit',
    'id' => 'submit',
    'class' => 'form-control',
    'class' => 'btn btn-primary',
    'value' => 'Crear Recinto',
    'title' => 'Crear Recinto'
);

?>
</div>

<?php
echo form_fieldset('.');
?>

        <div class="panel-body panel-body-nopadding">
            <form class="form-horizontal form-bordered">
              

                <div class="form-group">

                    <div class="col-md-5">
                        <?php echo form_label('Nombre de Recinto: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($nombre_recinto); ?>
                        </div>
                    </div>

                    <div class="col-md-5">
                    <?php echo form_label('Ciudad del Recinto:'); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($cuidad_recinto); ?>
                        </div>
                       
                    </div>

                    <div class="col-md-2">               
                        <a href="#" class="pull-right">
                                        <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
                                    </a>
        
                                    </div>

                </div>

                <div class="form-group">
                <div class="col-md-8"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/recintos/listaRecintos"> Ver listado </a> </div>         


                    <div class="col-md-4"> </div>

                    <div class="col-md-2">
                            <?php echo form_reset($cancel);
                            ?>
                    </div>

                    <div class="col-md-2">
                        <?php echo form_submit($submit);
                        ?>
                    </div>

                    </div>
                    </div>
                   
            </form>

        </div><!-- panel-body -->
    </div>
</div>