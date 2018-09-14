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
        <h5 class="panel-title"> Actualizar datos del Proveedor </h1>
    </div>

        <div class="panel-body" >

    <form method="post" action="<?php echo base_url() ?>index.php/proveedores/guardar_post/">

        <div class="form-group">

            <div class="col-md-1">
                <label> id </label>
                <input type="text" name="id_proveedor" class="form-control"   required="required" value="<?php echo $id_proveedor; ?>" />
            </div>

        <div class="col-md-3">
            <label> Nombre </label>
            <input type="text" name="cnombre_proveedor" class="form-control"   required="required" value="<?php echo $cnombre_proveedor; ?>" />
        </div>

        <div class="col-md-3">
            <label> Apellido </label>
            <input type="text" name="capellido_proveedor" class="form-control"  required="required" value="<?php echo $capellido_proveedor; ?>" />
        </div>

            <div class="col-md-6">
                <label> Email </label>
                <input type="text" name="cemail_proveedor" class="form-control" required="required" value="<?php echo $cemail_proveedor; ?>" />
            </div>
        </div>

        <div class="col-md-9">
            <label> Empresa </label>
            <input type="text" name="empresa_proveedor" class="form-control"  required="required" value="<?php echo $empresa_proveedor; ?>" />
        </div>

        <div class="col-md-3">
            <label> Teléfono </label>
            <input type="text" name="ctelefono_proveedor" class="form-control" required="required" value="<?php echo $ctelefono_proveedor; ?>" />
        </div>

      <div class="col-md-4">
          <label> RNC </label>
          <input type="text" name="rnc_proveedor" class="form-control" required="required" value="<?php echo $rnc_proveedor; ?>" />
      </div>

        <div class="col-md-8">
            <label> Dirección </label>
            <input type="text" name="cdireccion_proveedor" class="form-control"  required="required" value="<?php echo $cdireccion_proveedor; ?>" />

        </div>

      <div class="col-md-8">
          <label> Ciudad </label>
          <input type="text" name="cciudad_proveedor" class="form-control"  required="required" value="<?php echo $cciudad_proveedor; ?>" />

      </div>
        <div class="col-md-9"></div>

        <div class="col-md-3">
            <input type="submit"  class="btn btn-success" value="Guardar"  />
            <a class="btn btn-danger" href="<?php echo base_url() ?>proveedores/index">Cancelar</a>
        </div>
    </form>
</div>


</div>
</div>

</body>
</html>
