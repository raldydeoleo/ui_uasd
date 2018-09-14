<?php
/**
 * Created by PhpStorm.
 * User: dsanc
 * Date: 8/5/2016
 * Time: 7:07 AM
 */
class Permiso_Rol extends BS_Model {

    public function __construct() {
        parent::__construct();
        $this->tablaNombre = SEGURIDAD_MODULO . "_" . PERMISO_ROL_MODELO;
        $this->clavePrincipalNombre = ID_PERMISO_ROL;
    }


    /**
     * Vincula un conjunto de permisos a un rol desvinculando cualquiera que no este en el conjunto
     * @param array $rol - Rol al que se desea vincular los permisos
     * @param array $idPermisos - Arreglo con los ids de los permisos a asignar o permanecer vinculados
     */
    public function vincularRol(array $rol, array $idPermisos) {
        $permisosRegistrados = $this->leerTodosSegunCampo(ID_ROL, $rol[ID_ROL], ID_PERMISO);
        $permisosRestantes = $permisosRegistrados;

        // vinculacion o permanencia de los permisos pasados
        $predata = [];
        $predata[ID_ROL] = $rol[ID_ROL];
        foreach ($idPermisos as $idPermiso) {
            if (array_key_exists($idPermiso, $permisosRegistrados)) {
                $propio = $permisosRegistrados[$idPermiso];
                if (!$propio[HABILITADO_CN]) {
                    $predata[ID_PERMISO] = $idPermiso;
                    $predata[HABILITADO_CN] = true;
                    $this->actualizar($propio, $predata);
                }
                unset($permisosRestantes[$idPermiso]);

            } else {
                $predata[ID_PERMISO] = $idPermiso;
                $this->crear($predata);
            }
        }

        // desvincular los permisos restantes
        foreach ($permisosRestantes as $idPermiso => $propio) {
            $predata[ID_PERMISO] = $idPermiso;
            $predata[HABILITADO_CN] = false;
            $this->actualizar($propio, $predata);
        }
    }


    //SELECT seg_p.CODIGO_PERMISO from seg_permiso seg_p, seg_permiso_usuario seg_pu where seg_pu.id_permiso = seg_p.id_permiso and seg_pu.id_usuario = 1
    function crearConsulta(ConsultaArgumentos $argumentos) {
        $this->db->from($this->tablaNombre);
        $this->db->select($this->tablaNombre . ".*");

        // joins
        $tablaPermiso = SEGURIDAD_MODULO . "_" . PERMISO_MODELO;
        $this->db->join($tablaPermiso, $tablaPermiso . "." . ID_PERMISO . "=" . $this->tablaNombre . "." . ID_PERMISO);
        $this->db->select($tablaPermiso . "." . CODIGO_PERMISO_CN);

        if ($argumentos->existeEnValores(CODIGO_PERMISO_CN))
            $this->db->where($tablaPermiso . "." . CODIGO_PERMISO_CN, $argumentos->obtenerValor(CODIGO_PERMISO_CN));

        if ($argumentos->existeEnValores(ID_ROL))
            $this->db->where($this->tablaNombre . "." . ID_ROL, $argumentos->obtenerValor(ID_ROL));

        return $this->db->get();
    }
}