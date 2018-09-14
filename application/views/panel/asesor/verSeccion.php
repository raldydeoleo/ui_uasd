<?php /** @var  $seccion */?>

    <div class="col-md-8" xmlns="http://www.w3.org/1999/html">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h5 class="panel-title">Vista individual de Seccion</h5>
            </div>


         <div class="panel-body" >

        <h3> Asignatura :<?php echo $seccion->nombre_asignatura ?> <br />
         Profesor:  :<?php echo $seccion->nombre_profesor ?> <?php echo $seccion->apellido_profesor ?> <br />
        
        <div>Nombre Seccion :<?php echo $seccion->nombre_seccion ?>  </div>

        <div> ID Seccion: <?php echo $seccion->id_seccion ?>  </h3>
        <div class="table-responsive">
                <table class="table table-warning table-hover mb30">
                    <thead>
                    <tr>
                        <th>Aula</th>
                        <th>Período</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sabado</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                    <tr>            
                        <td><?php echo $seccion->id_aula ?></td>
                        <td><?php echo $seccion->id_periodo ?></td>
                        <td><?php echo $seccion->lunes_seccion ?></td>
                        <td><?php echo $seccion->martes_seccion ?></td>
                        <td><?php echo $seccion->miercoles_seccion ?></td>
                        <td><?php echo $seccion->jueves_seccion ?></td>
                        <td><?php echo $seccion->viernes_seccion ?></td>
                        <td><?php echo $seccion->sabado_seccion ?></td>
                        </tr>
                    </tbody>
                </table>
        
        
         </div>

        <div> <a class="btn btn-info" href="<?php echo base_url() ?>index.php/secciones"> Volver atrás </a> </div>
        </div>
</div>
</div>