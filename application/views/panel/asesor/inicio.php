<?php /** @var  $compra */?>

    <div class="col-md-11">
    <div class="panel panel-default">

        <div class="panel-heading">

        <div class="clearfix mb30"></div>
        <h5 class="subtitle mb5">TODAS LAS COMPRAS </h5>
        <p>Listado de Compras Realizadas</p>
        <br />
        </div>
            <div class="panel-default">

                <form method="post" action="<?php echo base_url() ?>index.php/tutorial/insertar">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-3">
                        <label>Fecha</label>
                        <div class="input-group col-sm-12">
                            <input type="text" name="fecha_compra" class="form-control" placeholder="mm/dd/yyyy"
                                   id="datepicker" value="">
                            <span class="input-group-addon"><i
                                    class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Hora</label>
                        <div class="input-group mb15 col-sm-12">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <div class="bootstrap-timepicker"><input  name="hora_compra" id="timepicker" type="text"
                                                                      class="form-control"/></div>
                        </div>
                    </div>

            </div>
        </form>

        <form class="form-horizontal form-bordered">
            <div class="form-group">
                <div class="col-md-2">
                    <label>Cantidad</label>
                    <div class="input-group ">
                        <input type="text"  name="cantidad_compra" class="form-control" placeholder="" id="cantidad"
                               value="">
                        <span class="input-group-addon"><i class=""></i></span>
                    </div>
                </div>

                <div class="col-md-5">
                    <label>Descripcion</label>
                    <div class="input-group">
                        <input type="text"  name="desc_compra" class="form-control" placeholder="" id="desc"
                               value="">
                        <span class="input-group-addon"><i class=""></i></span>
                    </div>
                </div>

                <div class="col-md-2">
                    <label>Unidad</label>
                    <div class="input-group">
                        <input type="text"  name="unidad_compra" class="form-control" placeholder="" id="unidad">
                        <span class="input-group-addon"><i class=""></i></span>
                    </div>
                </div>

                <div class="col-md-2">
                    <label>Precio</label>
                    <div class="input-group">
                        <input type="text"  name="precio_compra" class="form-control" placeholder="" id="precio"
                               value="">
                        <span class="input-group-addon"><i class=""></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
            </div>

            <div class="col-md-3">
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button class="btn btn-danger">Cancelar</button>
                </div>
            </div>
            </div>
                </form>





                <ul class="pagination pagination-split">
                    <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>



