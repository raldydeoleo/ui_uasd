<?php /** @var  $ordencompra */?>

<div class="col-md-10" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="panel panel-info">

        <div class="panel-heading">
            <div class="panel-btns">
                <a href="" class="panel-close">×</a>
                <a href="" class="minimize">−</a>
            </div>
            <h5 class="panel-title">Vista de Inscripcion Semestre de Estudiante</h5>
        </div>

        <div class="panel-body" >

            <form class="form-horizontal form-bordered">

                <div class="col-md-6 right">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">Estudiante</h4>
                        </div>
                        <div class="panel-body">
                        <!-- Script para mostrar los datos del estudiante en la vista inscripcion por semestre -->
                            <?php
                            $id_est =  $inscripcion->id_estudiante;
                            $mysqli =new mysqli("localhost", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT nombre_estudiante, apellido_estudiante, matricula_estudiante FROM estudiantes WHERE id_estudiante  = $id_est";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){

                                    while ($row = $result->fetch_array()){
                                        echo '<h4>Nombre :';
                                        echo '<b>' . $row[0];
                                        echo '</b>';

                                        echo '</br>';
                                        echo 'Apellido : ';
                                        echo '<b>';
                                        echo  $row[1];
                                        echo '</b>';

                                        echo '</br>';
                                        echo 'Matricula : ';
                                        echo '<b>';
                                        echo  $row[2];
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
                                <tr>  
                                <th>ID Inscripción</th>
                                 <th>Fecha</th>
                                 <th>Hora</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                            <td> <?php echo ($inscripcion->id_inscripcion) ?></td>
                             <td><?php echo ($inscripcion->fecha_inscripcion) ?></td>
                             <td><?php echo ($inscripcion->hora_inscripcion) ?></td>

                                </tr></tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <table class="table table-warning table-hover mb30" id="table_orden">
                    <thead>
                    <tr>
                   
                    <th>Descripcion de Inscripción</th>                   
                    <th>Creditos inscritos</th>
                    <th>Precio de Crédito </th>
                    <th>Monto</th>
                   
                    </tr>
                    </thead>
                   <tbody>
                 <tr>
                     
                     <td> <h4><?php echo $inscripcion->desc_inscripcion ?> </h4></td>
                     <td> <h4> <?php echo $inscripcion->creditos_inscripcion; ?> </h4></td>
                     <td><h4><?php echo $inscripcion->precio_credito_inscripcion; ?> </h4></td>
                    <td> <h4> <?php echo $inscripcion->monto_inscripcion; ?> </h4></td>
                    
                 </tr>


                   </tbody>
                </table>
                <div class="col-md-12"> <h3> Nota : <?php echo $inscripcion->nota_inscripcion; ?> </h3></div>
                <div class="col-md-7"></div>
                <div class="col-md-5 left">
                    <div class="panel panel-danger">


                        <div class="panel-body">
                            <table class="table table-warning table-hover mb30" id="table_orden">
                                <thead>
                                <tr>
                                    <th>Subtotal</th>
                                    <th>FED (RD$30)</th>
                                    <th>Total a pagar</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td><h4><?php echo $inscripcion->subtotal_inscripcion; ?> </h4></td>
                                    <td> <h4> 30.00 </h4></td>
                                    <td> <h4><?php echo $inscripcion->total_inscripcion; ?> </h4></td>
                                    </tr> 
                                    </tbody>
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
                <div class="col-sm-12"><center> <div> <a class="btn btn-info" href="<?php echo base_url() ?>index.php/inscripciones/listaInscripciones"> Volver al listado </a>
                    </div></center>
                    </div></td>
                        <td>
                    <div class="col-sm-6 ">
                        <?php $id = $this->uri->segment(3);?>
                        <center><div> <a class="btn btn-success" href="<?php echo base_url() ?>imprimirEstudiantes/pago_inscripcion/<?php echo $inscripcion->id_inscripcion ?>">Imprimir </a> </div></center>
                        
                    </div> </td>
                        <td>
                        
                        <div class="col-sm-12"><center> <div> <a class="btn btn-warning" data-toggle="modal" data-target="#llamadaAsignatura"> Pagar </a>
                    </div></center>
                        </td>

                </div>
            </tr> </tbody></table>

             </div>


            </div>
                                       



         </form>
         </div>
         </div>

        </div><!-- panel-footer -->

        </div>
    </div>

</div>
<div class="modal fade" id="llamadaAsignatura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Pagar inscripcion</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <div class="col-md-12">
                        
                        <div class="col-sm-8">
                        <?php echo form_label('Estudiante: '); ?>
                        <?php
                        $id = $inscripcion->id_estudiante;
                        $mysqli =new mysqli("localhost", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_estudiante, nombre_estudiante, apellido_estudiante FROM estudiantes WHERE id_estudiante=".$id."";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_estudiante'>";

                                    while ($row = $result->fetch_array()){

                                        echo "<option value='$row[0]'>";
                                        echo "$row[1]";
                                        echo " $row[2]" ?>
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
                    ID Inscripcion: <b> <?php echo $inscripcion->id_inscripcion ?></b><br>
                    Fecha:<b> <?php echo $inscripcion->fecha_inscripcion ?> </b><br>                  
                    Creditos:<b> <?php echo $inscripcion->creditos_inscripcion ?> </b> <br>             
                    Total a pagar (RD$):<b> <?php echo $inscripcion->total_inscripcion ?> </b> <br>
                   
                    </div>

                    <div class="col-md-12">
                    <form action="your-server-side-code" method="POST">
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_9qoheWgHobM4cM9UwLVJxFtN"
                        data-amount="<?= $inscripcion->total_inscripcion ?>.00"
                        data-name="SPA-UASD"
                        data-description="Pago de Inscripcion"
                        data-image="<?php  echo base_url() ?>assets/images/favicon.jpg"
                        data-locale="auto">
                    </script>
                    </form>

                   
                       
                      
                       
       
                    </div>
                            <div class="col-md-2">
                                <span class="checkmark" class="form-control" >Pago en efectivo</span>
                                <input type="checkbox" class="form-control" checked="checked">
                                
                            </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                <a href="<?php  echo base_url() ?>index.php/inscripciones/pagoEfectivo/<?php echo $inscripcion->id_inscripcion ?>"><button type="button" class="btn btn-primary">Pagar</button></a>
            </div>
        </div>
    </div>
</div>
<!-- Fin Contenido llamada al Cliente -->
