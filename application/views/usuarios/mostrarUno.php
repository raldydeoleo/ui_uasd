<?php /** @var array $usuario */?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 panel">

        <br>

        <h5 class="subtitle mb5"><?=$usuario[NOMBRES_CN] . ' ' . $usuario[APELLIDOS_CN]; ?></h5>
        <p class="mb20">Detalles del usuario</p>
        <div class="table-responsive">
            <table class="table mb30">
                <tbody>

                <tr>
                    <td>Nombres: </td>
                    <td class="text-primary"><?=$usuario[NOMBRES_CN];?></td>

                    <td>Apellidos: </td>
                    <td class="text-primary"><?=$usuario[APELLIDOS_CN];?></td>
                </tr>


                <tr>
                    <td>Sexo: </td>
                    <td class="text-primary"><?=$usuario[SEXO_CN];?></td>

                    <td>Fecha de nacimiento: </td>
                    <td class="text-primary"><?=$usuario[FECHA_NACIMIENTO_CN];?></td>
                </tr>

                <tr>
                    <td>Teléfono: </td>
                    <td class="text-primary"><?=$usuario[TELEFONO_CONTACTO_CN];?></td>

                    <td>Celular: </td>
                    <td class="text-primary"><?=$usuario[TELEFONO_SECUNDARIO_CN];?></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td class="text-primary"><?=$usuario[USERNAME_CN];?></td>

                    <td>Email: </td>
                    <td class="text-primary"><?=$usuario[EMAIL_CN];?></td>
                </tr>

                <tr>
                    <td>Estado: </td>
                    <td class="text-primary"><?=$usuario[ESTADO_CN];?></td>

                    <td>Habilitado: </td>

                    <?php /**@todo (26/07/2016) Wolfan Fabian - Este campo debe ponerse de solo lectura */?>
                    <td class="text-primary">
                        <div class="toggle toggle-primary" style="height: 20px; width: 50px;">
                            <div class="toggle-slide active">
                                <div class="toggle-inner" style="width: 80px; margin-left: 0px;">
                                    <div class="toggle-on active" style="height: 20px; width: 40px; text-align: center; text-indent: -10px; line-height: 20px;">ON</div>
                                    <div class="toggle-blob" style="height: 20px; width: 20px; margin-left: -10px;"></div>
                                    <div class="toggle-off" style="height: 20px; width: 40px; margin-left: -10px; text-align: center; text-indent: 10px; line-height: 20px;">OFF</div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>


                </tbody>
            </table>

            <br><br>

                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4" align="center">
                        <a class=" btn btn-success" href="<?= base_url("usuarios/editar/{$usuario[ID_USUARIO]}"); ?>">
                            Editar
                        </a>
                    </div>
                    <div class="col-lg-4"></div>
                </div>

            <br>


        </div>
    </div>
</div>