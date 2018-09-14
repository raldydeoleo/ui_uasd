<!DOCTYPE html>
<html lang="en">
<head>
  <?php header('Content-Type: text/html; charset=utf-8'); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.png" type="image/png">

  <title>Unidad de Investigación - UI-UASD</title>

  <link href="<?=base_url()?>assets/css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="<?=base_url()?>assets/js/html5shiv.js"></script>
  <script src="<?=base_url()?>assets/js/respond.min.js"></script>
  <![endif]-->

    <link href=" <?=base_url('assets/css/style.default.css'); ?>" rel="stylesheet">

</head>

<body class="signin">


<section>
  
    <div class="signinpanel">
        
        <div class="row">
        <div class="col-md-8"> </div>      
        <div class="col-md-4">

<div class="panel- panel-default widget-photoday">
    <div class="panel-body">
        <img alt="logouasd" src="<?=base_url()?>uploads/logo.jpg" width="165" height="150" class="media-object">
    </div>

</div>

</div>
            <div class="col-md-7">
                
                <div class="signin-info">
                    <div class="logopanel">
                    <h1><span>[</span> UNIDAD DE INVESTIGACION <span>]</span></h1><br>
                        <h1><span>[</span> UASD <span>]</span></h1>
                    </div><!-- logopanel -->
                
                    <div class="mb20"></div>
                
                    <h5><strong>Sistema de Información.</strong></h5>
                    <ul>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Investigadores</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Proyectos</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Investigaciones</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Publicaciones</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Artículos</li>
                        
                    </ul>
                    <div class="mb20"></div>
                    <strong>No tienes usuario? <a href="<?php echo base_url() ?>index.php/usuarios/signup">Registrarse</a></strong>
                </div><!-- signin0-info -->
            
            </div><!-- col-sm-7 -->
            
            <div class="col-md-5">
                
                <form method="post" action="<?=base_url()?>usuarios/login/">

                    <h4 class="nomargin">Iniciar Sesion</h4>
                    <p class="mt5 mb20">Accede a tu cuenta.</p>
                
                    <input type="text" class="form-control uname" name="nombre_usuario" id="nombre_usuario" placeholder="Usuario" />
                    <input type="password" class="form-control pword" name="clave_usuario" id="clave_usuario" placeholder="Clave" />
                    <!-- <a href=""><small>¿Olvidaste tu contraseña?</small></a> -->
                    <button class="btn btn-success btn-block">Iniciar Sesión</button>
                    
                </form>
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2018. Derechos Reservados. <a href="#" target="_blank">Raldy De Oleo</a>
            </div>
            <div class="pull-right">
                Creado Por: <a href="http://sistek.com" target="_blank">Sistek Softwares</a>
            </div>
        </div>
        
    </div><!-- signin -->
  
</section>


<script src="<?=base_url()?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/modernizr.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.cookies.js"></script>

<script src="<?=base_url()?>assets/js/toggles.min.js"></script>
<script src="<?=base_url()?>assets/js/retina.min.js"></script>

<script src="<?=base_url()?>assets/js/custom.js"></script>
<script>
    jQuery(document).ready(function(){
        
        // Please do not use the code below
        // This is for demo purposes only
        var c = jQuery.cookie('change-skin');
        if (c && c == 'greyjoy') {
            jQuery('.btn-success').addClass('btn-orange').removeClass('btn-success');
        } else if(c && c == 'dodgerblue') {
            jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
        } else if (c && c == 'katniss') {
            jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
        }
    });
</script>

</body>
</html>
