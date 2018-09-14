<?php /** $var array $secciones  */ ?>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">


            <h5 class="subtitle md5">LISTA DE SECCIONES</h5>
            <h6>Secciones disponibles para inscribir</h6>
            <br />

            <div class="form-group">
        <div class="col-md-6"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/secciones/nueva_seccion"> Nueva Seccion </a> </div>
                <div class="col-md-2"> <a class="btn btn-success" href="<?php echo base_url() ?>index.php/ImprimirSecciones"> Imprimir </a> </div>
                </div>

            <?php if (count($secciones)): ?>
            <div class="table-responsive">
                <table class="table table-warning table-hover mb30">
                    <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre Seccion</th>
                        <th>Nombre profesor</th>
                        <th>Apellido profesor</th>
                        <th>Asignatura</th>                        
                        <th>Aula</th>
                        <th>Período</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sabado</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($secciones as $seccion): ?>
                    <tr>

                        <td><?php echo $seccion->id_seccion ?></td>
                        <td><?php echo $seccion->nombre_seccion ?></td>
                        <td><?php echo $seccion->nombre_profesor ?></td>
                        <td><?php echo $seccion->apellido_profesor ?></td>
                        <td><?php echo $seccion->nombre_asignatura ?></td>                       
                        <td><?php echo $seccion->id_aula ?></td>
                        <td><?php echo $seccion->id_periodo ?></td>
                        <td><?php echo $seccion->lunes_seccion ?></td>
                        <td><?php echo $seccion->martes_seccion ?></td>
                        <td><?php echo $seccion->miercoles_seccion ?></td>
                        <td><?php echo $seccion->jueves_seccion ?></td>
                        <td><?php echo $seccion->viernes_seccion ?></td>
                        <td><?php echo $seccion->sabado_seccion ?></td>
                        
                        <td>
                            <div class="btn-group">
                                <a data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="fa fa-gear"></i>
                                </a>
                                <ul role="menu" class="dropdown-menu pull-right">
                                    <li><a href="<?php echo base_url() ?>secciones/ver/<?php echo $seccion->id_seccion ?>">Ver Seccion</a></li>
                                    <li><a href="<?php echo base_url() ?>secciones/editar/<?php echo $seccion->id_seccion ?>">Editar</a></li>
                                    <li><a onClick="return Cancelar(this);" href="<?php echo base_url() ?>secciones/eliminar/<?php echo $seccion->id_seccion ?>">Eliminar</a></li>
                                    <li><a href="<?php echo base_url() ?>secciones/imprimir/<?php echo $seccion->id_seccion ?>">Imprimir</a></li>
                                </ul>


                        </td>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
                <?php else: ?>
                    <p> No hay Secciones para mostrar </p>
                <?php endif; ?>

            </div><!-- table-responsive -->

            <div class="panel-default">
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

</div><!-- contentpanel -->


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
