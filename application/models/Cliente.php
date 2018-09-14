<?php

/**
 * Define el modelo para mapear la transaciones de la entidad cliente a la bd
 * @author Wolfan Fabian
 * @version 0.0.3-ALPHA
 */
class Cliente extends BS_Model {


    /**
     * Construye el modelo para mapear los clientes
     *
     * @author Wolfan Fabian2
     * @version 0.0.3-ALPHA
     */
    public function __construct() {
        parent::__construct();
        $this->tablaNombre = CLIENTES_MODULO . "_" . CLIENTE_MODELO;
        $this->clavePrincipalNombre = ID_CLIENTE;
    }


    /**
     * Crea cualquier configuracion para consultar en la bd
     *
     * @abstract
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param ConsultaArgumentos $argumentos - Objeto que contiene las condiciones de lectura
     * @return CI_DB_result - Retorna un objeto
     */
    public function crearConsulta(ConsultaArgumentos $argumentos) {
        $this->db->from($this->tablaNombre);
        $this->db->select($this->tablaNombre . ".*");


        $tablaPersona = FUNDAMENTOS_MODULO . '_' . PERSONA_MODELO;
        $this->db->join($tablaPersona, $tablaPersona . "." . ID_PERSONA . "=" . $this->tablaNombre . "." . ID_PERSONA);
        $this->db->select($tablaPersona . ".*");


        if ($argumentos->existeEnValores(ID_CLIENTE))
            $this->db->where($this->tablaNombre . "." . ID_CLIENTE, $argumentos->obtenerValor(ID_CLIENTE));


        if ($argumentos->existeEnValores(HABILITADO_CN))
            $this->db->where($this->tablaNombre . "." . HABILITADO_CN, $argumentos->obtenerValor(HABILITADO_CN));

        return $this->db->get();
    }
}