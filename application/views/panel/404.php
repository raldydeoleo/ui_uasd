<body class="notfound">
    <section>

        <div class="notfoundpanel">
            <h1>404!</h1>
            <h3>No se a encontrado este elemento</h3><br />
            <h4>La busqueda que realizaste no se ha encontrado o no se a creado.<br /></h4>
            <form action="search-results.html">
                <input type="text" class="form-control" placeholder="Tratar con otro termino" /> <button class="btn btn-success">Buscar</button>
            </form>
            <h4>O volver al <a href="<?php echo base_url() ?>inicio/panel">panel principal</a></h4>

        </div><!-- notfoundpanel -->

    </section>


<script>
    jQuery(document).ready(function(){
        "use strict";

        // Do not use the code below
        // For demo purposes only
        var c = jQuery.cookie('change-skin');
        if (c && c == 'katniss') {
            jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
        }

    });
</script>

</body>
</html>