<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Inicio
 * @property Cliente $cliente
 * @property Vehiculo $vehiculo
 * @property Orden_trabajo $Orden_trabajo
 */
class Inicio extends BS_Controller {

    public function __construct() {
        parent::__construct();
        $this->cargarLibrerias();
        $this->load->model('clientes_model');

    }

    protected function cargarLibrerias() {
       // $this->load->model(CLIENTE_MODELO);
        //$this->load->model(VEHICULO_MODELO);
        //$this->load->model(ORDEN_TRABAJO_MODELO);
    }


    function index() {
       // $clientes = $this->clientes_model->obtener_todos();
       /// $this->asignarDatosVista('clientes', $clientes);
       // $this->load->view('usuarios/prueba');

       $this->mostrarVista('panel/secretaria/pruebanotif');
       
        // $this->load->view('');
       // $id = $this->uri->segment(3);
       // echo $id;

    }

    /**
     * @author: Raldy De Oleo
     * Seguimiento de clientes
     * Vista grupal
     * Muestra un listado de clientes
     */
    public function seguimientoClientes(){
        $clientes = $this->clientes_model->obtener_todos();
        $this->asignarDatosVista('clientes', $clientes);
        $this->mostrarVista('panel/secretaria/seguimientoClientes');
    }


    public function panel() {
        $this->load->view('panel/header');
        $this->load->view('panel/dashboard'); //Contenido
        $this->load->view('panel/footer');
    }

    public function sign() {
        $this->load->view('panel/header');
        $this->load->view('panel/lock');
        $this->load->view('panel/footer');
    }

    public function notfound() {
        $this->load->view('panel/header');
        $this->load->view('panel/404');

    }

}