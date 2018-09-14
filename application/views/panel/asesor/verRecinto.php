<?php /** @var  $recinto */?>

    <div class="col-md-8" xmlns="http://www.w3.org/1999/html">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="<?php echo base_url() ?>index.php/recintos" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h5 class="panel-title">Vista individual Recinto</h5>
            </div>          

         <div class="panel-body" >
       
        <h1>ID: <?php echo $recinto->id_recinto; ?> <br />
        Nombre Recinto:<?php echo $recinto->nombre_recinto ?> <br />
        Ciudad: <?php echo $recinto->ciudad_recinto; ?> <br />        </h1>
     
       
        <div> <a class="btn btn-info" onclick="alerta()" href="<?php echo base_url() ?>index.php/recintos"> Volver atrás </a> </div>

       
        </div>
</div>
</div>
                <script>
                //Script para notificaciones con javascript

                function alerta() {
                            var txt;
                            if (confirm("Seguro que desea ejecutar esta acción!")) {
                                txt = "You pressed OK!";
                            } else {
                                txt = "You pressed Cancel!";
                            }
                            document.getElementById("demo").innerHTML = txt;
                        }

                function alert(){
                alert('mensaje de prueba','SPA');
                }
                </script>
