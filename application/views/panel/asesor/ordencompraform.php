<?php /** @var array $proveedores */?>

 <div class="panel panel-default">

    <div class="panel-body">

        <div class="col-md-12">
            <div class="panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Crear Orden de Compra</h4>
                </div>
            </div>


            <?=form_open(base_url().'compras/insertar_ordencompra');

            //creamos los arrays que compondran nuestro formulario

            $numero_ordencompra = array(
                'name' => 'numero_ordencompra',
                'id' => 'numero_ordencompra',
                'required'=> 'required',
                'class' => 'form-control',
                'size' => '50',
                'style' => 'width:100%',
                'value' => 'OR-EESS-01-17'  //set_value('numero_ordencompra')
            );

            $fecha_ordencompra = array(
                'name' => 'fecha_ordencompra',
                'id' => 'datepicker',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value(date('fecha_ordencompra'))
            );
            $fecha_vence = array(
                'name' => 'fecha_vence',
                'id' => 'fecha_vence',
                'class' => 'form-control',
                'required'=> 'required',
                'type' => 'date',
                'size' => '10',
                'style' => 'width:100%',
                'value' => set_value('fecha_vence')
            );
            $condicion_ordencompra = array(
                'name' => 'condicion_ordencompra',
                'id' => 'condicion_ordencompra',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '1',
                'style' => 'width:100%',
                'value' => set_value('condicion_ordencompra')
            );
            $id_proveedor = array(
                'name' => 'id_proveedor',
                'id' => 'id_proveedor',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '1',
                'style' => 'width:100%',
                'value' => set_value('id_proveedor')
            );

            $id_proyecto = array(
                'name' => 'id_proyecto',
                'id' => 'id_proyecto',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('id_proyecto')
            );

            $id_asociado = array(
                'name' => 'id_asociado',
                'id' => 'id_asociado',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '1',
                'style' => 'width:100%',
                'value' => set_value('id_asociado')
            );

            $item_ordencompra = array(
                'name' => 'item_ordencompra',
                'id' => 'item_ordencompra',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('item_ordencompra')
            );

            $desc_ordencompra = array(
                'name' => 'desc_ordencompra',
                'id' => 'desc_ordencompra',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('desc_ordencompra')
            );


            //el cuarto...(campo mensaje)
                $unidad_ordencompra = array(
                'name' => 'unidad_ordencompra',
                'id' => 'unidad_ordencompra',
                'class' => 'form-control',
                'required'=> 'required',
                'rows' => 10,
                'cols' => 40,
                'value' => set_value('unidad_ordencompra')
            );

            $cantidad_ordencompra = array(
                'name' => 'cantidad_ordencompra',
                'id' => 'valor3',
                'class' => 'form-control',
                'required'=> 'required',
                'rows' => 10,
                'cols' => 40,
                'value' => set_value('cantidad_ordencompra')
            );
            $precio_ordencompra = array(
                'name' => 'precio_ordencompra',
                'id' => 'valor4',
                'class' => 'form-control',
                'required'=> 'required',
                'rows' => 10,
                'cols' => 40,
                'value' => set_value('precio_ordencompra')
            );

            //el cuarto...(campo mensaje)
            $monto_ordencompra = array(
                'name' => 'monto_ordencompra',
                'id' => 'monto',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'onkeyup' => 'multiplicar();',
                'value' => set_value('monto_ordencompra')
            );
            $nota_ordencompra = array(
                'name' => 'nota_ordencompra',
                'id' => 'nota_ordencompra',
                'class' => 'form-control',
                'size' => '100',
                'style' => 'width:100%',
                'value' => set_value('nota_ordencompra')
            );

            $subtotal_ordencompra = array(
                'name' => 'subtotal_ordencompra',
                'id' => 'valor1',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('subtotal_ordencompra')
            );

            $itebis_ordencompra = array(
                'name' => 'itebis_ordencompra',
                'id' => 'valor2',
                'class' => 'form-control',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('itebis_ordencompra')
            );

            $total_ordencompra = array(
                'name' => 'total_ordencompra',
                'id' => 'total',
                'class' => 'form-control',
                'required'=> 'required',
                'size' => '50',
                'style' => 'width:100%',
                'value' => set_value('total_ordencompra')
          );

            //Botón cancel formulario cancela creacion  orden de compra
            $cancel = array(
                'name' => 'cancel',
                'id' => 'cancel',
                'class' => 'form-control',
                'class' => 'btn btn-danger',
                'value' => 'Cancelar',
                'title' => 'Cancelar'
            );
            //Botón submit formulario crear orden de compra
            $submit = array(
                'name' => 'submit',
                'id' => 'submit',
                'class' => 'form-control',
                'class' => 'btn btn-primary',
                'value' => 'Crear Orden',
                'title' => 'Crear Orden'
            );

?>
<?php
echo form_fieldset('.');
?>


            <form class="form-horizontal form-bordered">

                <div class="form-group">


                        <div class="col-md-3">
                            <?php echo form_label('Orden No.: '); ?>
                            <?php

                            echo form_input($numero_ordencompra); ?>
                        </div>



                        <div class="col-md-2">
                            <label class="col-sm-12">Condicion:</label>
                            <select  class="form-control" name="condicion_ordencompra" <?php echo form_input($condicion_ordencompra); ?>>
                                <option value="0">Seleccione</option>
                                <option value="1">Credito</option>
                                <option value="2">Contado</option>
                            </select>
                        </div>


                    <?php  ?>

                            <div class="col-md-5">
                                <?php echo form_label('Fecha de Vencimiento: '); ?>
                                <?php
                                 echo form_input($fecha_vence); ?>
                            </div>

                        <!--  <input name="fecha" type="text" id="fecha" value="<?php /* echo $nuevafecha; */ ?>" size="10" /> -->

                        <div class="col-md-2">
                            <?php echo form_label('Fecha: '); ?>
                            <?php echo form_input($fecha_ordencompra); ?>
                         <!--   <input name="fecha" type="text" id="fecha" value="<?php /** echo $fecha; */ ?>" size="10" /> -->
                        </div>

                </div>

                <div class="form-group">


                    <div class="col-md-4">
                        <?php echo form_label('Proveedor: '); ?>
                        <?php
                        $mysqli =new mysqli("localhost", "root","", "db_eess2");
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
                        $mysqli =new mysqli("localhost", "root","", "db_eess2");
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
                        $mysqli =new mysqli("localhost", "root","", "db_eess2");
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


                   <!-- <div class="col-md-2">
                        <div class="col-sm-6"  >
                            <button class="btn btn-danger"><a data-toggle="modal" data-target="#llamadaCliente">Seleccionar</a></button>
                        </div>
                   </div> -->
                </div>


                    <div class="form-group">

                            <div class="col-md-1">
                                <?php echo form_label('Item: '); ?>
                                <div class="input-group mb15 col-sm-12">
                                    <?php echo form_input($item_ordencompra); ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <?php echo form_label('Descripcion: '); ?>
                                <div class="input-group mb15 col-sm-12">
                                    <?php echo form_input($desc_ordencompra); ?>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <?php echo form_label('Unidad: '); ?>
                                <select   <?php echo form_input($unidad_ordencompra); ?> >
                                    <option value="0"></option>
                                    <option value="1-pie">Pie</option>
                                    <option value="2-Libra">Lb</option>
                                    <option value="3- Kilo">Kg</option>
                                    <option value="4-Quintal">Quintal</option>
                                    <option value="4-Metro">Metro</option>
                                    <option value="6-Tonelada">Tonelada</option>
                                    <option value="7-Galon">Galon</option>

                                </select>
                                <div class="input-group mb15 col-sm-12">

                                </div>
                            </div>

                            <div class="col-md-1">
                                <?php echo form_label('Cantidad: '); ?>
                                <div class="input-group mb15 col-sm-12">
                                    <?php echo form_input($cantidad_ordencompra); ?>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <?php echo form_label('Precio: '); ?>
                                <div class="input-group mb15 col-sm-12">
                                    <?php echo form_input($precio_ordencompra); ?>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <?php echo form_label('Total: '); ?>
                                <div class="input-group mb15 col-sm-12">

                                    <?php $mt ='onkeyup="multiplicar()"';
                                    echo form_input($monto_ordencompra, $mt); ?>
                                </div>
                            </div>

                        <div class="form-group">

                            <div class="table-responsive">
                                <table class="table table-info table-hover" id="tabla">

                                    <thead>
                                    <tr role="row">
                                        <th>Item</th>
                                        <th>Descripcion</th>
                                        <th>Unidad</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Monto</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Articulos varios Fact. #69791</td>
                                        <td>1</td>
                                        <td>unidad</td>
                                        <td>2,500.00</td>
                                        <td>2,500.00</td>


                                    </tr>


                                    </tbody>

                                </table>
                                </body>

                           </HTML>

                         </div>

                        <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="col-sm-12 control-label">Notas</label>
                                        <div class="col-sm-10">
                                            <?php echo form_input($nota_ordencompra); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                    <label class="col-sm-6 control-label"></label>
                                    <div class="col-sm-6">
                                        <?php echo form_label('Subtotal: '); ?>
                                        <div class="input-group mb15 col-sm-12">
                                            <?php $itb ='onkeyup="multiplicar2()"';
                                            echo form_input($subtotal_ordencompra, $itb); ?>

                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-md-2">
                                    <label class="col-sm-6 control-label"></label>
                                    <div class="col-sm-6">
                                        <?php echo form_label('Itebis(18%): '); ?>
                                        <div class="input-group mb15 col-sm-12">
                                            <?php echo form_input($itebis_ordencompra); ?>

                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-md-3">
                                    <label class="col-sm-6 control-label"> </label>
                                    <div class="col-sm-6">

                                        <?php echo form_label('Total General: '); ?>
                                        <div class="input-group mb15 col-sm-12">
                                            <?php  $ttg ='onkeyup="sumar()"';
                                            echo form_input($total_ordencompra, $ttg); ?>

                                        </div>

                                    </div>
                            </div>
                     </div>

                            <?php
                            $mañana = mktime(0, 0, 0, date("m") , date("d")+1, date("Y"));
                            $hoy = date("d-m-Y");
                            //$mes_anterior = mktime(0, 0, 0, date("m")-1, date("d"), date("Y"));
                            //$año_siguiente = mktime(0, 0, 0, date("m"), date("d"), date("Y")+1);
                            //echo $hoy;

                            ?>

                        </div>

                    <div class="form-group">
                    <div class="col-md-8"> </div>

                        <div class="col-md-2">
                                <?php echo form_reset($cancel);
                                ?>
                        </div>

                        <div class="col-md-2">
                            <?php echo form_submit($submit);
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

        <!-- Javascript -->


        <script type="text/javascript">

            /**
             * Funcion que se ejecuta cada vez que se añade una letra en un cuadro de texto
             * Multiplica cantidad por precio.
             */
            function multiplicar()
            {
                var valor3=verificar("valor3");
                var valor4=verificar("valor4");
                // realizamos la multiplicacion de los valores y los ponemos en la casilla del
                // formulario que contiene el total
                document.getElementById("monto").value=parseFloat(valor3)*parseFloat(valor4);
            }

            /**
             * Funcion que se ejecuta cada vez que se añade una letra en un cuadro de texto
             * Suma los valores de los cuadros de texto
             */
            function multiplicar2()
            {
                var valor1=verificar("valor1");
                var valor2=verificar("valor2");

                // realizamos la suma de los valores y los ponemos en la casilla del
                // formulario que contiene el total
                document.getElementById("valor2").value=parseFloat(valor1)*(0.18);
            }


            function sumar()
            {
                var valor1=verificar("valor1");
                var valor2=verificar("valor2");

                // realizamos la suma de los valores y los ponemos en la casilla del
                // formulario que contiene el total
                document.getElementById("total").value=parseFloat(valor1)+parseFloat(valor2);
            }


            /**
             * Funcion para verificar los valores de los cuadros de texto. Si no es un
             * valor numerico, cambia de color el borde del cuadro de texto
             */
            function verificar(id)
            {
                var obj=document.getElementById(id);
                if(obj.value=="")
                    value="0";
                else
                    value=obj.value;
                if(validate_importe(value,1))
                {
                    // marcamos como erroneo
                    obj.style.borderColor="#808080";
                    return value;
                }else{
                    // marcamos como erroneo
                    obj.style.borderColor="#f00";
                    return 0;
                }
            }

            /**
             * Funcion para validar el importe
             * Tiene que recibir:
             *  El valor del importe (Ej. document.formName.operator)
             *  Determina si permite o no decimales [1-si|0-no]
             * Devuelve:
             *  true-Todo correcto
             *  false-Incorrecto
             */
            function validate_importe(value,decimal)
            {
                if(decimal==undefined)
                    decimal=0;

                if(decimal==1)
                {
                    // Permite decimales tanto por . como por ,
                    var patron=new RegExp("^[0-9]+((,|\.)[0-9]{1,2})?$");
                }else{
                    // Numero entero normal
                    var patron=new RegExp("^([0-9])*$")
                }

                if(value && value.search(patron)==0)
                {
                    return true;
                }
                return false;
            }
        </script>


        <!-- Javascript end -->


    </div>


</div>

<div class="form-group">
    <div class="col-md-8">
        <div class="col-md-3"><input type="hidden" id="valor3" onkeyup="multiplicar();"></div>
        <div class="col-md-3"><input type="hidden" id="valor4" onkeyup="multiplicar();"></div>
        <!-- <div class="col-md-3">Monto: <input type="text" id="monto" disabled value="0"></div> -->

        <div class="col-md-12"> <input type="" id="valor1" onchange="sumar();" onkeyup="multiplicar2();"></div>
        <div class="col-md-6"><input type="" value="0" id="valor2" onkeyup="sumar();"></div>
        <!--    <div class="col-md-6">Total: <input type="text" id="total" disabled value="0" > </div> -->
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
