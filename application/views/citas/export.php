<?php
$this->pdf->selectFont(APPPATH.'/third_party/ezpdf/fonts/Helvetica-Oblique.afm'); // Tipo de letra

$pdf_info = array ('Title'=>$title,'Author'=>$author,'Subject'=>$subject,);
$this->pdf->addInfo($pdf_info);

foreach ($content as $results) {
    $contenido[]=array
    (
        'Descripcion'=>utf8_decode($results->desc_ordencompra),
        'Monto'=>$results->total_ordencompra
    );

}
$options = array(
    'shadeCol'=>array(0.8,0.8,0.8),
    'width'=>400   //Ancho de la Tabla.
);
$this->pdf->ezText($title."\n",10,array('justification'=>'center'));
$this->pdf->ezTable($contenido);
$this->pdf->ezStream();
