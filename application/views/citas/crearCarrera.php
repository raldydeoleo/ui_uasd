<?/**
 * @var array $carreras
 * @var array $facultades
 */?>

<div class="col-md-11">

    <div class="panel panel-primary">
            <div class="panel-heading ">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h4 class="panel-title">Crear Carrera</h4>
            
                <?=form_open(base_url().'carreras/insertar_carrera');

//creamos los arrays que compondran nuestro formulario


$desc_carrera = array(
    'name' => 'desc_carrera',
    'id' => 'desc_carrera',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('desc_carrera')
);


$id_facultad = array(
    'name' => 'id_facultad',
    'id' => 'id_facultad',
    'class' => 'form-control',
    //'required'=> 'required',
    'size' => '1',
    'style' => 'width:100%',
    'value' => set_value('id_facultad')
);


//Botón cancel formulario cancela creacion
$cancel = array(
    'name' => 'cancel',
    'id' => 'cancel',
    'class' => 'form-control',
    'class' => 'btn btn-danger',
    'value' => 'Cancelar',
    'title' => 'Cancelar'
);


$js = 'onClick="notificar()"';


//Botón submit formulario crear
$submit = array(
    'name' => 'submit',
    'id' => 'submit',
    'class' => 'form-control',
    'class' => 'btn btn-primary',
    'value' => 'Crear Carrera',
    'title' => 'Crear Carrera'
);

?>
</div>

<?php
echo form_fieldset('.');
?>

        <div class="panel-body panel-body-nopadding">
            <form class="form-horizontal form-bordered">
              
               
                <div class="form-group">

                    <div class="col-md-6">
                        <?php echo form_label('Nombre de Carrera: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($desc_carrera); ?>
                        </div>
                    </div>

                    <div class="col-md-4">

                    <?php  echo form_label('Facultad: '); ?>
                        <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_facultad, nombre_facultad FROM facultades";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_facultad'>";

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

                     
                <div class="col-md-2">               
                <a href="#" class="pull-right">
                                <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
                            </a>

                            </div>
                                 

                </div>


               
 
                <div class="form-group">
                <div class="col-md-8"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/carreras/listaCarreras"> Ver listado </a> </div>                                       


                    <div class="col-md-2">
                        <?php echo form_reset($cancel); ?>
                        </div>
                        <div class="col-md-2">
                        <?php echo form_submit($submit,'',$js); ?>

                    </div>

               </div>
        </div>
                   
            </form>

        </div><!-- panel-body -->
    </div>
</div>

<script type="text/javascript">

$(document).ready(function(){

    $("#submit").click(function(){
    document.getElementById("desc_carrera").value="";
    document.getElementById("id_facultad").value="";
    document.getElementById("desc_carrera").focus();

});
});
</script>



  <!-- Javascript  jQuery -->
  <script src="<?php  echo base_url() ?>assets/js/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php  echo base_url() ?>assets/js/Push.min.js"></script>
 
<script>
        function notificar(){

        var todo_correcto = true;
        if(document.getElementById('desc_carrera').value.length == 0){
            todo_correcto = false;
        alert('Descripcion carrera no debe estar vacio');
        exit();
        }else{
            if(document.getElementById('id_facultad').value.length == 0){
                todo_correcto = false;
                    alert('id facultad de aula no debe estar vacio');
                    exit();
                }else{
                    Push.create("Notificación",{
                            body:'Registro guardado con exito!',
                            icon:'<?php  echo base_url() ?>assets/images/photos/empleado.png',
                            timeout: 4000,
                            onClick: function(){
                                window.location="https://www.youtube.com/";
                                this.close();
                                
                }
            });
        }

          
        }
    }

</script> 