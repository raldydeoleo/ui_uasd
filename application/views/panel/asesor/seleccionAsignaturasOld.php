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

            $seccion_array = array(
                '0'=>'seleccione',
                'SE-01'         => 'SE-01',
                'SE-02'           => 'SE-02',
                'SE-03'         => 'SE-03',
                'SE-04'        => 'SE-04',               
            ); 

            $seccion_seleccion = array(               
                'class'=>'form-control',
                'id' => 'seccion_seleccion',
                'name' =>'seccion_seleccion',
                'class' => 'form-control',
                // 'required'=> 'required',
                'rows' => 10,
                'cols' => 40,
                'value' => set_value('creditos_asignatura') 
            );
        
            $options = array(
                '0'=>'seleccione',
                'SE-01'         => 'SE-01',
                'SE-02'           => 'SE-02',
                'SE-03'         => 'SE-03',
                'SE-04'        => 'SE-04',               
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


            <form class="form-horizontal form-bordered" id="miFormulario" method="post" action="<?php echo base_url() ?>./clientes/insertar_seleccion">

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

                   
                <div class="col-md-2"> 

                    <?php echo form_reset($cancel);
                        ?>
                    </div>

                    <div class="col-md-2">
                    <?php echo form_submit($submit);
                    ?>
                  
                </div>


                </div>

               

                

                <?php
echo form_fieldset('.');
?>
                     <div class="form-group">               </div>


                    <div class="form-group">                           

                    <div class="col-md-1">

                                <?php  echo form_label('NRC: '); ?>
                                <div class="input-group mb15 col-sm-12"> 
                                    <?php  echo form_input($nrc_asignatura); ?>
                                </div>



                                     <div class="col-md-12">
                            <?php // echo form_label('NRC: '); ?>

                        <?php /*
                        $mysqli =new mysqli("localhost", "root","", "db_uasd");
                        if ($mysqli === false){
                            die("Error: No se establecio la conexion." . mysqli_connect_error());
                        }
                        $sql = "SELECT id_asignatura, nombre_asignatura, nrc_asignatura FROM asignaturas";
                        if ($result = $mysqli->query($sql)){
                            if ($result->num_rows > 0){
                                echo "<select class='form-control' name='id_asignatura'>";
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

                       */ ?>

                    </div>
                    


                                <?php // echo form_label('Estudiante: '); ?>
                        <?php /*
                        $id = $estudiantes->id_estudiante;
                        $mysqli =new mysqli("localhost", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_proyeccion, id_asignatura  FROM proyecciones WHERE id_estudiante=".$id."";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_proyeccion'>";

                                    while ($row = $result->fetch_array()){

                                        echo "<option value='$row[0]'>";
                                        echo "$row[0]";
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

                       */ ?>

                            </div>  

                            

                            <div class="col-md-4">
                                <?php  echo form_label('Asignatura: '); ?>
                                 <div class="input-group mb15 col-sm-12">
                                    <?php  echo form_input($nombre_asignatura); ?>
                                </div>
                            
                                
                      
                            </div>

                            <div class="col-md-1">
                            <?php echo form_label('Seccion: '); ?>
                            <div class="input-group mb15 col-sm-12">
                                <?php  echo form_dropdown('', $options, 'seccion_seleccion',$seccion_seleccion); ?>
                              
                            </div>
                            </div>


                            <div class="col-md-2">
                                <?php echo form_label('Creditos: '); ?>
                                <div class="input-group mb15 col-sm-12">
                                    <?php echo form_dropdown('creditos_asignatura',$creditos_asignatura,'', $cr_array); ?>
                                </div>
                            </div>

                             

                         
                            <!-- button class="btn btn-danger"><a data-toggle="modal" data-target="#llamadaCliente">Seleccionar</a></button --> 
                            <input class="btn btn-primary" type="button" value="Agregar" class="form-control" id="add"/> 
                            <input class="btn btn-info" type="button" value="Quitar" class="form-control" id="del"/>                         
                            <input class="btn btn-default" type="button" value="Enviar" class="form-control" id="enviar" />  
                            <input class="btn btn-default" type="button" value="Recorrer" class="form-control" id="btnRecorrer" />                         
                           
                            </div>
                        </div>
                           </div>

                </div>


               
                        <div class="form-group">

                            <div class="table-responsive">
                                <table class="table table-warning table-hover" id="tabla">

                                    <thead>
                                    <tr role="row">
                                        <th>NRC</th>
                                        <th>Asignatura</th>
                                        <th>Seccion</th>                                                                                
                                        <th>Créditos</th>
                                        <th>Monto</th>
                                    </tr>
                                    </thead>
                                    <tbody>                                                                      

                                </table>                       
                                                
                         </div>
                       
                         <div class="form-group">


                                          
                            <div id="mostrardatos">
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

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){



    $("#add").click(function(){
                var contenidofila;
                var filas = 0
                
                var nrc = document.getElementById("nrc_asignatura").value;
                var nombre = document.getElementById("nombre_asignatura").value; 
                var seccion = document.getElementById("seccion_seleccion").value;   
                var creditos = document.getElementById("creditos_asignatura").value;   
                var monto = creditos*13;
                
                var nuevaFila='<tr id="myRow"><td>'+nrc+'</td><td>'+nombre+'</td><td>'+seccion+'</td><td>'+creditos+'</td> \
                <td>'+monto+'</td></tr>';
                
                
               
                $("#tabla").append(nuevaFila);
    
                document.getElementById("seccion_seleccion").value="";                
                document.getElementById("nrc_asignatura").value="";
                document.getElementById("nombre_asignatura").value="";                
                document.getElementById("creditos_asignatura").value="";
                document.getElementById("nrc_asignatura").focus();
    
                //filas = document.getElementById("tabla").rows.length;
                //alert(document.getElementById("tabla").rows[3].innerHTML);
                //alert(document.getElementById("tabla").rows.length);
                //alert(document.getElementById("tabla").rows[2].innerHTML); //imprime en un alert el contenido de la fila 2    
                //var tdElem1 = (document.getElementById("tabla").rows.namedItem("myRow").innerText);   
                //document.getElementById("asignatura1").value=tdElem1;   
        
    });
    
    $("#del").click(function(){                            
         document.getElementById("tabla").deleteRow(1);
    });
                        
    
    
                $("#enviar").click(function(){
                   // var x = document.getElementById("tabla").rows.length;
                
                  alert(document.getElementById("tabla").rows.item(1).innerText);
                  
                
                 $("tr").each(function(){                        
                        var seleccion = [];                        
                        seleccion = (document.getElementById("tabla").rows.item(1).innerText);
                        console.log(seleccion);
                        $.ajax({                
                            type:'POST',
                            url:'proceso.php',
                            data:{'seleccion':JSON.stringify(seleccion) },
                            dataType: 'text',                   
                            beforeSend: function () {
                            // $("#mostrardatos").html(datos);
                            },
                            success: function(objView){
                                alert('exito.');
                            }
                            }).done(
                                function(resp)
                                        {
                                //alert(resp);
                            });
                    });
                   
                                //event.preventDefault();
                //var tdElem1 = (document.getElementById("tabla").rows[1].innerText);
                //var tdElem2 = (document.getElementById("tabla").rows[2].innerText);
                //var tdElem3 = (document.getElementById("tabla").rows[3].innerText);
                
                //document.getElementById("asignatura1").value=tdElem1+tdElem2+tdElem3;
               
    
                });
    
                $("#btnRecorrer").click(function () {
                 alert(document.getElementById("tabla").rows.length);
                 $("#tabla tbody tr").each(function (index) {
                   
                     var campo1, campo2, campo3,campo4,campo5;                 
                  
                $(this).children("td").each(function (index2) {
                         switch (index2) {
                             case 0:
                                 campo1 = $(this).text();
                                 break;
                            case 1:
                                campo2 = $(this).text();
                                break;
                         case 2:
                              campo3 = $(this).text();
                              break;
                         case 3:
                              campo4 = $(this).text();
                              break;
                         case 3:
                              campo5 = $(this).text();
                              break;
                      }
                  
                  })
                  $.ajax({                
                    type:$(this).attr("method"),
                    url:$(this).attr("action"),
                    data:$(this).serialize(),
                   // data:{nrc: campo1, nombre_asignatura:campo2, seccion_seleccion:campo3, creditos:campo4, monto:campo5 },
                    dataType: 'text',                   
                    beforeSend: function () {
                       // $("#mostrardatos").html(datos);
                    },
                    success: function(result){
                        alert('exito');
                    }
                    }).done(
                        function(resp)
                                {
                        //alert(resp);
                    });
              
              alert(campo1 + ' - ' + campo2 + ' - ' + campo3 +' - ' + campo4+'-'+campo5); 
              console.log(campo1 + ' - ' + campo2 + ' - ' + campo3 +' - ' + campo4+'-'+campo5);           
              
              })
              alert('test aproved');
          })

          
  /*  $("#miFormulario").submit(function(){
            $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            beforeSend:function(){
            //$(".loader").show(); 
            alert('loaded');
            },
                                success:function(){
                                    alert('loaded success');
                                   // $(".loader").fadeOut("slow");
                                }
            });
            
            });
            return false;  */            
    
    });
</script>

      

   <!--   Javascript end -->


    </div>


</div>




<!-- Contenido llamada al Cliente -->
<div class="modal fade" id="llamadaCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Seleccione un Proyecto</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">Proyecto</label>
                        <div class="col-sm-8">


                            <select class="form-control" name="proveedores">

                                <option>Seleccione un Proyecto</option>
                                <option value="1">Proyecto 1</option>
                                <option value="2">Proyecto 2</option>
                                <option value="3">Proyecto 3</option>
                                <option value="4">Proyecto 4</option>

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
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Contenido llamada al Cliente -->
