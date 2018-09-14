<div class="col-lg-12">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-btns">
                <a href="" class="panel-close">×</a>
                <a href="" class="minimize">−</a>
            </div>
            <h4 class="panel-title">Unidad de Investigación - UASD</h4>
            <p>Sistema de información.</p>
        </div>
        <div class="panel-body panel-body-nopadding">

           <!-- panel-body -->
            <div class="pageheader">
                <h2><i class="fa fa-home"></i> Inicio <span>Utilice el menu de izquierda ...</span></h2>
                <div class="breadcrumb-wrapper">
                    <span class="label">Usted esta aqui:</span>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Inicio</a></li>
                        <li class="active">Panel</li>
                    </ol>
                </div>
            </div>

            <div class="contentpanel">
    <div class="row">

        <div class="col-md-4">
            <div class="panel panel-success panel-stat">
                <div class="panel-heading">
.
                    <div class="stat">
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="<?php echo base_url() ?>assets/images/is-user.png" alt="" />
                            </div>
                            <div class="col-xs-6">
                                <small class="stat-label">Lista</small>
                                <h1>Investigadores</h1>
                            </div>
                        </div><!-- row -->

                        <div class="mb15"></div>

                            <div class="stat-label">
                                <small class="stat-label">Menu y formularios</small>
                               
                            </div>
                                <a href="<?php echo base_url() ?>investigadores/listaInvestigadores">
                                <buttom class="btn btn-large btn-default">Ver</buttom>
                                </a>
                        </div><!-- row -->
                    </div>
                </div>
            </div>

             <div class="col-md-4">
            <div class="panel panel-primary panel-stat">
                <div class="panel-heading">

                    <div class="stat">
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="<?php echo base_url() ?>assets/images/is-document.png" alt="" />
                            </div>
                            <div class="col-xs-8">
                                <small class="stat-label">Lista</small>
                                <h1>Proyectos</h1>
                            </div>
                        </div><!-- row -->

                        <div class="mb15"></div>

                            <div class="stat-label">
                                <small class="stat-label">Menu y formularios</small>
                                
                            </div>
                                <a href="<?php echo base_url() ?>profesores/index">
                                <buttom class="btn btn-large btn-maroon">Ver</buttom>
                                </a>
                        </div><!-- row -->
                    </div>
                </div>
            </div>


        <div class="col-sm-6 col-md-4">
            <div class="panel panel-danger panel-stat">
                <div class="panel-heading">

                    <div class="stat">
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="<?php echo base_url() ?>assets/images/is-document.png" alt="" />
                            </div>
                            <div class="col-xs-8">
                                <small class="stat-label">Lista</small>
                                <h1>Artículos</h1>
                            </div>
                        </div><!-- row -->

                        <div class="mb15"></div>

                        <small class="stat-label">Menu y formularios</small>
                        

                        <a href="<?php echo base_url() ?>asignaturas/index">
                            <buttom class="btn btn-large btn-maroon">Ver</buttom>
                        </a>

                    </div><!-- stat -->

                </div><!-- panel-heading -->
            </div><!-- panel -->
        </div><!-- col-sm-6 -->

        <div class="col-sm-6 col-md-4">
            <div class="panel panel-primary panel-stat">
                <div class="panel-heading">

                    <div class="stat">
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="<?php echo base_url() ?>assets/images/is-document.png" alt="" />
                            </div>
                            <div class="col-xs-8">
                                <small class="stat-label">Lista</small>
                                <h1>Publicaciones</h1>
                            </div>
                        </div><!-- row -->

                        <div class="mb15"></div>

                        <small class="stat-label">Menu y formularios</small>
                        

                        <a href="<?php echo base_url() ?>secciones/index">
                            <buttom class="btn btn-large btn-maroon">Ver</buttom>
                        </a>

                    </div><!-- stat -->

                </div><!-- panel-heading -->
            </div><!-- panel -->
        </div><!-- col-sm-6 -->

        <div class="col-sm-6 col-md-4">
            <div class="panel panel-warning panel-stat">
                <div class="panel-heading">

                    <div class="stat">
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="<?php echo base_url() ?>assets/images/is-money.png" alt="" />
                            </div>
                            <div class="col-xs-8">
                                <small class="stat-label">Lista</small>
                                <h1>Presupuesto</h1>
                            </div>
                        </div><!-- row -->

                        <div class="mb15"></div>

                        <div class="row">
                            <div class="stat-label">
                                <small class="stat-label">Menu y formularios</small>
                                
                            </div>

                            <a href="<?php echo base_url() ?>inscripciones/index">
                                <buttom class="btn btn-large btn-maroon">Ver</buttom>
                            </a>
                        </div><!-- row -->
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>


        </div>
    <div class="panel-footer">
    <div class="col-md-9">



    
    
    </div>
    <div class="col-md-3">
         <div class="col-sm-12 col-sm-offset-3">
            <a href="<?=base_url()?>Usuarios/logout" class="btn btn-primary">Salir</a>&nbsp;
        </div>
    </div>
</div><!-- panel-footer -->
</div><!-- panel -->
<script src="<?= base_url()?>assets/js/jquery.gritter.min.js"></script>

<script>
jQuery(document).ready(function() {
    
    "use strict";
    
  jQuery('#growl1').click(function(){

	 jQuery.gritter.add({
		// (string | mandatory) the heading of the notification
		title: 'This is a regular notice!',
		// (string | mandatory) the text inside the notification
		text: 'This will fade out after a certain amount of time.',
		// (string | optional) the image to display on the left
		image: 'images/screen.png',
		// (bool | optional) if you want it to fade out on its own or just sit there
		sticky: false,
		// (int | optional) the time you want it to be alive for before fading out
		time: ''
	 });

	 return false;

  });
  
  jQuery('#growl2').click(function(){
	 jQuery.gritter.add({
		title: 'This is a regular notice!',
		text: 'This will fade out after a certain amount of time.',
		sticky: false,
		time: ''
	 });
	 return false;
  });
  
  jQuery('#growl-primary').click(function(){
	 jQuery.gritter.add({
		title: 'This is a regular notice!',
		text: 'This will fade out after a certain amount of time.',
      class_name: 'growl-primary',
      image: 'images/screen.png',
		sticky: false,
		time: ''
	 });
	 return false;
  });
  
  jQuery('#growl-success').click(function(){
	 jQuery.gritter.add({
		title: 'This is a regular notice!',
		text: 'This will fade out after a certain amount of time.',
      class_name: 'growl-success',
      image: 'images/screen.png',
		sticky: false,
		time: ''
	 });
	 return false;
  });
  
  jQuery('#growl-warning').click(function(){
	 jQuery.gritter.add({
		title: 'This is a regular notice!',
		text: 'This will fade out after a certain amount of time.',
      class_name: 'growl-warning',
      image: 'images/screen.png',
		sticky: false,
		time: ''
	 });
	 return false;
  });
  
  jQuery('#growl-danger').click(function(){
	 jQuery.gritter.add({
		title: 'This is a regular notice!',
		text: 'This will fade out after a certain amount of time.',
      class_name: 'growl-danger',
      image: 'images/screen.png',
		sticky: false,
		time: ''
	 });
	 return false;
  });
  
  jQuery('#growl-info').click(function(){
	 jQuery.gritter.add({
		title: 'This is a regular notice!',
		text: 'This will fade out after a certain amount of time.',
      class_name: 'growl-info',
      image: 'images/screen.png',
		sticky: false,
		time: ''
	 });
	 return false;
  });

});
</script>
