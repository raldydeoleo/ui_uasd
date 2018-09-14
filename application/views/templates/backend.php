<?php /** @var array $contenido */?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png" type="image/png">

    <!--TITULO--><title>UASD - Unidad de Investigación</title>
    <!--TITULO<title><?=APP_TITULO; ?></title> -->
    <!--FAVICON-->
    <link href="<?= base_url('assets/images/'.APP_LOGO); ?>" rel="shortcut icon" type="image/png" />


    <!--BEGIN CSS FILES -->

    <link href=" <?=base_url('assets/css/style.default.css'); ?>" rel="stylesheet"> <!-- css para estilo visual del dashboard principal -->
    <script src="js/jquery.gritter.min.js"></script>

    <!--END CSS FILES-->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9] -->
    <script src="<?= base_url()?>assets/js/html5shiv.js"></script>
    <script src="<?= base_url()?>assets/js/respond.min.js"></script>
    <script src="<?= base_url()?>assets/js/jquery.gritter.min.js"></script>
    <!--[endif]-->


    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <!--<link href=" <?=base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">  aplica boostrap desde assets/css/ -->
    <!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->


    <style>
        .eymicon{
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>



<section>

    <div class="leftpanel">

        <div class="logopanel">
            <h1><span>[</span> UI UASD <span>]</span></h1>
        </div><!-- logopanel -->

        <div class="leftpanelinner">

            <!-- This is only visible to small devices -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media userlogged">
                    <img alt="" src="<?=base_url()?>assets/images/photos/loggeduser.png" class="media-object">
                    <div class="media-body">
                        <h4>Raldy De Oleo</h4>
                        <span>"Life is so..."</span>
                    </div>
                </div>

                <h5 class="sidebartitle actitle">Cuenta</h5>
                <ul class="nav nav-pills nav-stacked nav-bracket mb30 ">
                    <li><a href="profile.html"><i class="fa fa-user"></i> <span>Perfil</span></a></li>
                    <li><a href=""><i class="fa fa-cog"></i> <span>Configuración</span></a></li>
                    <li><a href=""><i class="fa fa-question-circle"></i> <span>Ayuda</span></a></li>
                    <li><a href="signout.html"><i class="fa fa-sign-out"></i> <span>Cerrar sesión</span></a></li>
                </ul>
            </div>

            <h5 class="sidebartitle">Navegación</h5>
            <!-- MENU -->
            <ul class="nav nav-pills nav-stacked nav-bracket ">

                <!--Menu Administracion -->
                <div class="info-summary"><h5>Administracion</h5></div>
                <li  class="nav-parent"><a href="<?php echo base_url() ?>#"><i class="fa fa-user"></i> <span>Investigadores</span></a>
                         <ul class="children" >
                            <li><a href="<?=base_url()?>investigadores/nuevo_investigador">Registrar Investigador</a></li>
                            <li><a href="<?=base_url()?>#">Investigadores por Area</a></li>
                            <li><a href="<?=base_url()?>investigadores/index">Lista de  Investigadores</a></li>
                        </ul>
                </li>

                 <li class="nav-parent"><a href="<?php echo base_url() ?>#"><i class="fa fa-edit"></i> <span>Artículos</span></a>

                                <ul class="children">                                    
                                    <li><a href="<?=base_url()?>#">Registrar Artículo</a></li>
                                    <li><a href="<?=base_url()?>#">Lista de Artículos</a></li>
                                </ul>
                </li>

                 <li class="nav-parent"><a href="<?php echo base_url()?>#"><i class="fa fa-edit"></i> <span>Proyectos</span></a>
                            <ul class="children">
                                <li><a href="<?=base_url()?>#">Registrar Proyecto</a></li>                                
                                <li><a href="<?=base_url()?>#">Lista de Proyectos</a></li>
                            </ul>
                 </li>


                 <li class="nav-parent"><a href="<?php echo base_url()?>#"><i class="fa fa-bell"></i> <span>Publicaciones</span></a>
                            <ul class="children">
                                <li><a href="<?=base_url()?>#">Registrar Publicacion</a></li>
                                <li><a href="<?=base_url()?>#">Lista de Publicaciones</a></li>
                            </ul>
                </li>
 
                <!-- Fin menu Administracion -->

                <div class="info-summary"><h5>Usuarios</h5></div>
                <li  class="nav-parent"><a href="#"><i class="fa fa-user"></i> <span>Usuarios</span></a>
                    <ul class="children">
                        <li><a href="<?php echo base_url() ?>usuarios/nuevo_usuario">Crear usuario</a></li>
                        <li><a href="<?php echo base_url() ?>usuarios/listaUsuarios">Lista de usuarios</a></li>
                        <li><a href="<?php echo base_url() ?>#">Permisos a usuarios</a></li>


                    </ul>
                </li>

            </ul>
               
            </ul>

            <div class="infosummary">

            </div><!-- infosummary -->

        </div><!-- leftpanelinner -->
    </div><!-- leftpanel -->

    <div class="mainpanel">

        <div class="headerbar">

            <a class="menutoggle"><i class="fa fa-bars"></i></a>

            

            <div class="header-right">
                <ul class="headermenu">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span class="badge">2</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-head pull-right">
                                <h5 class="title">2 Newly Registered Users</h5>
                                <ul class="dropdown-list user-list">
                                    <li class="new">
                                        <div class="thumb"><a href=""><img src="<?=base_url()?>assets/images/photos/user1.png" alt="" /></a></div>
                                        <div class="desc">
                                            <h5><a href="">Draniem Daamul (@draniem)</a> <span class="badge badge-success">new</span></h5>
                                        </div>
                                    </li>
                                    <li class="new">
                                        <div class="thumb"><a href=""><img src="<?=base_url()?>assets/images/photos/user2.png" alt="" /></a></div>
                                        <div class="desc">
                                            <h5><a href="">Zaham Sindilmaca (@zaham)</a> <span class="badge badge-success">new</span></h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="thumb"><a href=""><img src="<?=base_url()?>assets/images/photos/user3.png" alt="" /></a></div>
                                        <div class="desc">
                                            <h5><a href="">Weno Carasbong (@wenocar)</a></h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="thumb"><a href=""><img src="<?=base_url()?>assets/images/photos/user4.png" alt="" /></a></div>
                                        <div class="desc">
                                            <h5><a href="">Nusja Nawancali (@nusja)</a></h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="thumb"><a href=""><img src="<?=base_url()?>assets/images/photos/user5.png" alt="" /></a></div>
                                        <div class="desc">
                                            <h5><a href="">Lane Kitmari (@lane_kitmare)</a></h5>
                                        </div>
                                    </li>
                                    <li class="new"><a href="">See All Users</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-envelope"></i>
                                <span class="badge">1</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-head pull-right">
                                <h5 class="title">You Have 1 New Message</h5>
                                <ul class="dropdown-list gen-list">
                                    <li class="new">
                                        <a href="">
                                            <span class="thumb"><img src="<?=base_url()?>assets/images/photos/user1.png" alt="" /></span>
                                                    <span class="desc">
                                                        <span class="name">Draniem Daamul <span class="badge badge-success">new</span></span>
                                                        <span class="msg">Lorem ipsum dolor sit amet...</span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="thumb"><img src="<?=base_url()?>assets/images/photos/user2.png" alt="" /></span>
                                                    <span class="desc">
                                                        <span class="name">Nusja Nawancali</span>
                                                        <span class="msg">Lorem ipsum dolor sit amet...</span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="thumb"><img src="<?=base_url()?>assets/images/photos/user3.png" alt="" /></span>
                                                    <span class="desc">
                                                        <span class="name">Weno Carasbong</span>
                                                        <span class="msg">Lorem ipsum dolor sit amet...</span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="thumb"><img src="<?=base_url()?>assets/images/photos/user4.png" alt="" /></span>
                                                    <span class="desc">
                                                        <span class="name">Zaham Sindilmaca</span>
                                                        <span class="msg">Lorem ipsum dolor sit amet...</span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="thumb"><img src="<?=base_url()?>assets/images/photos/user5.png" alt="" /></span>
                                                    <span class="desc">
                                                        <span class="name">Veno Leongal</span>
                                                        <span class="msg">Lorem ipsum dolor sit amet...</span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li class="new"><a href="">Read All Messages</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-globe"></i>
                                <span class="badge">5</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-head pull-right">
                                <h5 class="title">You Have 5 New Notifications</h5>
                                <ul class="dropdown-list gen-list">
                                    <li class="new">
                                        <a href="">
                                            <span class="thumb"><img src="<?=base_url()?>assets/images/photos/user4.png" alt="" /></span>
                                                    <span class="desc">
                                                        <span class="name">Zaham Sindilmaca <span class="badge badge-success">new</span></span>
                                                        <span class="msg">is now following you</span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li class="new">
                                        <a href="">
                                            <span class="thumb"><img src="<?=base_url()?>assets/images/photos/user5.png" alt="" /></span>
                                                    <span class="desc">
                                                        <span class="name">Weno Carasbong <span class="badge badge-success">new</span></span>
                                                        <span class="msg">is now following you</span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li class="new">
                                        <a href="">
                                            <span class="thumb"><img src="<?=base_url()?>assets/images/photos/user3.png" alt="" /></span>
                                                    <span class="desc">
                                                        <span class="name">Veno Leongal <span class="badge badge-success">new</span></span>
                                                        <span class="msg">likes your recent status</span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li class="new">
                                        <a href="">
                                            <span class="thumb"><img src="<?=base_url()?>assets/images/photos/user3.png" alt="" /></span>
                                                    <span class="desc">
                                                        <span class="name">Nusja Nawancali <span class="badge badge-success">new</span></span>
                                                        <span class="msg">downloaded your work</span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li class="new">
                                        <a href="">
                                            <span class="thumb"><img src="<?=base_url()?>assets/images/photos/user3.png" alt="" /></span>
                                                    <span class="desc">
                                                        <span class="name">Nusja Nawancali <span class="badge badge-success">new</span></span>
                                                        <span class="msg">send you 2 messages</span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li class="new"><a href="">See All Notifications</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <img src="<?=base_url()?>assets/images/photos/loggeduser.png" alt="" />
                                Raldy De Oleo
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                <li><a href="profile.html"><i class="glyphicon glyphicon-user"></i> Mi Perfil</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Configuracin cuenta</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Ayuda</a></li>
                                <li><a href="<?=base_url()?>Usuarios/logout"><i class="glyphicon glyphicon-log-out"></i> Cerrar sesion</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button id="chatview" class="btn btn-default tp-icon chat-icon">
                            <i class="glyphicon glyphicon-comment"></i>
                        </button>
                    </li>
                </ul>
            </div><!-- header-right -->

        </div><!-- headerbar -->

        <div class="contentpanel">
            <!-- content goes here... -->

            <!--BEGIN CONTENIDO NETO-->
            <?= $contenido ?>


            <!--END CONTENIDO NETO-->

        </div>

    </div><!-- mainpanel -->

    <div class="rightpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#rp-alluser" data-toggle="tab"><i class="fa fa-users"></i></a></li>
            <li><a href="#rp-favorites" data-toggle="tab"><i class="fa fa-heart"></i></a></li>
            <li><a href="#rp-history" data-toggle="tab"><i class="fa fa-clock-o"></i></a></li>
            <li><a href="#rp-settings" data-toggle="tab"><i class="fa fa-gear"></i></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="rp-alluser">
                <h5 class="sidebartitle">Online Users</h5>
                <ul class="chatuserlist">
                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/userprofile.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Eileen Sideways</strong>
                                <small>Los Angeles, CA</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user1.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <span class="pull-right badge badge-danger">2</span>
                                <strong>Zaham Sindilmaca</strong>
                                <small>San Francisco, CA</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user2.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Nusja Nawancali</strong>
                                <small>Bangkok, Thailand</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user3.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Renov Leongal</strong>
                                <small>Cebu City, Philippines</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user4.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Weno Carasbong</strong>
                                <small>Tokyo, Japan</small>
                            </div>
                        </div><!-- media -->
                    </li>
                </ul>

                <div class="mb30"></div>

                <h5 class="sidebartitle">Offline Users</h5>
                <ul class="chatuserlist">
                    <li>
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user5.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Eileen Sideways</strong>
                                <small>Los Angeles, CA</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li>
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user2.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Zaham Sindilmaca</strong>
                                <small>San Francisco, CA</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li>
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user3.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Nusja Nawancali</strong>
                                <small>Bangkok, Thailand</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li>
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user4.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Renov Leongal</strong>
                                <small>Cebu City, Philippines</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li>
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user5.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Weno Carasbong</strong>
                                <small>Tokyo, Japan</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li>
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user4.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Renov Leongal</strong>
                                <small>Cebu City, Philippines</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li>
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user5.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Weno Carasbong</strong>
                                <small>Tokyo, Japan</small>
                            </div>
                        </div><!-- media -->
                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="rp-favorites">
                <h5 class="sidebartitle">Favorites</h5>
                <ul class="chatuserlist">
                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user2.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Eileen Sideways</strong>
                                <small>Los Angeles, CA</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li>
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user1.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Zaham Sindilmaca</strong>
                                <small>San Francisco, CA</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li>
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user3.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Nusja Nawancali</strong>
                                <small>Bangkok, Thailand</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user4.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Renov Leongal</strong>
                                <small>Cebu City, Philippines</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user5.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Weno Carasbong</strong>
                                <small>Tokyo, Japan</small>
                            </div>
                        </div><!-- media -->
                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="rp-history">
                <h5 class="sidebartitle">History</h5>
                <ul class="chatuserlist">
                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user4.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Eileen Sideways</strong>
                                <small>Hi hello, ctc?... would you mind if I go to your...</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li>
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user2.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Zaham Sindilmaca</strong>
                                <small>This is to inform you that your product that we...</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li>
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?=base_url()?>assets/images/photos/user3.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Nusja Nawancali</strong>
                                <small>Are you willing to have a long term relat...</small>
                            </div>
                        </div><!-- media -->
                    </li>
                </ul>
            </div>
            <div class="tab-pane pane-settings" id="rp-settings">

                <h5 class="sidebartitle mb20">Settings</h5>
                <div class="form-group">
                    <label class="col-xs-8 control-label">Show Offline Users</label>
                    <div class="col-xs-4 control-label">
                        <div class="toggle toggle-success"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-8 control-label">Enable History</label>
                    <div class="col-xs-4 control-label">
                        <div class="toggle toggle-success"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-8 control-label">Show Full Name</label>
                    <div class="col-xs-4 control-label">
                        <div class="toggle-chat1 toggle-success"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-8 control-label">Show Location</label>
                    <div class="col-xs-4 control-label">
                        <div class="toggle toggle-success"></div>
                    </div>
                </div>

            </div><!-- tab-pane -->

        </div><!-- tab-content -->
    </div><!-- rightpanel -->

</section>

<script src="<?=base_url()?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery-ui-1.10.3.min.js"></script>


<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/colorpicker.js"></script>
<script src="<?=base_url()?>assets/js/custom.js"></script>
<script src="<?=base_url()?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.autogrow-textarea.js"></script>
<script src="<?=base_url()?>assets/js/jquery.cookies.js"></script>
<script src="<?=base_url()?>assets/js/jquery.maskedinput.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.tagsinput.min.js"></script>
<script src="<?=base_url()?>assets/js/modernizr.min.js"></script>
<script src="<?=base_url()?>assets/js/retina.min.js"></script>
<script src="<?=base_url()?>assets/js/select2.min.js"></script>
<script src="<?=base_url()?>assets/js/toggles.min.js"></script>



<script src="<?=base_url()?>assets/js/bootstrap-wizard.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.validate.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-timepicker.min.js"></script>






<script>
    jQuery(document).ready(function(){

        "use strict";



        // Basic Wizard
        jQuery('#basicWizard').bootstrapWizard();

        // Progress Wizard
        $('#progressWizard').bootstrapWizard({
            'nextSelector': '.next',
            'previousSelector': '.previous',
            onNext: function(tab, navigation, index) {

                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                jQuery('#progressWizard').find('.progress-bar').css('width', $percent+'%');
            },
            onPrevious: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                jQuery('#progressWizard').find('.progress-bar').css('width', $percent+'%');
            },
            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                jQuery('#progressWizard').find('.progress-bar').css('width', $percent+'%');
            }
        });

        // Disabled Tab Click Wizard
        jQuery('#disabledTabWizard').bootstrapWizard({
            tabClass: 'nav nav-pills nav-justified nav-disabled-click',
            onTabClick: function(tab, navigation, index) {
                return false;
            }
        });

        // With Form Validation Wizard
        var $validator = jQuery("#firstForm").validate({
            highlight: function(element) {
                jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            success: function(element) {
                jQuery(element).closest('.form-group').removeClass('has-error');
            }
        });

        jQuery('#validationWizard').bootstrapWizard({
            tabClass: 'nav nav-pills nav-justified nav-disabled-click',
            onTabClick: function(tab, navigation, index) {
                return false;
            },
            onNext: function(tab, navigation, index) {
                var $valid = jQuery('#firstForm').valid();
                if(!$valid) {

                    $validator.focusInvalid();
                    return false;
                }
            }
        });

        jQuery(".select2").select2({
            width: '100%',
            minimumResultsForSearch: -1
        });

        // Spinner
        var spinner = jQuery('#spinner').spinner();
        spinner.spinner('value', 0);


        // Date Picker
        jQuery('#datepicker').datepicker({
            numberOfMonths: 1,
            showButtonPanel: true
        });

        // Input Masks
        jQuery("#phone").mask("(999) 999-9999");
        jQuery("#phone2").mask("(999) 999-9999");

        // Time Picker
        jQuery('#timepicker').timepicker({defaultTIme: false});
        jQuery('#timepicker2').timepicker({showMeridian: false});
        jQuery('#timepicker3').timepicker({minuteStep: 15});




    });
</script>

</body>
</html>