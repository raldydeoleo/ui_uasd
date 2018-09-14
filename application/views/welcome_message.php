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

        <h5 class="panel-title"> Agregar foto de investigador</h1>
    </div>

        <div class="panel-body" >



<div id="container">
	<h1>Seleccione foto a subir desde su dispositivo!</h1>


	</div>

</div>


		
				<form method="post" action="<?php echo base_url().'welcome/do_upload' ?>" enctype="multipart/form-data">
				<div class="form-group">
									<div class="col-md-6">
										<input class="form-control" placeholder="Id o Nombre" type="text" name="titulo" /> 	
									</div>


				<div class="col-md-6">
					<input type="file" class="form-control" name="userFile"/>	
				</div>

				
                    </div>

                    <div class="form-group">
                   
                    <div class="col-md-6">           
                            <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/investigadores/index">Cancelar</a>
                        </div>

                        <div class="col-md-6">
						<input type="submit" class="form-control btn btn-primary" value="cargar imagen">
                    </div>
                    
                </div> 

                <div class="form-group">
                    <div class="row"></div>
                </div>        
	
                </div>
</div>

				</form>
	






