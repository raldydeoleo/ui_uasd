<?php

/**
 * Define el modelo para mapear la transaciones de la entidad empresa a la bd
 *
 * @author Wolfan Fabian
 * @version 0.0.3-ALPHA
 */
class Persona extends BS_Model {


    /**
     * Construye el modelo para mapear la empresa
     *
     * @author Wolfan Fabian2
     * @version 0.0.3-ALPHA
     */
    public function __construct() {
        parent::__construct();
        $this->tablaNombre = FUNDAMENTOS_MODULO . "_" . PERSONA_MODELO;
        $this->clavePrincipalNombre = ID_PERSONA;
    }


    /**
     * Inhabilita la persona
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param array $persona - Persona a ser inhabilitada
     * @todo (19/7/2016) Wolfan Fabian - Evualuar si este metodo es conveniente tenerlo en el modelo base
     * @return array - Retorna la persona actualizada
     */
    public function inhabilitar(array $persona) {
        return $this->actualizar($persona, array(HABILITADO_CN => false));
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

        if ($argumentos->existeEnValores(HABILITADO_CN))
            $this->db->where($this->tablaNombre . "." . HABILITADO_CN, $argumentos->obtenerValor(HABILITADO_CN));

        return $this->db->get();
    }
}