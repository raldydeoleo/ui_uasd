<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 7/27/2016
 * Time: 11:28 PM
 */

class Permiso extends BS_Model {

    /**
     * Construye el modelo para mapear Permisos
     *
     * @author Diego Sanchez
     * @version 0.0.3-ALPHA
     */
    public function __construct() {
        parent::__construct();
        $this->tablaNombre = SEGURIDAD_MODULO . "_" . PERMISO_MODELO;
        $this->clavePrincipalNombre = ID_PERMISO;
    }

    public function crearConsulta(ConsultaArgumentos $argumentos) {
        $this->db->from($this->tablaNombre);
        $this->db->select($this->tablaNombre . ".*");

        if ($argumentos->existeEnValores(ID_PERMISO))
            $this->db->where($this->tablaNombre . "." . ID_PERMISO, $argumentos->obtenerValor(ID_PERMISO));

        if ($argumentos->existeEnValores(CODIGO_PERMISO_CN))
            $this->db->where($this->tablaNombre . "." . CODIGO_PERMISO_CN, $argumentos->obtenerValor(CODIGO_PERMISO_CN));

        return $this->db->get();
    }
}