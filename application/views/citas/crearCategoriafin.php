<?/**
 * @var array $servicios
 * @var array $piezas
 */?>

<div class="col-md-9">

    <div class="panel panel-primary">
            <div class="panel-heading ">
                <div class="panel-btns">
                    <a href="" class="panel-close">×</a>
                    <a href="" class="minimize">−</a>
                </div>
                <h4 class="panel-title">Crear Categoria Financiera</h4>
            
                <?=form_open(base_url().'categorias/insertar_categoriafin');

//creamos los arrays que compondran nuestro formulario

$descripcion_categoria = array(
    'name' => 'descripcion_categoria',
    'id' => 'descripcion_categoria',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('descripcion_categoria')
);

$preciocredito_categoria = array(
    'name' => 'preciocredito_categoria',
    'id' => 'preciocredito_categoria',
    'class' => 'form-control',
    'required'=> 'required',
    'rows' => 10,
    'cols' => 40,
    'value' => set_value('preciocredito_categoria')
);

//Botón cancel formulario cancela creacion
$cancel = array(
    'name' => 'cancel',
    'id' => 'cancel',
    'class' => 'form-control',
    'class' => 'btn btn-danger',
    'value' => 'Cancelar',
    'title' => 'Cancelar'
);
//Botón submit formulario crear
$submit = array(
    'name' => 'submit',
    'id' => 'submit',
    'class' => 'form-control',
    'class' => 'btn btn-primary',
    'value' => 'Crear Categoria',
    'title' => 'Crear Categoria'
);

?>
</div>

<?php
echo form_fieldset('.');
?>

        <div class="panel-body panel-body-nopadding">
            <form class="form-horizontal form-bordered">
               
                
                <div class="form-group">

                    <div class="col-md-5">
                        <?php echo form_label('Descripcion Categoria: '); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($descripcion_categoria); ?>
                        </div>
                    </div>

                    <div class="col-md-2">
                    <?php echo form_label('Precio Credito:'); ?>
                        <div class="input-group mb15 col-sm-12">
                            <?php echo form_input($preciocredito_categoria); ?>
                        </div>
                       
                    </div>

                    <div class="col-md-5">               
                        <a href="#" class="pull-right">
                                        <img alt="logouasd" width="100" height="100" src="<?php echo base_url() ?>assets/images/favicon.jpg" class="thumbnail media-object">
                                    </a>
        
                                    </div>


                </div>

                <div class="form-group">
                <div class="col-md-8"> <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/categorias/listaCategoriasfin"> Ver listado </a> </div>                                       

                                <div class="col-md-4">
                                <?php echo form_reset($cancel); ?>
                                <?php echo form_submit($submit); ?>
                                </div>

                </div>
       </div>
                   
            </form>

        </div><!-- panel-body -->
    </div>
</div>