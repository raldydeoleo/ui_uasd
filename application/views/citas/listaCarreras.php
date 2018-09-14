<?php /** $var array $carreras  */ ?>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">


            <h2 class="subtitle md5">LISTA DE CARRERAS</h2>
            <h6>Carreras disponibles para seleccionar</h6>
            <br />

            <div class="form-group">
        <div class="col-md-6"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/carreras/nueva_carrera"> Nueva Carrera </a> </div>
                <div class="col-md-2"> <a class="btn btn-success" href="<?php echo base_url() ?>index.php/imprimirCarreras"> Imprimir </a> </div>
                </div>

                
            <?php if (count($carreras)): ?>
            <div class="table-responsive">
                <table class="table table-warning table-hover mb30">
                    <thead>
                    <tr>
                        <th>ID Carrera</th>
                        <th>Descripcion Carrera</th>                        
                        <th>Facultad</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($carreras as $carrera): ?>
                    <tr>

                        <td><?php echo $carrera->id_carrera ?></td>
                        <td><?php echo $carrera->desc_carrera ?></td>
                        
                        <td><?php echo $carrera->id_facultad ?></td>
                        
                        
                        <td>
                            <div class="btn-group">
                                <a data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="fa fa-gear"></i>
                                </a>
                                <ul role="menu" class="dropdown-menu pull-right">
                                    <li><a href="<?php echo base_url() ?>carreras/ver/<?php echo $carrera->id_carrera ?>">Ver Carrera</a></li>
                                    <li><a href="<?php echo base_url() ?>carreras/editar/<?php echo $carrera->id_carrera ?>">Editar</a></li>
                                    <li><a href="<?php echo base_url() ?>clientes/EstudiantesPorcarrera/<?php echo $carrera->id_carrera ?>">Estudiantes por carrera</a></li>
                                    <li><a href="<?php echo base_url() ?>asignaturas/AsignaturasPorcarrera/<?php echo $carrera->id_carrera ?>">Asignaturas por carrera</a></li>

                                </ul>


                        </td>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
                <?php else: ?>
                    <p> No hay Carreras para mostrar </p>
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


