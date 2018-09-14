<?php /** @var  $asignatura */?>

    <div class="col-md-8" xmlns="http://www.w3.org/1999/html">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h5 class="panel-title">Vista individual Asignatura</h5>
            </div>


         <div class="panel-body" >

        <h1> Asignatura :<?php echo $asignatura->nombre_asignatura ?> <br />NRC : <?php echo $asignatura->nrc_asignatura; ?>) </h1>
        <h1> Clave:  :<?php echo nl2br($asignatura->clave_asignatura) ?> <br />Creditos : <?php echo $asignatura->creditos_asignatura; ?>) </h1>
        <div> Horas Practica :<?php echo $asignatura->horasp_asignatura ?>  </div>
        <div> Horas Teoria :<?php echo $asignatura->horast_asignatura ?>  </div>

        <div> <a class="btn btn-info" href="<?php echo base_url() ?>index.php/asignaturas"> Volver atrás </a> </div>
        </div>
</div>
</div>