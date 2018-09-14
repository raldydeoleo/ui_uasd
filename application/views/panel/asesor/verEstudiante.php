<?php /** @var  $estudiante */?>

    <div class="col-md-12" xmlns="http://www.w3.org/1999/html">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h1 class="panel-title">Vista individual Estudiante</h1>
            </div>
 
<b>Carrera  </b>:<?php $idc=$estudiante->id_carrera; 

$mysqli =new mysqli("localhost", "root","", "db_uasd");
    if ($mysqli === false){
        die("Error: No se establecio la conexion." . mysqli_connect_error());
    }
    $sql = "SELECT desc_carrera FROM carreras WHERE id_carrera=".$idc."";
    if ($result = $mysqli->query($sql)){
        if ($result->num_rows > 0){
            

            while ($row = $result->fetch_array()){
               
                echo "<option value='$row[0]'>";
                echo "$row[0]";
                //echo " $row[2]" ?>
           <?php echo "</option> ";

            }

            } echo "</select>";
           
            $result->close();
        } 
    
//}
    $mysqli->close();


?>

        <div class="panel-body" >
       
        <div><?php /*
      
      $id = $estudiante->id_estudiante;
      $mysqli =new mysqli("localhost", "root","", "db_uasd");
    if ($mysqli === false){
        die("Error: No se establecio la conexion." . mysqli_connect_error());
    }
    $sql = "SELECT ruta  FROM foto_estudiante WHERE id_estudiante=".$id."";
    if ($result = $mysqli->query($sql)){
        if ($result->num_rows > 0){
            

            while ($row = $result->fetch_array()){
               
                echo "<option value='$row[0]'>";
                echo "$row[0]";
                //echo " $row[2]" ?>
           <?php echo "</option> ";

            }

            } echo "</select>";
       
            $result->close();
        } 
    

    $mysqli->close();
      */  ?></div>

        <div class="col-md-8">


    <div class="people-item">
    <div class="media">
        <a href="#" class="pull-left">
        <!--img alt="" src="<?php  echo base_url() ?>assets/images/photos/empleado.png" class="thumbnail media-object" -->
            <img alt="" src="<?php  echo base_url() ?>uploads/cerati.jpg" class="thumbnail media-object">
        </a>
        <div class="media-body">
             
             <h4 class="person-name"><i class=""></i>Estudiante :<?php  echo $estudiante->nombre_estudiante; ?> <?php  echo $estudiante->apellido_estudiante; ?></h4>
             <h4 class="person-name"><i class=""></i> Matrícula : <?php  echo $estudiante->matricula_estudiante; ?></div>
             <div class="text-muted"><i class="fa fa-map-marker"></i><?php  echo $estudiante->direccion_estudiante; ?></div>
             <div class="text-muted"><i class="fa fa-briefcase"></i> <a href="">Trabaja: <?php  echo $estudiante->empresa_estudiante; ?></a></div>
             
             <div class="text-muted"><i class="fa fa-phone"></i> Telefono: <?php  echo $estudiante->telefono_estudiante; ?></div>

             <div class="col-md-4"> <a class="btn btn-info" href="<?php echo base_url() ?>index.php/clientes"> Volver atrás </a> </div>
         </div>
    </div>
</div>



</div>

<div class="col-md-6">
<h4 >Estado de asignaturas del estudiante</h4></div>
        <div class="table-responsive">
                      <table class="table table-info table-hover" id="table1">

                          <thead>
                          <tr role="row">
                          <th>Clave</th>                          
                          <th>Nombre Asignatura</th>
                          <th>NRC</th>
                          <th>Creditos</th>
                          <th>Horas P</th>
                          <th>Horas T</th>
                          <th>Estado</th>
                          <th>Calificacion</th>
                          </tr>
                          </thead>
                          <tbody>


                         
     <?php 
$id = $estudiante->id_estudiante;
$mysqli = new mysqli("localhost", "root","", "db_uasd");
if ($mysqli === false){
    die ("Error: No se establecio la conexion. " . mysqli_connect_error());
}
    $sql='SELECT * FROM estado_asignaturas WHERE id_estudiante ='.$id.''; 
 


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

            echo "<td>";
            echo $row[10];
            echo "</td>";

            echo "<td>";
            echo  $row[11];
            echo "</td>";

            


            
        }
         echo " </tr>";
         echo " </tbody>";
         echo " </table>";
          
    }
}            

 ?>
                        
                      <!--FINAL TABLA DETALLE NOMINA -->
       
        </div>
</div>
</div>