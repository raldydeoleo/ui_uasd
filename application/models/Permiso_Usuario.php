<?php

class Permiso_Usuario extends BS_Model {

    public function __construct() {
        parent::__construct();
        $this->tablaNombre = SEGURIDAD_MODULO . "_" . PERMISO_USUARIO_MODELO;
        $this->clavePrincipalNombre = ID_PERMISO_USUARIO;
    }

    //SELECT seg_p.CODIGO_PERMISO from seg_permiso seg_p, seg_permiso_usuario seg_pu where seg_pu.id_permiso = seg_p.id_permiso and seg_pu.id_usuario = 1
    public function crearConsulta(ConsultaArgumentos $argumentos) {
        $this->db->from($this->tablaNombre);
        $this->db->select($this->tablaNombre . ".*");

        // joins
        $tablaPermiso = SEGURIDAD_MODULO . "_" . PERMISO_MODELO;
        $this->db->join($tablaPermiso, $tablaPermiso . "." . ID_PERMISO . "=" . $this->tablaNombre . "." . ID_PERMISO);
        $this->db->select($tablaPermiso . "." . CODIGO_PERMISO_CN);

        if ($argumentos->existeEnValores(CODIGO_PERMISO_CN))
            $this->db->where($tablaPermiso . "." . CODIGO_PERMISO_CN, $argumentos->obtenerValor(CODIGO_PERMISO_CN));

        if ($argumentos->existeEnValores(ID_USUARIO))
            $this->db->where($this->tablaNombre . "." . ID_USUARIO, $argumentos->obtenerValor(ID_USUARIO));

        return $this->db->get();
    }
}