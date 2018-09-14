
   
   
<div class="col-md-8">
    <div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-btns">
            <a href="" class="panel-close">×</a>
            <a href="" class="minimize">−</a>
        </div>
        <h5 class="panel-title">Prueba Notificaciones y validacion con JS </h1>
    </div>

        <div class="panel-body" >

    <form method="post" id="frm" action="<?php echo base_url() ?>./clientes/test">

        <div class="form-group">

           
        <div class="col-md-3">
            <label> Nombre </label>
            <input type="text" name="nombre" class="form-control" id="nombre"  required="required" value="" />
        </div>

        <div class="col-md-3">
            <label> Apellido </label>
            <input type="text" name="apellido" id="apellido" class="form-control"  required="required" value="" />
        </div>

            <div class="col-md-6">
                <label> Email </label>
                <input type="text" name="email" id="email" class="form-control" required="required" value="" />
            </div>

            </div>
            <div class="col-md-8">  </div>
            <div class="col-md-2">
            <input type="submit" id="enviar" onClick="notificar();" name="enviar" class="btn btn-primary form-control">
            </div>

            <div class="col-md-2">
            <input type="reset" id="cancelar"  name="cancelar" class="btn btn-danger form-control">
            </div>
            
        </div>

        </div>
        </div>
        </div>   

      </form>

    <!-- Javascript  jQuery -->
    <script src="<?php  echo base_url() ?>assets/js/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php  echo base_url() ?>assets/js/Push.min.js"></script>
 
<script>
        function notificar(){

        var todo_correcto = true;
        if(document.getElementById('nombre').value.length == 0){
            todo_correcto = false;
        alert('Nombre no debe estar vacio');
        exit();
        }else{
            if(document.getElementById('apellido').value.length == 0){
                todo_correcto = false;
                    alert('Apellido no debe estar vacio');
                    exit();
                }else{
                    if(document.getElementById('email').value.length == 0){
                        todo_correcto = false;
                            alert('email no debe estar vacio');
                            exit();

                }
                }

                    Push.create("Notificación",{
                            body:'Registro guardado con exito!',
                            icon:'assets/images/photos/empleado.png',
                            timeout: 4000,
                            onClick: function(){
                                window.location="https://www.youtube.com/";
                                this.close();
                                
                }
            });
        }
    }

</script> 
