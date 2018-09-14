<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
</head>
<body>
<div align="center">

    <?



    $this->table->set_heading('Nombre', 'Cantidad');

    foreach ($content as $results) {
        $this->table->add_row($results->desc_ordencompra, $results->monto_ordencompra);
    }

    $tmpl = array ('table_open'=>'<table border="1" cellpadding="2" cellspacing="1">');
    $this->table->set_template($tmpl);
    echo $this->table->generate();
    ?>
</div>
</body>
</html>