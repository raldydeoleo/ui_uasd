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
        <div class="panel-btns">
            <a href="" class="panel-close">×</a>
            <a href="" class="minimize">−</a>
        </div>
        <h5 class="panel-title"> Actualizar datos del Profesor </h1>
    </div>

        <div class="panel-body" >

    <form method="post" action="<?php echo base_url() ?>/profesores/guardar_post/<?php echo $id_profesor ?>">


        <div class="form-group">

        <div class="col-md-1">
                <label> id </label>
                <input type="text" name="id_profesor" class="form-control" required="required"   value="<?php echo $id_profesor; ?>" />
            </div>

        <div class="col-md-3">
            <label> Nombre </label>
            <input type="text" name="nombre_profesor" class="form-control"   required="required" value="<?php echo $nombre_profesor; ?>" />
        </div>

        <div class="col-md-3">
            <label> Apellido </label>
            <input type="text" name="apellido_profesor" class="form-control"  required="required" value="<?php echo $apellido_profesor; ?>" />
        </div>
       

        <div class="col-md-3">
            <label> Telefono </label>
            <input type="text" name="telefono_profesor" class="form-control"  required="required" value="<?php echo $telefono_profesor; ?>" />
        </div>

      <div class="col-md-3">
          <label> Email </label>
          <input type="text" name="email_profesor" class="form-control"  value="<?php echo $email_profesor; ?>" />
      </div>

        <div class="col-md-3">
            <label> Ciudad </label>
            <input type="text" name="ciudad_profesor" class="form-control"  required="required" value="<?php echo $ciudad_profesor; ?>" />

        </div>
        
        <div class="col-md-8"></div>
        
        <div class="col-md-4">
            <input type="submit"  class="btn btn-success" value="Guardar"  />
            <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/profesores/">Cancelar</a>
        </div>
        </div>
    </form>
</div>


</div>
</div>

</body>
</html>

