<?php /** @var array $profesores

 */?>
 <div class="panel panel-default">

    <div class="panel-body">

        <div class="col-md-12">
            <div class="panel-primary">
                <div class="panel-heading">

                    <h4 class="panel-title">Registro de Profesor</h4>
                </div>
            </div>



            <?=form_open(base_url().'profesores/insertar_profesor');

//creamos los arrays que compondran nuestro formulario

$nombre_profesor= array(
    'name' => 'nombre_profesor',
    'id' => 'nombre_profesor',
    'class' => 'form-control',
   // 'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('nombre_profesor') //con esto al procesar el formulario de forma incorrecta quedará guardado el dato que le habíamos puesto
);

//Segundo array(campo nrc)

$apellido_profesor = array(
    'name' => 'apellido_profesor',
    'id' => 'apellido_profesor',
    'class' => 'form-control',
   // 'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('apellido_profesor')
);

//Tercer array(campo clave)
$telefono_profesor = array(
    'name' => 'telefono_profesor',
    'id' => 'telefono_profesor',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('telefono_profesor')
);

//Cuarto array(campo creditos)
$email_profesor = array(
    'name' => 'email_profesor',
    'id' => 'email_profesor',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('email_profesor')
);

//Quinto array(campo horas practica)
$ciudad_profesor = array(
    'name' => 'ciudad_profesor',
    'id' => 'ciudad_profesor',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('ciudad_profesor') 
);

$js = 'onClick="notificar()"';

//el botón submit de nuestro formulario
$submit = array(
    'name' => 'submit',
    'id' => 'submit',
    'class' => 'form-control',
    'class' => 'btn btn-primary',
    'value' => 'Registrar',
    'title' => 'Registrar'
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
<?php
echo form_fieldset('.');
?>


            <form class="form-horizontal form-bordered">

                <div class="form-group">



                    <div class="col-md-3">
                        <?php echo form_label('Nombre: '); ?>

                            <?php echo form_input($nombre_profesor); ?>


                    </div>
                    <div class="col-md-3">
                        <?php echo form_label('Apellido: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($apellido_profesor); ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <?php echo form_label('Teléfono: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($telefono_profesor); ?>

                        </div>

                    </div>

                    <div class="col-md-3">               
                <a href="#" class="pull-right">
                                <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
                            </a>

                            </div>


                    <div class="col-md-3">

                        <?php echo form_label('Email: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($email_profesor); ?>

                        </div>
                    </div>


                        <div class="col-md-6">

                            <?php echo form_label('Ciudad: '); ?>
                            <div class="input-group mb15 col-sm-12">
                                <?php echo form_input($ciudad_profesor); ?>

                            </div>
                        </div>





                     </div>

                     <div class="form-group">
        
        <div class="col-md-2"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> </div>
        <div class="col-md-10"></div>
               
                </div>

                           <div class="form-group">
                               <div class="col-md-9">
                               </div>
                               <div class="col-md-3">

                                    <?php echo form_reset($cancel);
                                    //nuestro boton submit
                                    ?>


                                        <?php echo form_submit($submit,'',$js);
                                        //nuestro boton submit
                                        ?>

                            </div>
                        </div>
                    </div>
</form>
<table>


       <tr>
        <td>

        </td>
        <td>
            <!--con la funcion validation_errors ci nos muestra los errores al pulsar el botón submit, la podemos colocar donde queramos-->
            <font color="red" style="font-weight: bold; font-size: 14px; text-decoration: underline"><?php echo validation_errors(); ?></font>
        </td>
    </tr>

    <?php
    echo form_close();
    ?>
</table>
<?php
echo form_fieldset_close();
?>


       </div>
    </div>
</div>
   <!-- Javascript  jQuery -->
   <script src="<?php  echo base_url() ?>assets/js/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php  echo base_url() ?>assets/js/Push.min.js"></script>
 
<script>
        function notificar(){

        var todo_correcto = true;
        if(document.getElementById('nombre_profesor').value.length == 0){
            todo_correcto = false;
        alert('Nombre no debe estar vacio');
        exit();
        }else{
            if(document.getElementById('apellido_profesor').value.length == 0){
                todo_correcto = false;
                    alert('Apellido no debe estar vacio');
                    exit();
                }else{
                    if(document.getElementById('email_profesor').value.length == 0){
                        todo_correcto = false;
                            alert('email no debe estar vacio');
                            exit();

                }
                }

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

</script> 
