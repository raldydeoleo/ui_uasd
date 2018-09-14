<?/**
 * @var array $servicios
 * @var array $piezas
 */?>

<div class="col-md-9">

    <div class="panel panel-primary">
            <div class="panel-heading ">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h4 class="panel-title">Crear Edificio</h4>
            
                <?=form_open(base_url().'edificios/insertar_edificio');

//creamos los arrays que compondran nuestro formulario

$id_recinto = array(
    'name' => 'id_recinto',
    'id' => 'id_recinto',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '1',
    'style' => 'width:100%',
    'value' => set_value('id_recinto')
);

$nombre_edificio = array(
    'name' => 'nombre_edificio',
    'id' => 'nombre_edificio',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('nombre_edificio')
);

$cantaulas_edificio = array(
    'name' => 'cantaulas_edificio',
    'id' => 'cantaulas_edificio',
    'class' => 'form-control',
    'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('cantaulas_edificio')
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
//Botón submit formulario crear
$submit = array(
    'name' => 'submit',
    'id' => 'submit',
    'class' => 'form-control',
    'class' => 'btn btn-primary',
    'value' => 'Crear Edificio',
    'title' => 'Crear Edificio'
);

?>
</div>

<?php
echo form_fieldset('.');
?>

        <div class="panel-body panel-body-nopadding">
            <form class="form-horizontal form-bordered">
              
                       

        <div class="form-group">

                    <div class="col-md-3">

                    <?php echo form_label('Recinto: '); ?>
                        <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_recinto, nombre_recinto FROM recintos";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_recinto'>";

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


                    <div class="col-md-3">
                    
                        <?php echo form_label('Nombre de Edificio: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($nombre_edificio); ?>
                        </div>
                    
                    </div>
                    <div class="col-md-2">
                    <?php echo form_label('No. de Aulas:'); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($cantaulas_edificio); ?>
                        </div>
                       
                    </div>

                    <div class="col-md-4">               
                        <a href="#" class="pull-right">
                                        <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
                                    </a>
        
                                    </div>


                </div>


                </div>

                <div class="form-group">
                <div class="col-md-8"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/edificios/listaEdificios"> Ver listado </a> </div>         

                    <div class="col-md-2">
                            <?php echo form_reset($cancel);
                            ?>
                    </div>

                    <div class="col-md-2">
                        <?php echo form_submit($submit);
                        ?>
                    </div>

           </div>
                </div>
                   

            </form>

        </div><!-- panel-body -->
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script src="https:////cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"></script>


<script type="text/javascript">
  $(document).ready(function(){
    
        $.notify("Hello World");
   
  });
</script>