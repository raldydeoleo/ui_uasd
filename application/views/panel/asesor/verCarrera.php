<?php /** @var  $carrera */?>

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
        <h1>ID: <?php echo $carrera->id_carrera; ?> <br />
         Carrera :<?php echo $carrera->desc_carrera ?> <br />       
        Facultad: <?php echo $carrera->id_facultad ?> <br /> </h1>

        <div class="col-md-12"> <a class="btn btn-info" href="<?php echo base_url() ?>index.php/carreras"> Volver atrás </a> </div> </div>
        <div class="form-group">   
       
<!--
<div class="table-responsive">
                      <table class="table table-info table-hover" id="table1">

                          <thead>
                          <tr role="row">
                          <th>Asignatura</th>                          
                          <th>Nombre Asignatura</th>
                          <th>NRC</th>
                          <th>Creditos</th>
                          <th>Horas P</th>
                          <th>Horas T</th>
                          <th>Carrera</th>
                          </tr>
                          </thead>


                          <tbody> -->


                         
     <?php /*

$mysqli = new mysqli("localhost", "root","", "db_uasd");
if ($mysqli === false){
    die ("Error: No se establecio la conexion. " . mysqli_connect_error());
}
    $sql='SELECT * FROM asignaturas inner join carreras on asignaturas.id_carrera = carreras.id_carrera';
 


 if ($result = $mysqli->query($sql)){
    if ($result->num_rows >0){
         

        while ($row = $result->fetch_array()){
            echo "<tr>";
            
            echo "<td>";
            echo  $row[0];  
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
            echo  $row[10];
            echo "</td>";


            
        }
         echo " </tr>";
         echo " </tbody>";
         echo " </table>";

    }
}            


*/
 ?>
                       
                      <!--FINAL TABLA DETALLE NOMINA -->
                  </div>
         
       
        </div>
</div>
</div>