<?php /** @var compras[] $id_compra */?>

<div class="col-lg-12">


</div>

    <div class="panel panel-default">

        <?php
                if (!isset($_POST['submit'])) {

                    ?>

                    <form method="post" action="<?php echo base_url() ?>index.php/compras/guardar_post/">
                        <div class="panel-body">

                            <div class="col-md-9">
                                <div class="panel-primary">
                                    <div class="panel-heading">
                                        <!-- Seguimiento -->
                                        <h4 class="panel-title">Compra de Materiales</h4>
                                    </div>
                                </div>

                                <form class="form-horizontal form-bordered">
                                    <div class="form-group">
                                        <div class="col-md-4">

                                            <label class="col-sm-12">Orden de Compra:</label>
                                            <select class="form-control">
                                                <option>Seleccione</option>
                                                <option>ODC-10001</option>
                                                <option>ODC-10002</option>
                                                <option>ODC-10003</option>
                                                <option>ODC-10004</option>
                                            </select>


                                        </div>
                                        <div class="col-md-4">
                                            <label>Fecha</label>
                                            <div class="input-group col-sm-12">
                                                <input type="text" name="fecha_compra" class="form-control" placeholder="mm/dd/yyyy"
                                                       id="datepicker" value="">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
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
                                </form>
                                <div class="col-md-6">
                                    <label class="col-sm-12">Proveedor</label>
                                    <select class="form-control">
                                        <option>Seleccione</option>
                                        <option>Proveedor 1</option>
                                        <option>Proveedor 2</option>
                                        <option>Proveedor 3</option>
                                        <option></option>
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-12">Proyecto</label>
                                    <select class="form-control">
                                        <option>Seleccione</option>
                                        <option>Proyecto 1</option>
                                        <option>Proyecto 2</option>
                                        <option>Proyecto 3</option>
                                        <option></option>
                                    </select>

                                </div>


                            </div>


                            <div class="col-md-3 right">
                                <div class="panel panel-default">
                                    <div class="panel-danger">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Detalles de la compra</h4>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="ckbox ckbox-default">
                                            <input type="checkbox" value="1" id="checkboxDefault" checked=""/>
                                            <label for="checkboxDefault">Proyecto</label>
                                        </div>

                                        <div class="ckbox ckbox-default">
                                            <input type="checkbox" value="1" id="checkboxDefault" checked=""/>
                                            <label for="checkboxDefault">Oficina</label>
                                        </div>

                                        <div class="ckbox ckbox-default">
                                            <input type="checkbox" value="1" id="checkboxDefault" checked=""/>
                                            <label for="checkboxDefault">Administrativa</label>
                                        </div>
                                    </div>

                                </div><!-- panel -->

                                <form class="form-horizontal form-bordered">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-9 control-label">Observaciones</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </form>

                                <!--boton-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Crear</button>
                                        <button class="btn btn-danger">Cancelar</button>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </form>
                    <?php
                        }else{

                            $fecha_compra = $_POST['fecha_compra'];
                            $desc_compra = $_POST['desc_compra'];
                            $cantidad_compra = $_POST['cantidad_compra'];
                            $precio_compra = $_POST['precio_compra'];

                }
                     ?>
        </div>
</div>






