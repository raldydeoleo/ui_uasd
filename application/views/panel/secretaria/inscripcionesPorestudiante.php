<?php /** @var array $inscripcionesPorestudiante */?>



    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">LISTA DE INSCRIPCIONES POR  ESTUDIANTES</h4>

        <div class="form-group">
        <div class="col-md-6"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/clientes/index">Lista de Estudiantes </a> </div>
                <div class="col-md-2"> <a class="btn btn-success" href="<?php echo base_url() ?>index.php/clientes/imprimir"> Imprimir </a> </div>
                </div>

        <?php if (count($inscripcionesPorestudiante)): ?>


            <div class="table-responsive">


        <table class="table table-info table-hover" id="table1">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Fecha</th>
                        <th>Detalle de inscripción</th>
                        <th>Créditos inscritos</th>
                        <th>Precio por crédito</th>
                        <th>Total</th>
                        <th>Estatus</th>                                                              
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>


                <?php foreach($inscripcionesPorestudiante as $inscripcion): ?>
                <tr class="odd gradeX">
                    <td style=""> <?php echo $inscripcion->id_inscripcion ?> </td>
                    <td style=""> <?php echo $inscripcion->fecha_inscripcion ?> </td>
                    <td style=""> <?php echo $inscripcion->desc_inscripcion ?> </td>
                    <td style=""> <?php echo $inscripcion->creditos_inscripcion ?> </td>
                    <td style=""> <?php echo $inscripcion->precio_credito_inscripcion ?> </td>
                    <td style=""> <?php echo $inscripcion->total_inscripcion ?> </td>
                    <td style=""> <?php echo $inscripcion->estatus ?> </td> </td>
                   
                    
                    
                    <td>
                        <div class="btn-group">
                            <a data-toggle="dropdown" class="dropdown-toggle">
                                <i class="fa fa-gear"></i>
                            </a>
                            <ul role="menu" class="dropdown-menu pull-right">
                                <li><a href="<?php  echo base_url() ?>index.php/clientes/verInscripcion_por_id/<?php echo $inscripcion->id_inscripcion ?>">Ver Detalle</a></li>

                                <li class="divider"></li>
                                <li><a href="<?php  echo base_url() ?>index.php/clientes/pagoInscripcion/<?php echo $inscripcion->id_inscripcion ?>">Marcar como pagada</a></li>
                               
                               
                               
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

