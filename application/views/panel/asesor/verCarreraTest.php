<?php /** @var  $carreras */?>

    <div class="col-md-12" xmlns="http://www.w3.org/1999/html">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h5 class="panel-title">Vista individual Carrera</h5>
            </div>


         <div class="panel-body" >
         <div class="form-group"> 
        <h1>ID: <?php echo $carreras->id_carrera; ?> <br />
         Carrera :<?php echo $carreras->desc_carrera ?> <br />       
        Facultad: <?php echo $carreras->id_facultad ?> <br /> </h1>
        <?php echo $carreras->id_asignatura; ?> 
        <?php echo $carreras->nombre_asignatura; ?> 
        
        <div class="col-md-12"> <a class="btn btn-info" href="<?php echo base_url() ?>index.php/carreras"> Volver atrás </a> </div> </div>
        <div class="form-group">   
       

        <div class="table-responsive">
        <?php if (count($carreras)): ?>
        <table class="table table-warning table-hover mb30">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Monto</th>
                <th>Fecha Factura</th>
                <th>Fecha Vencimiento</th>
                <th>Accion</th>

            </tr>
            </thead>
            <tbody>

            <?php foreach($carreras as $carrera): ?>
                <tr>
                    <td style=""> <?php echo $carreras->id_carrera ?> </td>
                    <td style="width: 35%"> <?php echo $carreras->id_asignatura ?> </td>
                    
                    <td style=""> <?php echo $carreras->nombre_asignatura ?> </td>
                    <td style=""> <?php echo $carreras->clave_asignatura ?> </td>
                    <td style=""> <?php echo $carreras->nrc_asignatura ?> </td>
                    <td style=""> <?php echo $carreras->creditos_asignatura ?> </td>

                    <td>

                        <div class="btn-group">
                            <a data-toggle="dropdown" class="dropdown-toggle">
                                <i class="fa fa-gear"></i>
                            </a>
                            <ul role="menu" class="dropdown-menu pull-right">
                                <li><a href="<?php echo base_url() ?>index.php/compras/ver/<?php echo $carreras->id_carrera ?>">Ver compra</a></li>
                                <li><a data-toggle="modal" data-target="#llamadaCliente">Llamada al cliente</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url() ?>index.php/compras/editar/<?php echo $carreras->id_carrera ?>">Editar</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/compras/eliminar/<?php echo $carreras->id_carrera ?>">Eliminar</a></li>
                                <li><a href="#">Commentar</a></li>
                            </ul>
                        </div>
                   </td>

                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
        <?php else: ?>
            <p> No hay registros para mostrar </p>
        <?php endif; ?>
    </div>
                         
     <?php /*

$mysqli = new mysqli("localhost", "root","", "db_uasd");
if ($mysqli === false){
    die ("Error: No se establecio la conexion. " . mysqli_connect_error());
}
    $sql='SELECT *
     FROM asignaturas a, carreras b  WHERE a.id_carrera = b.id_carrera';
 


 if ($result = $mysqli->query($sql)){
    if ($result->num_rows >0){
         

        while ($row = $result->fetch_array()){
            echo "<tr>";
            
            echo "<td>";
            echo  $row[4];  
            echo "</td>";

            echo "<td>";
            echo  $row[3];  
            echo "</td>";          

            echo "<td>";
            echo  $row[5];
            echo "</td>";

            echo "<td>";
            echo  $row[6];
            echo "</td>";

            echo "<td>";
            echo  $row[7];
            echo "</td>";

            echo "<td>";
            echo  $row[8];
            echo "</td>";


            
        }
         echo " </tr>";
         echo " </tbody>";
         echo " </table>";

    }
}            

 */?>
                       
                      <!--FINAL TABLA DETALLE NOMINA -->
                  </div>
         
       
        </div>
</div>
</div>