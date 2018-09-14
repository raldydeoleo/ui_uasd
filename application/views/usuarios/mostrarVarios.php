<?php /** @var array $usuarios */?>
<?php /** @todo (23/07/2016) Wolfan Fabian - Esta vista debe ser preparada para paginacion */?>
<?php /** @todo (23/07/2016) Wolfan Fabian - Esta vista debe ser preparada para busquedas en la misma vista */?>


<div class="contentpanel">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="subtitle mb5">Usuarios </h5>
            <p class="m20">Lista general de los usuarios. </p>
            <br>
            <div class="table-responsive">
                <table class="table table-info table-hover" id="table1">

                    <thead>
                    <tr role="row">
                        <th>Username</th>
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Fecha Nacimiento</th>
                        <th>Teléfono</th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php foreach($usuarios as $usuario): ?>
                        <tr class="gradeA odd" role="row">
                            <td class="sorting_1">

                                <a href="<?= base_url("usuarios/mostrar/{$usuario[ID_USUARIO]}"); ?>">
                                    <?=$usuario[USERNAME_CN];?>
                                </a>


                            </td>
                            <td><?=$usuario[NOMBRES_CN] . ' ' . $usuario[APELLIDOS_CN]; ?></td>
                            <td> <?=$usuario[SEXO_CN]; ?> </td>
                            <td> <?=$usuario[FECHA_NACIMIENTO_CN]; ?> </td>
                            <td class="center"> <?=$usuario[TELEFONO_CONTACTO_CN]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
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
</div>