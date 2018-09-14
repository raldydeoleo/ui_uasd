<?/**
 * @var array $servicios
 * @var array $piezas
 */?>

<div class="col-md-8">

    <div class="panel panel-primary">
            <div class="panel-heading ">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h4 class="panel-title">Crear Tipo Periodo</h4>
            
                <?=form_open(base_url().'tipoperiodos/insertar_tipo_periodo');

//creamos los arrays que compondran nuestro formulario


$descripcion_tipo_periodo = array(
    'name' => 'descripcion_tipo_periodo',
    'id' => 'descripcion_tipo_periodo',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('descripcion_tipo_periodo')
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
    'value' => 'Crear',
    'title' => 'Crear'
);

?>
</div>

<?php
echo form_fieldset('.');
?>

        <div class="panel-body panel-body-nopadding">
            <form class="form-horizontal form-bordered">
               

                <div class="form-group">
                   
                    <div class="col-md-4">
                         <label class="col-sm-12 ">Fecha de Inicio:</label>
                        <div class="input-group col-sm-12">
                            <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>


                    <div class="col-md-5">
                        <?php echo form_label('Descripcion Tipo Periodo: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($descripcion_tipo_periodo); ?>
                        </div>
                    </div>

                  
                    <div class="col-md-3">               
                <a href="#" class="pull-right">
                                <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
                            </a>

                            </div>
                 

                </div>

                <div class="form-group">
                    <div class="col-md-8"> </div>

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