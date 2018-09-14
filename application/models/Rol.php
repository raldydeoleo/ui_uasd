<?php
/**
 * Created by PhpStorm.
 * User: dsanc
 * Date: 8/5/2016
 * Time: 6:50 AM
 */

class Rol extends BS_Model {

    public function __construct() {
        parent::__construct();
        $this->tablaNombre = SEGURIDAD_MODULO . "_" . ROL_MODELO;
        $this->clavePrincipalNombre = ID_ROL;
    }

    public function crearConsulta(ConsultaArgumentos $argumentos) {
        $this->db->from($this->tablaNombre);
        $this->db->select($this->tablaNombre . ".*");

        if ($argumentos->existeEnValores(ID_ROL))
            $this->db->where($this->tablaNombre . "." . ID_ROL, $argumentos->obtenerValor(ID_ROL));

        return $this->db->get();
    }

}