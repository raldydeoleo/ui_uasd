<?php /** $var array $aulas  */ ?>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">


            <h5 class="subtitle md5">LISTA DE AULAS</h5>
            <h6>Aulas disponibles para ocupar</h6>
            <br />
            <div class="form-group">
        <div class="col-md-8"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/aulas/nueva_aula"> Nueva Aula </a> </div>
               
                </div>

                
            <?php if (count($aulas)): ?>
            <div class="table-responsive">
                <table class="table table-warning table-hover mb30">
                    <thead>
                    <tr>
                        <th>ID Aula</th>
                        <th>Nombre Aula</th>
                        <th>Capacidad</th>
                        <th>Edificio</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($aulas as $aula): ?>
                    <tr>

                        <td><?php echo $aula->id_aula ?></td>
                        <td><?php echo $aula->nombre_aula ?></td>
                        <td><?php echo $aula->capacidad_aula ?></td>
                        <td><?php echo $aula->id_edificio ?></td>
                        
                        
                        <td>
                            <div class="btn-group">
                                <a data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="fa fa-gear"></i>
                                </a>
                                <ul role="menu" class="dropdown-menu pull-right">
                                    <li><a href="<?php echo base_url() ?>aulas/ver/<?php echo $aula->id_aula ?>">Ver Detalles</a></li>
                                    <li><a href="<?php echo base_url() ?>aulas/editar/<?php echo $aula->id_aula ?>">Editar</a></li>
                                    <li><a onClick="return Cancelar(this);" href="<?php echo base_url() ?>aulas/eliminar/<?php echo $aula->id_aula ?>">Eliminar</a></li>
                                    <li><a href="<?php echo base_url() ?>aulas/imprimir/<?php echo $aula->id_aula ?>">Imprimir</a></li>
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


