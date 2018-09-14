<?php /** @var array $clientes  */?>
 <div class="panel panel-default">

    <div class="panel-body">

        <div class="col-md-12">
            <div class="panel-primary">
                <div class="panel-heading">

 

                    <h4 class="panel-title">Registro de Estudiante</h4>
                </div>
            </div>



<?=form_open(base_url().'clientes/insertar_estudiante');

//creamos los arrays que compondran nuestro formulario

$id_categoria = array(
    'name' => 'id_categoria',
    'id' => 'id_categoria',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('id_categoria') //con esto al procesar el formulario de forma incorrecta quedará guardado el dato que le habíamos puesto
);

$id_carrera = array(
    'name' => 'id_carrera',
    'id' => 'id_carrera',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('id_carrera') //con esto al procesar el formulario de forma incorrecta quedará guardado el dato que le habíamos puesto
);

$nombre_estudiante = array(
    'name' => 'nombre_estudiante',
    'id' => 'nombre_estudiante',
    'class' => 'form-control',
    'required'=> 'required',
   // 'placeholder'=>'Nombres',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('nombre_estudiante') //con esto al procesar el formulario de forma incorrecta quedará guardado el dato que le habíamos puesto
);

//Segundo array(campo apellido)

$apellido_estudiante = array(
    'name' => 'apellido_estudiante',
    'id' => 'apellido_estudiante',
    'class' => 'form-control',
    'required'=> 'required',
  //  'placeholder'=>'Apellidos',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('apellido_estudiante')
);

//Tercer array(campo empresa)
$empresa_estudiante = array(
    'name' => 'empresa_estudiante',
    'id' => 'empresa_estudiante',
    'class' => 'form-control',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('empresa_estudiante')
);

$fecha_ingreso = array(
    'name' => 'fecha_ingreso',
    'id' => 'datepicker',
    'class' => 'form-control',
   // 'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value(date('fecha_ingreso'))
);

//Cuarto array(campo matricula)
$matricula_estudiante = array(
    'name' => 'matricula_estudiante',
    'id' => 'matricula_estudiante',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('matricula_estudiante')
);

//Quinto array(campo telefono)
$telefono_estudiante = array(
    'name' => 'telefono_estudiante',
    'id' => 'telefono_estudiante',
    'class' => 'form-control',
    'required'=> 'required',
    'placeholder'=>'999-999-9999',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('telefono_estudiante') 
);

//Sexto...(campo direccion)
$direccion_estudiante = array(
    'name' => 'direccion_estudiante',
    'id' => 'direccion_estudiante',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('direccion_estudiante')
);

$options = array(
    '0'=>'seleccione',
    '1'         => 'Santiago de los caballeros',
    '2'           => 'Provincia Espaillat - Moca',
    '3'         => 'San Francisco de Macoris',
    '4'        => 'La vega',               
); 
//Septimo...(campo ciudad)
$id_ciudad = array(
    'name' => 'id_ciudad',
    'id' => 'id_ciudad',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('id_ciudad')
);

            
            $email_estudiante = array(
                'name' => 'email_estudiante',
                'id' => 'email_estudiante',
                'class' => 'form-control',
                'required'=> 'required',
                'type' =>'email',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('email_estudiante')
            );

           
            $js = 'onClick="notificar()"';
            

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
echo form_fieldset('.');
?>


            <form class="form-horizontal form-bordered">

                <div class="form-group">
                               
<a href="#" class="pull-right">
            <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
        </a>



                    <div class="col-md-2">
                        <?php echo form_label('Nombre: '); ?>
                            <?php echo form_input($nombre_estudiante); ?>
                    </div>

                    <div class="col-md-2">
                        <?php echo form_label('Apellido: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($apellido_estudiante); ?>
                        </div>
                    </div>


                    <div class="col-md-2">

                    <?php echo form_label('Matrícula: '); ?>
                    <div class="input-group mb15 col-sm-12">
                        <?php echo form_input($matricula_estudiante); ?>

                    </div>
                    </div>

                    <div class="col-md-2">
                    <?php echo form_label('Categoría Finaciera: '); ?>
                        <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_categoria, descripcion_categoria FROM categoria_financiera";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_categoria'>";

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
                    <div class="input-group mb15 col-sm-12">
                    <?php echo form_input($fecha_ingreso); ?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                </div>


                   
                   
                </div>


                    <div class="form-group">


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



                        <div class="col-md-6">

                            <?php echo form_label('Direccion: '); ?>
                            <div class="input-group mb15 col-sm-12">
                                <?php echo form_input($direccion_estudiante); ?>

                            </div>
                        </div>




                            <div class="col-md-2">

                                <?php echo form_label('Telefono: '); ?>
                                <div class="input-group mb15 col-sm-12">
                                    <?php echo form_input($telefono_estudiante); ?>

                                </div>
                            </div>

                       

                            <div class="col-md-3">
                    <?php echo form_label('Ciudad: '); ?>
                        <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_ciudad, nombre_ciudad FROM ciudades";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_ciudad'>";

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
                       

                        <div class="col-md-3">

                            <?php echo form_label('email: '); ?>
                            <div class="input-group mb15 col-sm-12">
                                <?php echo form_input($email_estudiante); ?>

                            </div>
                        </div>

                        <div class="col-md-5">
                        <?php echo form_label('Empresa donde labora: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($empresa_estudiante); ?>

                        </div>

                         </div>

                     </div>


                     <?php
echo form_fieldset('.');
?>


                           <div class="form-group">
                               <div class="col-md-8">
                               <div> <a class="btn btn-success" href="<?php echo base_url() ?>index.php/clientes/index"> Ver Listado </a> </div>

                               </div>
                               <div class="col-md-2">

                                    <?php echo form_reset($cancel);
                                    //nuestro boton cancelar
                                    ?>
                                </div>
                                <div class="col-md-2">
                                        <?php echo form_submit($submit,'', $js);
                                        //nuestro boton registrar
                                        ?>


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

   <!-- Javascript  jQuery -->
   <script src="<?php  echo base_url() ?>assets/js/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php  echo base_url() ?>assets/js/Push.min.js"></script>
 
<script>
        function notificar(){

        var todo_correcto = true;
        if(document.getElementById('nombre_estudiante').value.length == 0){
            todo_correcto = false;
        alert('Nombre no debe estar vacio');
        exit();
        }else{
            if(document.getElementById('apellido_estudiante').value.length == 0){
                todo_correcto = false;
                    alert('Apellido no debe estar vacio');
                    exit();
                }else{
                    if(document.getElementById('email_estudiante').value.length == 0){
                        todo_correcto = false;
                            alert('email no debe estar vacio');
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
