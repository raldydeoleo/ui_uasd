<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Define una serie de parametros para utilizarse en consultas de bd a traves de los modelos
 *
 * @author Wolfan Fabian
 * @version 0.0.3-ALPHA
 */
class ConsultaArgumentos {


    /**
     * @var array $valores - Array asociativo con que contiene los parametros a pasar.
     * @var array $intervalos - Array asociativo que contiene parametros que van en un rango.
     */
    private $valores = array();
    private $intervalos = array();
    private $paginationParametros = null;


    /**
     * Constructor de la clase, recibe un argumento opcional
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param array|null $valoresCopiar Valores a copiar como parametros para la consulta de la bd
     * @param array $intervalosCopiar Rangos a copiar como parametros a la bd
     */
    function __construct(array $valoresCopiar = null, array $intervalosCopiar = null) {
        if (isset($valoresCopiar)) {
            $this->valores = $valoresCopiar;
        }

        if (isset($intervalosCopiar)) {
            $this->intervalos = $intervalosCopiar;
        }
    }


    /**
     * Obtiene el valor asociado a un key indicado.
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param $index - Clave sobre la cual se desea un valor asociado
     * @return mixed|null - Retorna el valor asociado o null si no hay ningun valor asociado
     */
    function obtenerValor($index) {
        return ($this->existeEnValores($index)) ? $this->valores[$index] : null;
    }


    /**
     * Obtiene un intervalo asignado al index especificado
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param string $index - Nombre del indice del cual se desea el intervalo
     * @return mixed - Retorna el valor del intervalo, nulo sino existe intervalo asociado
     */
    function obtenerIntervalo($index) {
        return ($this->existeEnIntervalos($index)) ? $this->intervalos[$index] : null;

    }


    /**
     * Determina si un index ha sido asociado en el arreglo de valores
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param $index - Nombre del indice sobre del cual se desea saber si existe un valor asociado
     * @return bool - Retorna true si existe un valor asociado, false en caso contrario
     */
    function existeEnValores($index) {
        return array_key_exists($index, $this->valores);
    }


    /**
     * Determina si un index ha sido asociado en el arreglo de intervalos
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param $index - Nombre del indice sobre del cual se desea saber si existe un intervalo asociado
     * @return bool - Retorna true si existe un valor asociado, false en caso contrario
     */
    function existeEnIntervalos($index) {
        return array_key_exists($index, $this->intervalos);
    }


    /**
     * Asocia un valor a un index indicado
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param $index - Nombre del indice que se desea asociar
     * @param $valor - Valor que se desea asociar
     */
    function asignarValor($index, $valor) {
        $this->valores[$index] = $valor;
    }


    /**
     * Asocia un intervalo a un index indicado
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param $index - Nombre del indice que se desea asociar
     * @param $minimoIncluisivo - Minimo valor del intervalo a asociarse
     * @param $maximoInclusivo - Maximmo valor del intervalo a asociarse
     */
    function asignarIntervalo($index, $minimoIncluisivo, $maximoInclusivo) {
        $this->intervalos[$index] = array('minimo' => $minimoIncluisivo, 'maximo' => $maximoInclusivo);
    }


    /**
     * Obtiene una copia del arreglo que contiene los valores
     *
     * @return array|null - Retorna una copia del arreglo de los valores
     */
    function obtenerValoresCopia() {
        return $this->valores;
    }


    /**
     * Obtiene una copia del arreglo que contiene los intervalos
     *
     * @return array - Retorna una copia del arreglo de los intervalos
     */
    function obtenerIntervalosCopia() {
        return $this->intervalos;
    }


    function obtenerPaginationParametros() {
        return $this->paginationParametros;
    }


    function asignarPaginationParametros($limit, $offset) {
        return array(
            'limit' => $limit,
            'offset' => $offset
        );
    }


    function existePaginationParametros() {
        return isset($this->paginationParametros);
    }

}