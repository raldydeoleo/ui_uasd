<?php /** $var array $periodos  */ ?>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">


            <h5 class="subtitle md5">LISTA DE PERIODOS</h5>
            <h6>Periodos disponibles</h6>
            <br />

            <div class="form-group">
        <div class="col-md-8"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/periodos/nuevo_periodo"> Nuevo Periodo </a> </div>
                
                </div>

            <?php if (count($periodos)): ?>
            <div class="table-responsive">
                <table class="table table-warning table-hover mb30">
                    <thead>
                    <tr>
                        <th>ID Periodo</th>
                        <th>Nombre Periodo</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Final</th>
                        <th>Tipo de Periodo</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($periodos as $periodo): ?>
                    <tr>

                        <td><?php echo $periodo->id_periodo ?></td>
                        <td><?php echo $periodo->nombre_periodo ?></td>
                        <td><?php echo $periodo->fechainicio_periodo ?></td>
                        <td><?php echo $periodo->fechafinal_periodo ?></td>
                        <td><?php echo $periodo->id_tipo_periodo ?></td>
                        
                        
                        <td>
                            <div class="btn-group">
                                <a data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="fa fa-gear"></i>
                                </a>
                                <ul role="menu" class="dropdown-menu pull-right">
                                    <li><a href="<?php echo base_url() ?>periodos/ver/<?php echo $periodo->id_periodo ?>">Ver Periodo</a></li>
                                    <li><a href="<?php echo base_url() ?>periodos/editar/<?php echo $periodo->id_periodo ?>">Editar</a></li>
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


