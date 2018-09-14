<?php /** $var array $horarios  */ ?>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">


            <h5 class="subtitle md5">LISTA DE HORARIOS</h5>
            <h6>Horarios disponibles para asignar</h6>
            <br />

            <div class="form-group">
        <div class="col-md-6"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/clientes/nuevo_estudiante"> Nuevo Estudiante </a> </div>
                <div class="col-md-2"> <a class="btn btn-success" href="<?php echo base_url() ?>index.php/clientes/imprimir"> Imprimir </a> </div>
                </div>

            <?php if (count($horarios)): ?>
            <div class="table-responsive">
                <table class="table table-warning table-hover mb30">
                    <thead>
                    <tr>
                        <th>ID Horario</th>
                        <th>Dias</th>
                        <th>Hora Inicio</th>
                        <th>Hora Final</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($horarios as $horario): ?>
                    <tr>

                        <td><?php echo $horario->id_horario ?></td>
                        <td><?php echo $horario->dias_horario ?></td>
                        <td><?php echo $horario->horainicio_horario ?></td>
                        <td><?php echo $horario->horafinal_horario ?></td>
                        
                        
                        <td>
                            <div class="btn-group">
                                <a data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="fa fa-gear"></i>
                                </a>
                                <ul role="menu" class="dropdown-menu pull-right">
                                    <li><a href="#">Ver Horario</a></li>
                                    <li><a href="#">Editar</a></li>
                                </ul>


                        </td>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
                <?php else: ?>
                    <p> No hay Aulas para mostrar </p>
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
