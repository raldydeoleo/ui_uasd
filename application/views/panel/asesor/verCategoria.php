<?php /** @var  $categoria */?>

    <div class="col-md-12" xmlns="http://www.w3.org/1999/html">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h5 class="panel-title">Vista individual Carrera</h5>
            </div>


         <div class="panel-body" >
         <div class="form-group"> 
        <h1>ID: <?php echo $categoria->id_categoria; ?> <br />
         Categoria :<?php echo $categoria->descripcion_categoria ?> <br />       
        Precio x Credito: <?php echo $categoria->preciocredito_categoria ?> <br /> </h1>

        <div class="col-md-12"> <a class="btn btn-info" href="<?php echo base_url() ?>index.php/categorias/listaCategoriasfin"> Volver atrás </a> </div> </div>
        <div class="form-group">   
       

                  </div>
         
       
        </div>
</div>
</div>