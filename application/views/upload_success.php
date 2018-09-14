<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php /** @var array $data */?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

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

<div class="col-md-8">  
</div>

<div class="panel panel-primary">
	<div class="panel-heading">

	<h1>Resultado de la Carga de imagen!</h1>

	</div>

	<div class="panel-body" >
	<div id="container">
	<div id="body">


		<div class="col-md-6">

			<div id="info_subida">
				<ul>
					<?php foreach ($upload_data as $item => $value):?>
						<li><?php echo $item;?>: <?php echo $value;?></li>
					<?php endforeach; ?>
				</ul>
			</div>

       </div>
   <!--mostramos la imagen subida -->

   <div class="form-group">
   <div class="col-md-6">
			<div id="imagenes">
				<h3><?php /** $titulo  */ ?> </h3>
				<img alt="foto subida" src="<?=base_url()?>uploads/cerati.jpg" width="300" height="250" class="media-object">
			</div>

	</div>
	<div class="row">  </div>
	<div class="col-md-3">           
            <a class="btn btn-success" href="<?php echo base_url() ?>index.php/welcome/index">Salir</a>
        </div>

</div>
</div>
</div>

</body>

</html>