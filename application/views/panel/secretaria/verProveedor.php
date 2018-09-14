<?php /** @var  $proveedor */?>
<div class="col-md-8">


        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h5 class="panel-title">Vista individual Cliente</h5>
            </div>


        <div class="panel-body" >
<h1>  Empresa : <?php echo $proveedor->empresa_proveedor; ?>  </h1>
            <br />
            <h3>
      <div> Telefonos 1:  :<?php echo nl2br($proveedor->etelefono1_proveedor) ?>  </div> <br />
      <div> Telefonos 2:  :<?php echo nl2br($proveedor->etelefono2_proveedor) ?>  </div> <br />

      <div> Email:  :<?php echo nl2br($proveedor->eemail1_proveedor) ?> </div> <br />
      <div> Direccion:  :<?php echo nl2br($proveedor->edireccion_proveedor) ?> </div> <br />
      <div> Ciudad:  :<?php echo nl2br($proveedor->cciudad_proveedor) ?> </div> <br />
      <div> RNC:  :<?php echo nl2br($proveedor->rnc_proveedor) ?> </div> <br /> </h3>
            <h1>   Contacto :<?php echo $proveedor->cnombre_proveedor ?> </h1>

<br />
<div> <a class="btn btn-info" href="<?php echo base_url() ?>index.php/comentarios"> Volver a Listado </a> </div>
</div>
</div>
</div>
