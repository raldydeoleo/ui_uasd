
<div xmlns="http://www.w3.org/1999/html">

</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png" type="image/png">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link href="<?php  echo base_url() ?>assets/css/style.default.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]><![endif]-->
    <script src="<?php echo base_url() ?>assets/js/html5shiv.js"></script>
    <script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>

    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">

</head>
<body

<div class="col-md-12">
    <p></p>
</div>
<div class="col-md-12">
    <div class="panel panel-primary">

        <div class="panel-heading">
          <h5 class="panel-title"> Generar Nomina</h1>
        </div>

        <div class="panel-body" >

<form method="post" action="<?php echo base_url()  ?>index.php/empleados/genera_nomina/">


        <div class="form-group">
            <div class="panel panel-info">
                
                <div class="panel-heading"> </div>
           <!-- required="required" -->

        <div class="col-md-2">
        <label> Fecha Nomina</label>
        <input type="text" name="fecha_nomina" class="form-control" value="<?php echo date('d-m-Y')?>" />
        </div>



            <div class="col-md-2">
                    <label> Tipo de nomina </label>
                    <select name="tipo_nomina" class="form-control">
                      <option value="1">Quincenal</option>
                      <option value="2">Semanal</option>
                      <option value="3">Mensual</option>

                    </select>
                   
                </div>



                  <div class="col-md-2">
                     <label> Fecha Desde: </label>
                    <input type="text" id="datepicker" name="fecha_desde" class="form-control" placeholder="dd-mm-aaaa" value=""/>
                    
                 </div>

            <div class="col-md-2">
                <label> Fecha hasta: </label>
                <input type="text" name="fecha_hasta" id="datepicker" class="form-control" placeholder="dd-mm-aaaa" value=""/>
            </div>
           
           
              <div class="col-md-4">
              <div class="table-responsive">
                      <table class="table table-info table-hover" id="table1">

                          <thead>
                          
                           
                          </thead>
                          <tbody>
                          <tr>                                                       
                        <td><a class="btn btn-danger" href="<?php echo base_url() ?>empleados/generar_nomina">Cancelar</a></td>
                        <td><input type="submit"  class="btn btn-success" value="Generar"  /></td>
                        <td><a class="btn btn-primary" href="<?php echo base_url() ?>pdfs/pdf_nomina/">Imprimir</a></td>
                        

   </tr></tbody></table>
                
                

            </div> 
    </div>
    </div>

        <div class="panel panel-info">
            
            <div class="col-md-12">

                <div class="col-md-12">

                  <!--INICIO TABLA DETALLE NOMINA -->

 <div class="table-responsive">
                      <table class="table table-info table-hover" id="table1">

                          <thead>
                          <tr role="row">
                              <th>Recibo #</th>
                              <th>Empleado</th>
                              <th>Horas Extras</th>
                              <th>Incentivo</th>
                              <th>Percepciones</th>
                              <th>Sueldo Bruto</th>
                              <th>AFP</th>
                              <th>ARS</th>
                              <th>Prestamo</th>
                              <th>Deducciones</th>
                              <th>Sueldo Neto</th>
                              <th>Fecha de nomina</th>
                             
                          </tr>
                          </thead>


                          <tbody>


                         
     <?php 

                       $fecha_nomina = $_POST['fecha_nomina'];
                       $fecha_desde = $_POST['fecha_desde'];
                       $fecha_hasta = $_POST['fecha_hasta'];

     //intenta conectarse a la base de datos

                        $mysqli = new mysqli("localhost", "root","", "db_eess2");
                            if ($mysqli === false){
                                die ("Error: No se establecio la conexion. " . mysqli_connect_error());
                            }


                    $sql = "SELECT * FROM percepciones WHERE fecha_percepcion BETWEEN '$fecha_desde' AND '$fecha_hasta'";
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
                                        echo "</td>";

                                        echo "<td>";
                                        echo "</td>";

                                        echo "<td>";
                                        echo "</td>";

                                        echo "<td>";
                                        echo  $row[4];
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
                                        echo  $row[12];
                                        echo "</td>";

                                        

                                        echo "<td>";
                                        echo  $row[18];
                                        echo "</td>";

                                        echo "<td>"; 
                                        echo  $row[19];
                                        echo "</td>";
                                        
                                    }
                                     echo " </tr>";
                                     echo " </tbody>";
                                     echo " </table>";

                                }
                            }
                            echo $fecha_nomina;
                            echo ":";
                            echo $fecha_desde;
                            echo ":";
                            echo $fecha_hasta;

                        ?>
                       
                      <!--FINAL TABLA DETALLE NOMINA -->
                  </div>



                    <div class="table-responsive">
                        <table class="table table-info table-hover" id="table1">

                            <thead>
                            <tr role="row">
                                <th>Total </th>

                                <th>Sueldo Neto</th>

                            </tr>
                            </thead>


                            <tbody>

                            <?php

//intenta conectarse a la base de datos

$mysqli = new mysqli("localhost", "root","", "db_eess2");
if ($mysqli === false){
    die ("Error: No se establecio la conexion. " . mysqli_connect_error());
}


$sql = "SELECT SUM(sueldo_neto) FROM percepciones";
if ($result = $mysqli->query($sql)) {
    if ($result->num_rows > 0) {


        while ($row = $result->fetch_array()) {

            echo "<tr>";

            echo "<td>";
            echo "</td>";



            echo "<td>";
            echo $row[0];
            echo "</td>";

            echo "</tr>";

        }

    }

}

?>


                    </div>


            </div>

            
            </div>
    </div>

            </div>

            </div>

        </div>


    </form>
</div>

       
</div>
</div>

</body>
</html>
