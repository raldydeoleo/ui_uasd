<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *
 */
 /**
     * @author: Raldy De Oleo
     * Matricula: 94-3032
     * Controlador que maneja la logica de inscripciones.
     * 30-07-2018
     */
class Inscripciones extends BS_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('inscripciones_model');        
    }

    
    public function nueva_inscripcion(){   
        $this->mostrarVista('panel/asesor/crearInscripcion');
    }

    public function nuevo_detalleorden(){
        $this->mostrarVista('panel/asesor/detalleordencompraform');
    }

   
    function insertar_inscripcion()
    {

        if($this->input->post('submit'))
        {   $id_estudiante = $this->input->post('id_estudiante');                     
            $id_periodo = $this->input->post('id_periodo');
            $fecha_inscripcion = $this->input->post('fecha_inscripcion'); 
            $hora_inscripcion = $this->input->post('hora_inscripcion');
            $desc_inscripcion = $this->input->post('desc_inscripcion');
            $creditos_inscripcion = $this->input->post('creditos_inscripcion');
            $precio_credito_inscripcion = $this->input->post('precio_credito_inscripcion');
            $monto_inscripcion = $this->input->post('monto_inscripcion');
            $total_inscripcion = $this->input->post('total_inscripcion');
            $nota_inscripcion = $this->input->post('nota_inscripcion');
            $subtotal_inscripcion = $this->input->post('subtotal_inscripcion');

            //conseguimos la hora de nuestro país, en mi caso españa
            date_default_timezone_set("Europe/Madrid");
            $fecha = date('d-m-Y');
            $hora= date("H:i:s");
            //ahora procesamos los datos hacía el modelo que debemos crear
            $nueva_insercion = $this->inscripciones_model->nueva_inscripcion(
                $id_estudiante,
                $id_periodo,
                $fecha_inscripcion,
                $hora_inscripcion,                               
                $desc_inscripcion,
                $creditos_inscripcion,
                $precio_credito_inscripcion,
                $monto_inscripcion,
                $total_inscripcion,
                $nota_inscripcion,
                $subtotal_inscripcion
                
            );
            redirect(base_url("inscripciones/listaInscripciones"), "refresh");
        }

        else
        {

        }
    }


    function insertar_pago()
    {

        if($this->input->post('submit'))
        {                       
            $id_inscripcion = $this->input->post('id_inscripcion');
            $fecha_pago = $this->input->post('fecha_pago'); 
            $hora_pago = $this->input->post('hora_pago');         
            $monto_pago  = $this->input->post('monto_pago');
           

            //conseguimos la hora de nuestro país, en mi caso españa
            date_default_timezone_set("Europe/Madrid");
            $fecha = date('d-m-Y');
            $hora= date("H:i:s");
            //ahora procesamos los datos hacía el modelo que debemos crear
            $nueva_insercion = $this->inscripciones_model->nuevo_pago(
                $id_inscripcion,
                $fecha_pago,
                $hora_pago,        
                $monto_pago                
            );
            redirect(base_url("imprimirEstudiantes/pago_inscripcion/$id_inscripcion"), "refresh");
        }

        else
        {

        }
    }




    public function index() {
       // $inscripciones = $this->inscripciones_model->obtener_inscripciones();
        //$this->asignarDatosVista('inscripciones', $inscripciones);
       // $this->mostrarVista('panel/secretaria/listaIncripciones');
       redirect(base_url("inscripciones/listaInscripciones"), "refresh");
    }

    public function listaInscripciones() {
        $inscripciones = $this->inscripciones_model->obtener_inscripciones();
        $this->asignarDatosVista('inscripciones', $inscripciones);
        $this->mostrarVista('panel/secretaria/listaInscripciones');
    }

    public function ver($id_inscripcion){
        $data = array();
        $this->load->model('inscripciones_model');
        $inscripcion = $this->inscripciones_model->obtener_por_id($id_inscripcion);
        //$data['compra'] = $compra;
        $this->asignarDatosVista('inscripcion', $inscripcion);
        $this->mostrarVista('panel/asesor/verInscripcion');

    }

    public function verOrden($id_ordencompra){
        $data = array();
        $this->load->model('compras_model');
        $ordencompra = $this->compras_model->obtener_orden_por_id($id_ordencompra);
        $data['ordencompra'] = $ordencompra;
        $this->asignarDatosVista('ordencompra', $ordencompra);
        $this->mostrarVista('panel/asesor/verOrdenCompra');

    }



    public function guardar($id_compra=null){
        $data = array();
        $this->load->model('compras_model');
        if($id_compra) {
            $compra = $this->compras_model->obtener_por_id($id_compra);
            $data['id_compra'] = $compra->id_compra;
            $data['desc_compra'] = $compra->desc_compra;
            $data['cantidad_compra'] = $compra->cantidad_compra;
            $data['precio_compra'] = $compra->precio_compra;
            $data['fecha_compra'] = $compra->fecha_compra;

        }else{
            $data['id_compra']=null;
            $data['desc_compra']=null;
            $data['cantidad_compra']=null;
            $data['precio_compra']=null;
            $data['fecha_compra']=null;
            //$data['estudiante_telefono']=null;
            //$data['estudiante_email']=null;

        }
        //$this->load->view('estudiantes/header');
        $this->asignarDatosVista('id_compra', $data);
        //$this->mostrarVista('panel/asesor/listaCompras');
        $this->mostrarVista('citas/compraMateriales');
        //$this->load->view('templates/footer');
    }
    
    public function guardar_post($id_inscripcion){
        if($this->input->post()){
            $id_estudiante = $this->input->post('id_estudiante');
            $id_periodo = $this->input->post('id_periodo');
            $fecha_inscripcion = $this->input->post('fecha_inscripcion');
            $hora_inscripcion = $this->input->post('hora_inscripcion');
            $creditos_inscripcion = $this->input->post('creditos_inscripcion');
            $total_inscripcion = $this->input->post('total_inscripcion');
            $estatus = $this->input->post('estatus');

            $this->load->model('inscripciones_model');
            $this->inscripciones_model->actualizar_inscripcion($id_inscripcion,
                                                                $id_estudiante,
                                                                    $id_periodo,
                                                                    $fecha_inscripcion,
                                                                    $hora_inscripcion,
                                                                    $creditos_inscripcion,
                                                                    $total_inscripcion,
                                                                    $estatus);

        }
        else{
           // $this->insertar_estudiante();
            }
        redirect(base_url("inscripciones"), "refresh");
    }





    public function pagoEfectivo($id_inscripcion)
    {   $this->load->model('inscripciones_model');
        $inscripcion = $this->inscripciones_model->obtener_por_id($id_inscripcion);
        $this->asignarDatosVista('inscripcion', $inscripcion);
        $this->mostrarvista('panel/asesor/reciboPagoInscr');

    }

    public function eliminar($id_compra){
        $this->load->model('compras_model');
        $this->compras_model->eliminar($id_compra);
        redirect(base_url("compras"), "refresh");
    }


    /**
     * @author: Raldy De Oleo
     * @version: ALPHA
     * Vista grupal
     * Muestra listado de todas las compras registradas.
     */
    public function listaCompras() {

        $this->load->model('compras_model');
        $compras = $this->compras_model->obtener_todos();
        $this->asignarDatosVista('compras', $compras);
        $this->mostrarVista('panel/asesor/listaCompras');
    }

    /**
     * @author: Raldy De Oleo
     * Muestra la vista para crear ordenes de compra
     * Vista Individual
     * Formulario de creacion de Orden de Compra
     */
    public function crearOrdencompra() {
        $this->mostrarVista('panel/asesor/crearOrdencompra');
    }


    public function test(){
        $this->load->model('compras_model');
        $ordenes = $this->compras_model->obtener_ordenes();
        $this->asignarDatosVista('ordenes', $ordenes);
        $this->mostrarVista('panel/asesor/comprasformm');

    }


    public function listaordenesProveedor($id_proveedor) {
        $this->load->model('compras_model');
        $ordenesporproveedor = $this->compras_model->obtener_ordenes_proveedor($id_proveedor);
        $this->asignarDatosVista('ordenesporproveedor', $ordenesporproveedor);
        $this->mostrarVista('panel/secretaria/listaOrdenesproveedor');
    }

    public function listaordenesProyecto($id_proyecto) {
        $this->load->model('compras_model');
        $ordenesporproyecto = $this->compras_model->obtener_ordenes_proyecto($id_proyecto);
        $this->asignarDatosVista('ordenesporproyecto', $ordenesporproyecto);
        $this->mostrarVista('panel/secretaria/listaOrdenesProyecto');
    }

    public function listaordenesAsociado($id_asociado) {
        $this->load->model('compras_model');
        $ordenesporasociado = $this->compras_model->obtener_ordenes_asociado($id_asociado);
        $this->asignarDatosVista('ordenesporasociado ', $ordenesporasociado);
        $this->mostrarVista('panel/secretaria/listaOrdenesAsociado');
    }
}