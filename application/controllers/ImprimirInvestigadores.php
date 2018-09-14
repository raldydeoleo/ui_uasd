<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 

     /**
     * @author: Raldy De Oleo
     * Matricula: 94-3032
     * Controlador que maneja la impresion de lista de  estudiantes.
     * 30-07-2018
     */
class ImprimirInvestigadores extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('estudiantes_model');
    }
    
   
    public function imprime_investigadores()
    {
        error_reporting(0);  //suppress some error message
        $parameters=array(
            'paper'=>'letter',   //paper size
            'orientation'=>'landscape',  //portrait or lanscape
            'type'=>'color',   //paper type: none|color|colour|image
            'options'=>array(0.6, 0.9, 0.8) //I specified the paper as color paper, so, here's the paper color (RGB)
        );
        $this->load->model('estudiantes_model');
        $this->load->helper('pdf_helper');
        $this->load->library('cezpdf');  //load ezPdf library with above parameters
        $this->cezpdf->selectFont(APPPATH.'/libraries/fonts/Helvetica.afm');  //choose font, watch out for the dont location!
        $this->cezpdf->ezImage(base_url('assets/images/favicon.jpg'), 0, 50, 'none', 'left');
        $this->cezpdf->ezText('Unidad de Investigacion [UI-UASD]',20);  //insert text with size
        $this->cezpdf->ezText('Listado de investigadores',15);  //insert text with size
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('', 9);
        
       // $this->cezpdf->ezSetY(740);

        $this->cezpdf->setLineStyle(1,'square');
        $this->cezpdf->setStrokeColor(0,0,0);
        $this->cezpdf->line(25,700,550,700);

        $this->cezpdf->ezText('<b>Fecha y hora de impresion:</b> ' . date('Y-m-d') . ', ' . date('H:i') . ' hrs.');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');

        //get data from database (note: this should be on 'models' but mehhh..), we'll try creating table using ezPdf
        $estudiantes=$this->db->query('SELECT id_estudiante, nombre_estudiante, apellido_estudiante, matricula_estudiante, telefono_estudiante, email_estudiante FROM estudiantes');
                             //WHERE id_ordencompra LIKE 23');


        //this data will be presented as table in PDF
        $data_table=array();
        foreach ($estudiantes->result_array() as $row) {
            $data_table[]=$row;
        }


        //this one is for table header
        $column_header=array(
            'id_estudiante'=>'ID',
            'nombre_estudiante'=> 'Nombre',
            'apellido_estudiante'=> 'Apellido',
            'matricula_estudiante'=>'Titulo',
            ''=>'Area',
            'telefono_estudiante'=>'Telefono',
            'email_estudiante'=>'Email'
        );

        $this->cezpdf->ezTable($data_table, $column_header); //generate table
        $this->cezpdf->ezSetY(480);  //set vertical position
        //$this->cezpdf->ezImage(base_url('/images/logo.jpg'), 0, 100, 'none', 'center');  //insert image
        //$this->cezpdf->("\n\n\n", 10);
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
        $this->cezpdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
        $this->cezpdf->ezStream(array('Content-Disposition'=>'listaInvestigadores.pdf'));  //force user to download the file as 'just_random_filename.pdf'
    }


    public function imprimeHorario($id){        
        error_reporting(0);  //suppress some error message
        $parameters=array(
            'paper'=>'letter',   //paper size
            'orientation'=>'landscape',  //portrait or lanscape
            'type'=>'color',   //paper type: none|color|colour|image
            'options'=>array(0.6, 0.9, 0.8) //I specified the paper as color paper, so, here's the paper color (RGB)
        );
        $this->load->model('secciones_model');
        $this->load->helper('pdf_helper');
        $this->load->library('cezpdf');  //load ezPdf library with above parameters
        $this->cezpdf->selectFont(APPPATH.'/libraries/fonts/Helvetica.afm');  //choose font, watch out for the dont location!
        $this->cezpdf->ezImage(base_url('assets/images/favicon.jpg'), 0, 50, 'none', 'left');  //insert image
        $this->cezpdf->ezText('Sistema de Planificacion de Asignaturas [SPA-UASD]',20);  //insert text with size
        $this->cezpdf->ezText('Horario detallado del estudiante.',15);  //insert text with size
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('', 9);
       // $this->cezpdf->ezSetY(740);

        $this->cezpdf->setLineStyle(1,'square');//Linea del encabezado
        $this->cezpdf->setStrokeColor(0,0,0);
        $this->cezpdf->line(25,700,550,700);

        $this->cezpdf->setLineStyle(1,'square');//linea por encima de los datos del estudiante
        $this->cezpdf->setStrokeColor(0,0,0);
        $this->cezpdf->line(25,660,550,660);
       
        $this->cezpdf->setLineStyle(1,'square');//linea por debajo de los datos del estudiante
        $this->cezpdf->setStrokeColor(0,0,0);
        $this->cezpdf->line(25,600,550,600);

        $this->cezpdf->ezText('<b>Fecha y hora de impresion:</b> ' . date('Y-m-d') . ', ' . date('H:i') . ' hrs.');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');

        //get data from database (note: this should be on 'models' but mehhh..), we'll try creating table using ezPdf
        $horario=$this->db->query("SELECT * FROM selecciones WHERE id_estudiante =$id");
        $estudiante=$this->db->query("SELECT * FROM estudiantes WHERE id_estudiante =$id");

        
        //  $this->cezpdf->ezText($idseccion, 9);  
          $secciones=$this->db->query("SELECT * FROM secciones WHERE id_seccion='4'");   
        //this data will be presented as table in PDF
        $data_table=array();
        foreach ($horario->result_array() as $row) {
            $data_table[]=$row;
        }

        $data_table2=array();
        foreach ($estudiante->result_array() as $row) {
            $data_table2[]=$row;
        }

        $data_table3=array();
        foreach ($secciones->result_array() as $row) {
            $data_table3[]=$row;
        }


        //this one is for table header
        $column_header=array(
            'id_seleccion'=>'ID',
            'fecha_seleccion'=> 'Fecha',
            'id_asignatura'=> 'Asignatura',
            'id_periodo'=>'Periodo',
           // 'asignatura1'=>'Detalle',
            'seccion_seleccion'=>'Seccion'
        );

           //this one is for table header
           $estudiante_header=array(
            'id_estudiante'=>'ID',
            'nombre_estudiante'=> 'Nombre',
            'apellido_estudiante'=> 'Apellido',
            'matricula_estudiante'=>'Matricula'
        );


        $column_detalle=array(
            //'id_seleccion'=>'ID',            
            'asignatura1'=>'Detalle'
        );

        $column_secciones=array(
            'id_seccion'=>'ID',
            'id_asignatura'=>'Asignatura',
            'nombre_seccion'=>'nombre_seccion',
            'lunes_seccion'=>'Lunes',
            'martes_seccion'=>'Martes',
            'miercoles_seccion'=>'Miercoles',
            'jueves_seccion'=>'Jueves',
            'viernes_seccion'=>'Viernes',
            'sabado_seccion'=>'Sabado'

        );
       

        $this->cezpdf->ezSetMargins(72, 30, 0, 30);
        $this->cezpdf->ezTable($data_table2, $estudiante_header, 'Datos del Estudiante', array('showLines'=>0, )); //generate table
        $this->cezpdf->ezSetY(400);//set vertical position       

        $this->cezpdf->ezSetMargins(72, 30, 100, 30);

        $this->cezpdf->ezTable($data_table, $column_header, 'Detalle sobre las secciones'); //generate table
        $this->cezpdf->ezSetY(600);//set vertical position

       // $this->cezpdf->ezTable($data_table, $column_detalle,  'Descripcion asignaturas inscritas',array('showLines'=>0 , )); //generate table
       // $this->cezpdf->ezSetY(300);  //set vertical position

        $this->cezpdf->ezTable($data_table3,  $column_secciones,  'Horario de cada seccion',array('showLines'=>0 , )); //generate table
        $this->cezpdf->ezSetY(450);  //set vertical position

        
        
        //$this->cezpdf->("\n\n\n", 10);
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        //$this->cezpdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
        //$this->cezpdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
        $this->cezpdf->ezStream(array('Content-Disposition'=>'horariodetallealumno.pdf'));  //force user to download the file as 'just_random_filename.pdf'
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

    

public function imprime_estudiantes_porCarrera($id_carrera){
        error_reporting(0);  //suppress some error message
        $parameters=array(
            'paper'=>'letter',   //paper size
            'orientation'=>'landscape',  //portrait or lanscape
            'type'=>'color',   //paper type: none|color|colour|image
            'options'=>array(0.6, 0.9, 0.8) //I specified the paper as color paper, so, here's the paper color (RGB)
        );
        $this->load->model('estudiantes_model');
        $this->load->helper('pdf_helper');
        $this->load->library('cezpdf');  //load ezPdf library with above parameters
        $this->cezpdf->selectFont(APPPATH.'/libraries/fonts/Helvetica.afm');  //choose font, watch out for the dont location!
        $this->cezpdf->ezImage(base_url('assets/images/favicon.jpg'), 0, 50, 'none', 'left');  //insert image
        $this->cezpdf->ezText('Sistema de Planificacion de Asignaturas [SPA-UASD]',20);  //insert text with size
        $this->cezpdf->ezText('Listado de Estudiantes',15);  //insert text with size
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('', 9);


        $this->cezpdf->setLineStyle(1,'square');
        $this->cezpdf->setStrokeColor(0,0,0);
        $this->cezpdf->line(25,700,550,700);


        $this->cezpdf->ezText('<b>Fecha de impresion:</b> ' . date('d-m-Y')); // . ', ' . date('H:i') . ' hrs.');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');

        //get data from database (note: this should be on 'models' but mehhh..), we'll try creating table using ezPdf


        //$q=$this->db->query('SELECT id_percepcion, id_empleado, sueldo_bruto, ars_empleado, afp_empleado, prestamo_empleado, fecha_percepcion, sueldo_neto FROM percepciones');
                             //WHERE id_ordencompra LIKE 23');

      // $totales=$this->db->query('SELECT SUM(sueldo_bruto) as total_sb, SUM(sueldo_neto) as Total_sn  FROM percepciones  WHERE fecha_percepcion = "30-04-2017"');

        //$q=$this->db->query('SELECT * FROM percepciones WHERE fecha_percepcion = "30-04-2017"');
       // $estudiantesPorcarrera = $this->estudiantes_model->estudiantes_por_carrera($id_carrera);
      //  $estudiantesporc=$this->db->query('SELECT nombre_estudiante, apellido_estudiante, matricula_estudiante, id_categoria,
       //                FROM estudiantes WHERE id_carrera = '.$id_carrera'');

        //this data will be presented as table in PDF
        $data_table=array();
        foreach ($estudiantesPorcarrera->result_array() as $row) {
            $data_table[]=$row;
        }

           /* this data will be presented as table in PDF
            $total_table=array();
            foreach ($totales->result_array() as $row) {
                $total_table[]=$row;
            }
         */

        //this one is for table header
        $column_header=array(
            'id_estudiante'=>'ID',
            'nombre_estudiante'=> 'Nombre',
            'apellido_estudiante'=> 'Apellido',
            'matricula_estudiante'=> 'Matricula',
            'id_categoria'=> 'Categoria',
            'id_carrera'=> 'ID carrera',
            'desc_carrera'=> 'Carrera'            
        );

        /*this one is for table header
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

        ); */

        $this->cezpdf->ezTable($data_table, $column_header); //generate table
        $this->cezpdf->ezSetY(480);  //set vertical position
        //$this->cezpdf->ezImage(base_url('images/logo.jpg'), 0, 100, 'none', 'center');  //insert image
        //$this->cezpdf->("\n\n\n", 10);
       // $this->cezpdf->ezText('');
       // $this->cezpdf->ezSetY(150);  //set vertical position
        // $this->cezpdf->ezTable($total_table, $totales_header); //generate table

        //$this->cezpdf->ezText('');
        //$this->cezpdf->ezText('(Nota: Valores en RD$)');
        //$this->cezpdf->ezText('');

        $this->cezpdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
        //$this->cezpdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
        $this->cezpdf->ezStream(array('Content-Disposition'=>'Lista_estudiantes por carrera.pdf'));  //force user to download the file as 'just_random_filename.pdf'
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


    public function pdf_investigador($id_estudiante)
    {
        error_reporting(0);  //suppress some error message
        $parameters=array(
            'paper'=>'Letter',   //paper size
            'orientation'=>'landscape',  //portrait or lanscape
            'type'=>'color',   //paper type: none|color|colour|image
            'options'=>array(0.6, 0.9, 0.8) //I specified the paper as color paper, so, here's the paper color (RGB)
        );
        $this->load->model('empleados_model');
        $this->load->helper('pdf_helper');
        $this->load->library('cezpdf');  //load ezPdf library with above parameters
        $this->cezpdf->selectFont(APPPATH.'/libraries/fonts/Helvetica.afm');  //choose font, watch out for the dont location!
        $this->cezpdf->ezImage(base_url('assets/images/favicon.jpg'), 0, 50, 'none', 'left');  //insert image
        $this->cezpdf->ezText('Unidad de Investigacion [UI-UASD]',20);  //insert text with size
        $this->cezpdf->ezText('Detalle de Investigador',15);  //insert text with size
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('', 9);
        
       // $this->cezpdf->ezSetY(740);

        $this->cezpdf->setLineStyle(1,'square');
        $this->cezpdf->setStrokeColor(0,0,0);
        $this->cezpdf->line(25,700,550,700);


        
        $this->cezpdf->ezText('<b>Fecha de impresion:</b> ' . date('d-m-Y'));
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');

        //consulta del historial de recibos de un empleado especificado por su id_empleado.
        //$recibos=$this->db->query('SELECT id_percepcion, id_empleado, he_empleado,comision_empleado, sueldo_bruto, ars_empleado,
        // afp_empleado, prestamo_empleado, fecha_percepcion, sueldo_neto FROM percepciones WHERE id_empleado LIKE ' .$id_empleado);

        //obtener informacion del empleado para el encabezado del recibo.
        $estudiante=$this->db->query('SELECT * FROM estudiantes WHERE id_estudiante LIKE ' .$id_estudiante);

        //get data from database (note: this should be on 'models' but mehhh..), we'll try creating table using ezPdf
        //obtener informacion del las percepciones ganadas por el empleado en la fecha especificada.
       // $p=$this->db->query('SELECT id_percepcion, id_empleado, he_empleado,comision_empleado, sueldo_bruto FROM percepciones WHERE  fecha_percepcion LIKE  "30-04-2017" AND id_empleado LIKE ' .$id_empleado);

        //obtener informacion del las percepciones ganadas por el empleado en la fecha especificada.
       /* $d=$this->db->query('SELECT id_percepcion, id_empleado, he_empleado,comision_empleado, sueldo_bruto, ars_empleado,
         afp_empleado, prestamo_empleado, total_deduccion, fecha_percepcion, sueldo_neto FROM percepciones WHERE  fecha_percepcion LIKE  "30-04-2017" AND id_empleado LIKE ' .$id_empleado);




     $otras=$this->db->query('SELECT * FROM percepciones WHERE fecha_percepcion LIKE  "30-04-2017" AND id_empleado LIKE ' .$id_empleado);
        */

        $estudiante_table=array();
        foreach ($estudiante->result_array() as $row) {
            $estudiante_table[]=$row;
        }

        /*/this data will be presented as table in PDF
        $data_table=array();
        foreach ($p->result_array() as $row) {
            $data_table[]=$row;
        }

        $data_table=array();
        foreach ($d->result_array() as $row) {
            $data_deduc[]=$row;
        }


        $otras_table=array();
        foreach ($otras->result_array() as $row) {
            $otras_table[]=$row;
        }

        //this one is for table header
        $percepciones_header=array(
            'he_empleado'=>'Hora Extra',
            'comision_empleado'=> 'Incentivo',
            'sueldo_bruto'=> 'Sueldo bruto',
            //'ars_empleado'=> 'ARS',
            //'afp_empleado'=> 'AFP',
            //'prestamo_empleado'=> 'Prestamo',
            //'total_deduccion'=>'Deducciones',
            'fecha_percepcion'=> 'Fecha'
            //'sueldo_neto'=>'Sueldo neto'
            
        );
        $deducciones_header=array(

            'ars_empleado'=> 'ARS',
            'afp_empleado'=> 'AFP',
            'prestamo_empleado'=> 'Prestamo',
            'total_deduccion'=>'Deducciones',
            //'fecha_percepcion'=> 'Fecha'
            'sueldo_neto'=>'Sueldo neto'

        );

        //this one is for table detalle
        $otras_header=array(
            'id_proyecto'=>'Proyecto',
            'id_asociado'=> '% Asociado',
            'bono'=>'Bono',
            'sueldo_vacaciones'=>'Salario Vacaciones',
            'sueldo_navidad'=>'Salario Navidad',

        );  */

        //this one is for table detalle
        $estudiante_header=array(
            'id_estudiante'=>'ID',
            'nombre_estudiante'=> 'Nombre',
            'apellido_estudiante'=> 'Apellido',
            'matricula_estudiante'=>'Titulo',           
            ''=>'Area',           
            'telefono_estudiante'=>'Telefono',
            'email_estudiante'=>'Email'

        );

        /**
        $data_perc[] = array('Percepciones'=>'Sueldo base', 'Valor'=>'RD0.00');
        $data_perc[] = array('Percepciones'=>'Horas extras', 'Valor'=>'RD0.00');
        $data_perc[] = array('Percepciones'=>'Incentivo', 'Valor'=>'RD0.00');
        $data_perc[] = array('Percepciones'=>'Total Percepciones', 'Valor'=>'RD0.00');

        $data_deduc[] = array('Deducciones'=>'AFP', 'Valor'=>'RD0.00');
        $data_deduc[] = array('Deducciones'=>'ARS', 'Valor'=>'RD0.00');
        $data_deduc[] = array('Deducciones'=>'Cuota Prestamo', 'Valor'=>'RD0.00');
        $data_deduc[] = array('Deducciones'=>'Total deducciones', 'Valor'=>'RD0.00');
          */



        $this->cezpdf->ezSetY(650);
        $this->cezpdf->ezTable($estudiante_table, $estudiante_header,'Datos del Estudiante',array('showLines'=>0 , )); //generate table


        

        $this->cezpdf->ezSetCmMargins(1,1,5,5); //Margenes
        //Tabla

       // $this->cezpdf->ezText('Firma del empleado:_______________________________',10);
        

        $this->cezpdf->ezSetY(400);
        // Recibo para el empleado - debe ser firmado por este.

       
        
        $this->cezpdf->ezText('<b>Fecha de impresion:</b> ' . date('d-m-Y'));

         
          //set vertical position
        //$this->cezpdf->ezImage(base_url('/images/logo.jpg'), 0, 100, 'none', 'center');  //insert image
        //$this->cezpdf->("\n\n\n", 10);
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        //$this->cezpdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
        //$this->cezpdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
        $this->cezpdf->ezStream(array('Content-Disposition'=>'detalle_estudiante.pdf'));  //force user to download the file as 'just_random_filename.pdf'
    }


    public function pago_inscripcion($id_inscripcion)
    { 
        error_reporting(0);  //suppress some error message
        $parameters=array(
            'paper'=>'Letter',   //paper size
            'orientation'=>'landscape',  //portrait or lanscape
            'type'=>'color',   //paper type: none|color|colour|image
            'options'=>array(0.6, 0.9, 0.8) //I specified the paper as color paper, so, here's the paper color (RGB)
        );
        $this->load->model('empleados_model');
        $this->load->helper('pdf_helper');
        $this->load->library('cezpdf');  //load ezPdf library with above parameters
        $this->cezpdf->selectFont(APPPATH.'/libraries/fonts/Helvetica.afm');  //choose font, watch out for the dont location!
        $this->cezpdf->ezImage(base_url('assets/images/favicon.jpg'), 0, 50, 'none', 'left');  //insert image
        $this->cezpdf->ezText('Sistema de Planificacion de Asignaturas [SPA-UASD]',20);  //insert text with size
        $this->cezpdf->ezText('Recibo de pago inscripcion',15);  //insert text with size
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('', 9);
        
       // $this->cezpdf->ezSetY(740);

        $this->cezpdf->setLineStyle(1,'square');
        $this->cezpdf->setStrokeColor(0,0,0);
        $this->cezpdf->line(25,700,550,700);


        
        $this->cezpdf->ezText('<b>Fecha de impresion:</b> ' . date('d-m-Y'));
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        //obtener informacion del empleado para el encabezado del recibo.
        $pago=$this->db->query('SELECT * FROM pagos WHERE id_inscripcion LIKE ' .$id_inscripcion);

        $pago_table=array();
        foreach ($pago->result_array() as $row) {
            $pago_table[]=$row;
        }       
        //this one is for table detalle
        $pago_header=array(
            'id_pago'=>'ID',
            'id_inscripcion'=> 'Codigo Inscripcion',
            'fecha_pago'=> 'Fecha del pago;',
            'hora_pago'=>'Hora del pago',           
            'monto_pago'=>'Monto Pagado'
        );


        $this->cezpdf->ezSetCmMargins(1,1,5,5); //Margenes
        //Tabla

        $this->cezpdf->ezSetY(650);
        $this->cezpdf->ezTable($pago_table, $pago_header,'Datos del Pago',array('showLines'=>0 , )); //generate table
       

        
        $this->cezpdf->ezSetY(200);
        $this->cezpdf->ezText('Firma del estudiante:_______________________________',10);
       
        // Recibo para el empleado - debe ser firmado por este.
        $this->cezpdf->ezText('<b>Fecha de impresion:</b> ' . date('d-m-Y'));
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');
        $this->cezpdf->ezStream(array('Content-Disposition'=>'comprobantepago_inscripcion.pdf'));  //force user to download the file as 'just_random_filename.pdf'
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



    public function pdf_recibos($id_empleado)
    {
        error_reporting(0);  //suppress some error message
        $parameters = array(
            'paper' => 'letter',   //paper size
            'orientation' => 'landscape',  //portrait or lanscape
            'type' => 'color',   //paper type: none|color|colour|image
            'options' => array(0.6, 0.9, 0.8) //I specified the paper as color paper, so, here's the paper color (RGB)
        );

        $this->load->model('empleados_model');
        $this->load->helper('pdf_helper');
        $this->load->library('cezpdf');  //load ezPdf library with above parameters
        $this->cezpdf->selectFont(APPPATH . '/libraries/fonts/Helvetica.afm');  //choose font, watch out for the dont location!
        $this->cezpdf->ezText('Electrical Equipment Supply & Service', 20, array('justification' => 'center',));  //insert text with size
        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('Recibo de pago Nomina a empleado.', 15, array('justification' => 'center',));  //insert text with size

        $this->cezpdf->ezText('', 9);
        $this->cezpdf->ezText('', 9);


        //$this->cezpdf->ezText('',$row[3], 9);


        $this->cezpdf->ezText('<b>Fecha de pago:</b> ' . date('d-m-Y'));
        $this->cezpdf->ezText('');
        $this->cezpdf->ezText('');


        function puntos_cm($medida, $resolucion = 72)
        {

            return ($medida / (2.54)) * $resolucion;

        }

        //$this->addInfo($datacreator);

        $datos_empleado[] = array('Codigo' => '10001',
            'Nombre' => 'Fulano',
            'Apellido' => 'Detal',
            'Cedula' => '031-0314663-9');


        $percepciones[] = array('Sueldo base' => 'RD30,000.00',
            'Horas extras' => 'RD2,000.00',
            'Incentivo' => 'RD1,000.00',
            'Total Percepciones' => '33,000.00'
        );

        $data_perc[] = array('Percepciones' => 'Sueldo base', 'Valor' => 'RD0.00');
        $data_perc[] = array('Percepciones' => 'Horas extras', 'Valor' => 'RD0.00');
        $data_perc[] = array('Percepciones' => 'Incentivo', 'Valor' => 'RD0.00');
        $data_perc[] = array('Percepciones' => 'Total Percepciones', 'Valor' => 'RD0.00');

        $data_deduc[] = array('Deducciones' => 'AFP', 'Valor' => 'RD0.00');
        $data_deduc[] = array('Deducciones' => 'ARS', 'Valor' => 'RD0.00');
        $data_deduc[] = array('Deducciones' => 'Cuota Prestamo', 'Valor' => 'RD0.00');
        $data_deduc[] = array('Deducciones' => 'Total deducciones', 'Valor' => 'RD0.00');

        $data_otros[] = array('Otros ingresos' => 'Bonificacion', 'Valor' => 'RD0.00');
        $data_otros[] = array('Otros ingresos' => 'Vacaciones', 'Valor' => 'RD0.00');
        $data_otros[] = array('Otros ingresos' => 'Salario Navidad', 'Valor' => 'RD0.00');
        $data_otros[] = array('Otros ingresos' => 'Total otros', 'Valor' => 'RD0.00');


        $this->ezText("<b>ELECTRICAL EQUIPMENT SUPPLY & SERVICE</b>\n", 16);
        $this->ezText("Recibo de pago - Nomina de empleados\n", 12);

        $this->ezText("\n\n\n", 10);
        $this->ezSetY(puntos_cm(25));
        $this->ezText("<b>Fecha:</b> " . date("d/m/Y"), 8);
        $this->ezText("<b>Hora:</b> " . date("H:i:s") . "\n\n", 8);
        $this->addJpegFromFile("../../escogido.jpg", 135, 785, 20, 20);
        $this->ezText("\n\n\n", 10);


//Dibujar linea de separacion
        $this->setLineStyle(1, 'square');
        $this->setStrokeColor(0, 0, 0);
        $this->line(puntos_cm(1.5), puntos_cm(24), puntos_cm(19.5), puntos_cm(24));
        $this->ezSetY(puntos_cm(24));

        $this->ezTable($data_perc, null, '', array('xPos' => 'left',
            'shaded' => '1',
            'width' => '150',
            'fontSize' => '8',
            'showLines' => '0'));
        $this->ezSetY(puntos_cm(21));
        $this->ezTable($data_deduc, null, '', array('xPos' => 'left',
            'shaded' => '1',
            'width' => '150',
            'fontSize' => '8',
            'showLines' => '0'));

        $this->ezSetY(puntos_cm(18));
        $this->ezTable($data_otros, null, '', array('xPos' => 'left',
            'shaded' => '1',
            'width' => '150',
            'fontSize' => '8',
            'showLines' => '0'));


//Datos del empleado
        $this->ezSetY(puntos_cm(26));
        $this->ezTable($datos_empleado, null, '', array('xPos' => 'center',
            'shaded' => '1',
            'width' => '200',
            'fontSize' => '8',
            'showLines' => '0'));

        $this->addText(40, 730, 11, "Empleado: ");

        $this->ezSetY(puntos_cm(5));

        $this->ezStream();

    }
        
}