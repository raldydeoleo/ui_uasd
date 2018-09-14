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
                <h4 class="panel-title">Crear Sección</h4>
            
                <?=form_open(base_url().'secciones/insertar_seccion');


$id_asignatura = array(
    'name' => 'id_asignatura',
    'id' => 'id_asignatura',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('id_asignatura')
);

$id_profesor = array(
    'name' => 'id_profesor',
    'id' => 'id_profesor',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '1',
    'style' => 'width:100%',
    'value' => set_value('id_profesor')
);

$id_aula = array(
    'name' => 'id_aula',
    'id' => 'id_aula',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '1',
    'style' => 'width:100%',
    'value' => set_value('id_aula')
);

$id_horario = array(
    'name' => 'id_horario',
    'id' => 'id_horario',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '1',
    'style' => 'width:100%',
    'value' => set_value('id_horario')
);


$id_perido = array(
    'name' => 'id_perido ',
    'id' => 'id_perido ',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '1',
    'style' => 'width:100%',
    'value' => set_value('id_perido')
);

$nombre_seccion = array(
    'name' => 'nombre_seccion',
    'id' => 'nombre_seccion',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('nombre_seccion')
);



    $cantmax_seccion = array(
    'name' => 'cantmax_seccion',
    'id' => 'cantmax_seccion',
    'class' => 'form-control',
    'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('cantmax_seccion')
);

$lunes_seccion = array(
    'name' => 'lunes_seccion',
    'id' => 'lunes_seccion',
    'class' => 'form-control',
   // 'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('lunes_seccion')
);

$martes_seccion = array(
    'name' => 'martes_seccion',
    'id' => 'martes_seccion',
    'class' => 'form-control',
   // 'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('martes_seccion')
);

$miercoles_seccion = array(
    'name' => 'miercoles_seccion',
    'id' => 'miercoles_seccion',
    'class' => 'form-control',
    //'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('miercoles_seccion')
);

$jueves_seccion = array(
    'name' => 'jueves_seccion',
    'id' => 'jueves_seccion',
    'class' => 'form-control',
    //'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('cantmax_seccion')
);

$viernes_seccion = array(
    'name' => 'viernes_seccion',
    'id' => 'viernes_seccion',
    'class' => 'form-control',
    //'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('viernes_seccion')
);

$sabado_seccion = array(
    'name' => 'sabado_seccion',
    'id' => 'sabado_seccion',
    'class' => 'form-control',
   // 'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('sabado_seccion')
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
    'value' => 'Crear Seccion',
    'title' => 'Crear Seccion'
);

?>
</div>

<?php
echo form_fieldset('Detalle sección');
?>

        <div class="panel-body panel-body-nopadding">
            <form class="form-horizontal form-bordered">
              

                <div class="form-group">
                    <div class="col-md-4">

                    <?php echo form_label('Asignatura: '); ?>
                        <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_asignatura, nombre_asignatura FROM asignaturas";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_asignatura'>";

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


                    <div class="col-md-4">

                    <?php echo form_label('Profesor: '); ?>
                        <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_profesor, nombre_profesor FROM profesores";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_profesor'>";

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


                    <div class="col-md-2">

<?php echo form_label('Aula: '); ?>
    <?php
    $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
        if ($mysqli === false){
            die("Error: No se establecio la conexion." . mysqli_connect_error());
        }
        $sql = "SELECT id_aula, nombre_aula FROM aulas";
        if ($result = $mysqli->query($sql)){
            if ($result->num_rows > 0){
                echo "<select class='form-control' name='id_aula'>";

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

       
                            <div class="col-md-2">               
                                <a href="#" class="pull-right">
                                    <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
                                </a>
                            </div>
</div>
                                 


<div class="form-group">

<div class="col-md-2">

<?php echo form_label('Periodo: '); ?>
    <?php
    $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
        if ($mysqli === false){
            die("Error: No se establecio la conexion." . mysqli_connect_error());
        }
        $sql = "SELECT id_periodo, nombre_periodo FROM periodos";
        if ($result = $mysqli->query($sql)){
            if ($result->num_rows > 0){
                echo "<select class='form-control' name='id_periodo'>";

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
              

                    <div class="col-md-2">
                        <?php echo form_label('Nombre de Sección: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($nombre_seccion); ?>
                        </div>
                    </div>

                    <div class="col-md-2">
                    <?php echo form_label('Cantidad (Max.):'); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($cantmax_seccion); ?>
                        </div>
                       
                    </div>
                   


                </div>       
                
                <?php
echo form_fieldset('Horario de sección');
?>
                 <div class="form-group">

                <div class="col-md-2">
                    <?php echo form_label('Lunes: '); ?>
                    <div class="input-group mb15 col-sm-12">
                        <?php echo form_input($lunes_seccion); ?>
                    </div>
                </div>

                <div class="col-md-2">
                <?php echo form_label('Martes):'); ?>
                    <div class="input-group mb15 col-sm-12">
                        <?php echo form_input($martes_seccion); ?>
                    </div>
                
                </div><div class="col-md-2">
                <?php echo form_label('Miércoles):'); ?>
                    <div class="input-group mb15 col-sm-12">
                        <?php echo form_input($miercoles_seccion); ?>
                    </div>
                
                </div>

                <div class="col-md-2">
                <?php echo form_label('Jueves):'); ?>
                    <div class="input-group mb15 col-sm-12">
                        <?php echo form_input($jueves_seccion); ?>
                    </div>
                
                </div>

                <div class="col-md-2">
                <?php echo form_label('Viernes):'); ?>
                    <div class="input-group mb15 col-sm-12">
                        <?php echo form_input($viernes_seccion); ?>
                    </div>
                
                </div>
                <div class="col-md-2">
                <?php echo form_label('Sábado):'); ?>
                    <div class="input-group mb15 col-sm-12">
                        <?php echo form_input($sabado_seccion); ?>
                    </div>
                
                </div>





                </div>                 




                <div class="form-group">
                    <div class="col-md-4">
                    <label class="col-sm-2 control-label">Nota:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                    </div>


                   
                   
                    <div class="col-md-4"> <a class="btn btn-success" href="<?php echo base_url() ?>index.php/secciones"> Ver listado </a> </div>

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