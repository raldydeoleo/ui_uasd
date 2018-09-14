
<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','db_uasd');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM usuarios WHERE id_usuario = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Usuario</th>
<th>Email</th>
<th>Clave</th>
<th>Fecha</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['nombre_usuario'] . "</td>";
    echo "<td>" . $row['email_usuario'] . "</td>";
    echo "<td>" . $row['clave_usuario'] . "</td>";
    echo "<td>" . $row['createtime_usuario'] . "</td>";    
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
