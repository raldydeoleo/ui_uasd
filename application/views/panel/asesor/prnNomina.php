
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


<div class="col-md-6">
    <div class="panel panel-primary">

        <div class="panel-heading">
          <h1 class="panel-title"> Imprimir Nomina</h1>
        </div>

        <div class="panel-body" >

            <?=form_open(base_url().'pdfs/pdf_nomina');

            $fecha_nomina = array(
                'name' => 'fecha_nomina',
                //'id' => 'datepicker',
                'class' => 'form-control',
                'rows' => 10,
                'cols' => 40,
                'value' => set_value('fecha_nomina')
            );


            //el botón submit de nuestro formulario
            $submit = array(
                'name' => 'submit',
                'id' => 'submit',
                'class' => 'form-control',
                'class' => 'btn btn-primary',
                'value' => 'Imprimir',
                'title' => 'Imprimir'
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


        <div class="form-group">
            <div class="panel panel-info">
                
               <?php echo form_fieldset('Imprimir nomina'); ?>

                <?php  echo form_fieldset_close() ?>
                <div class="col-md-3">
                <label> Fecha :</label>
                <input type="text" name="fecha_nomina" class="form-control" value="<?php echo date('d-m-Y')?>" />
                </div>

                <div class="col-md-3">
                    <label> Tipo de nomina </label>

                    <select name="tipo_nomina" class="form-control">
                          <option value="1">Quincenal</option>
                          <option value="2">Semanal</option>
                          <option value="3">Mensual</option>
                    </select>
                   
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                        <?php echo form_label('Fecha de nomina: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($fecha_nomina); ?>
                        </div>
                    </div>

                </div>

                <form class="form-horizontal form-bordered">
                    <div class="form-group">
                        <div class="col-md-6">

                        </div>


                        <div class="col-md-2">
                            <?php echo form_reset($cancel);
                            //nuestro boton submit
                            ?>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group mb15 col-sm-12">
                                <?php echo form_submit($submit);
                                //nuestro boton submit
                                ?>
                            </div>
                        </div>


                         <a class="btn btn-success" href="<?php echo base_url() ?>empleados/generar_nomina">Volver</a>

                    </div>
                </form>
           
              <div class="col-md-4">

             </div>
    </div>  <!-- fin panel principal -->
    </div>
    </div>  <!-- fin panel body -->
    </div>  <!--  fin panel primary -->

</body>
</html>
