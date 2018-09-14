<?php /** @var  $ordencompra */?>

<div class="col-md-10" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="panel panel-info">

        <div class="panel-heading">
            <div class="panel-btns">
                <a href="" class="panel-close">×</a>
                <a href="" class="minimize">−</a>
            </div>
            <h5 class="panel-title">Orden de Compra</h5>
        </div>

        <div class="panel-body" >

            <form class="form-horizontal form-bordered">

                <div class="col-md-6 right">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">Proveedor</h4>
                        </div>
                        <div class="panel-body">
<!-- Script para mostrar los datos del proveedor en la vista verOrdenCompra -->
                            <?php
                            $id_prov =  $ordencompra->id_proveedor;
                            $mysqli =new mysqli("localhost", "root","", "db_eess2");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT empresa_proveedor, edireccion_proveedor, etelefono1_proveedor, eemail1_proveedor FROM proveedores WHERE id_proveedor  = $id_prov";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){

                                    while ($row = $result->fetch_array()){
                                        echo '<h4>Nombre :';
                                        echo '<b>' . $row[0];
                                        echo '</b>';

                                        echo '</br>';
                                        echo 'Direccion : ';
                                        echo '<b>';
                                        echo  $row[1];
                                        echo '</b>';

                                        echo '</br>';
                                        echo 'Telefono : ';
                                        echo '<b>';
                                        echo  $row[2];
                                        echo '</b>';

                                        echo '</br>';
                                        echo 'Email : ';
                                        echo '<b>';
                                        echo  $row[3];
                                        echo '</b>';

                                        echo '</h4>';


                                    }

                                }
                                $result->close();
                            } else {
                                echo "No se encontraron registros.";
                            }

                            $mysqli->close();

                            ?>

                            <!--final del Script para mostrar los datos del proveedor en la vista verOrdenCompra -->

                <!--<div class="col-md-12"> <h4> Nombre :<?php /**echo $ordencompra->id_proveedor */ ?> </h4></div>
                <div class="col-md-12"> <h4>  </h4></div>
                <div class="col-md-12"> <h4> Telefono : </h4></div> -->


            </div>
            </div>
            </div>

                <div class="col-md-6 right">
                    <div class="panel panel-danger">

                        <div class="panel-body">
                            <table class="table table-warning table-hover mb30" id="table_orden">
                                <thead>
                                <tr>  <th>Numero de Orden</th>
                                    <th>Fecha</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                            <td> <?php echo ($ordencompra->numero_ordencompra) ?></td>
                             <td><?php echo ($ordencompra->fecha_ordencompra) ?></td>

                                </tr></tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <table class="table table-warning table-hover mb30" id="table_orden">
                    <thead>
                    <tr>
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
                     <td><h4><?php echo $ordencompra->item_ordencompra ?> </h4></td>
                     <td> <h4><?php echo $ordencompra->desc_ordencompra ?> </h4></td>
                     <td> <h4> <?php echo $ordencompra->unidad_ordencompra; ?> </h4></td>
                     <td><h4><?php echo $ordencompra->cantidad_ordencompra; ?> </h4></td>
                    <td> <h4> <?php echo $ordencompra->precio_ordencompra; ?> </h4></td>
                    <td> <h4><?php echo $ordencompra->monto_ordencompra; ?> </h4></td>
                 </tr>


                   </tbody>
                </table>
                <div class="col-md-12"> <h3> Nota : <?php echo $ordencompra->nota_ordencompra; ?> </h3></div>
                <div class="col-md-7"></div>
                <div class="col-md-5 left">
                    <div class="panel panel-danger">


                        <div class="panel-body">
                            <table class="table table-warning table-hover mb30" id="table_orden">
                                <thead>
                                <tr>
                                    <th>Subtotal</th>
                                    <th>itebis</th>
                                    <th>Total</th>

                                </tr>
                                </thead>
                                <tbody>
<tr>
                                <td> <h3><?php echo $ordencompra->subtotal_ordencompra; ?> </h3></td>
                                 <td> <h3><?php echo $ordencompra->itebis_ordencompra; ?> </h3></td>
                                <td> <h3> <?php echo $ordencompra->total_ordencompra; ?> </h3></td>
</tr> </tbody>
                                </table>
                        </div>

                    </div><!-- panel -->

            </div>
        </form>

        <div class="panel-footer">
            <div class="panel-body">
                <table class="table table-warning table-hover mb30" id="table_botonpdf">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>

                    </tr>
                    </thead> <tbody> <tr><td>
            <div class="row">
                <div class="col-sm-12"><center> <div> <a class="btn btn-info" href="<?php echo base_url() ?>index.php/compras/listaOrdenesCompra"> Volver atrás </a>
                    </div></center>
                    </div></td>
                        <td>
                    <div class="col-sm-6 ">
                        <?php $id = $this->uri->segment(3);?>
                        <center><div> <a class="btn btn-info" href="<?php echo base_url() ?>pdf/genera_pdf/<?php echo $id; ?>">PDF Orden </a> </div></center>

                    </div> </td>
                        <td>
                    <div class="col-sm-6 ">
                        <center><div> <a class="btn btn-info" href="<?php echo base_url() ?>pdfs/index"> PDF Ordenes </a> </div></center>
                    </div></td>

                </div>
            </tr> </tbody></table>

            <div class="col-md-12">


                                    <form method="post" action="<?php echo base_url().'welcome/do_upload' ?>" enctype="multipart/form-data">

                                        <table class="table table-warning table-hover mb30" id="table_imagen">
                                            <thead >
                                            <tr>
                                                <th><h3>Agregar imagen</h3></th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                            </thead>
                                            <tbody> <tr>
                                                <td> Descripcion imagen:<input class="form-control" type="text" name="titulo" /></td>
                                        <td><input class="form-control"  type="file" name="userFile"/></td>
                                            <td> <input  class="btn btn-danger" type="submit" value="cargar imagen"></td></tr>
                                            </tbody>
                                        </table>


            </div>
             </div>


            </div>
                                        <div class="col-md-12">

                                                <div class="panel- panel-default widget-photoday">
                                                    <div class="panel-body">
                                                        <img alt="documento anexado a orden" src="<?=base_url()?>uploads/iwatch.jpg" width="800" height="300" class="media-object">
                                                    </div>

                                                </div>

                                        </div>



         </form>
         </div>
         </div>

        </div><!-- panel-footer -->

        </div>
    </div>

</div>
