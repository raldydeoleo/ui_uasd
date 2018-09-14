
<h1> Lista de estudiantes </h1></td></trtr><tr><td>
<p> <a class="btn btn-success" href="<?php echo base_url() ?>index.php/estudiantes/guardar"> Crear nuevo estudiante </a> </p>
        </td></tr></table>
<?php if (count($estudiantes)): ?>
    <table class="table tableborder">
        <thead>
        <tr>
            <th> Matrícula </th>
            <th> Nombre </th>
            <th> Apellido </th>
            <th> &nbsp; </th>
        </tr>
        </thead>

        <tbody>

        <?php foreach($estudiantes as $item): ?>
            <tr>
                <td style="width: 35%"> <?php echo $item->estudiante_matricula ?> </td>
                <td style="width: 35%"> <?php echo $item->estudiante_nombre ?> </td>
                <td style="width: 35%"> <?php echo $item->estudiante_apellido ?> </td>
                <td><a  class="btn btn-info" href="<?php echo base_url() ?>index.php/estudiantes/ver/<?php echo $item->id_estudiante ?>">Ver</a></td>
                <td><a class="btn btn-info" href="<?php echo base_url() ?>index.php/estudiantes/guardar/<?php echo $item->id_estudiante ?>">Editar</a> </td>
                <td><a class="btn btn-danger" id="#eliminar_informe" href="<?php echo base_url() ?>index.php/estudiantes/eliminar/<?php echo $item->id_estudiante ?>">Eliminar</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>
    <p> No hay estudiantes </p>
<?php endif; ?>

<script type="text/javascript">

    $('#myModal').modal(options)

    $("#eliminar_informe").each(function() {
        var href = $(this).attr('href');
        $(this).attr('href', 'javascript:void(0)');
        $(this).click(function() {
            if (confirm("¿Seguro desea eliminar este informe?")) {
                location.href = href;
            }
        });
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })

</script>



