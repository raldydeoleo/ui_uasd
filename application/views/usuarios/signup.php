<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <title></title>

  
  <link href="<?php echo base_url() ?>assets/css/style.default.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="<?php echo base_url() ?>assets/js/html5shiv.js"></script>
<script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
<![endif]-->
<link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">


</head>

<body>
    
    <div class="contentpanel">       
     
      
      <div class="row">
        <div class="col-md-6">
          
          <form id="form1" method="post" action="<?php echo base_url() ?>usuarios/insertar_usuario" class="form-horizontal">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="" class="panel-close">&times;</a>
                  <a href="" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title">Registro de nuevo usuario</h4>
                <p>Proporcione sus datos para obtener un usuario valido. Recibira un mensaje de correo con sus credenciales.</p>
              </div>
              <div class="panel-body">
              
                <div class="form-group">
                  <label class="col-sm-4 control-label">Nombres:</label>
                  <div class="col-sm-8">
                    <input type="text" name="nombre_usuario" id="nombre_usuario"  class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Apellidos:</label>
                  <div class="col-sm-8">
                    <input type="text" name="apellido_usuario" id="apellido_usuario" class="form-control" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Matricula:</label>
                  <div class="col-sm-8">
                    <input type="text" name="matricula_usuario" id="matricula_usuario" class="form-control" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Email:</label>
                  <div class="col-sm-8">
                    <input type="email" name="email_usuario" id="email_usuario" class="form-control" />
                  </div>
                </div>

              </div><!-- panel-body -->
              <div class="panel-footer">
                <button class="btn btn-primary">Registrar</button>
                <button type="reset" class="btn btn-default">Cancelar</button>
                <div class="col-md-8"> <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/usuarios/login"> Login </a> </div>
              </div><!-- panel-footer -->
           
          </form>
            
        </div><!-- col-md-6 -->
      

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/toggles.min.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/jquery.cookies.js"></script>


<script src="js/custom.js"></script>


</body>
</html>
