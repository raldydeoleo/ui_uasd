<?php /** $var array $asociados  */ ?>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">


            <h5 class="subtitle md5">LISTA DE ASOCIADOS</h5>
            <h6>Asociados activos para colaborar en proyectos</h6>
            <br />
            <?php if (count($asociados)): ?>
            <div class="table-responsive">
                <table class="table table-warning table-hover mb30">
                    <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre Asociado</th>
                        <th>Porciento(%)</th>
                        <th>RNC</th>
                        <th>Servicio</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($asociados as $asociado): ?>
                    <tr>

                        <td><?php echo $asociado->id_asociado ?></td>
                        <td><?php echo $asociado->nombre_asociado ?></td>
                        <td><?php echo $asociado->porciento_asociado ?></td>
                        <td><?php echo $asociado->rnc_asociado ?></td>
                        <td><?php echo $asociado->servicio_asociado ?></td>
                        <td></td>
                        <td>
                            <div class="btn-group">
                                <a data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="fa fa-gear"></i>
                                </a>
                                <ul role="menu" class="dropdown-menu pull-right">
                                    <li><a href="<?php echo base_url() ?>proyectos/gastosDelasociado/<?php echo $asociado->id_asociado ?>">Ver Detalle</a></li>
                                    <li><a href="#">Editar</a></li>
                                </ul>


                        </td>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
                <?php else: ?>
                    <p> No hay Asociados para mostrar </p>
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


