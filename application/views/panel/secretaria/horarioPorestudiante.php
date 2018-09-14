<?php /** @var array $horarioPorEstudiante */?>



    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">HORARIO POR  ESTUDIANTES</h4>

        <div class="form-group">
        <div class="col-md-8"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>               
        <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/clientes/"> Lista de estudiantes </a> </div>               

                </div>

              

        <?php if (count($horarioPorEstudiante)): ?>


            <div class="table-responsive">


        <table class="table table-info table-hover" id="table1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Periodo</th>
                        <th>Asignatura</th>
                        <th>Seccion</th>                                                             
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
               

                <?php foreach($horarioPorEstudiante as $horario): ?>
                <tr class="odd gradeX">
                    <td style=""> <?php echo $horario->id_seleccion ?> </td>                    
                    <td style=""> <?php echo $horario->fecha_seleccion ?> </td>
                    <td style=""> <?php echo $horario->nombre_periodo ?> </td>
                    <td style=""> <?php echo $horario->nombre_asignatura ?> </td>
                    <td style=""> <?php echo $horario->seccion_seleccion ?> </td>
                      
                    
                    <td>
                        <div class="btn-group">
                            <a data-toggle="dropdown" class="dropdown-toggle">
                                <i class="fa fa-gear"></i>
                            </a>
                            <ul role="menu" class="dropdown-menu pull-right">
                                <li><a data-toggle="modal2" data-target="#llamadaAsignatura">Ver Detalles asignatura</a></li>
                                <li class="divider"></li>
                                <li><a data-toggle="modal" data-target="#llamadaHorario">Ver Horario Seccion</a></li>
                               
                               
                            </ul>
                        </div>


                    </td>


                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
                <?php else: ?>
                    <p> No hay Inscripciones  para mostrar </p>
                <?php endif; ?>
               
                <div class="col-md-3">
                
                <?php 
               
                $id =  $horario->id_estudiante;
                //echo $id;
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
 <div class="col-md-9"> <a class="btn btn-success" href="<?php echo base_url() ?>index.php/ImprimirEstudiantes/imprimeHorario/<?php echo $id; ?>">Imprimir</a> </div>
            </div>

            <div class="rigth">
                <ul class="pagination pagination-split">
                    <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>

    </div>
    </div>

<!-- Contenido llamada al horario -->
<div class="modal fade" id="llamadaHorario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Horario de la seccion</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                
                    <!--div class="col-md-12">
                        <label class="col-sm-4 control-label">Estado</label>
                        <div class="col-sm-8">
                            <select class="form-control input-sm mb15">
                                <option>Llamada contestada</option>
                                <option>No contestaron</option>
                                <option>Llamar otro dia</option>
                            </select>
                        </div>
                    </div -->
<!--inicio tabla  -->

<div class="col-md-12"></div>
<div>
        <div class="table-responsive">
                      <table class="table table-info table-hover" id="table1">

                          <thead>
                          <tr role="row">                                                   
                          <th>Asignatura</th>
                          <th>Seccion</th>
                          <th>Lunes</th>
                          <th>Martes</th>        
                          <th>Miercoles</th>
                          <th>Jueves</th>
                          <th>Viernes</th>                
                          <th>Accion</th>  
                          </tr>
                          </thead>
                          <tbody>


                         
     <?php 

$mysqli = new mysqli("localhost", "root","", "db_uasd");
if ($mysqli === false){
    die ("Error: No se establecio la conexion. " . mysqli_connect_error());
}
    $sql="SELECT id_asignatura, nombre_seccion, lunes_seccion, martes_seccion, miercoles_seccion FROM secciones WHERE id_asignatura ='2'"; 
 


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

            echo "<td>";
            echo  $row[4];
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
<!-- fin tabla  -->
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>               
            </div>
        </div>
    </div>
</div>
<!-- Fin Contenido llamada al horario -->


<!-- script>
    jQuery(document).ready(function() {

        "use strict";

        jQuery('#table1').dataTable();

        jQuery('#table2').dataTable({
            "sPaginationType": "full_numbers"
        });

        // Select2
        jQuery('select').select2({
            minimumResultsForSearch: -1
        });

        jQuery('select').removeClass('form-control');

        // Delete row in a table
        jQuery('.delete-row').click(function(){
            var c = confirm("Continue delete?");
            if(c)
                jQuery(this).closest('tr').fadeOut(function(){
                    jQuery(this).remove();
                });

            return false;
        });

        // Show aciton upon row hover
        jQuery('.table-hidaction tbody tr').hover(function(){
            jQuery(this).find('.table-action-hide a').animate({opacity: 1});
        },function(){
            jQuery(this).find('.table-action-hide a').animate({opacity: 0});
        });


    });
</script -->

