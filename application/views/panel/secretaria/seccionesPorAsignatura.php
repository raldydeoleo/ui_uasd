<?php /** @var array $secciones */?>



    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">Lista Secciones por Asignatura</h4>
        <div class="form-group">
        <div class="col-md-6"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/secciones/nueva_seccion"> Nueva Seccion </a> </div>
                <div class="col-md-2"> <a class="btn btn-success" href="#"> Imprimir </a> </div>
                </div>

                
        <?php if (count($secciones)): ?>
            <div class="table-responsive">
        <table class="table table-info table-hover" id="table1">
                <thead>
                    <tr>
                        
                        <th>ID</th>
                        <th>Nombre Seccion</th>                       
                        <th>Asignatura</th>                        
                        <th>Periodo</th>
                        <th>Profesor</th>
                        <th>Campus</th>                       
                        <th>Lunes</th>
                        <th>Martes</th> 
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sabado</th>
                       
                    </tr>
                </thead>
                <tbody>

                <?php foreach($secciones as $seccion): ?>
                <tr class="odd gradeX">
                    <td><?php echo $seccion->id_seccion ?></td>
                    <td><?php echo $seccion->nombre_seccion ?></td>
                    <td><?php echo $seccion->id_asignatura ?></td>
                    <td><?php echo $seccion->id_periodo ?></td>
                    <td><?php echo $seccion->id_profesor ?></td>
                    <td><?php echo $seccion->id_recinto ?></td>
                    <td><?php echo $seccion->lunes_seccion ?></td>
                    <td><?php echo $seccion->martes_seccion ?></td>
                    <td><?php echo $seccion->miercoles_seccion ?></td>
                    <td><?php echo $seccion->jueves_seccion ?></td>
                    <td><?php echo $seccion->viernes_seccion ?></td>
                    <td><?php echo $seccion->sabado_seccion ?></td>
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