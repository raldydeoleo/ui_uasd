
<div xmlns="http://www.w3.org/1999/html">

</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-6">
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
                 <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>

        <h5 class="panel-title"> Actualizar datos del Edificio</h1>
    </div>

        <div class="panel-body" >


    <form method="post" action="<?php echo base_url() ?>index.php/recintos/guardar_post/<?php echo $id_recinto; ?>">

        <div class="form-group">
            <div class="panel panel-info">
               
            <div class="col-md-1">
                <label> ID</label>
                <input type="text" name="id_recinto" class="form-control" readonly required="required" value="<?php echo $id_recinto; ?>" />
            </div>

        <div class="col-md-3">
            <label> Nombre Edificio </label>
            <input type="text" name="nombre_recinto" class="form-control"   required="required" value="<?php echo $nombre_recinto; ?>" />
        </div>

            <div class="col-md-3">
                <label> Ciudad</label>
                <input type="text" name="ciudad_recinto" class="form-control"   required="required" value="<?php echo $ciudad_recinto; ?>" />
            </div>
 

        
    </div>
    </div>

       
            <div class="col-md-9"></div>

                <div class="col-md-3">
                    <a class="btn btn-danger" href="<?php echo base_url() ?>recintos/index">Cancelar</a>
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
