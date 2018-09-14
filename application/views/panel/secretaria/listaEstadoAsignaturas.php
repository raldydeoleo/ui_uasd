<?php /** @var array $asignaturas */?>



    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">Publicar Notas de Asignaturas</h4>
        <div class="form-group">
        <div class="col-md-6"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/asignaturas/nueva_asignatura"> Nueva Asignatura </a> </div>
                <div class="col-md-2"> <a class="btn btn-success" href="<?php echo base_url() ?>index.php/imprimirAsignaturas/imprime_asignaturas"> Imprimir </a> </div>
                </div>

                
        <?php if (count($asignaturas)): ?>
            <div class="table-responsive">
        <table class="table table-info table-hover" id="table1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NRC</th>
                        <th>Clave</th>                       
                        <th>Asignatura</th>                        
                        <th>Estudiante</th>                                            
                        <th>Carrera</th>
                        <th>Profesor</th> 
                        <th>Estado</th>
                        <th>Nota</th>                                              
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($asignaturas as $asignatura): ?>
                <tr class="odd gradeX">
                    <td><?php echo $asignatura->id_asignatura ?></td>
                    <td><?php echo $asignatura->nrc_asignatura ?></td>
                    <td><?php echo $asignatura->clave_asignatura ?></td>
                    <td><?php echo $asignatura->nombre_asignatura ?></td>
                    <td><?php echo $asignatura->id_estudiante ?></td>                    
                    <td><?php echo $asignatura->id_carrera ?></td>
                    <td><?php echo $asignatura->id_profesor ?></td>
                    <td><?php echo $asignatura->estado_asignatura ?></td>
                    <td><?php echo $asignatura->calificacion_asignatura ?></td>
                    
                    <td>
                 <div class="btn-group">
                   <a data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-gear"></i> </a>
                            <ul role="menu" class="dropdown-menu pull-right">
                    <li><a href="<?php echo base_url() ?>index.php/asignaturas/ver/<?php echo $asignatura->id_asignatura ?>">Ver Asignatura</a></li>
                    <li><a href="<?php echo base_url() ?>index.php/asignaturass/generar_recibo/<?php echo $asignatura->id_asignatura ?>">Imprimir</a></li>
                    <li><a href="<?php echo base_url() ?>asignaturas/editar/<?php echo $asignatura->id_asignatura ?>">Editar</a></li>
                    <li><a onClick="return Cancelar(this);" href="<?php echo base_url() ?>asignaturas/eliminar/<?php echo $asignatura->id_asignatura ?>">Eliminar</a></li>
                    <li class="divider"></li> 
                    <li><a href="<?php echo base_url() ?>asignaturas/editarEstado/<?php echo $asignatura->id_asignatura ?>">Publicar Nota</a></li>                   
                    <li><a href="<?php echo base_url() ?>asignaturas/guardar/<?php echo $asignatura->id_asignatura ?>">Commentario</a></li>
                            </ul>
                </div>


                    </td>


                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

                <?php else: ?>
                    <p> No hay asignaturas para mostrar </p>
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

   
    <script language="JavaScript" type="text/JavaScript">
// poner esto en el link href onClick="return Cancelar(this);"
function Cancelar(lnk){
  
   var x = confirm('Esta seguro de eliminar este registro?');
    if(x){
        return true;        
        alert('Registro eliminado');
    }else{         
        return false;
         alert('operacion cancelada');
    }
}
</script>


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