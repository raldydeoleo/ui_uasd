<?php /** @var array $asignaturas  */?>
 <div class="panel panel-default">

    <div class="panel-body">

        <div class="col-md-12">
            <div class="panel-primary">
                <div class="panel-heading">

 
               
                    <h4 class="panel-title">Registro de Asignatura</h4>
                  
                </div>
            </div>



            <?=form_open(base_url().'asignaturas/insertar_asignatura');

//creamos los arrays que compondran nuestro formulario

$nombre_asignatura = array(
    'name' => 'nombre_asignatura',
    'id' => 'nombre_asignatura',
    'class' => 'form-control',
    //'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('nombre_asignatura') //con esto al procesar el formulario de forma incorrecta quedará guardado el dato que le habíamos puesto
);

//Segundo array(campo nrc)

$nrc_asignatura = array(
    'name' => 'nrc_asignatura',
    'id' => 'nrc_asignatura',
    'class' => 'form-control',
   // 'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('nrc_asignatura')
);

//Tercer array(campo clave)
$clave_asignatura = array(
    'name' => 'clave_asignatura',
    'id' => 'clave_asignatura',
    'class' => 'form-control',
   // 'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('clave_asignatura')
);

//$js = 'onClick="myFuncion()"';
    

$id_carrera = array(
    'name' => 'id_carrera',
    'id' => 'id_carrera',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('id_carrera')
);


$id_profesor = array(
    'name' => 'id_profesor',
    'id' => 'id_profesor',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '100',
    'style' => 'width:100%',
    'value' => set_value('id_profesor')
);


//Cuarto array(campo creditos)
$creditos_asignatura = array(
    'name' => 'creditos_asignatura',
    'id' => 'creditos_asignatura',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('creditos_asignatura')
);

//Quinto array(campo horas practica)
$horasp_asignatura = array(
    'name' => 'horasp_asignatura',
    'id' => 'horasp_asignatura',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('horasp_asignatura') 
);

//Sexto...(campo horas teoria)
$horast_asignatura = array(
    'name' => 'horast_asignatura',
    'id' => 'horast_asignatura',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('horast_asignatura')
);

$js = 'onClick="notificar()"';

//el botón submit de nuestro formulario
$submit = array(
    'name' => 'submit',
    'id' => 'submit',
    'class' => 'form-control',
    'class' => 'btn btn-primary',
    'value' => 'Registrar',
    'title' => 'Registrar',
    //'data-toggle'=>'modal',
    //'data-target'=>'#exampleModal'
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
echo form_fieldset('.');
?>


            <form class="form-horizontal form-bordered">

                <div class="form-group">



                    <div class="col-md-4">
                        <?php echo form_label('Asignatura: '); ?>
                            <?php echo form_input($nombre_asignatura); ?>
                    </div>

                    <div class="col-md-2">
                        <?php echo form_label('Clave: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($clave_asignatura); ?>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <?php echo form_label('NRC: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($nrc_asignatura); ?>

                        </div>
                    </div>

                   
                    <div class="col-md-2">
                        <?php echo form_label('Creditos: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($creditos_asignatura); ?>

                        </div>
                    </div>

                                   
<a href="#" class="pull-right">
            <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
        </a>
                   
        </div>

        <div class="form-group">
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

                    <div class="col-md-4">
                    <?php echo form_label('Carrera: '); ?>
                        <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_carrera, desc_carrera FROM carreras";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_carrera'>";

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

                    <?php echo form_label('Horas de Practica: '); ?>
                    <div class="input-group mb15 col-sm-12">
                        <?php echo form_input($horasp_asignatura); ?>

                    </div>
                    </div>




                    <div class="col-md-2">

                        <?php echo form_label('Horas de Teoría: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($horast_asignatura); ?>

                        </div>
                    </div>
                    </div>                    
                    </div>
                   </div>

               
                   <?php
echo form_fieldset('.');
?>
                   <div class="form-group">
      
               
                </div>
                           <div class="form-group">
                           
        <div class="col-md-8"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
       
                               
                               <div class="col-md-2">

                                    <?php echo form_reset($cancel);?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php 
                                       
                                        echo form_submit($submit,'', $js);
                                        //nuestro boton submit
                                        ?>

                            </div>
                        </div>
                        <?php
echo form_fieldset('.');
?>      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
        </button> -->
                    </div>
</form>

<!-- Modal 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro guardado con exito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Haga click en cerrar para abandonar este diálogo.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!--button type="button" class="btn btn-primary">Save changes</button 
      </div>
    </div>
  </div>
</div>
-->
        

    <?php
    echo form_close();
    ?>
</table>
<?php
echo form_fieldset_close();
?>


       </div>
    </div>
</div>

   <!-- Javascript  jQuery -->
   <script src="<?php  echo base_url() ?>assets/js/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php  echo base_url() ?>assets/js/Push.min.js"></script>
 
<script>
        function notificar(){

        var todo_correcto = true;
        if(document.getElementById('nombre_asignatura').value.length == 0){
            todo_correcto = false;
        alert('Nombre no debe estar vacio');
        exit();
        }else{
            if(document.getElementById('clave_asignatura').value.length == 0){
                todo_correcto = false;
                    alert('clave no debe estar vacio');
                    exit();
                }else{
                    if(document.getElementById('nrc_asignatura').value.length == 0){
                        todo_correcto = false;
                            alert('nrc no debe estar vacio');
                            exit();

                }
                }

                    Push.create("Notificación",{
                            body:'Registro guardado con exito!',
                            icon:'<?php  echo base_url() ?>assets/images/photos/empleado.png',
                            timeout: 4000,
                            onClick: function(){
                                window.location="https://www.youtube.com/";
                                this.close();
                                
                }
            });
        }
    }

</script> 

