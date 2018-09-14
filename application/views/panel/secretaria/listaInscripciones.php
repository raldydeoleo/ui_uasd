<?php /** @var array $inscripciones */?>



    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">Lista de Inscripciones</h4>

        <div class="form-group">
                <div class="col-md-10"></div>
                <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                        
                
                </div>

            <div class="table-responsive">
                <?php if (count($inscripciones)): ?>
        <table class="table table-warning table-hover mb30" id="table1">
                <thead>
                    <tr>

                        <th>ID Inscripcion</th>
                        <th>Estudiante</th>
                        <th>Periodo</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Descripcion</th>
                        <th>Creditos</th>
                        <th>Total</th>  
                        <th>Accion</th>

                    </tr>
                </thead>
                <tbody>

                <?php foreach($inscripciones as $inscripcion): ?>
                <tr class="odd gradeX">
                <td style=""> <?php echo $inscripcion->id_inscripcion ?> </td>
                <td style=""> <?php echo $inscripcion->id_estudiante ?> </td>
                <td style=""> <?php echo $inscripcion->id_periodo ?> </td>
                <td style=""> <?php echo $inscripcion->fecha_inscripcion ?> </td>
                <td style=""> <?php echo $inscripcion->hora_inscripcion ?> </td>
                <td style=""> <?php echo $inscripcion->desc_inscripcion ?> </td>  
                <td style=""> <?php echo $inscripcion->creditos_inscripcion ?> </td>             
                <td style=""> <?php echo $inscripcion->total_inscripcion ?> </td>               

                    <td>
                        <div class="btn-group">
                            <a data-toggle="dropdown" class="dropdown-toggle">
                                <i class="fa fa-gear"></i>
                            </a>
                            <ul role="menu" class="dropdown-menu pull-right">
                                <li><a href="<?php echo base_url() ?>index.php/inscripciones/ver/<?php echo $inscripcion->id_inscripcion ?>">Ver Inscripcion</a></li>                                
                                <li><a href="<?php  echo base_url() ?>index.php/clientes/pagoInscripcion/<?php echo $inscripcion->id_inscripcion ?>">Marcar como pagada</a></li>
                                
                                <li class="divider"></li>                                
                                <li><a href="<?php echo base_url() ?>imprimirEstudiantes/pago_inscripcion/<?php echo $inscripcion->id_inscripcion ?>">Imprimir</a></li>
                                
                            </ul>
                        </div>



                    </td>



                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
                <?php else: ?>
                    <p> No hay proyectos para mostrar </p>
                <?php endif; ?>
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

<!-- Contenido llamada al Cliente -->
<div class="modal fade" id="llamadaAsignatura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Pagar inscripcion</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">Estudiante</label>
                        <div class="col-sm-8">
                        <?php echo form_label('Estudiante: '); ?>
                        <?php
                        $id = $inscripcion->id_estudiante;
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

<br>
                    ID:  <?php echo $inscripcion->id_inscripcion ?><br>
                    Fecha: <?php echo $inscripcion->fecha_inscripcion ?> <br>                  
                   Creditos: <?php echo $inscripcion->creditos_inscripcion ?> <br>             
                   Total a pagar (RD$): <?php echo $inscripcion->total_inscripcion ?> <br>
                    </div>

                    <div class="col-md-12">
                    <form action="clientes/test" method="POST">
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_9qoheWgHobM4cM9UwLVJxFtN"
                        data-amount="<?= $inscripcion->total_inscripcion ?>.00"
                        data-name="SPA-UASD"
                        data-description="Pago de Inscripcion"
                        data-image="<?php  echo base_url() ?>assets/images/favicon.jpg"
                        data-locale="auto">
                    </script>
                    </form>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                <a href="<?php  echo base_url() ?>index.php/clientes/pagoInscripcion/<?php echo $inscripcion->id_inscripcion ?>"><button type="button" class="btn btn-primary">Pagar</button></a>
            </div>
        </div>
    </div>
</div>
<!-- Fin Contenido llamada al Cliente -->

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

