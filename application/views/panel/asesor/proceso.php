<?php  

 $nrc = $_POST('nrc_asignatura');
 $nombre_asignatura = $_POST('nombre_asignatura'); 
 $seccion_seleccion = $_POST('seccion_seleccion');   
 $creditos_asignatura = $_POST('creditos_asignatura');   
 $monto = $_POST('creditos_asignatura');
 


//$data = json_encode($_POST['seleccion'], true);
//echo var_dump($data);
echo ($nrc);



$mysqli =new mysqli("localhost", "root","", "db_uasd");
    if ($mysqli === false){
        die("Error: No se establecio la conexion." . mysqli_connect_error());
    }
    $sql = "INSERT INTO pruebas (nombre_asignatura,nrc, seccion, creditos, monto) VALUES('$nombre_asignautura','$nrc','$seccion_seleccion','$creditos_asignatura','$monto')";
    $mysqli->query($sql);
            }
            if ($mysqli->query($sql) === TRUE) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" .$mysqli->error;
            }
    /*
            foreach ($data as $row) {
                $nrc = $row['nrc'];
                $nombre = $row['nombre'];
                $seccion = $row['seccion'];
                $creditos = $row['creditos'];               
                $sql = "INSERT INTO prueba (nrc, nombre, seccion, creditos)
                    VALUES($nrc, '$nombre', '$seccion', '$creditos')";
                    $mysqli->query($sql);
            }
            if ($mysqli->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" .$mysqli->error;
            }
            */
    
    $mysqli->close();

//$jsondata = file_get_contents('../usuarios.json');
//$jsonarray = json_decode($jsondata, true);

?>

