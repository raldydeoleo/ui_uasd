<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Pdfs extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('compras_model');
    }
    
    public function indexOld()
    {
       $ordencompra = $this->compras_model->obtener_ordenes();
       //$this->asignarDatosVista('ordencompra', $ordencompra);
       //$this->mostrarVista('pdfs_view');
    }

    public function index()
    {
        error_reporting(0);  //suppress some error message
        $parameters=array(
            'paper'=>'letter',   //paper size
            'orientation'=>'landscape',  //portrait or lanscape
            'type'=>'color',   //paper type: none|color|colour|image
            'options'=>array(0.6, 0.9, 0.8) //I specified the paper as color paper, so, here's the paper color (RGB)
        );
        $this->load->model('compras_model');
        $this->load->helper('pdf_helper');
        $this->load->library('cezpdf');  //load ezPdf library with above parameters
        $this->cezpdf->selectFont(APPPATH.'/libraries/fonts/Helvetica.afm');  //choose font, watch out for the dont location!
        $this->cezpdf->ezText('Electrical Equipment Supply & Service',20);  //insert text with size
        $this->cezpdf->ezText('Listado de Ordenes de compra',15);  //insert text with size
        $this->cezpdf->ezText('', 9);

        $this->cezpdf->ezText('<b>Fecha y hora de impresion:</b> ' . date('Y-m-d') . ', ' . date('H:i') . ' hrs.');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');

        //get data from database (note: this should be on 'models' but mehhh..), we'll try creating table using ezPdf
        $q=$this->db->query('SELECT id_ordencompra, numero_ordencompra, fecha_ordencompra, desc_ordencompra, total_ordencompra FROM ordenescompra');
                             //WHERE id_ordencompra LIKE 23');


        //this data will be presented as table in PDF
        $data_table=array();
        foreach ($q->result_array() as $row) {
            $data_table[]=$row;
        }


        //this one is for table header
        $column_header=array(
            'id_ordencompra'=>'ID',
            'numero_ordencompra'=> 'Numero de Orden',
            'fecha_ordencompra'=> 'Fecha',
            'desc_ordencompra'=>'Descripcion',
            'total_ordencompra'=>'Total'
        );

        $this->cezpdf->ezTable($data_table, $column_header); //generate table
        $this->cezpdf->ezSetY(480);  //set vertical position
        //$this->cezpdf->ezImage(base_url('/images/logo.jpg'), 0, 100, 'none', 'center');  //insert image
        //$this->cezpdf->("\n\n\n", 10);
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
        $this->cezpdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
        $this->cezpdf->ezStream(array('Content-Disposition'=>'just_random_filename.pdf'));  //force user to download the file as 'just_random_filename.pdf'
    }

    public function imprime_nomina(){

        if($this->input->post('fecha_nomina')) {
            $fecha_nomina = $this->input->post('fecha_nomina');
            $this->pdf_nomina($fecha_nomina);
        }
    }

public function pdf_nomina(){
        error_reporting(0);  //suppress some error message
        $parameters=array(
            'paper'=>'letter',   //paper size
            'orientation'=>'landscape',  //portrait or lanscape
            'type'=>'color',   //paper type: none|color|colour|image
            'options'=>array(0.6, 0.9, 0.8) //I specified the paper as color paper, so, here's the paper color (RGB)
        );
        $this->load->model('empleados_model');
        $this->load->helper('pdf_helper');
        $this->load->library('cezpdf');  //load ezPdf library with above parameters
        $this->cezpdf->selectFont(APPPATH.'/libraries/fonts/Helvetica.afm');  //choose font, watch out for the dont location!
        $this->cezpdf->ezText('Electrical Equipment Supply & Service',20);  //insert text with size
        $this->cezpdf->ezText('Nomina de pago a empleados',15);  //insert text with size
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('', 9);

        $this->cezpdf->ezText('<b>Fecha de impresion:</b> ' . date('d-m-Y')); // . ', ' . date('H:i') . ' hrs.');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');

        //get data from database (note: this should be on 'models' but mehhh..), we'll try creating table using ezPdf


        //$q=$this->db->query('SELECT id_percepcion, id_empleado, sueldo_bruto, ars_empleado, afp_empleado, prestamo_empleado, fecha_percepcion, sueldo_neto FROM percepciones');
                             //WHERE id_ordencompra LIKE 23');

       $totales=$this->db->query('SELECT SUM(sueldo_bruto) as total_sb, SUM(sueldo_neto) as Total_sn  FROM percepciones  WHERE fecha_percepcion = "30-04-2017"');

        //$q=$this->db->query('SELECT * FROM percepciones WHERE fecha_percepcion = "30-04-2017"');

        $q=$this->db->query('SELECT id_percepcion, nombre_empleado, apellido_empleado,sueldo_bruto,ars_empleado,afp_empleado,prestamo_empleado ,total_deduccion,
                      sueldo_neto, fecha_percepcion FROM empleados a, percepciones b  WHERE a.id_empleado = b.id_empleado AND fecha_percepcion = "30-04-2017"');

        //this data will be presented as table in PDF
        $data_table=array();
        foreach ($q->result_array() as $row) {
            $data_table[]=$row;
        }

            //this data will be presented as table in PDF
            $total_table=array();
            foreach ($totales->result_array() as $row) {
                $total_table[]=$row;
            }


        //this one is for table header
        $column_header=array(
            'id_percepcion'=>'ID',
            'nombre_empleado'=> 'Nombre',
            'apellido_empleado'=> 'Apellido',
            'sueldo_bruto'=> 'Sueldo bruto',
            'ars_empleado'=> 'ARS',
            'afp_empleado'=> 'AFP',
            'prestamo_empleado'=> 'Prestamo',
            'total_deduccion'=>'Total Deducciones',
            'sueldo_neto'=>'Sueldo neto',
            'fecha_percepcion'=> 'Fecha'
            
        );

        //this one is for table header
        $totales_header=array(
            'id_percepcion'=>'..',
            'nombre_empleado'=> '.......',
            'apellido_empleado'=> '.......',
            'total_sb'=> 'Sueldo bruto',
            'total_ars'=> 'ARS',
            'total_afp'=> 'AFP',
            'prestamo_empleado'=> 'Prestamo',
            'total_de'=>'Total Deducciones',
            'Total_sn'=> 'Total nomina'

        );

        $this->cezpdf->ezTable($data_table, $column_header); //generate table
        $this->cezpdf->ezSetY(480);  //set vertical position
        //$this->cezpdf->ezImage(base_url('images/logo.jpg'), 0, 100, 'none', 'center');  //insert image
        //$this->cezpdf->("\n\n\n", 10);
        $this->cezpdf->ezText('');
        $this->cezpdf->ezSetY(150);  //set vertical position
        $this->cezpdf->ezTable($total_table, $totales_header); //generate table

        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('(Nota: Valores en RD$)');
        $this->cezpdf->ezText('');

        $this->cezpdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
        //$this->cezpdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
        $this->cezpdf->ezStream(array('Content-Disposition'=>'Lista_nomina.pdf'));  //force user to download the file as 'just_random_filename.pdf'
    }


    public function test(){

        $this->load->model('empleados_model');
        $nomina = $this->empleados_model->obtener_nomina();
        foreach ($nomina as $row){
            if (!empty($row->id_percepcion)){
               $this->pdf_recibo($nomina);
            }
        }
    }


public function pdf_recibo($id_empleado)
    {
        error_reporting(0);  //suppress some error message
        $parameters=array(
            'paper'=>'letter',   //paper size
            'orientation'=>'landscape',  //portrait or lanscape
            'type'=>'color',   //paper type: none|color|colour|image
            'options'=>array(0.6, 0.9, 0.8) //I specified the paper as color paper, so, here's the paper color (RGB)
        );
        $this->load->model('empleados_model');
        $this->load->helper('pdf_helper');
        $this->load->library('cezpdf');  //load ezPdf library with above parameters
        $this->cezpdf->selectFont(APPPATH.'/libraries/fonts/Helvetica.afm');  //choose font, watch out for the dont location!
        $this->cezpdf->ezText('Electrical Equipment Supply & Service',20,array('justification' => 'center', ));  //insert text with size
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('Recibo de pago Nomina a empleado.',15,array('justification' => 'center', ));  //insert text with size
        
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('', 9);



        //$this->cezpdf->ezText('',$row[3], 9);

        
        $this->cezpdf->ezText('<b>Fecha de pago:</b> ' . date('d-m-Y'));
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');

        //consulta del historial de recibos de un empleado especificado por su id_empleado.
        //$recibos=$this->db->query('SELECT id_percepcion, id_empleado, he_empleado,comision_empleado, sueldo_bruto, ars_empleado,
        // afp_empleado, prestamo_empleado, fecha_percepcion, sueldo_neto FROM percepciones WHERE id_empleado LIKE ' .$id_empleado);


        //get data from database (note: this should be on 'models' but mehhh..), we'll try creating table using ezPdf
        $q=$this->db->query('SELECT id_percepcion, id_empleado, he_empleado,comision_empleado, sueldo_bruto, ars_empleado,
         afp_empleado, prestamo_empleado, total_deduccion, fecha_percepcion, sueldo_neto FROM percepciones WHERE  fecha_percepcion LIKE  "30-04-2017" AND id_empleado LIKE ' .$id_empleado);


     $otras=$this->db->query('SELECT * FROM percepciones WHERE fecha_percepcion LIKE  "30-04-2017" AND id_empleado LIKE ' .$id_empleado);

    //obtener informacion del empleado para el encabezado del recibo.
    $empleado=$this->db->query('SELECT * FROM empleados WHERE id_empleado LIKE ' .$id_empleado);



        $empleado_table=array();
        foreach ($empleado->result_array() as $row) {
            $empleado_table[]=$row;
        }

        //this data will be presented as table in PDF
        $data_table=array();
        foreach ($q->result_array() as $row) {
            $data_table[]=$row;
        }


        $otras_table=array();
        foreach ($otras->result_array() as $row) {
            $otras_table[]=$row;
        }

        //this one is for table header
        $column_header=array(
            'he_empleado'=>'Hora Extra',
            'comision_empleado'=> 'Incentivo',
            'sueldo_bruto'=> 'Sueldo bruto',
            'ars_empleado'=> 'ARS',
            'afp_empleado'=> 'AFP',
            'prestamo_empleado'=> 'Prestamo',
            'total_deduccion'=>'Deducciones',
            'fecha_percepcion'=> 'Fecha',
            'sueldo_neto'=>'Sueldo neto'
            
        );


        //this one is for table detalle
        $otras_header=array(
            'id_proyecto'=>'Proyecto',
            'id_asociado'=> '% Asociado',
            'bono'=>'Bono',
            'sueldo_vacaciones'=>'Salario Vacaciones',
            'sueldo_navidad'=>'Salario Navidad',

        );

        //this one is for table detalle
        $empleado_header=array(
            'id_empleado'=>'Codigo',
            'nombre_empleado'=> 'Nombre',
            'apellido_empleado'=>'Apellido',
            'sueldo_empleado'=>'Sueldo base',
            'cedula_empleado'=>'Cedula',

        );

        $this->cezpdf->ezTable($empleado_table, $empleado_header,'Datos del Empleado',array('showLines'=>0 , )); //generate table

        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');

        $this->cezpdf->ezTable($data_table, $column_header,array('showLines'=>0 , )); //generate table
        //$this->cezpdf->ezSetY(480);
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');

        $this->cezpdf->ezTable($otras_table, $otras_header,'Otros ingresos',array('showLines'=>0)); //generate table
        $this->cezpdf->ezSetY(450);


        $this->cezpdf->ezText('Firma del empleado:_______________________________',10);
        

        $this->cezpdf->ezSetY(400);
        // Recibo para el empleado - debe ser firmado por este.

        //$this->cezpdf->ezNewPage(); Salto de pagina.

        $this->cezpdf->ezText('Electrical Equipment Supply & Service',20,array('justification' => 'center', ));  //insert text with size  
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('Recibo de pago Nomina a empleado.',15);  //insert text with size
        
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('', 9);

        $this->cezpdf->ezTable($empleado_table, $empleado_header,'Datos del Empleado',array('showLines'=>0 , )); //generate table

        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');

        $this->cezpdf->ezTable($data_table, $column_header,array('showLines'=>0 , )); //generate table
        //$this->cezpdf->ezSetY(480);
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');

        $this->cezpdf->ezTable($otras_table, $otras_header,'Otros ingresos',array('showLines'=>0)); //generate table
        $this->cezpdf->ezSetY(75);


        //$this->cezpdf->ezText('Firma del empleado:_______________________________',10);
        
        $this->cezpdf->ezText('<b>Fecha de pago:</b> ' . date('d-m-Y'));

         
          //set vertical position
        //$this->cezpdf->ezImage(base_url('/images/logo.jpg'), 0, 100, 'none', 'center');  //insert image
        //$this->cezpdf->("\n\n\n", 10);
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        //$this->cezpdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
        //$this->cezpdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
        $this->cezpdf->ezStream(array('Content-Disposition'=>'just_random_filename.pdf'));  //force user to download the file as 'just_random_filename.pdf'
    }

    public function nomina_pdf($fecha_nomina)
    {
        $this->load->library('cezpdf');
        $this->load->helper('pdf_helper');
        $this->load->model('empleados_model');


        prep_pdf();


        $this->cezpdf->ezText('Electrical Equipment Supply & Service',20);  //insert text with size
        $this->cezpdf->ezText('Nomina [Listado]',15);  //insert text with size
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');

        //get data from database (note: this should be on 'models' but mehhh..), we'll try creating table using ezPdf

        $nomina=$this->db->query("SELECT nombre_empleado, apellido_empleado, cedula_empleado, sueldo_empleado 
         from empleados JOIN percepciones WHERE empleados.id_empleado=percepciones.id_empleado and fecha_percepcion='$fecha_nomina'");

      //  $n=$this->db->query("SELECT nota_ordencompra FROM ordenescompra WHERE id_ordencompra ='$id'");

      //  $t=$this->db->query("SELECT nota_ordencompra, subtotal_ordencompra, itebis_ordencompra, total_ordencompra FROM ordenescompra WHERE id_ordencompra='$id'");

      //  $q=$this->db->query("SELECT id_ordencompra, numero_ordencompra, fecha_ordencompra, fecha_vence FROM ordenescompra WHERE id_ordencompra='$id'");

      //  $d=$this->db->query("SELECT item_ordencompra, desc_ordencompra, cantidad_ordencompra, precio_ordencompra, monto_ordencompra FROM ordenescompra
      //  WHERE id_ordencompra='$id'");

        //this data will be presented as table in PDF
        $nomina_table=array();
        foreach ($nomina->result_array() as $row) {
            $nomina_table[]=$row;
        }

        $nomina_header=array(
            'nombre_empleado'=>'Nombre',
            'apellido_empleado'=> 'Apellido',
            'cedula_empleado'=> 'Cedula',
            'sueldo_empleado'=>'Sueldo base',
            'he_empleado'=>'Horas extras'

        );



        $this->cezpdf->ezTable($nomina_table,$nomina_header, 'Datos del Empleado', array('width' => 400));
        $this->cezpdf->ezText('');

        //$this->cezpdf->ezTable($data_table,$column_header, 'Encabezado', array('width' => 250));
        //$this->cezpdf->ezText('');

        //$this->cezpdf->ezTable($detalle,$detalle_header, 'Detalle de la orden', array('width' => 550));
        //$this->cezpdf->ezText('');

        //$this->cezpdf->ezTable($nota_table,$nota_header, 'Comentario', array('width' => 550));


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

        //$this->cezpdf->ezTable($total_table,$total_header, 'Valores en RD$', array('width' => 200));
        $this->cezpdf->ezStream(array('Content-Disposition' => 'Nomina.pdf'));

    }


}