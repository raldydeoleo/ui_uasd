<?php /** @var array $usuarios */?>



    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">Lista de Usuarios</h4>
        <div class="form-group">
        <div class="col-md-6"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/usuarios/nuevo_usuario"> Nuevo usuario </a> </div>
                <div class="col-md-2"> <a class="btn btn-success" href="<?php echo base_url() ?>index.php/imprimirUsuarios"> Imprimir </a> </div>
                </div>


        <?php if (count($usuarios)): ?>
            <div class="table-responsive">
        <table class="table table-info table-hover" id="table1">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Usuario</th>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Nivel de permisos</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($usuarios as $usuario): ?>
                <tr class="odd gradeX">
                    <td><?php echo $usuario->id_usuario ?></td>
                    <td><?php echo $usuario->nombre_usuario ?></td>
                    <td><?php /**  echo $usuario->clave_usuario */?></td>
                    <td><?php /** echo $usuario->clave_usuario */ ?></td>
                    <td><?php /** echo $usuario->clave_usuario */ ?></td>
                    <td><?php echo $usuario->email_usuario ?></td>
                    <td><?php /** echo $usuario->email_usuario */ ?></td>

                    <td>
                 <div class="btn-group">
                   <a data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-gear"></i> </a>
                            <ul role="menu" class="dropdown-menu pull-right">
                    <li><a href="<?php echo base_url() ?>index.php/usuarios/verUsuario/<?php echo $usuario->id_usuario ?>">Ver usuario</a></li>

                    <li><a href="<?php echo base_url() ?>index.php/usuarios/editar/<?php echo $usuario->id_usuario ?>">Editar</a></li>
                    <li><a href="<?php echo base_url() ?>index.php/usuarios/editar/<?php echo $usuario->id_usuario ?>">Desactivar</a></li>

                    <li class="divider"></li>
                    <li><a data-toggle="modal" data-target="#llamadaCliente">Prestamo</a></li>
                    <li><a href="#">Commentar</a></li>
                            </ul>
                </div>


                    </td>


                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

                <?php else: ?>
                    <p> No hay empleados para mostrar </p>
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