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
        <div class="panel-btns">
            <a href="" class="panel-close">×</a>
            <a href="" class="minimize">−</a>
        </div>
        <h5 class="panel-title"> Actualizar datos del Cliente </h1>
    </div>

        <div class="panel-body" >

    <form method="post" action="<?php echo base_url() ?>clientes/actualizar/<?php echo $id_cliente ?>">


        <div class="form-group">
        <div class="col-md-2">
            <label> Nombre </label>
            <input type="text" name="nombre_cliente" class="form-control"   required="required" value="<?php echo $nombre_cliente; ?>" />
        </div>

        <div class="col-md-6">
            <label> Apellido </label>
            <input type="text" name="apellido_cliente" class="form-control"  required="required" value="<?php echo $apellido_cliente; ?>" />
        </div>
        </div>

        <div class="col-md-6">
            <label> Empresa </label>
            <input type="text" name="empresa_cliente" class="form-control"  required="required" value="<?php echo $empresa_cliente; ?>" />
        </div>

      <div class="col-md-6">
          <label> RNC </label>
          <input type="text" name="rnc_cliente" class="form-control"  value="<?php echo $rnc_cliente; ?>" />
      </div>

        <div class="col-md-8">
            <label> Dirección </label>
            <input type="text" name="direccion_cliente" class="form-control"  required="required" value="<?php echo $direccion_cliente; ?>" />

        </div>

      <div class="col-md-4">
          <label> Teléfono </label>
          <input type="text" name="telefono_cliente" class="form-control" required="required" value="<?php echo $telefono_cliente; ?>" />
      </div>

      <div class="col-md-8">
          <label> Ciudad </label>
          <input type="text" name="ciudad_cliente" class="form-control"  required="required" value="<?php echo $ciudad_cliente; ?>" />

      </div>



        <div class="col-md-6">
            <label> Email </label>
            <input type="text" name="email_cliente" class="form-control" required="required" value="<?php echo $email_cliente; ?>" />
        </div>

        <div class="col-md-9"></div>

        <div class="col-md-3">
            <input type="submit"  class="btn btn-success" value="Guardar"  />
            <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/clientes/index">Cancelar</a>
        </div>
    </form>
</div>


</div>
</div>


<!--

<div id="container">


   <div id="body">-->

</body>
</html>

