<?php


/**
 * Extension del clase CI_Controller con funcionalidad extra para Brainsoft
 *
 * @abstract
 * @author Wolfan Fabian
 * @version 0.0.3-ALPHA
 * @property Usuario $Usuario - Propiedad para trabajar con los usuarios
 * @property Cliente $Cliente - Propiedad para trabajar con los clientes
 * @property Permiso $Permiso - Propiedad para verificar los permisos del sistema
 * @property Rol $Rol - Propiedad para trabajar con los roles
 * @property Permiso_Rol $Permiso_Rol -
 * @property Permiso_Usuario $Permiso_Usuario - Propiedad para verificar los permisos del usuario identificado
 * @property Persona $Persona - Propiedad para trabajar con las personas
 * @property Colaborador $Colaborador - Propiedad para trabajar con los colaboradores
 * @property CI_Session session
 * @property CI_Input $input
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Pagination $pagination
 * @property CI_Upload $upload
 * @property CI_Email $email
 * @property string $notificacion
 * @property array $vistaData
 * @property array $valoresDefecto
 *
 */
class BS_Controller extends CI_Controller {


    /**
     * Inicializa el objeto
     * @param bool $confirmarSession
    */
    public function __construct($confirmarSession=true) {
        parent::__construct();


        // Confirmacion de sesion correctamente iniciada
        if ($confirmarSession) {
            if (!$this->session->has_userdata(TEMPLATE_MEMBRESIA)) {
                log_message('DEBUG', '-->PASO POR AQUI');
                log_message('DEBUG', json_encode($this->session));
                //redirect('usuarios/login');
                //return;
            }
        }

        // Librerias, modelos y variables necesarias
        $this->cargarLibrerias();
        $this->cargarModelos();
        $this->valoresDefecto = array();
        $this->notificacion = '';

        $this->form_validation->set_error_delimiters('<label for="name" class="error">', '</label>');

    }


    /**
     * Carga todas las librerias necesarias
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     */
    private function cargarLibrerias() {
        $this->load->library('ConsultaArgumentos');
        //$this->load->library('brainsoft/DivisionExpresada');
    }


    /**
     * Carga todos los modelos necesarios
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @todo (17/7/2016) Wolfan Fabian - Verificar si se utilizar� la membresia
     */
    protected function cargarModelos() {

    }


    /**
     * Obtiene la membresia del usuario identificado
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @return array|mixed - Retorna un arreglo con los datos de la membresia
     */
    protected function obtenerMembresiaSesion() {
        return $this->session->userdata(TEMPLATE_MEMBRESIA);
    }


    /**
     * Asigna una variable con un valor defecto para los fines de ser pasado a la vista
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param $index - Nombre de identificacion de la variable en la vista.
     * @param $valor - Valor que la variable tendr� en la vista.
     */
    public function asignarValorDefecto($index, $valor) {
        $this->valoresDefecto[$index] = $valor;
    }


    /**
     * Asigna un valor para una variable a ser pasada a la vista
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param string $index - Nombre de la variable en la vista.
     * @param $valor - Valor que tendr� la variable en la vista.
     */
    public function asignarDatosVista($index, $valor) {
        $this->vistaData[$index] = $valor;
    }


    /**
     * Carga y muestra una vista especificada.
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param $vista - Ruta relativa de la vista a mostrar
     * @return bool - Retorna true.
     */
    public function  mostrarVista($vista) {

        $this->vistaData[TEMPLATE_VALORES_DEFECTO] = $this->valoresDefecto;
        $this->vistaData[TEMPLATE_MEMBRESIA] = $this->obtenerMembresiaSesion();
        // Transformacioni de la vista al contenido del template
        $templateData[TEMPLATE_CONTENIDO] = $this->load->view($vista, $this->vistaData, true);
        $this->load->view('templates/backend', $templateData);
        return true;
    }


    /**
     * Carga y muestra una vista mostrando una advertencia de error
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param string $mensaje - Mensaje a mostrarse como advertencia.
     * @param string $enlace - Enlace a redirigir desde la vista
     * @return bool - Retorna false.
     * @todo (17/07/2016) Wolfan Fabian - Este metodo debe ser redise�ado en consenso
     */
    public function mostrarAdvertencia($mensaje = "Hubo alg�n error.", $enlace = 'usuarios/workpage') {
        //$this->set_breadcumb('Advertencia');
        $adevertencia = $mensaje . "<br> <a href='$enlace'> Clic aqu� para redireccionamiento. </a> ";
        $this->asignarDatosVista(TEMPLATE_MENSAJE_ADVERTENCIA, $adevertencia);
        $this->asignarDatosVista(TEMPLATE_MEMBRESIA, $this->obtenerMembresiaSesion());
        $this->mostrarVista('templates/advertencia');
        return false;
    }


    /**
     * Extraer el conjunto de variables de POST de un formulario posteado
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param array $camposNombres - Nombres de los campos a extraer del formulario
     * @return array - Retorna un array asociativo con los datos segun los nombres especificados
     */
    protected function obtenerDatosFormulario(array $camposNombres) {
        $objetoData = array();
        foreach ($camposNombres as $camposNombre)
            $objetoData[$camposNombre] = $this->input->post($camposNombre);
        return $objetoData;
    }


    /**
     * Verifica si el usuario identificado tiene un permiso en especifico
     *
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @param string $codigoPermiso - Codigo del permiso que se quiere verificar
     * @return string - Retorna EMPTY si el permiso esta asignado, un mensaje de error en caso contrario
     */
    protected function bloqueoAcceso($codigoPermiso) {
        $membresia = $this->obtenerMembresiaSesion();
        if (!$membresia) return 'No hay session correctamente iniciada. ';

        $argumentos = new ConsultaArgumentos();
        $argumentos->asignarValor(CODIGO_PERMISO_CN, $codigoPermiso);
        //$argumentos->asignarValor(ID_USUARIO, [$membresia[ID_USUARIO]]);
        $permiso = $this->Permiso_Usuario->leerPrimero($argumentos);

        if ($permiso) return '';
        else return 'Usted no cumple con el perfil necesario para ejecutar esta acci�n.';
    }
}