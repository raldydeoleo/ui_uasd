<?php /** $var array $tipo_periodos  */ ?>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">


            <h5 class="subtitle md5">LISTA DE TIPOS DE PERIODOS</h5>
            <h6>Tipos de Periodos disponibles</h6>
            <br />
            <div class="form-group">
        <div class="col-md-6"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/clientes/nuevo_estudiante"> Nuevo Estudiante </a> </div>
                <div class="col-md-2"> <a class="btn btn-success" href="<?php echo base_url() ?>index.php/clientes/imprimir"> Imprimir </a> </div>
                </div>

            <?php if (count($tipo_periodos)): ?>
            <div class="table-responsive">
                <table class="table table-warning table-hover mb30">
                    <thead>
                    <tr>
                        <th>ID Tipo</th>
                        <th>Descripcion</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($tipo_periodos as $tipo_periodo): ?>
                    <tr>

                        <td><?php echo $tipo_periodo->id_tipo_periodo ?></td>
                        <td><?php echo $tipo_periodo->descripcion_tipo_periodo ?></td>
                        
                        <td>
                            <div class="btn-group">
                                <a data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="fa fa-gear"></i>
                                </a>
                                <ul role="menu" class="dropdown-menu pull-right">
                                    <li><a href="<?php echo base_url() ?>periodos/ver_tipo_por_id/<?php echo $tipo_periodo->id_tipo_periodo ?>">Ver Detalle</a></li>
                                    <li><a href="#">Editar</a></li>
                                </ul>


                        </td>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
                <?php else: ?>
                    <p> No hay Tipos de Periodos  para mostrar </p>
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


