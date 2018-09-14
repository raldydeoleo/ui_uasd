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
                <h4 class="panel-title">Crear Horario</h4>
            
                <?=form_open(base_url().'horarios/insertar_horario');

//creamos los arrays que compondran nuestro formulario


$dias_horario = array(
    'name' => 'dias_horario',
    'id' => 'dias_horario',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('dias_horario')
);

$horainicio_horario = array(
    'name' => 'horainicio_horario',
    'id' => 'horainicio_horario',
    'class' => 'form-control',
    'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('horainicio_horario')
);

$horafinal_horario = array(
    'name' => 'horafinal_horario',
    'id' => 'horafinal_horario',
    'class' => 'form-control',
    'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('horafinal_horario')
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
    'value' => 'Crear Horario',
    'title' => 'Crear Horario'
);

?>
</div>

<?php
echo form_fieldset('.');
?>

        <div class="panel-body panel-body-nopadding">
            <form class="form-horizontal form-bordered">
                <div class="form-group">
                <div class="col-md-2">               
                <a href="#" class="pull-left">
                                <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
                            </a>

                            </div>
                 
                 
                       
               
                   
                    <div class="col-md-3">
                       <?php echo form_label('Hora  Inicio: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($horainicio_horario); ?>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                   </div>
                            
                    
                    <div class="col-md-3">
                        <?php echo form_label('Hora  Final: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($horafinal_horario); ?>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
     
                   </div>    

                     <div class="col-md-4">
                        <?php echo form_label('Dia(s): '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($dias_horario); ?>
                        </div>
                    </div>                
              </div>
 


                    <div class="form-group">

                    <div class="col-md-8">   </div>
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




        </div>
                   
            </form>

        </div><!-- panel-body -->
    </div>
</div>