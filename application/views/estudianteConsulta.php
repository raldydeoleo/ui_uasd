

<div class="col-md-8">


<div class="col-md-12">
    <div class="panel panel-primary">

        <div class="panel-heading">
          <h1 class="panel-title"> Estudiantes por Carrera</h1>
        </div>

        <div class="panel-body" >

            <?=form_open(base_url().'clientes/EstudiantesPorcarrera/');

            $id_carrera = array(
                'name' => 'id_carrera',
                'id' => 'id_carrera',
                'class' => 'form-control',
                'rows' => 10,
                'cols' => 40,
                'value' => set_value('id_carrera')
            );

            //el botón submit de nuestro formulario
            $consultar = array(
                'name' => 'button',
                'id' => 'button',
                'class' => 'form-control',
                'class' => 'btn btn-primary',
                'value' => 'Consultar',
                'title' => 'Consultar'
            );
            //el botón cancelar de nuestro formulario
            $cancel = array(
                'name' => 'cancel',
                'id' => 'cancel',
                'class' => 'form-control',
                'class' => 'btn btn-danger',
                'value' => 'Cancelar',
                'title' => 'Cancelar'
            );
            ?>


      
            <div class="panel panel-info">
                
               <?php echo form_fieldset('Seleccione una carrera de la lista'); ?>

                <?php  echo form_fieldset_close() ?>             

                <div class="form-group">

                <div class="col-md-10">
                        <label class="col-sm-12">Carrera:</label>

                         <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_carrera, desc_carrera FROM carreras";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_carrera'>";

                                    while ($row = $result->fetch_array()){

                                        echo "<option value='$row[0]'>";
                                        // echo $row[0];
                                        echo " $row[1]" ?>
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
                </div>

                
                    <div class="form-group">

                    <div class="col-md-8">

                    <a class="btn btn-success" href="<?php echo base_url() ?>clientes/">Volver</a>

                    </div>
                        <div class="col-md-2">
                            <?php echo form_reset($cancel);
                            //nuestro boton submit
                            ?>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group mb15 col-sm-12">
                                <?php echo form_button($consultar,'Consultar');
                                //nuestro boton submit
                                ?>
                            </div>
                        </div>
                        

                        


                    </div>

                </form>

                <form>
<select class="form-control" name="users" onchange="showUser(this.value)">
  <option value="">Select a person:</option> 
  <option value="1">Administrador</option> 
  <option value="2">Raldy de Oleo</option>
  </select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>
           
    </div>  <!-- fin panel principal -->
    </div>
    </div>  <!-- fin panel body -->
    </div>  <!--  fin panel primary -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/datatables.min.css"/> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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

<script>
$(document).ready( function () {
    $('#example').DataTable();
} );
</script>