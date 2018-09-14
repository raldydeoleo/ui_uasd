<?php /** @var  $proyecto */?>
<div class="col-md-8">
<div class="panel panel-info">

    <div class="panel-body" >

<h1> Proyecto :<?php echo $proyecto->nombre_proyecto ?> <br /> Monto : <?php echo $proyecto->monto_proyecto; ?> </h1>
<div> CODIGO:  :<?php echo nl2br($proyecto->id_proyecto) ?> </div>

<div> <a class="btn btn-info" href="<?php echo base_url() ?>index.php/proyectos"> Volver atrás </a> </div>
        </div>
        </div>
    </div>