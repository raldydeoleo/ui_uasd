<?php /** @var array $asignaturas  */?>
 <div class="panel panel-default">

    <div class="panel-body">

        <div class="col-md-12">
            <div class="panel-primary">
                <div class="panel-heading">
                <div class="col-md-2">

<div class="panel- panel-default widget-photoday">
<div class="panel-body">
</div>  
</div>
</div>
                    <h4 class="panel-title">Proyectar Asignatura</h4>
                  
                </div>
            </div>



            <?=form_open(base_url().'asignaturas/insertar_proyeccion');

//creamos los arrays que compondran nuestro formulario


$id_asignatura = array(
    'name' => 'id_asignatura',
    'id' => 'id_asignatura',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('id_asignatura')
);

//Tercer array(campo clave)
$id_periodo = array(
    'name' => 'id_periodo',
    'id' => 'id_periodo',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('id_periodo')
);

$js = 'onClick="myFuncion()"'; 




$id_estudiante = array(
    'name' => 'id_estudiante',
    'id' => 'id_estudiante',
    'class' => 'form-control',
    'required'=> 'required',
    'size' => '50',
    'style' => 'width:100%',
    'value' => set_value('id_estudiante')
);



            //el botón submit de nuestro formulario
            $submit = array(
                'name' => 'submit',
                'id' => 'submit',
                'class' => 'form-control',
                'class' => 'btn btn-primary',
                'value' => 'Registrar',
                'title' => 'Registrar',
                'data-toggle'=>'modal',
                'data-target'=>'#exampleModal'
            );


            //el botón cancelar de nuestro formulario
            $cancel = array(
                'name' => 'cancel',
                'id' => 'cancel',
                'class' => 'form-control',
                'class' => 'btn btn-danger',
                'value' => 'Cancelar',
                'title' => 'Cancelar'
            );

?>
<?php
echo form_fieldset('<h4>Detalle</h4>');
?>


            <form class="form-horizontal form-bordered">

                <div class="form-group">



                    <div class="col-md-6">
                        <?php echo form_label('Asignatura: '); ?>
                           
                        <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_asignatura, nombre_asignatura FROM asignaturas";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_asignatura'>";

                                    while ($row = $result->fetch_array()){

                                        echo "<option value='$row[0]'>";
                                        // echo $row[0];
                                        echo " $row[1]" ?>
                                   <?php echo "</option> ";

                                    }

                                    } echo "</select>";
                                    $result->close();
                                } else {
                                  echo "No se encontraron registros.";
                                  }
                            //}
                            $mysqli->close();

                        ?>               
                    </div>

                    <div class="col-md-2">
                        <?php echo form_label('Periodo: '); ?>

                        <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_periodo, nombre_periodo FROM periodos";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_periodo'>";

                                    while ($row = $result->fetch_array()){

                                        echo "<option value='$row[0]'>";
                                        // echo $row[0];
                                        echo " $row[1]" ?>
                                   <?php echo "</option> ";

                                    }

                                    } echo "</select>";
                                    $result->close();
                                } else {
                                  echo "No se encontraron registros.";
                                  }
                            //}
                            $mysqli->close();

                        ?>               
                    </div>

                    <div class="col-md-4">                       

                    <?php echo form_label('Estudiante: '); ?>
                        <?php
                        $mysqli =new mysqli("127.0.0.1", "root","", "db_uasd");
                            if ($mysqli === false){
                                die("Error: No se establecio la conexion." . mysqli_connect_error());
                            }
                            $sql = "SELECT id_estudiante, nombre_estudiante, apellido_estudiante FROM estudiantes";
                            if ($result = $mysqli->query($sql)){
                                if ($result->num_rows > 0){
                                    echo "<select class='form-control' name='id_estudiante'>";

                                    while ($row = $result->fetch_array()){

                                        echo "<option value='$row[0]'>";
                                       
                                        echo " $row[1]";
                                        echo " - ";
                                        echo " $row[2]";
                                         ?>
                                   <?php echo "</option> ";

                                    }

                                    } echo "</select>";
                                    $result->close();
                                } else {
                                  echo "No se encontraron registros.";
                                  }
                            //}
                            $mysqli->close();

                        ?>                
                    </div>

                   

                   
                    </div>


                    <div class="form-group">
        
        <div class="col-md-7"> 
            <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/dashboards/mostrar"> Panel principal </a> 
       </div>
        
                               
                               <div class="col-md-3">

                                    <?php echo form_reset($cancel);?>
                                    </div>

                                    <div class="col-md-2">
                                        <?php 
                                       
                                        echo form_submit($submit);
                                        //nuestro boton submit
                                        ?>

                                 </div>
                        </div>

                    </div>                    
                    </div>
                   </div>

               

                 
                             <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
        </button> -->
                    </div>
</form>


<script>

/**
$(document).ready(function(){ 
            
 
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })

        $.alert({
    title: 'Alert!',
    content: 'Simple alert!',
});
*/
//-------------------------------------------------------------------
$('.example21-2').on('click', function () {
                            $.confirm({
                                icon: 'fa fa-warning', // glyphicon glyphicon-heart
                                title: 'font-awesome'
                            });
                        });
                        $('.example21-3').on('click', function () {
                            $.alert({
                                icon: 'fa fa-spinner fa-spin',
                                title: 'Working!',
                                content: 'Sit back, we are processing your request. <br>The animated icon is provided by Font-Awesome!'
                            });
                        });

$('.example-the-1').on('click', function () {
                        $.confirm({
                            icon: 'fa fa-smile-o',
                            theme: 'modern',
                            closeIcon: true,
                            animation: 'scale',
                            type: 'blue',
                        });
                    });
                    $('.example-the-2').on('click', function () {
                        $.confirm({
                            icon: 'fa fa-question-circle-o',
                            theme: 'supervan',
                            closeIcon: true,
                            animation: 'scale',
                            type: 'orange',
                        });
                    });
                    $('.example-the-3').on('click', function () {
                        $.confirm({
                            icon: 'fa fa-question',
                            theme: 'material',
                            closeIcon: true,
                            animation: 'scale',
                            type: 'orange',
                        });
                    });
                    $('.example-the-4').on('click', function () {
                        $.confirm({
                            icon: 'fa fa-question',
                            theme: 'bootstrap',
                            closeIcon: true,
                            animation: 'scale',
                            type: 'orange',
                        });
                    });

                    // alert
                    $('.example-p-1').on('click', function () {
                        $.alert({
                            title: 'Alert alert!',
                            content: 'This is a simple alert. <br> with some <strong>HTML</strong> <em>contents</em>',
                            icon: 'fa fa-rocket',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Okay',
                                    btnClass: 'btn-blue'
                                }
                            }
                        });
                    });

                    // confirmation
                    $('.example-p-2').on('click', function () {
                        $.confirm({
                            title: 'A secure action',
                            content: 'Its smooth to do multiple confirms at a time. <br> Click confirm or cancel for another modal',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Proceed',
                                    btnClass: 'btn-blue',
                                    action: function () {
                                        $.confirm({
                                            title: 'This maybe critical',
                                            content: 'Critical actions can have multiple confirmations like this one.',
                                            icon: 'fa fa-warning',
                                            animation: 'scale',
                                            closeAnimation: 'zoom',
                                            buttons: {
                                                confirm: {
                                                    text: 'Yes, sure!',
                                                    btnClass: 'btn-orange',
                                                    action: function () {
                                                        $.alert('A very critical action <strong>triggered!</strong>');
                                                    }
                                                },
                                                cancel: function () {
                                                    $.alert('you clicked on <strong>cancel</strong>');
                                                }
                                            }
                                        });
                                    }
                                },
                                cancel: function () {
                                    $.alert('you clicked on <strong>cancel</strong>');
                                },
                                moreButtons: {
                                    text: 'something else',
                                    action: function () {
                                        $.alert('you clicked on <strong>something else</strong>');
                                    }
                                },
                            }
                        });
                    });

                    // prompt
                    $('.example-p-7-1').on('click', function () {
                        $.confirm({
                            title: 'A simple form',
                            content: 'url:form.html',
                            buttons: {
                                sayMyName: {
                                    text: 'Say my name',
                                    btnClass: 'btn-orange',
                                    action: function () {
                                        var input = this.$content.find('input#input-name');
                                        var errorText = this.$content.find('.text-danger');
                                        if (!input.val().trim()) {
                                            $.alert({
                                                content: "Please don't keep the name field empty.",
                                                type: 'red'
                                            });
                                            return false;
                                        } else {
                                            $.alert('Hello ' + input.val() + ', i hope you have a great day!');
                                        }
                                    }
                                },
                                later: function () {
                                    // do nothing.
                                }
                            }
                        });
                    });

                    // alert types
                    $('.example-p-70-type').on('click', function () {
                        $.alert({
                            title: 'Error',
                            icon: 'fa fa-warning',
                            type: 'orange',
                            content: 'Something went wrong, please retry again after sometime.' +
                            '<hr>' +
                            'More types: red, green, orange, blue, purple, dark',
                        });
                    });

                    // background dismiss
                    $('.example-p-3').on('click', function () {
                        $.alert({
                            title: 'Background dismiss',
                            content: 'Click outside the modal to close it.' +
                            '<br>this modal has the `bottom` close animation',
                            animation: 'scale',
                            closeAnimation: 'bottom',
                            backgroundDismiss: true,
                            buttons: {
                                okay: {
                                    text: 'okay',
                                    btnClass: 'btn-blue',
                                    action: function () {
                                        // do nothing
                                    }
                                }
                            }
                        });
                    });

                    // using as dialogs
                    $('.example-p-4').on('click', function () {
                        $.dialog({
                            title: 'Title comes here',
                            content: 'Just need a popup without buttons, <strong>no problem!</strong><br>' +
                            '<h3>disable the buttons</h3>' +
                            '<h4><strong>and you get a dialog modal</strong></h4>' +
                            '<h5><em>Well, that close icon is shown if no buttons are here (u need something to close the modal right), u can explicitly control that too.</em></h5>' +
                            '<button type="button" class="btn btn-success">Click me to change the content</button>',
                            animation: 'scale',
                            onOpen: function () {
                                var that = this;
                                this.$content.find('button').click(function () {
                                    that.setContent('As simple as that !');
                                })
                            }
                        });
                    });

                    // asynchronous content
                    $('.example-p-5').on('click', function () {
                        $.dialog({
                            title: 'Asynchronous content',
                            content: 'url:table.html',
                            animation: 'scale',
                            columnClass: 'medium',
                            closeAnimation: 'scale',
                            backgroundDismiss: true,
                        });
                    });

                    // auto close
                    $('.example-p-6').on('click', function () {
                        $.confirm({
                            title: 'Auto close',
                            content: 'Some actions maybe critical, prevent it with the Auto close. This dialog will automatically trigger cancel after the timer runs out.',
                            autoClose: 'cancelAction|10000',
                            escapeKey: 'cancelAction',
                            buttons: {
                                confirm: {
                                    btnClass: 'btn-red',
                                    text: 'Delete ben\'s account',
                                    action: function () {
                                        $.alert('You deleted Ben\'s account!');
                                    }
                                },
                                cancelAction: {
                                    text: 'Cancel',
                                    action: function () {
                                        $.alert('Ben just got saved!');
                                    }
                                }
                            }
                        });
                    });

                    // key strokes
                    $('.example-p-7').on('click', function () {
                        $.confirm({
                            title: 'Keystrokes',
                            escapeKey: true, // close the modal when escape is pressed.
                            content: 'Press the <strong>escape key</strong> to close the modal. That works.' +
                            '<br> press <strong>enter key</strong> to trigger okay.' +
                            '<br> press <strong>shift or ctrl key</strong> to trigger cancel.',
                            backgroundDismiss: true, // for escapeKey to work, backgroundDismiss should be enabled.
                            buttons: {
                                okay: {
                                    keys: [
                                        'enter'
                                    ],
                                    action: function () {
                                        $.alert('<strong>Okay button</strong> was triggered.');
                                    }
                                },
                                cancel: {
                                    keys: [
                                        'ctrl',
                                        'shift'
                                    ],
                                    action: function () {
                                        $.alert('<strong>Cancel button</strong> was triggered.');
                                    }
                                }
                            },
                        });
                    });

                    // alignment
                    $('.example-pc-1').on('click', function () {
                        $.confirm({
                            title: 'Gracefully center aligned',
                            content: '<p>You can add content and not worry about the alignment. The goal is to make a Interactive dialog!.</p>' +
                            '<button type="button" class="btn btn-success">Click me to add more content</button> <div id="contentArea"></div> ',
                            buttons: {
                                someButton: {
                                    text: 'Add wow',
                                    btnClass: 'btn-green',
                                    action: function () {
                                        this.$content.find('#contentArea').append('<br>Wowww');
                                        return false; // prevent dialog from closing.
                                    }
                                },
                                someOtherButton: {
                                    text: 'Clear it',
                                    btnClass: 'btn-orange',
                                    action: function () {
                                        this.$content.find('#contentArea').html('');
                                        return false; // prevent dialog from closing.
                                    }
                                },
                                close: function () {
                                    // lets the user close the modal.
                                }
                            },
                            onOpen: function () {
                                // onOpen attach the events.
                                var that = this;
                                this.$content.find('button').click(function () {
                                    that.$content.find('#contentArea').append('<br>This is awesome!!!!');
                                });
                            },
                        });
                    });

                    // working with images
                    // todo: images is not tested yet.
                    $('.example-pc-2').on('click', function () {
                        $.confirm({
                            title: 'Adding images',
                            content: '<p>Images from flickr</p>' +
                            '<img src="https://c2.staticflickr.com/4/3891/14354989289_2eec0ba724_b.jpg">',
                            animation: 'scale',
                            animationClose: 'top',
                            buttons: {
                                confirm: {
                                    text: 'Add more',
                                    btnClass: 'btn-blue',
                                    action: function () {
                                        this.$content.append('<img src="https://c2.staticflickr.com/6/5248/5240523362_8d6d315391_b.jpg">');
                                        return false; // prevent dialog from closing.
                                    }
                                },
                                cancel: function () {
                                    // lets the user close the modal.
                                }
                            },
                        });
                    });

                    // animations
                    $(' .example-pc-3').on('click', function () {
                        $.alert({
                            title: 'Animations',
                            content: 'jquery-confirm provides a lot of open &amp; close animations out of the box. <br>The best part is, you can add custom ones too.',
                            animation: 'scale',
                            closeAnimation: 'right',
                            buttons: {
                                zoom: function () {
                                    this.setCloseAnimation('zoom');
                                },
                                rotate: function () {
                                    this.setCloseAnimation('rotate');
                                },
                                scale: function () {
                                    this.setCloseAnimation('scale');
                                },
                                top: function () {
                                    this.setCloseAnimation('top');
                                }
                            },
                            backgroundDismiss: function () {
                                return false;
                            },
                        });
                    });

                    $('.example-p-7-2').on('click', function () {
                        $.alert({
                            title: 'A draggable dialog',
                            content: 'This dialog is draggable, use the title to drag it around. It wont touch the screen borders',
                            type: 'blue',
                            animation: 'scale',
                            draggable: true,
                        });
                    })

//-------------------------------------------------------------------
/*        
}); */

</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro guardado con exito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Haga click en cerrar para abandonar este diálogo.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!--button type="button" class="btn btn-primary">Save changes</button -->
      </div>
    </div>
  </div>
</div>
        

    <?php
    echo form_close();
    ?>
</table>
<?php
echo form_fieldset_close();
?>


       </div>
    </div>
</div>

