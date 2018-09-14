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
        <h5 class="panel-title"> Actualizar datos del Asignatura </h1>
    </div>

        <div class="panel-body" >

    <form method="post" action="<?php echo base_url() ?>/asignaturas/actualizar/<?php  echo $id_asignatura ?>">


        <div class="form-group">
        <div class="col-md-8">
            <label> Asignatura </label>
            <input type="text" name="nombre_asignatura" class="form-control"   required="required" value="<?php echo $nombre_asignatura; ?>" />
        </div>

        <div class="col-md-4">
            <label> Clave </label>
            <input type="text" name="clave_asignatura" class="form-control"  required="required" value="<?php echo $clave_asignatura; ?>" />
        </div>
        </div>

        <div class="col-md-3">
            <label> Nrc </label>
            <input type="text" name="nrc_asignatura" class="form-control"  required="required" value="<?php echo $nrc_asignatura; ?>" />
        </div>

      <div class="col-md-3">
          <label> Creditos </label>
          <input type="text" name="creditos_asignatura" class="form-control"  value="<?php echo $creditos_asignatura; ?>" />
      </div>

        <div class="col-md-3">
            <label> Horas de práctica </label>
            <input type="text" name="horasp_asignatura" class="form-control"  required="required" value="<?php echo $horasp_asignatura; ?>" />

        </div>

      <div class="col-md-3">
          <label> Horas de Teoría </label>
          <input type="text" name="telefono_cliente" class="form-control" required="required" value="<?php echo $horast_asignatura; ?>" />
      </div>      

        <div class="col-md-8"></div>

        <div class="col-md-4">
            <input type="submit"  class="btn btn-success" value="Guardar"  />
            <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/asignaturas/index">Cancelar</a>
        </div>
    </form>
</div>


</div>
</div>

</body>
</html>

