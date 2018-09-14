<html>
<head>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/ --> 
<!-- script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/datatables.min.css"/> 
<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png" type="image/png">
<link href="<?php echo base_url() ?>assets/css/style.default.css" rel="stylesheet">

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<div class="panel panel-primary">
<div class="panel-heading">
<a href="#" class="pull-right">
            <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
        </a>
    <h2>Unidad de investigacion</h2> 
    <h3>Listado de Investigadores</h3> <h4 class="panel-title">Búsqueda por criterios</h4>

    </div>

    <div class="form-group">
        <div class="col-md-6"></div>
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
                <div class="col-md-2"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/investigadores/"> Volver al listado </a> </div>
                
                </div>
        <div class="col-md-12">


<table  class="table table-info table-hover" id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Titulo</th>
                <th>Area</th>                
                <th>Direccion</th>
                <th>Ciudad</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Labora En</th>
   
            </tr>
        </thead>
        <tbody>
<?php 
//$id = $horario->id_asignatura;
$mysqli = new mysqli("localhost", "root","", "db_uasd");
if ($mysqli === false){
    die ("Error: No se establecio la conexion. " . mysqli_connect_error());
}
    $sql='SELECT id_estudiante, nombre_estudiante, apellido_estudiante, matricula_estudiante, clave_estudiante, direccion_estudiante, ciudad_estudiante, telefono_estudiante, email_estudiante, empresa_estudiante FROM estudiantes'; 
 


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
            echo  $row[8];
            echo "</td>"; 

            echo "<td>";
            echo  $row[9];
            echo "</td>"; 
            
        }
         echo " </tr>";
         echo " </tbody>";        
         echo " </table>";
          
    }
}            

 ?>

</div>
</div>
</div>


     

</body>
</html>
<script>
$(document).ready( function () {
    $('#example').DataTable();
} );
</script>