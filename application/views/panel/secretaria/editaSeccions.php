<?php /** $var array $seccion */ ?>
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



    <link href="<?php echo base_url() ?>assets/css/style.default.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url() ?>assets/js/html5shiv.js"></script>
    <script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<div class="col-md-12">
    <p></p>
</div>
<div class="col-md-8">
    <div class="panel panel-primary">
    <div class="panel-heading">

        <h5 class="panel-title"> Actualizar datos de Seccion</h1>
    </div>

        <div class="panel-body" >


    <form method="post" action="<?php echo base_url() ?>index.php/secciones/guardar_post/<?php // echo $id_seccion; ?>">

        <div class="form-group">
            <div class="panel panel-info">
               
            <div class="col-md-1">
                <label> Id </label>
                <input type="text" name="id_seccion" class="form-control" required="required"   value="<?php // echo $id_seccion; ?>" />
            </div>

        <div class="col-md-3">
            <label> Nombre Seccion </label>
            <input type="text" name="nombre_seccion" class="form-control"   required="required" value="<?php //echo $nombre_seccion; ?>" />
        </div>

            <div class="col-md-3">
                <label> Periodo </label>
                <input type="text" name="id_periodo" class="form-control"   required="required" value="<?php // echo $id_periodo; ?>" />
            </div>

            <div class="col-md-2">
                <label> Asignatura </label>
                <input type="text" name="id_asignatura" class="form-control" required="required" value="<?php // echo $id_asignatura; ?>" />
            </div>

        <div class="col-md-3">
            <label> Horario </label>
            <input type="text" name="id_horario" class="form-control"  required="required" value="<?php // echo  $id_horario; ?>" />
        </div>

            <div class="col-md-4">
                <label>Aula </label>
                <input type="text" name="id_aula" class="form-control"  required="required" value="<?php // echo  $id_aula; ?>" />
            </div>

            <div class="col-md-4">
                <label> Profesor </label>
                <input type="text" name="id_profesor" class="form-control"  required="required" value="<?php // echo $id_profesor; ?>" />
            </div>

            <div class="col-md-4">
                <label> Cantidad Maxima Estudiantes </label>
                <input type="text" name="cantmax_seccion" class="form-control"  required="required" value="<?php // echo $cantmax_seccion; ?>" />
            </div>
    </div>
    </div>

       
            <div class="col-md-8"></div>

                <div class="col-md-4">
                    <a class="btn btn-danger" href="<?php echo base_url() ?>secciones/index">Cancelar</a>
                    <input type="submit"  class="btn btn-success" value="Actualizar"  />

                </div>
            </div>
    </div>
            </div>

            </div>

        </div>


    </form>
</div>

        <?php /**
        if (isset($_POST['submit']){
        $mysqli = new mysqli('localhost', 'root','','mensajes');
        if ($mysqli === FALSE) {
        die ("Error, fue imposible conectarse a la base de datos" . mysqli_error());
        }
        else{

        $sql = ("UPDATE  ");

        }

        }
         */
        ?>
</div>
</div>

</body>
</html>
