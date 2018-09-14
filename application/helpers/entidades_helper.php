<?php

/**
 * Evalua la igualdad de dos array en funcion a las claves del nuevo array
 * @param $viejo_array
 * @param $nuevo_array
 * @return bool
 */
function testearIgualdad($viejo_array, $nuevo_array)
{
    foreach ($nuevo_array as $key => $value) {
        if ($viejo_array[$key] != $value)
            return false;
    }
    return true;
}

function enfilar(array $datos_asociativos, $celdas_por_fila =3)
{
    $filas = [];
    $fila = [];
    $celdas_conteo = 0;

    foreach ($datos_asociativos as $idDato => $dato) {
        //$atributo[HABILITADO_CAMPO] = false;
        $celdas_conteo++;
        $fila[$idDato] = $dato;
        if ($celdas_conteo == $celdas_por_fila) {
            $filas[] = $fila;
            $celdas_conteo = 0;
            $fila = [];
        }
    }
    if ($celdas_conteo > 0)
        $filas[] = $fila;

    return $filas;
}



/**
 * Crea un subarreglo desde un arreglo base
 *
 * @author Wolfan Fabian
 * @version 0.0.3-ALPHA
 * @param array $arregloBase - Arreglo base desde el cual se desea extraer un subarreglo
 * @param array $indices - Indices o claves deseadas
 * @return array - Retorna el subarreglo deseado
 * @todo (23/7/2016) Wolfan Fabian - Consensuar nombre, uso y ubicacion (helper madre)
 */
function extrarSubArreglo(array $arregloBase, array $indices) {
    $subArreglo = [];
    foreach ($indices as $posicion => $index) {
        if (array_key_exists($index,$arregloBase)) {
            $subArreglo[$index] = $arregloBase[$index];
        }
    }
    return $subArreglo;
}

/**
 * Transforma una fecha en formato gregoriano (mm/dd/yyyy) a una objeto tipo fecha php
 *
 * @author Wolfan Fabian
 * @version 0.0.3-ALPHA
 * @param $fecha_mmddyyyy - Fecha en formato gregoriano
 * @return DateTime - Objeto transformado a fecha
 */
function transformarFecha ($fecha_mmddyyyy) {
    $partes = explode("/", $fecha_mmddyyyy);
    $resultado = new DateTime("{$partes[2]}-{$partes[0]}-{$partes[1]}");
    return $resultado;
}


function invocarNewsoftServicio($apiUrl) {
    return json_decode(file_get_contents( "http://rodox.brainsoft.com.do/newsoft_web_service/{$apiUrl}"),true);
    //todo: cuando se configure el base_url esto cambiara
}
