<?php /** @var array $estudiantes */?>

 <div class="panel panel-default">

    <div class="panel-body">

        <div class="col-md-12">
            <div class="panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Seleccion de Asignaturas</h4>
                </div>
            </div>


            <?=form_open(base_url().'clientes/insertar_seleccion');

         
            $fecha_seleccion = array(
                'name' => 'fecha_seleccion',
                'id' => 'fecha_seleccion',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value(date('fecha_seleccion'))
            );
           
            $id_estudiante = array(
                'name' => 'id_estudiante',
                'id' => 'id_estudiante',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '1',
                'style' => 'width:100%',
                'value' => set_value('id_estudiante')
            );

            $id_periodo = array(
                'name' => 'id_periodo',
                'id' => 'id_periodo',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('id_periodo')
            );

          

            $nrc_asignatura = array(
                'name' => 'nrc_asignatura',
                'id' => 'nrc_asignatura',
                'class' => 'form-control',
               // 'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('nrc_asignatura')
            );

            $asignatura1 = array(
                'name' => 'asignatura1',
                'id' => 'asignatura1',
                'class' => 'form-control',
                //'required'=> 'required',                
                'rows' => 7,
                'cols' => 40,
                'value' => set_value('')
            );

         
            $nombre_asignatura = array(
                'name' => 'nombre_asignatura',
                'id' => 'nombre_asignatura',
                'class' => 'form-control',
               // 'required'=> 'required',
               'size' => '50',
               'style' => 'width:100%',
                'value' => set_value('nombre_asignatura')
            );

            $id_asignatura = array(
                'name' => 'id_asignatura',
                'id' => 'id_asignatura',
                'class' => 'form-control',
               // 'required'=> 'required',
               'size' => '50',
               'style' => 'width:100%',
                'value' => set_value('id_asignatura')
            );

            $creditos_asignatura= array(
                '0'=>'seleccione',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' =>'5',
                '6' =>'6'               
            );

            $cr_array = array(
                'name' => 'creditos_asignatura',
                'id' => 'creditos_asignatura',
                'class' => 'form-control',
                // 'required'=> 'required',
                'rows' => 10,
                'cols' => 40,
                'value' => set_value('creditos_asignatura')
               
            );



            $options = array(
                '0'=>'seleccione',
                '1'         => 'SE-01',
                '2'           => 'SE-02',
                '3'         => 'SE-03',
                '4'        => 'SE-04',               
            ); 

            $seccion_seleccion = array(               
                'class'=>'form-control',
                'id' => 'seccion_seleccion',
                'name' =>'seccion_seleccion',
                'class' => 'form-control',
                // 'required'=> 'required',
                'rows' => 10,
                'cols' => 40,
                'value' => set_value('seccion_seleccion') 
            );
        
        
       

            //el cuarto...(campo mensaje)
            $monto_asignatura = array(
                'name' => 'monto_asignatura',
                'id' => 'monto_asignatura',
                'class' => 'form-control',
                //'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'onkeyup' => 'multiplicar();',
                'value' => set_value('monto_asignatura')
            );
          

 
            //Botón cancel formulario cancela creacion  orden de compra
            $cancel = array(
                'name' => 'cancel',
                'id' => 'cancel',
                'class' => 'form-control',
                'class' => 'btn btn-danger',
                'value' => 'Cancelar',
                'title' => 'Cancelar'
            );
            //Botón submit formulario crear orden de compra
            $submit = array(
                'name' => 'submit',
                'id' => 'submit',
                'class' => 'form-control',
                'class' => 'btn btn-primary',
                'value' => 'Seleccionar',
                'title' => 'Seleccionar'
            );

?>
<?php
echo form_fieldset('.');
?>


            <form class="form-horizontal form-bordered" method="post" id="miformulario">

                <div class="form-group">


                        <div class="col-md-2">
                        <?php echo form_label('Período: '); ?>

                        <?php
                        $mysqli =new mysqli("localhost", "root","", "db_uasd");
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
                            <?php echo form_label('Fecha: '); ?>
                            <?php
                            $mañana = mktime(0, 0, 0, date("m") , date("d"), date("Y"));
                            $hoy = date("d-m-Y");
                            
                            echo "<input class='form-control' name='fecha_seleccion' id='fecha_seleccion' readonly value='$hoy' >";

                            ?>
                        </div>

                      
                    
                        <div class="col-md-3">
                        <?php echo form_label('Estudiante: '); ?>
                        <?php
                        $id = $estudiantes->id_estudiante;
                        $mysqli =new mysqli("localhost", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_estudiante, nombre_estudiante, apellido_estudiante FROM estudiantes WHERE id_estudiante=".$id."";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_estudiante'>";

                                    while ($row = $result->fetch_array()){

                                        echo "<option value='$row[0]'>";
                                        echo "$row[1]";
                                        echo " $row[2]" ?>
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

                    
<a href="#" class="pull-right">
            <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
        </a>

                    <div class="col-md-2">
                             
                        </div>

                </div>

                <?php
echo form_fieldset('.');
?>
                    
                </div>


                    <div class="form-group">                           

                        <div class="col-md-6">
                            <?php echo form_label('Asignatura: '); ?>

                        <?php
                        $mysqli =new mysqli("localhost", "root","", "db_uasd");
                        if ($mysqli === false){
                            die("Error: No se establecio la conexion." . mysqli_connect_error());
                        }
                       // $sql='SELECT nombre_asignatura, clave_asignatura, nrc_asignatura, creditos_asignatura FROM asignaturas a, proyecciones b WHERE a.id_asignatura = b.id_asignatura AND b.id_estudiante='.$id.''; 
                        $sql = "SELECT id_asignatura, nombre_asignatura, nrc_asignatura FROM asignaturas";
                        if ($result = $mysqli->query($sql)){
                            if ($result->num_rows > 0){
                                echo "<select class='form-control' name='id_asignatura'  onChange='showUser(this.value)'>";
                                while ($row = $result->fetch_array()){

                                    echo "<option value='$row[0]'>";
                                    //echo "seleccione";
                                    echo $row[0];
                                    echo " - ";
                                    echo  $row[1];
                                    echo " - ";
                                    echo " $row[2]" ?>
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
                                <?php echo form_label('Seccion: '); ?>
                                <div class="input-group mb15 col-sm-12">
                                    <?php  echo form_dropdown('', $options, 'seccion_seleccion',$seccion_seleccion); ?>
                                  
                                </div>
                            </div>

    
                            <div class="col-md-2"> 

                                <?php echo form_reset($cancel);
                                    ?>
                                </div>

                                <div class="col-md-1">
                                <?php echo form_submit($submit);
                                ?>
                                </div>
                           </div>
                  
</form>



<form>

<div class="col-md-4">
<?php /*
                        $id = $estudiantes->id_estudiante;
                        $mysqli =new mysqli("localhost", "root","", "db_uasd");
                        if ($mysqli === false){
                            die("Error: No se establecio la conexion." . mysqli_connect_error());
                        }
                        //$sql='SELECT nombre_asignatura, clave_asignatura, nrc_asignatura, creditos_asignatura FROM asignaturas a, proyecciones b WHERE a.id_asignatura = b.id_asignatura AND b.id_estudiante='.$id.''; 
                        $sql = "SELECT id_asignatura, nombre_asignatura, nrc_asignatura FROM asignaturas";
                        if ($result = $mysqli->query($sql)){
                            if ($result->num_rows > 0){
                                echo "<select class='form-control' name='id_asignatura' onChange='showUser(this.value)'>";
                                while ($row = $result->fetch_array()){

                                    echo "<option value='$row[0]'>";
                                    echo $row[0];
                                    echo " - ";
                                    echo  $row[1];
                                    echo " - ";
                                    echo " $row[2]" ?>
                                    <?php echo "</option> ";

                                }

                            } echo "</select>";
                            $result->close();
                        } else {
                            echo "No se encontraron registros.";
                        }
                        //}
                        $mysqli->close();

                       */ ?> </div>


<div class="col-md-6"> <h2>Proyección del estudiante</h2></div>
<div class="col-md-12">
        <div class="table-responsive">
                      <table class="table table-warning table-hover" id="table1">

                          <thead>
                          <tr role="row">                                                   
                          <th>Nombre Asignatura</th>
                          <th>Clave</th>
                          <th>NRC</th>
                          <th>Creditos</th>        
                          
                          </tr>
                          </thead>
                          <tbody>


                         
     <?php 
$id = $estudiantes->id_estudiante;
$mysqli = new mysqli("localhost", "root","", "db_uasd");
if ($mysqli === false){
    die ("Error: No se establecio la conexion. " . mysqli_connect_error());
}
    $sql='SELECT nombre_asignatura, clave_asignatura, nrc_asignatura, creditos_asignatura FROM asignaturas a, proyecciones b WHERE a.id_asignatura = b.id_asignatura AND b.id_estudiante='.$id.''; 
 


 if ($result = $mysqli->query($sql)){
    if ($result->num_rows >0){
         

        while ($row = $result->fetch_array()){
            echo "<tr>";
            
            echo "<td>";
            echo  $row[0];  
            echo "</td>";

            echo "<td>";
            echo  $row[1];  
            echo "</td>";          

            echo "<td>";
            echo  $row[2];
            echo "</td>";

            echo "<td>";
            echo  $row[3];
            echo "</td>";

            
        }
         echo " </tr>";
         echo " </tbody>";
         echo " </table>";
          
    }
}            

 ?>
                        
                      <!--FINAL TABLA DETALLE NOMINA -->
       
        </div>

        </div>
        <div class="form-group">
            <div class="col-md-8"></div>
            <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                    <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/clientes/"> Volver al listado </a> </div>
                    
                    </div>
            <div class="col-md-12">
    
</form>


                    </div>

                                              

    <?php
    echo form_close();
    ?>

<?php
echo form_fieldset_close();
?>



<script>
function showUser() {
   alert('Seleccione asignatura proyectada para este período.');

}
</script>
