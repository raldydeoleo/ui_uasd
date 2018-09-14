<?php /** @var array $nomina */?>

    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">Nomina de pago a empleados</h4>
            <div class="table-responsive">
                <?php if (count($nomina)): ?>
        <table class="table table-warning table-hover mb30" id="table1">
                <thead>
                    <tr>

                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cedula</th>
                        <th>Horas Extras</th>
                        <th>Incentivo</th>
                        <th>Percepciones</th>
                        <th>Sueldo bruto</th>
                        <th>AFP</th>
                        <th>ARS</th>
                        <th>Prestamo</th>
                        <th>Deducciones</th>
                        <th>Sueldo Neto</th>
                         <th>Fecha</th>
                        <th>Accion</th>

                    </tr>
                </thead>
                <tbody>

                <?php foreach($nomina as $nominaempleados): ?>
                <tr class="odd gradeX">
                    <td style=""> <?php echo $nominaempleados->id_empleado ?> </td>
                    <td style=""> <?php echo  $nominaempleados->nombre_empleado ?> </td>
                    <td style=""> <?php echo $nominaempleados->apellido_empleado ?> </td>
                    <td style="width: 10%"> <?php echo  $nominaempleados->cedula_empleado ?> </td>
                    <td style=""> <?php echo  $nominaempleados->he_empleado ?>  </td>
                    <td style=""> <?php echo  $nominaempleados->comision_empleado ?>  </td>
                    <td style=""><?php echo  $nominaempleados->total_percepcion ?></td>
                    
                    <td style=""> <?php echo $nominaempleados->sueldo_bruto ?> </td>
                    <td style=""><?php echo  $nominaempleados->afp_empleado ?>  </td>
                    <td style=""> <?php echo  $nominaempleados->ars_empleado ?> </td>
                     <td style=""> <?php echo  $nominaempleados->prestamo_empleado ?>  </td>
                    <td style=""><?php echo  $nominaempleados->total_deduccion ?>  </td>
                    <td style=""> <?php echo $nominaempleados->sueldo_neto ?> </td>
                    <td style="width: 10%"> <?php echo $nominaempleados->fecha_percepcion ?> </td>

                    <td>
                        <div class="btn-group">
                            <a data-toggle="dropdown" class="dropdown-toggle">
                                <i class="fa fa-gear"></i>
                            </a>
                            <ul role="menu" class="dropdown-menu pull-right">
                                <li><a href="<?php echo base_url() ?>index.php/empleados/generar_recibo/<?php echo $nominaempleados->id_empleado ?>">Recibo de nomina</a></li>
                                <li><a data-toggle="modal" data-target="#llamadaCliente">Datos del empleado</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url() ?>index.php/pdfs/pdf_recibo/<?php echo $nominaempleados->id_empleado ?>">Imprimir recibo</a></li>
                                <li><a href="<?php echo base_url() ?>#<?php echo $nominaempleados->id_empleado ?>">Enviar por email</a></li>
                                 <li><a href="<?php echo base_url() ?>index.php/empleados/gen_nomina/<?php echo $nominaempleados->id_empleado ?>">Genera Nomina</a></li>
                                <li><a href="#">Commentar</a></li>
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
<div class="modal fade" id="llamadaCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Llamada al cliente para cita</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">Exito del recordatorio</label>
                        <div class="col-sm-8">
                            <select class="form-control input-sm mb15">
                                <option>Llamada contestada</option>
                                <option>No contestaron</option>
                                <option>Llamar otro dia</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">Observaciones de la llamada</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Guardar para llamar luego</button>
                <button type="button" class="btn btn-primary">Guardar para agendar cita</button>
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

