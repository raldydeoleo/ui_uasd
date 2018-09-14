<?php

/**
 * Clase simulada para trabajar con los vehiculos
 * @todo: (26/08/2016) Wolfan Fabian - Debe trabajarse como en los otros proyectos
 *
 */
class Servicio extends BS_Model {


    public function __construct() {
        parent::__construct();
        $this->tablaNombre = EYM_MODULO . "_" . SERVICIO_MODELO;
        $this->clavePrincipalNombre = ID_SERVICIO;

    }

}