<?php /** @var  $profesor */?>
<div class="col-md-8">


        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h5 class="panel-title">Vista individual Profesor</h5>
            </div>


        <div class="panel-body" >

        <div class="col-md-8">


<div class="people-item">
    <div class="media">
        <a href="#" class="pull-left">
            <img alt="" src="<?php echo base_url() ?>assets/images/photos/empleado.png" class="thumbnail media-object">
        </a>
        <div class="media-body">
             
             <h4 class="person-name"><i class=""></i> Nombre : <?php echo $profesor->nombre_profesor; ?></h4>
             <h4 class="person-name"><i class=""></i> Apellido:  :<?php echo nl2br($profesor->apellido_profesor) ?></h4>             
             <div class="text-muted"><i class="fa fa-map-marker"></i>Ciudad :<?php echo $profesor->ciudad_profesor ?> </div>
             <div class="text-muted"><i class="fa fa-briefcase"></i> <a href="mailto:"> Email:  :<?php echo nl2br($profesor->email_profesor) ?> </a></div>             
             <div class="text-muted"><i class="fa fa-phone"></i> Telefono :  :<?php echo nl2br($profesor->telefono_profesor) ?> </div>

         </div>
    </div>
</div>



</div>

            
         
<div> <a class="btn btn-info" href="<?php echo base_url() ?>index.php/profesores"> Volver a Listado </a> </div>
</div>
</div>
</div>
