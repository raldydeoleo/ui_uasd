<?php /** @var array $proveedores */?>

 <div class="panel panel-default">

    <div class="panel-body">

        <div class="col-md-12">
            <div class="panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Crear Orden de Compra</h4>
                </div>
            </div>


            <?=form_open(base_url().'compras/insertar_detallaorden');

            $id_ordencompra = array(
                'name' => 'id_ordencompra',
                'id' => 'id_ordencompra',
                'class' => 'form-control',
                'size' => '1',
                'style' => 'width:100%',
                'value' => set_value('id_ordencompra')
            );
            $fecha_detalleorden = array(
                'name' => 'fecha_ordencompra',
                'id' => 'datepicker',
                'class' => 'form-control',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('fecha_ordencompra') // con esto al procesar el formulario de forma incorrecta quedará guardado el dato que le habíamos puesto
            );
            $condicion_ordencompra = array(
                'name' => 'condicion_ordencompra',
                'id' => 'condicion_ordencompra',
                'class' => 'form-control',
                'size' => '1',
                'style' => 'width:100%',
                'value' => set_value('condicion_ordencompra') // con esto al procesar el formulario de forma incorrecta quedará guardado el dato que le habíamos puesto
            );
            $id_proveedor = array(
                'name' => 'id_proveedor',
                'id' => 'id_proveedor',
                'class' => 'form-control',
                'size' => '1',
                'style' => 'width:100%',
                'value' => set_value('id_proveedor')
            );

            $id_proyecto = array(
                'name' => 'id_proyecto',
                'id' => 'id_proyecto',
                'class' => 'form-control',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('id_proyecto')
            );

            $id_asociado = array(
                'name' => 'id_asociado',
                'id' => 'id_asociado',
                'class' => 'form-control',
                'size' => '1',
                'style' => 'width:100%',
                'value' => set_value('id_asociado')
            );

            $total_detalleorden = array(
                'name' => 'total_ordencompra',
                'id' => 'total_ordencompra',
                'class' => 'form-control',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('total_ordencompra')
          );


            $cancel = array(
                'name' => 'cancel',
                'id' => 'cancel',
                'class' => 'form-control',
                'class' => 'btn btn-danger',
                'value' => 'Cancelar',
                'title' => 'Cancelar'
            );

            $submit = array(
                'name' => 'submit',
                'id' => 'submit',
                'class' => 'form-control',
                'class' => 'btn btn-primary',
                'value' => 'Crear Orden',
                'title' => 'Crear Orden'
            );

?>
            <form class="form-horizontal form-bordered">

                <div class="form-group">

                        <div class="col-md-2">
                            <label class="col-sm-12">Condicion:</label>
                            <select  class="form-control" name="condicion_ordencompra" <?php echo form_input($condicion_ordencompra); ?>>
                                <option value="1">Credito</option>
                                <option value="2">Contado</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                        </div>
                        <div class="col-md-2">
                            <?php echo form_label('Fecha: '); ?>
                            <?php echo form_input($fecha_detalleorden); ?>
                        </div>

                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <?php echo form_label('Orden de compra: '); ?>
                        <?php
                        $mysqli =new mysqli("localhost", "root","", "db_eess");
                        if ($mysqli === false){
                            die("Error: No se establecio la conexion." . mysqli_connect_error());
                        }
                        $sql = "SELECT id_ordencompra, numero_ordencompra FROM ordenescompra";
                        if ($result = $mysqli->query($sql)){
                            if ($result->num_rows > 0){
                                echo "<select class='form-control' name='id_ordencompra'>";
                                while ($row = $result->fetch_array()){

                                    echo "<option value='$row[0]'>";
                                    // echo $row[0];
                                    echo " $row[1]" ?>
                                    <?php echo "</option> ";

                                }

                            } echo "</select>";
                            $result->close();
                        } else {
                            echo "No se encontraron registros.";
                        }
                        //}
                        $mysqli->close();
                        ?>


                    </div>


                    <div class="col-md-4">
                        <?php echo form_label('Proveedor: '); ?>
                        <?php
                        $mysqli =new mysqli("localhost", "root","", "db_eess");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_proveedor, empresa_proveedor FROM proveedores";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_proveedor'>";
                                    while ($row = $result->fetch_array()){

                                        echo "<option value='$row[0]'>";
                                        // echo $row[0];
                                        echo " $row[1]" ?>
                                   <?php echo "</option> ";

                                    }

                                    } echo "</select>";
                                    $result->close();
                                } else {
                                  echo "No se encontraron registros.";
                                  }
                            //}
                            $mysqli->close();
                  ?>


                    </div>

                    <div class="col-md-4">
                        <?php echo form_label('Proyecto: '); ?>

                        <?php
                        $mysqli =new mysqli("localhost", "root","", "db_eess");
                        if ($mysqli === false){
                            die("Error: No se establecio la conexion." . mysqli_connect_error());
                        }
                        $sql = "SELECT id_proyecto, nombre_proyecto FROM proyectos";
                        if ($result = $mysqli->query($sql)){
                            if ($result->num_rows > 0){
                                echo "<select class='form-control' name='id_proyecto'>";
                                while ($row = $result->fetch_array()){

                                    echo "<option value='$row[0]'>";
                                    // echo $row[0];
                                    echo " $row[1]" ?>
                                    <?php echo "</option> ";

                                }

                            } echo "</select>";
                            $result->close();
                        } else {
                            echo "No se encontraron registros.";
                        }
                        //}
                        $mysqli->close();
                   ?>

                    </div>

                    <div class="col-md-4">

                        <?php echo form_label('Asociado: '); ?>

                        <?php
                        $mysqli =new mysqli("localhost", "root","", "db_eess");
                        if ($mysqli === false){
                            die("Error: No se establecio la conexion." . mysqli_connect_error());
                        }
                        $sql = "SELECT id_asociado, nombre_asociado FROM asociado";
                        if ($result = $mysqli->query($sql)){
                            if ($result->num_rows > 0){
                                echo "<select class='form-control' name='id_asociado'>";
                                while ($row = $result->fetch_array()){

                                    echo "<option value='$row[0]'>";
                                    // echo $row[0];
                                    echo " $row[1]" ?>
                                    <?php echo "</option> ";

                                }

                            } echo "</select>";
                            $result->close();
                        } else {
                            echo "No se encontraron registros.";
                        }
                        //}
                        $mysqli->close();
                        ?>

                       
                    </div>
                </div>

                </div>


                    <div class="form-group">


                        <div class="form-group">



                                    <div class="col-md-3">
                                    <label class="col-sm-6 control-label"> </label>
                                    <div class="col-sm-6">

                                        <?php echo form_label('Total General: '); ?>
                                        <div class="input-group mb15 col-sm-12">
                                            <?php echo form_input($total_detalleorden); ?>

                                        </div>

                                    </div>
                            </div>
                     </div>





                    <div class="form-group">
                    <div class="col-md-8">
                    </div>

                        <div class="col-md-2">

                                <?php echo form_reset($cancel);
                                //nuestro boton submit
                                ?>

                        </div>

                        <div class="col-md-2">

                            <?php echo form_submit($submit);
                            //nuestro boton submit
                            ?>


                        </div>

                    </div>
</form>
    </div>

    <?php
    echo form_close();
    ?>

<?php
echo form_fieldset_close();
?>


       </div>
    </div>
</div>

<!-- Contenido llamada al Cliente -->
<div class="modal fade" id="llamadaCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Seleccione un Proyecto</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">Proyecto</label>
                        <div class="col-sm-8">


                            <select class="form-control" name="proveedores">

                                <option>Seleccione un Proyecto</option>
                                <option value="1">Proyecto 1</option>
                                <option value="2">Proyecto 2</option>
                                <option value="3">Proyecto 3</option>
                                <option value="4">Proyecto 4</option>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="col-sm-4 control-label">Observaciones</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Contenido llamada al Cliente -->
