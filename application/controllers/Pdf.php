<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function genera_pdf($id)
    {
        $this->load->library('cezpdf');
        $this->load->helper('pdf_helper');
        $this->load->model('compras_model');



        prep_pdf();


        $this->cezpdf->ezText('Electrical Equipment Supply & Service',20);  //insert text with size
        $this->cezpdf->ezText('Orden de compra',15);  //insert text with size
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        //get data from database (note: this should be on 'models' but mehhh..), we'll try creating table using ezPdf

        $p=$this->db->query("SELECT a.empresa_proveedor, a.edireccion_proveedor, a.etelefono1_proveedor, a.eemail1_proveedor, b.id_ordencompra from proveedores a, ordenescompra b  WHERE a.id_proveedor=b.id_proveedor and id_ordencompra='$id'");
        $n=$this->db->query("SELECT nota_ordencompra FROM ordenescompra WHERE id_ordencompra ='$id'");
        $t=$this->db->query("SELECT nota_ordencompra, subtotal_ordencompra, itebis_ordencompra, total_ordencompra FROM ordenescompra WHERE id_ordencompra='$id'");
        $q=$this->db->query("SELECT id_ordencompra, numero_ordencompra, fecha_ordencompra, fecha_vence FROM ordenescompra WHERE id_ordencompra='$id'");
        $d=$this->db->query("SELECT item_ordencompra, desc_ordencompra, cantidad_ordencompra, precio_ordencompra, monto_ordencompra FROM ordenescompra
        WHERE id_ordencompra='$id'");

        //this data will be presented as table in PDF
        $proveedor_table=array();
        foreach ($p->result_array() as $row) {
            $proveedor_table[]=$row;
        }

        $proveedor_header=array(
            'empresa_proveedor'=>'Empresa',
            'edireccion_proveedor'=> 'Direccion',
            'etelefono1_proveedor'=> 'Telefono',
            'eemail1_proveedor'=>'Email'
        );

        //this data will be presented as table in PDF
        $data_table=array();
        foreach ($q->result_array() as $row) {
            $data_table[]=$row;
        }

        //this data will be presented as table in PDF
        $nota_table=array();
        foreach ($n->result_array() as $row) {
            $nota_table[]=$row;
        }


        //this data will be presented as table in PDF
        $detalle=array();
        foreach ($d->result_array() as $row) {
            $detalle[]=$row;
        }

        //this data will be presented as table in PDF
        $total_table=array();
        foreach ($t->result_array() as $row) {
            $total_table[]=$row;
        }

        //this one is for table header
        $detalle_header=array(
            'item_ordencompra'=>'Item',
            'desc_ordencompra'=> 'Descripcion',
            'cantidad_ordencompra'=> 'Cantidad',
            'precio_ordencompra'=>'Precio',
            'monto_ordencompra'=>'Monto'
        );

        //this one is for table header
        $column_header=array(
            'id_ordencompra'=>'ID',
            'numero_ordencompra'=> 'Numero de Orden',
            'fecha_ordencompra'=> 'Fecha',
            'fecha_vence'=>'Fecha Vencimieto',

        );
        $nota_header=array(
            'nota_ordencompra'=>'Nota',

        );
        //this one is for table header
        $total_header=array(
            'subtotal_ordencompra'=> 'Subtotal',
            'itebis_ordencompra'=> 'itbis',
            'total_ordencompra'=>'Total General',

        );


        $this->cezpdf->ezTable($proveedor_table,$proveedor_header, 'Proveedor', array('width' => 400));
        $this->cezpdf->ezText('');

        $this->cezpdf->ezTable($data_table,$column_header, 'Encabezado', array('width' => 250));
        $this->cezpdf->ezText('');

        $this->cezpdf->ezTable($detalle,$detalle_header, 'Detalle de la orden', array('width' => 550));
        $this->cezpdf->ezText('');

        $this->cezpdf->ezTable($nota_table,$nota_header, 'Comentario', array('width' => 550));


        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');

        $this->cezpdf->ezTable($total_table,$total_header, 'Valores en RD$', array('width' => 200));
        $this->cezpdf->ezStream(array('Content-Disposition' => 'Orden_de_compra.pdf'));

    }

}
?>
