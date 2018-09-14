
<?php /** @var array $empleados */?>
    <div class="panel panel-info">

        <div class="panel-body">

            <div class="col-md-8">
                <div class="panel-heading">
                    <h4 class="panel-title">Crear Empleado</h4>
                </div>

                <?=form_open(base_url().'empleados/insertar_empleado');

                //creamos los arrays que compondran nuestro formulario

                $nombre_empleado = array(
                    'name' => 'nombre_empleado',
                    'id' => 'nombre_empleado',
                    'class' => 'form-control',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('nombre_empleado')
                );


                $apellido_empleado = array(
                    'name' => 'apellido_empleado',
                    'id' => 'apellido_empleado',
                    'class' => 'form-control',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('apellido_empleado')
                );

                $cargo_empleado = array(
                    'name' => 'cargo_empleado',
                    'id' => 'cargo_empleado',
                    'class' => 'form-control',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('cargo_empleado')
                );

                $id_departamento = array(
                    'name' => 'id_departamento',
                    'id' => 'id_departamento',
                    'class' => 'form-control',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('id_departamento')
                );

                $direccion_empleado = array(
                    'name' => 'direccion_empleado',
                    'id' => 'direccion_empleado',
                    'class' => 'form-control',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('direccion_empleado')
                );

                $ciudad_empleado = array(
                    'name' => 'ciudad_empleado',
                    'id' => 'ciudad_empleado',
                    'class' => 'form-control',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('ciudad_empleado')
                );

                $telefono_empleado = array(
                    'name' => 'telefono_empleado',
                    'id' => 'telefono_empleado',
                    'class' => 'form-control',
                    'rows' => 10,
                    'cols' => 40,
                    'value' => set_value('telefono_empleado')
                );


                $celular_empleado = array(
                    'name' => 'celular_empleado',
                    'id' => 'celular_empleado',
                    'class' => 'form-control',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('celular_empleado')
                );

                $email_empleado = array(
                    'name' => 'email_empleado',
                    'id' => 'email_empleado',
                    'class' => 'form-control',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('email_empleado')
                );


                $cedula_empleado  = array(
                    'name' => 'cedula_empleado',
                    'id' => 'cedula_empleado',
                    'class' => 'form-control',
                    'placeholder' => '000-0000000-0',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('cedula_empleado')
                );

                $sueldo_empleado = array(
                    'name' => 'sueldo_empleado',
                    'id' => 'sueldo_empleado',
                    'class' => 'form-control',
                    'placeholder' => 'RD$0.00',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('sueldo_empleado')
                );

                $nss_empleado = array(
                    'name' => 'nss_empleado',
                    'id' => 'nss_empleado',
                    'class' => 'form-control',
                    'rows' => 10,
                    'cols' => 40,
                    'value' => set_value('nss_empleado')
                );

                $id_arsempleado = array(
                    'name' => 'id_arsempleado',
                    'id' => 'id_arsempleado',
                    'class' => 'form-control',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('id_arsempleado')
                );

                $comentario_empleado = array(
                    'name' => 'comentario_empleado',
                    'id' => 'comentario_empleado',
                    'class' => 'form-control',
                    'rows' => 5,
                    'cols' => 40,
                    'value' => set_value('comentario_empleado')
                );

                $fechaingreso_empleado = array(
                    'name' => 'fechaingreso_empleado',
                    'id' => 'datepicker',
                    'class' => 'form-control',
                    'rows' => 10,
                    'cols' => 40,
                    'value' => set_value('fechaingreso_empleado')
                );


                $id_tipoempleado = array(
                    'name' => 'id_tipoempleado ',
                    'id' => 'id_tipoempleado ',
                    'class' => 'form-control',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('id_tipoempleado ')
                );


                $edad_empleado = array(
                    'name' => 'edad_empleado',
                    'id' => 'edad_empleado',
                    'class' => 'form-control',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('edad_empleado')
                );

                $estado_empleado = array(
                    'name' => 'estado_empleado',
                    'id' => 'estado_empleado',
                    'class' => 'form-control',
                    'size' => '50',
                    'style' => 'width:100%',
                    'value' => set_value('estado_empleado')
                );


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

          <div class="col-md-12">
              <div class="col-md-3">

                  <?php echo form_label('Nombre: '); ?>
                  <div class="input-group col-sm-12">
                      <?php echo form_input($nombre_empleado); ?>
                  </div>
                </div>



              <div class="col-md-3">
                  <?php echo form_label('Apellido: '); ?>
                  <div class="input-group mb15 col-sm-12">
                      <?php echo form_input($apellido_empleado); ?>
                  </div>
                </div>

              <div class="col-md-3">
                  <?php echo form_label('Cargo: '); ?>
                  <div class="input-group mb15 col-sm-12">
                      <?php echo form_input($cargo_empleado); ?>
                  </div>
              </div>

              <!--  inicio SELECT --->

              <div class="col-md-3">
                  <?php echo form_label('Departamento: '); ?>
                  <?php
                  $mysqli =new mysqli("localhost", "root","", "db_eess2");
                  if ($mysqli === false){
                      die("Error: No se establecio la conexion." . mysqli_connect_error());
                  }
                  $sql = "SELECT id_departamento, nombre_departamento FROM departamentos";
                  if ($result = $mysqli->query($sql)){
                      if ($result->num_rows > 0){
                          echo "<select class='form-control' name='id_departamento'>";

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



              <!--  FINAL SELECT --->

              <div class="col-md-6">
                  <?php echo form_label('Direccion: '); ?>
                  <div class="input-group mb15 col-sm-12">
                      <?php echo form_input($direccion_empleado); ?>
                  </div>
                </div>

              <div class="col-md-6">
                  <?php echo form_label('Ciudad: '); ?>
                  <div class="input-group mb15 col-sm-12">
                      <?php echo form_input($ciudad_empleado); ?>
                  </div>
              </div>

              <div class="col-md-3">
                  <?php echo form_label('Telefono: '); ?>
                  <div class="input-group mb15 col-sm-12">
                      <?php echo form_input($telefono_empleado); ?>

                  </div>
                </div>

              <div class="col-md-3">
                  <?php echo form_label('Celular: '); ?>
                  <div class="input-group mb15 col-sm-12">
                      <?php echo form_input($celular_empleado); ?>

                  </div>
              </div>

              <div class="col-md-6">
                  <?php echo form_label('Email: '); ?>
                  <div class="input-group mb15 col-sm-12">
                  <?php echo form_input($email_empleado); ?>
                  </div>
              </div>




                <div class="col-md-3">
                <?php echo form_label('Cedula: '); ?>
                    <div class="input-group mb15 col-sm-12">
                        <?php echo form_input($cedula_empleado); ?>
                    </div>
                </div>

                <div class="col-md-3">
                    <?php echo form_label('Sueldo: '); ?>
                    <div class="input-group mb15 col-sm-12">
                        <?php echo form_input($sueldo_empleado); ?>
                    </div>
                </div>

              <div class="col-md-3">
                  <?php echo form_label('NSS: '); ?>
                  <div class="input-group mb15 col-sm-12">
                      <?php echo form_input($nss_empleado); ?>
                  </div>
              </div>

              <div class="col-md-3">
                  <?php echo form_label('Afiliado a ARS: '); ?>
                  <?php
                  $mysqli =new mysqli("localhost", "root","", "db_eess2");
                  if ($mysqli === false){
                      die("Error: No se establecio la conexion." . mysqli_connect_error());
                  }
                  $sql = "SELECT id_arsempleado, nombre_ars FROM ars_empleado";
                  if ($result = $mysqli->query($sql)){
                      if ($result->num_rows > 0){
                          echo "<select class='form-control' name='id_arsempleado'>";

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


              <div class="col-md-6">
                  <?php echo form_label('Comentario: '); ?>
                  <div class="input-group mb15 col-sm-12">
                      <?php echo form_textarea($comentario_empleado); ?>
                  </div>
              </div>



            </div>
            </div>


            <div class="col-md-4 right">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Informacion</h4>
                    </div>
                    <div class="panel-body">
                    <div class="form-group">

                        <div class="col-md-7">
                            <div class="people-item">
                                <div class="media">
                                    <a href="#" class="pull-left">
                                        <img alt="" src="images/photos/user2.png" class="thumbnail media-object">
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">

                            <label>Tipo:</label>
                            <div class="form-group">

                                <div class="ckbox ckbox-warning">
                                    <input type="checkbox" id="checkboxWarning"  />
                                    <label for="checkboxWarning">Fijo</label>
                                </div>

                                <div class="ckbox ckbox-primary">
                                    <input type="checkbox" id=""  />
                                    <label for="checkboxDanger">Temporal</label>
                                </div>

                                <div class="ckbox ckbox-primary">
                                    <input type="checkbox" id="checkboxDanger"  />
                                    <label for="checkboxDanger">Activo</label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                        <div class="col-md-6">
                            <?php echo form_label('Fecha de ingreso: '); ?>
                            <div class="input-group mb15 col-sm-12">
                                <?php echo form_input($fechaingreso_empleado); ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <?php echo form_label('Edad: '); ?>
                            <div class="input-group mb15 col-sm-12">
                                <?php echo form_input($edad_empleado); ?>
                            </div>
                        </div>
                    </div>

                    </div>

                </div><!-- panel -->

                <form class="form-horizontal form-bordered">
                    <div class="form-group">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <?php echo form_reset($cancel);
                            //nuestro boton submit
                            ?>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group mb15 col-sm-12">
                                <?php echo form_submit($submit);
                                //nuestro boton submit
                                ?>
                            </div>
                        </div>
                    </div>
                </form>

            <?php
            echo form_close();
            ?>

            <?php
            echo form_fieldset_close();
            ?>

        </div>
    </div>






