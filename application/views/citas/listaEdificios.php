<?php /** $var array $edificios  */ ?>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">


            <h5 class="subtitle md5">LISTA DE EDIFICIOS</h5>
            <h6>Edificios disponibles para ocupar</h6>
            <br />

            <div class="form-group">
        <div class="col-md-8"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/edificios/nuevo_edificio"> Nuevo Edificio </a> </div>
                
                </div>

            <?php if (count($edificios)): ?>
            <div class="table-responsive">
                <table class="table table-warning table-hover mb30">
                    <thead>
                    <tr>
                        <th>ID Edficio</th>
                        <th>Nombre Edificio</th>
                        <th>Cantidad de aulas</th>
                        <th>Recinto</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($edificios as $edificio): ?>
                    <tr>

                        <td><?php echo $edificio->id_edificio ?></td>
                        <td><?php echo $edificio->nombre_edificio ?></td>
                        <td><?php echo $edificio->cantaulas_edificio ?></td>
                        <td><?php echo $edificio->id_recinto ?></td>
                        
                        
                        <td>
                            <div class="btn-group">
                                <a data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="fa fa-gear"></i>
                                </a>
                                <ul role="menu" class="dropdown-menu pull-right">
                                    <li><a href="<?php echo base_url() ?>edificios/ver/<?php echo $edificio->id_edificio ?>">Ver</a></li>
                                    <li><a href="<?php echo base_url() ?>edificios/editar/<?php echo $edificio->id_edificio ?>">Editar</a></li>
                                    <li><a onClick="return Cancelar(this);" href="<?php echo base_url() ?>edificios/eliminar/<?php echo $edificio->id_edificio ?>">Eliminar</a></li>
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

