<?php

/**
 * Extension del clase CI_Model con funcionalidad extra para Brainsoft
 *
 * @abstract
 * @author Wolfan Fabian
 * @version 0.0.3-ALPHA
 * @property CI_DB_query_builder $db - Objeto intermediario entre CI y la base de datos
 * @property string $tablaNombre - Nombre de la tabla la cual es mapeada por el modelo
 * @property string $clavePrincipalNombre - Nombre de la clave principal en la tabla
 */
class BS_Model extends CI_Model {


    /**
     * Inicializa el objeto
     */
    public function __construct() {
        parent::__construct();
    }


    /**
     * Crea cualquier configuracion para consultar en la bd.
     * Nota: Esta funcion no identifica intervalos en la clase ConsultaArgumentos
     *
     * @abstract
     * @author Wolfan Fabian
     * @version 0.0.4-ALPHA
     * @param ConsultaArgumentos $argumentos - Objeto que contiene las condiciones de lectura
     * @return CI_DB_result - Retorna un objeto
     */
    protected function crearConsulta(ConsultaArgumentos $argumentos) {
        $this->db->from($this->tablaNombre);
        $this->db->select($this->tablaNombre . ".*");

        $valores = $argumentos->obtenerValoresCopia();
        foreach ($valores as $idValor => $valor) {
            $this->db->where("{$this->tablaNombre}.{$idValor}", $valor);
        }

        return $this->db->get();
    }


    /**
     * Obtiene el primer record leido de acuerdo a los parametros pasados
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param ConsultaArgumentos $argumentos : Objeto que contiene las condiciones de busqueda sql
     * @return mixed: Retorna un arreglo con el contenido del primer record, o null
     */
    public function leerPrimero(ConsultaArgumentos $argumentos = null) {
        if (!isset($argumentos)) $argumentos = new ConsultaArgumentos();
        $consulta = $this->crearConsulta($argumentos);
        return $consulta->first_row('array');
    }


    /**
     * Obtiene el primer registro leido de acuerdo a los parametros pasados
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param string $campoNombre - Nombre del campo para filtrar.
     * @param string $campoValor - Valor del campo a filtrar.
     * @return array|mixed - Retorna un arreglo con el contenido del primer record, o null
     */
    public function leerPrimeroSegunCampo($campoNombre, $campoValor) {
        $argumentos = new ConsultaArgumentos();
        $argumentos->asignarValor($campoNombre, $campoValor);
        return $this->leerPrimero($argumentos);
    }


    /**
     * Obtiene el primer registro leido de acuerdo al valor de clave principal pasado como argumento
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param int $clavePrincipalValor - Valor de la clave principal que se desea consultar
     * @return mixed - Retorna el registro con que cumple con la condicion o null en caso de haber ninguno
     */
    public function leerPrimeroSegunClavePrincipal($clavePrincipalValor) {
        return $this->leerPrimeroSegunCampo($this->clavePrincipalNombre, $clavePrincipalValor);
    }


    /**
     * Obtiene todos los registros correspondientes al argumento pasado, indexado si se espefica el index
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param ConsultaArgumentos $argumentos - Objeto que contiene las condiciones de busqueda sql
     * @param mixed $index - Indice sobre el cual se indexara el arreglo, si se desea indexado
     * @return array - Retorna un arreglo de arreglos, con todos los registros
     */
    public function leerTodos(ConsultaArgumentos $argumentos = null, $index = null) {
        if (!isset($argumentos)) $argumentos = new ConsultaArgumentos();
        $consulta = $this->crearConsulta($argumentos);
        return $this->indexar($consulta->result('array'), $index);
    }


    /**
     * Obtiene todos los registros leidos de acuerdo a los parametros pasados
     *
     * @author Wolfan Fabian
     * @vesion 0.0.3-ALPHA
     * @param $campoNombre - Nombre del campo para filtrar.
     * @param $campoValor - Valor del campo a filtrar.
     * @param string|mixed $index - Indice sobre el cual se indexa el resultado, si se desea indexado.
     * @return array. Retorna un arreglo de arreglos, con todos los records.
     */
    public function leerTodosSegunCampo($campoNombre, $campoValor, $index = null) {
        $argumentos = new ConsultaArgumentos();
        $argumentos->asignarValor($campoNombre, $campoValor);
        return $this->leerTodos($argumentos, $index);
    }


    /**
     * Obtiene el registro de una tabla estatica cuyo 'nombre' se corresponda a un valor especificado
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param $tablaNombre - Nombre de la tabla
     * @param $registroNombre - Nombre del rol deseado
     * @return mixed - Retorna un arreglo con los datos del record deseado, null si no encuentra resultado
     */
    protected function leerRegistroEstatico($tablaNombre, $registroNombre) {
        $consulta = $this->db->from($tablaNombre)->where(NOMBRE_CN, $registroNombre)->get();
        return $consulta->first_row('array');
    }


    /**
     * Crea un registro en la bd, y lo retorna completo
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param array $objetoData - Todos los datos para crear el objeto
     * @return array|null - Retorna un array con el objeto creado si la insercion fue correcto, null en caso contrario
     */
    public function crear(array $objetoData) {
        $this->db->insert($this->tablaNombre, $objetoData);
        $clavePrincipalRegistrada = $this->db->insert_id();

        if (!$clavePrincipalRegistrada) {
            $error = json_encode($this->db->error());
            log_message('DEBUG', $error); // Escribe el error en el archivo log correspondiente
            return null;
        }

        $objetoData[$this->clavePrincipalNombre] = $clavePrincipalRegistrada;
        return $objetoData;

    }


    /**
     * Actualiza un objeto en la bd, segun los demas parametros de la funcion
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param array $objeto - Objeto a ser actualizado
     * @param array $objetoNuevaData - Nuevos datos para el objeto
     * @return array - Retorna el objeto actualizado
     * @todo: (16/7/2016) Wolfan Fabian - Cambiar, en una version furuta, la linea del retorno para que no se lea en la bd.
     */
    public function actualizar(array $objeto, array $objetoNuevaData) {
        $this->db->where($this->clavePrincipalNombre, $objeto[$this->clavePrincipalNombre]);
        $this->db->update($this->tablaNombre, $objetoNuevaData);
        return $this->leerPrimeroSegunCampo($this->clavePrincipalNombre, $objeto[$this->clavePrincipalNombre]);
    }


    /**
     * Elimina un objeto en la bd. Tener cuidado con usarlo incorrectamente.
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param array $objeto - Objeto a ser borrado
     */
    public function eliminar(array $objeto) {
        $this->db->where($this->clavePrincipalNombre, $objeto[$this->clavePrincipalNombre]);
        $this->db->delete($this->tablaNombre);
    }


    /**
     * Convierte una array simple en un array asociativo de acuerdo a un indice presente en todos los elementos
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param array $arreglo - Arreglo a ser convertido en asociativo
     * @param $index - Nombre del indice a tomarse para indezar. Si es nulo, devuelve el mismo arreglo simple
     * @return array - Retorna el arreglo asociativo
     */
    protected function indexar($arreglo, $index) {
        if (!isset($index)) return $arreglo;

        $arregloIndexado = array();
        foreach ($arreglo as $elemento) {
            $arregloIndexado[$elemento[$index]] = $elemento;
        }
        return $arregloIndexado;
    }


    /**
     * Obtiene la cantidad de registros en la tabla correspondiente al modelo
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @return int - Retorna la cantidad de registro en la tabla correspondiente al modelo
     */
    public function contarTodo() {
        $this->db->from($this->tablaNombre);
        return $this->db->count_all_results();
    }


    /**
     * Obtiene la cantidad de registro en la tabla correspondientes al modelo que se correspondan a los parametros especificados
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param ConsultaArgumentos $argumentos - Objeto que contiene las condiciones de lectura
     * @return int - Retorna la cantidad de registro en la tabla correspondiente al modelo
     * @todo: (16/7/2016) Wolfan Fabian - Incluir la parte de los intervalos
     */
    public function contarSegunCondiciones(ConsultaArgumentos $argumentos) {
        $this->db->from($this->tablaNombre);

        $valores = $argumentos->obtenerValoresCopia();
        foreach ($valores as $index => $valor) {
            $this->db->where($this->tablaNombre . "." . $index, $valor);
        }

        return $this->db->count_all_results();
    }

}