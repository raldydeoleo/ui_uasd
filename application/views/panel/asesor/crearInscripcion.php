<?php /** @var array $proveedores */?>

 <div class="panel panel-default">

    <div class="panel-body">

        <div class="col-md-12">
            <div class="panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Crear Inscripcion</h4>
                </div>
            </div>


            <?=form_open(base_url().'inscripciones/insertar_inscripcion');

           
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
                'size' => '1',
                'style' => 'width:100%',
                'value' => set_value('id_periodo')
            );

            $fecha_inscripcion = array(
                'name' => 'fecha_inscripcion',
                'id' => 'datepicker',
                'class' => 'form-control',
               // 'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value(date('fecha_inscripcion'))
            );

            $hora_inscripcion = array(
                'name' => 'hora_inscripcion',
                'id' => 'timepicker',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value(date('hora_inscripcion'))
            );
            
          
         
            $desc_inscripcion = array(
                'name' => 'desc_inscripcion',
                'id' => 'desc_inscripcion',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('desc_inscripcion')
            );


            $creditos_inscripcion = array(
                'name' => 'creditos_inscripcion',
                'id' => 'valor3',
                'class' => 'form-control',
               // 'required'=> 'required',
                'rows' => 10,
                'cols' => 40,
                'value' => set_value('creditos_inscripcion')
            );

            $precio_credito_inscripcion = array(
                'name' => 'precio_credito_inscripcion',
                'id' => 'valor4',
                'class' => 'form-control',
                'required'=> 'required',
                'rows' => 10,
                'cols' => 40,
                'value' => set_value('precio_credito_inscripcion')
            );

            //el cuarto...(campo mensaje)
            $monto_inscripcion = array(
                'name' => 'monto_inscripcion',
                'id' => 'monto',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'onkeyup' => 'multiplicar();',
                'value' => set_value('monto_inscripcion')
            );   
            
            
            $total_inscripcion = array(
                'name' => 'total_inscripcion',
                'id' => 'total',
                'class' => 'form-control',
               // 'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('total_inscripcion')
          );


            $nota_inscripcion = array(
                'name' => 'nota_inscripcion',
                'id' => 'nota_inscripcion',
                'class' => 'form-control',
                'size' => '100',
                'style' => 'width:100%',
                'value' => set_value('nota_inscripcion')
            );

            $subtotal_inscripcion = array(
                'name' => 'subtotal_inscripcion',
                'id' => 'valor1',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('subtotal_inscripcion')
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


            $js = 'onClick="notificar()"';

            //Botón submit formulario crear orden de compra
            $submit = array(
                'name' => 'submit',
                'id' => 'submit',
                'class' => 'form-control',
                'class' => 'btn btn-primary',
                'value' => 'Crear Inscripcion',
                'title' => 'Crear Inscripcion'
            );

?>
<?php
echo form_fieldset('Encabezado');
?>


            <form class="form-horizontal form-bordered">

                <div class="form-group">                       

                    <?php  ?>          
                        <div class="col-md-2">
                            <?php echo form_label('Fecha: '); ?>
                            <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($fecha_inscripcion); ?>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>

                         <div class="col-md-2 bootstrap-timepicker">
                         
                           
                            <?php echo form_label('Hora: '); ?> 
                           
                            <div class="input-group mb15 col-sm-12">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <?php echo form_input($hora_inscripcion); ?>
                            </div>
                        </div>
                        
                        

                        <div class="col-md-2">
                        <label class="col-sm-12">Periodo:</label>

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

                    <div class="col-md-6">               
                        <a href="#" class="pull-right">
                                <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
                            </a>

                            </div>
                 

                </div>
<?php
echo form_fieldset('Detalle de Inscripción');
?>
                <div class="form-group">


                    <div class="col-md-4">
                        <label class="col-sm-12">Estudiante:</label>
                          <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_estudiante, nombre_estudiante FROM estudiantes";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_estudiante'>";

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
                        <button class="btn btn-danger"><a data-toggle="modal" data-target="#llamadaCliente">Seleccionar</a></button>
                    </div>

                    <div class="col-md-6">
                                <?php echo form_label('Descripcion: '); ?>
                                <div>
                                    <?php echo form_input($desc_inscripcion); ?>
                                </div>
                            </div>

                   
                </div>
                 
                
              
                

                    <div class="form-group">

                           

                            <div class="col-md-2">
                                <?php echo form_label('Creditos: '); ?>
                                <div >
                                    <?php echo form_input($creditos_inscripcion); ?>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <?php echo form_label('Precio/Credito: '); ?>
                                <div>
                                    <?php echo form_input($precio_credito_inscripcion); ?>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <?php echo form_label('Monto: '); ?>
                                <div >
                              <?php $mt ='onkeyup="multiplicar()"';
                              echo form_input($monto_inscripcion, $mt); ?>
                                </div>
                            </div>

                            <div class="col-md-3">
                       <label class="col-sm-6 control-label"></label>
                      <?php echo form_label('Subtotal: '); ?>
                      <div class="col-sm-12">
                      <?php $itb ='onkeyup="multiplicar2()"';
                       echo form_input($subtotal_inscripcion, $itb); ?>
                      </div>
                   </div>

                            <div class="col-md-3">
                                    <label class="col-sm-6 control-label"> </label>
                                        <?php echo form_label('Total General: '); ?>
                            <div>
                            <?php  $ttg ='onkeyup="sumar()"';
                            echo form_input($total_inscripcion, $ttg); ?>
                            </div>

                                   
                            </div>
                         </div>

                        <div class="form-group">
                                    <div class="col-md-8">
                                        <label class="col-sm-12 control-label">Comentarios</label>
                                        <div class="col-sm-10">
                                            <?php echo form_input($nota_inscripcion); ?>
                                        </div>
                                    </div>


                                    <div class="col-md-2"> 
                                     <?php echo form_reset($cancel);
                                ?>
                                </div>
                               <div class="col-md-2">
                                <?php echo form_submit($submit,'',$js);
                                    ?>
                                </div>



                   
                     </div>

</form>


                    </div>

    <?php
    echo form_close();
    ?>

<?php
echo form_fieldset_close();
?>

        <!-- Javascript -->


        <script type="text/javascript">

            /**
             * Funcion que se ejecuta cada vez que se añade una letra en un cuadro de texto
             * Multiplica cantidad por precio.
             */
            function multiplicar()
            {
                var valor3=verificar("valor3");
                var valor4=verificar("valor4");
                // realizamos la multiplicacion de los valores y los ponemos en la casilla del
                // formulario que contiene el total
                document.getElementById("monto").value=parseFloat(valor3)*parseFloat(valor4);
            }

            /**
             * Funcion que se ejecuta cada vez que se añade una letra en un cuadro de texto
             * Suma los valores de los cuadros de texto
             */
            function multiplicar2()
            {
                var valor1=verificar("valor1");
                var valor2=verificar("valor2");

                // realizamos la suma de los valores y los ponemos en la casilla del
                // formulario que contiene el total
                document.getElementById("valor2").value=parseFloat(valor1)*(0.18);
            }


            function sumar()
            {
                var valor1=verificar("valor1");
                var valor2=verificar("valor2");

                // realizamos la suma de los valores y los ponemos en la casilla del
                // formulario que contiene el total
                document.getElementById("total").value=parseFloat(valor1)+parseFloat(valor2);
            }


            /**
             * Funcion para verificar los valores de los cuadros de texto. Si no es un
             * valor numerico, cambia de color el borde del cuadro de texto
             */
            function verificar(id)
            {
                var obj=document.getElementById(id);
                if(obj.value=="")
                    value="0";
                else
                    value=obj.value;
                if(validate_importe(value,1))
                {
                    // marcamos como erroneo
                    obj.style.borderColor="#808080";
                    return value;
                }else{
                    // marcamos como erroneo
                    obj.style.borderColor="#f00";
                    return 0;
                }
            }

            /**
             * Funcion para validar el importe
             * Tiene que recibir:
             *  El valor del importe (Ej. document.formName.operator)
             *  Determina si permite o no decimales [1-si|0-no]
             * Devuelve:
             *  true-Todo correcto
             *  false-Incorrecto
             */
            function validate_importe(value,decimal)
            {
                if(decimal==undefined)
                    decimal=0;

                if(decimal==1)
                {
                    // Permite decimales tanto por . como por ,
                    var patron=new RegExp("^[0-9]+((,|\.)[0-9]{1,2})?$");
                }else{
                    // Numero entero normal
                    var patron=new RegExp("^([0-9])*$")
                }

                if(value && value.search(patron)==0)
                {
                    return true;
                }
                return false;
            }
        </script>


        <!-- Javascript end -->


    </div>


</div>
<!--
<div class="form-group">
    <div class="col-md-8">
        <div class="col-md-3"><input type="hidden" id="valor3" onkeyup="multiplicar();"></div>
        <div class="col-md-3"><input type="hidden" id="valor4" onkeyup="multiplicar();"></div>
        <div class="col-md-3">Monto: <input type="text" id="monto" disabled value="0"></div> 

        <div class="col-md-12"> <input type="" id="valor1" onchange="sumar();" onkeyup="multiplicar2();"></div>
        <div class="col-md-6"><input type="" value="0" id="valor2" onkeyup="sumar();"></div>
            <div class="col-md-6">Total: <input type="text" id="total" disabled value="0" > </div> -->
    </div>

</div>


<!-- Contenido llamada al Cliente -->
<div class="modal fade" id="llamadaCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Seleccione un estudiante</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">Estudiantes:</label>
                        <div class="col-sm-8">


                         <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_estudiante, nombre_estudiante FROM estudiantes";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_estudiante'>";

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

                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">Observaciones</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Seleccionar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Contenido llamada al Cliente -->
  <!-- Javascript  jQuery -->
   <script src="<?php  echo base_url() ?>assets/js/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php  echo base_url() ?>assets/js/Push.min.js"></script>
 
<script>
        function notificar(){

        var todo_correcto = true;
        if(document.getElementById('datepicker').value.length == 0){
            todo_correcto = false;
        alert('Fecha no debe estar vacio');
        exit();
        }else{
            if(document.getElementById('creditos_inscripcion').value.length == 0){
                todo_correcto = false;
                    alert('Creditos no debe estar vacio');
                    exit();
                }else{
                    if(document.getElementById('total_inscripcion').value.length == 0){
                        todo_correcto = false;
                            alert('Total no debe estar vacio');
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
