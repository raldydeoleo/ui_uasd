<?php /** @var array $asignaturasPorcarrera */?>



    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">LISTA DE ASIGNATURAS POR CARRERA</h4>


        <div class="form-group">
        <div class="col-md-6"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
        <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/carreras/listaCarreras"> Volver a Lista</a> </div>
        <div class="col-md-2"> <a class="btn btn-success" href="#"> Imprimir </a> </div>
                
        </div>    
               
        <?php if (count($asignaturasPorcarrera)): ?>


            <div class="table-responsive">


        <table class="table table-info table-hover" id="table1">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>NRC</th>
                        <th>Clave</th>
                        <th>Asignaturas</th>
                        <th>Creditos</th>
                        <th>Horas de Practica</th>
                        <th>Horas de Practica</th>               
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>


                <?php foreach($asignaturasPorcarrera as $asignatura): ?>
                <tr class="odd gradeX">
                    <td style=""> <?php echo $asignatura->id_asignatura ?> </td>
                    <td style=""> <?php echo $asignatura->nrc_asignatura ?> </td>
                    <td style=""> <?php echo $asignatura->clave_asignatura ?> </td>
                    <td style=""> <?php echo $asignatura->nombre_asignatura ?> </td>
                    <td style=""> <?php echo $asignatura->creditos_asignatura ?> </td>
                    <td style=""> <?php echo $asignatura->horasp_asignatura ?> </td>
                    <td style=""> <?php echo $asignatura->horast_asignatura ?> </td>                 
                   
                    
                    
                    <td>
                        <div class="btn-group">
                            <a data-toggle="dropdown" class="dropdown-toggle">
                                <i class="fa fa-gear"></i>
                            </a>
                            <ul role="menu" class="dropdown-menu pull-right">
                                <li><a href="<?php echo base_url() ?>index.php/clientes/ver/<?php echo $asignatura->id_asignatura ?>">Imprimir</a></li>
                                <li class="divider"></li>
                                <li><a data-toggle="modal" data-target="#llamadaAsignatura">Detalles</a></li>
                               
                               
                            </ul>
                        </div>


                    </td>


                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
                <?php else: ?>
                    <p> No hay Asignaturas para mostrar </p>
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
                <h4 class="modal-title" id="myModalLabel">Detalles de la asignatura</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">Estado</label>
                        <div class="col-sm-8">
                            <select class="form-control input-sm mb15">
                                <option>Llamada contestada</option>
                                <option>No contestaron</option>
                                <option>Llamar otro dia</option>
                            </select>
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

