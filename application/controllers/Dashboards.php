<?php

class Dashboards extends BS_Controller {

    public function __construct() {
        parent::__construct(true);
    }

    public function mostrar() {
        $this->mostrarVista('dashboards/mostrar');
    }

    public function index(){
        $this->mostrarVista('dashboards/mostrar');
      
    }

  

}