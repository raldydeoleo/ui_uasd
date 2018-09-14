<?php /** $var array $categoriasfin  */ ?>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">


            <h5 class="subtitle md5">LISTA DE CATEGORIAS FINANCIERAS</h5>
            <h6> Categorias financieras disponibles para asignar</h6>
            <br />

            <div class="form-group">
        <div class="col-md-8"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/categorias/nueva_categoriafin"> Nuevo Categoria </a> </div>
               
                </div>
                
            <?php if (count($categoriasfin)): ?>
            <div class="table-responsive">
                <table class="table table-warning table-hover mb30">
                    <thead>
                    <tr>
                        <th>ID Categoria</th>
                        <th>Descripcion Categoria</th>
                        <th>Precio de Credito</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($categoriasfin as $categoriafin): ?>
                    <tr>

                        <td><?php echo $categoriafin->id_categoria ?></td>
                        <td><?php echo $categoriafin->descripcion_categoria ?></td>
                        <td><?php echo $categoriafin->preciocredito_categoria ?></td>
                        
                        
                        
                        <td>
                            <div class="btn-group">
                                <a data-toggle="dropdown" class="dropdown-toggle">
                                    <i class="fa fa-gear"></i>
                                </a>
                                <ul role="menu" class="dropdown-menu pull-right">
                                    <li><a href="<?php echo base_url() ?>categorias/ver/<?php echo $categoriafin->id_categoria ?>">Ver Detalles</a></li>
                                    <li><a href="<?php echo base_url() ?>categorias/editar/<?php echo $categoriafin->id_categoria ?>">Editar</a></li>
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


