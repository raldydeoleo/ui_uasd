<div class="col-lg-12" xmlns="http://www.w3.org/1999/html">



    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Crear Cliente</h4>
        </div>

    <div class="panel-body">
        <div class="col-md-8">


            <form method="post" action="<?php echo base_url() ?>index.php/clientes/guardar_post/" >




                <div class="col-md-6">
                    <label>Nombre</label>
                            <div class="input-group">
                                <input type="text" name="nombre_cliente" class="form-control" placeholder="" id="nombre_cliente" value="">
                                <span class="input-group-addon"></span>
                            </div>
                    </div>

            </form>
                <div class="col-md-6">
                    <label>Apellido</label>
                    <div class="input-group mb15">
                        <input  type="text" name="apellido_cliente" id="apellido_cliente" class="form-control"/>
                        <span class="input-group-addon"></span>
                    </div>
                </div>

                <div class="col-md-8">
                    <label>Direccion</label>
                    <div class="input-group">
                        <input type="text" name="direccion_cliente" class="form-control" placeholder="" id="direccion_cliente">
                        <span class="input-group-addon"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <label>Telefono</label>
                    <div class="input-group mb15">
                        <input type="text" name="telefono_cliente" id="telefono_cliente"  class="form-control"/>
                        <span class="input-group-addon"></span>
                    </div>
                </div>

                <div class="col-md-8">
                    <label>Empresa</label>
                    <div class="input-group">
                        <input type="text" name="empresa_cliente" class="form-control" placeholder="" id="empresa_cliente">
                        <span class="input-group-addon"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <label>RNC</label>
                    <div class="input-group mb15" >
                        <input type="text" name="rnc_cliente" id="rnc_cliente"  class="form-control"/>
                        <span class="input-group-addon"></span>
                    </div>
                </div>

                <div class="col-md-6">
                    <label>Correo Electronico</label>
                    <div class="input-group mb15 col-sm-8">
                        <input  type="text"  name="email_cliente" id="email_cliente" class="form-control"/>
                        <span class="input-group-addon"></span>
                    </div>
                </div> <div class="col-md-6"></div>


                <form class="form-horizontal form-bordered">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-9 control-label">Observaciones</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>

                    </div>
                </form>
        </div>

    </div><!--final body -->




 </div><!--final panel -->





    <div class="col-md-4 right">
    <div class="panel panel-default">


       <div class="panel-heading">
            <h4 class="panel-title">Informacion</h4>
        </div>
        <div class="panel-body">

            <label>Tipo de cliente</label>
            <div class="form-group">
                <div class="ckbox ckbox-warning">
                    <input type="checkbox" id="checkboxWarning" checked="checked" />
                    <label for="checkboxWarning">Corporativo</label>
                </div>

                <div class="ckbox ckbox-primary">
                    <input type="checkbox" id="checkboxDanger" checked="" />
                    <label for="checkboxDanger">Personal</label>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Crear</button>
                        <a class="btn btn-danger" href="<?php echo base_url() ?>clientes"> Cancelar </a>

                    </div>
                </div>


            </div>


        </div>

 </div><!-- panel columna derecha -->
 </div><!-- panel body-->









