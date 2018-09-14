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


        <div class="panel-body" >
       
        <div> Carrera  :<?php echo $estudiante->id_carrera ?></div>

        <div class="col-md-8">


    <div class="people-item">
    <div class="media">
        <a href="#" class="pull-left">
            <img alt="" src="<?php echo base_url() ?>assets/images/photos/empleado.png" class="thumbnail media-object">
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

<div class="col-md-12"> <h4 >Proyeccion del alumno</h4></div>
        <div class="table-responsive">
                      <table class="table table-info table-hover" id="table1">

                          <thead>
                          <tr role="row">                                                   
                          <th>Nombre Asignatura</th>
                          <th>Clave</th>
                          <th>NRC</th>
                          <th>Creditos</th>        
                          <th>Seleccionar</th>                
                          <th>Accion</th>  
                          </tr>
                          </thead>
                          <tbody>


                         
     <?php 
$id = $estudiante->id_estudiante;
$mysqli = new mysqli("localhost", "root","", "db_uasd");
if ($mysqli === false){
    die ("Error: No se establecio la conexion. " . mysqli_connect_error());
}
    $sql='SELECT nombre_asignatura, clave_asignatura, nrc_asignatura, creditos_asignatura FROM asignaturas a, proyecciones b WHERE a.id_asignatura = b.id_asignatura AND b.id_estudiante='.$id.''; 
 


 if ($result = $mysqli->query($sql)){
    if ($result->num_rows >0){
         

        while ($row = $result->fetch_array()){
            echo "<tr>";
            
            echo "<td>";
            echo  $row[0];  
            echo "</td>";

            echo "<td>";
            echo  $row[1];  
            echo "</td>";          

            echo "<td>";
            echo  $row[2];
            echo "</td>";

            echo "<td>";
            echo  $row[3];
            echo "</td>";

            echo "<td>";
            echo  '<input type="checkbox" class="form-control">';
            echo "</td>";

            echo "<td>";
            echo '<input class="btn btn-warning" type="button"  value ="Inscribir" class="form-control" id="inscribir">';
            echo "</td>";

            echo "<td>";
            //echo $row[10];
            echo "</td>";

            echo "<td>";
            //echo  $row[11];
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