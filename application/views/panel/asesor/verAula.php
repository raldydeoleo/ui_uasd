<?php /** @var  $aula */?>

    <div class="col-md-8" xmlns="http://www.w3.org/1999/html">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h5 class="panel-title">Vista individual Aula</h5>
            </div>


         <div class="panel-body" >
       
        <h1>ID: <?php echo $aula->id_aula; ?> <br />
         Aula :<?php echo $aula->nombre_aula ?> <br />
        Capacidad : <?php echo $aula->capacidad_aula; ?> <br />
        Edificio: <?php echo $aula->id_edificio ?> <br /> </h1>
       
       <!--input type="text" value="<?php// echo $aula->id_aula; ?>" readonly="readonly" -->

        <div> <a class="btn btn-info" href="<?php echo base_url() ?>index.php/aulas"> Volver atrás </a> </div>
        </div>
</div>
</div>