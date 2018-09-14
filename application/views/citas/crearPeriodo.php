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
                <h4 class="panel-title">Crear Periodo</h4>
            
                <?=form_open(base_url().'periodos/insertar_periodo');

//creamos los arrays que compondran nuestro formulario


$nombre_periodo = array(
    'name' => 'nombre_periodo',
    'id' => 'nombre_periodo',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('nombre_periodo')
);

$fechainicio_periodo = array(
    'name' => 'fechainicio_periodo',
    'id' => 'fechainicio_periodo',
    'class' => 'form-control',
    'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('fechainicio_periodo')
);

$fechafinal_periodo = array(
    'name' => 'fechafinal_periodo',
    'id' => 'fechafinal_periodo',
    'class' => 'form-control',
    'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('fechafinal_periodo')
);

$id_tipo_periodo = array(
    'name' => 'id_tipo_periodo',
    'id' => 'id_tipo_periodo',
    'class' => 'form-control',
    'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('id_tipo_periodo')
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
    'value' => 'Crear Periodo',
    'title' => 'Crear Periodo'
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
                         <label class="col-sm-4 ">Fecha de Inicio:</label>
                        <div class="input-group col-sm-6">
                            <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                       <label class="col-sm-4 ">Fecha de Final:</label>
                        <div class="input-group col-sm-6">
                            <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>                    
                    </div>

                <div class="col-md-4">               
                <a href="#" class="pull-right">
                                <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
                            </a>

                            </div>
                 
                       
                </div>

                <div class="form-group">
                   
                   
                    <div class="col-md-5">
                        <?php echo form_label('Nombre de Periodo: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($nombre_periodo); ?>
                        </div>
                    </div>

                    <div class="col-md-5">

                    <?php echo form_label('Tipo de periodo: '); ?>
                        <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_tipo_periodo, descripcion_tipo_periodo FROM tipo_periodos";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_tipo_periodo'>";

                                    while ($row = $result->fetch_array()){

                                        echo "<option value='$row[0]'>";
                                        // echo $row[0];
                                        echo " $row[1]" ?>
                                   <?php echo "</option> ";

                                    }

                                    } echo "</select>";
                                    $result->close();
                                } else {
                                  echo "No se encontraron registros.";
                                  }
                            //}
                            $mysqli->close();

                        ?>
 
 

                    </div>


                </div>

                <div class="form-group">
                   
                   
                    


                <div class="col-md-8"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/periodos/listaPeriodos"> Ver listado </a> </div>         

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