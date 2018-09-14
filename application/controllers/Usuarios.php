<?php

/**
 * Define la clase para trabajar con el CRUD de la entidad Usuario
 * @author Raldy de Jesus De Oleo, Matricula 94-3032, fecha 30/07/2018. Cel 829-852-4534
 * @version 0.0.3-ALPHA
 * @property CI_Input $input - Singleton para manejar las entradas de formularios html
 * @property CI_Session session - Singleton para manejar las sesiones
 * @property array $vistaData - Array para contener la data a pasar a la vista a mostrar
 */
class Usuarios extends BS_Controller {

        public function __construct() {
        parent::__construct(false);
            $this->load->helper(array('url','html','form' ));
            $this->cargarLibrerias();
            $this->load->model('usuario_model');
    }


    /**
     * Carga todos los modelos necesarios
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     */
    protected function cargarModelos(){
        // Modulo Seguridad
        //$this->load->model(USUARIO_MODELO);
        //$this->load->model(PERMISO_USUARIO_MODELO);
        // Modulo Fundamentos
        //$this->load->model(EMPRESA_MODELO);
        //$this->load->model(PERSONA_MODELO);


    }

    /**
     * Carga Vista para crear un usuario
     * @author Raldy De Oleo
     * Vista individual
     * @version 0.0.3-ALPHA
     */
    public function nuevo_usuario(){
        $this->mostrarVista('usuarios/crearUsuario');
    }


    /**
     * Crea un usuario nuevo.
     * @author Raldy De Oleo
     * @version 0.0.3-ALPHA
     */
    function insertar_usuario()
    {

        if($this->input->post('submit'))
        {   $nombre_usuario = $this->input->post('nombre_usuario');
            $clave_usuario = $this->input->post('clave_usuario');
            $email_usuario = $this->input->post('email_usuario');



            $nueva_insercion = $this->usuario_model->nuevo_usuario(

                $nombre_usuario,
                $clave_usuario,
                $email_usuario

            );
            //redirect(base_url("usuarios/listaUsuarios"), "refresh");
        }

        else
        {

        }
    }

    /**
     * Carga Vista para mostrar la lista de todos los usuarios
     * @author Raldy De Oleo
     * Vista grupal
     * @version 0.0.3-ALPHA
     */
    public function listaUsuarios(){
        $this->load->model('usuario_model');
        $usuarios = $this->usuario_model->obtener_todos();
        $this->asignarDatosVista('usuarios',$usuarios);
        $this->mostrarVista('usuarios/listaUsuarios');
    }


    public function signup(){
        //$this->load->model('usuario_model');
        //$usuarios = $this->usuario_model->insertar_usuario();
        //$this->asignarDatosVista('usuarios',$usuarios);
        $this->load->view('usuarios/signup');
    }


    /**
     * @author: Raldy De Oleo
     * Vista de los datos de  un Usuario.
     * Vista Individual
     *
     */
    public function verUsuario($id){
        $data = array();
        $this->load->model('usuario_model');
        if($id){
            $usuario = $this->usuario_model->obtener_usuario_por_id($id);
            $data['id_usuario'] = $usuario->id_usuario;
            $data['nombre_usuario'] = $usuario->nombre_usuario;
            $data['clave_usuario'] = $usuario->clave_usuario;
            $data['email_usuario'] = $usuario->email_usuario;

        }else{

            $data['nombre_usuario'] = null;
            $data['clave_usuario'] = null;
            $data['email_usuario'] = null;

        }
        //$this->load->view('citas/verEmpleado', $data);


        $this->asignarDatosVista('usuario', $usuario);
        $this->mostrarVista('usuarios/verUsuario');
    }


    /**
     * Carga todas las librerias necesarias
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     */
    private function cargarLibrerias() {

    }


    /**
     * Metodo base para mostrar el login como vista inicial
     * @author Diego Sanchez
     * @version 0.0.3-ALPHA
     */
    public function index() {
        $this->showLogin();
    }


    /**
     * Identifica un usuario segun sus credenciales para dar paso a las funcionalidades del sistema
     * @author Diego Sanchez
     * @version 0.0.3-ALPHA
     */
    public function login() {
        if (!$_POST) return !$this->showLogin();



        $nombre_usuario = $this->input->post('nombre_usuario');
        if (!$nombre_usuario) return !$this->showLogin();


        if ($_POST) {

            $clave_usuario = $this->input->post('clave_usuario');
            if (!$clave_usuario) return !$this->showLogin();


            $clave = $this->usuario_model->obtener_usuario_por_clave($clave_usuario);    //return !$this->showLogin();

            if(!$clave) return !$this->showLogin();
        }



            redirect(base_url('dashboards/mostrar'));
            return true;
        }

        //$usuario = $this->usuario_model->obtener_usuario_por_clave($clave_usuario);


        //$this->session->set_userdata(USERNAME_CN, $usuario[USERNAME_CN]);
        //$this->session->set_userdata(TEMPLATE_MEMBRESIA, 'VALOR DE PRUEBA');

        //redirect(base_url('dashboards/mostrar'));
        //return true;




    /**
     * Auxiliar para mostrar el login
     * @author Wolfan Fabian
     * @version 0.0.3-ALPHA
     * @return bool - Retorna true siempre
     */
    private function showLogin(){
        $this->load->view('usuarios/login');
        return true;
    }


    /**
     * Metodo para destruir la data en session y salir del sistema
     * @author Diego Sanchez
     * @version 0.0.3-ALPHA
     * @return bool - Retorna true
     */
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('usuarios/login'));
        return true;
    }

    /**
     * Muestra los datos del usuario o de los usuarios
     * @author Diego Sanchez
     * @version 0.0.3-ALPHA
     * @param int $idUsuario - Id del usuario que se desea mostrar, cero para mostrarlo todos
     */
    public function mostrar($idUsuario =0){
        if ($idUsuario!=0) {
            $this->mostrarUno($idUsuario);
        }else{
            $this->mostrarVarios();
        }
    }

    /**
     * Muestra los datos de un usuario en especifico
     * @author Diego Sanchez
     * @version 0.0.3-ALPHA
     * @param $idUsuario - Id del usuario que se desea mostrar
     */
    private function mostrarUno($idUsuario){
        $usuario = $this->Usuario->leerPrimeroSegunCampo(ID_USUARIO, $idUsuario);
        $this->asignarDatosVista('usuario', $usuario);
        $this->mostrarVista('usuarios/mostrarUno');
    }


    /**
     * Muestra los datos de todos los usuarios
     * @author Diego Sanchez
     * @version 0.0.3-ALPHA
     */
    private function mostrarVarios() {
        $usuarios = $this->Usuario->leerTodos();
        $this->asignarDatosVista('usuarios', $usuarios);
        $this->mostrarVista('usuarios/mostrarVarios');
    }

    /**
     * Determina si se mostrara el formulario html para el pedido de los datos
     * @author Diego Sanchez
     * @version 0.0.3-ALPHA
     * @param $usuario - Objeto principal que se está intentando editar
     * @return bool - Retorna true si se va a mostrar el formulario, false en caso contrario
     */
    private function determinarMostrarFormulario($usuario) {
        if (!$_POST) {
            $mostrarFormulario = true;
        } else {
            if (!$this->validarFormulario()) $mostrarFormulario = true;
            else $mostrarFormulario = false;
        }


        if ($mostrarFormulario) {
            $this->asignarDatosVista('usuario', $usuario);
            return $this->mostrarVista('usuarios/editar');
        }

        return false;
    }


    /**
     * Escribe los datos correspondiente al objeto principal determinando si se trata de crear o de actualizar
     * @author Diego Sanchez
     * @version 0.0.3-ALPHA
     * @param array $usuario - Objeto principal sobre el cual se desean escribir los cambios
     * @param array $formularioData - Datos principales provenientes del formulario html
     * @return array|null - Retorna el objeto principal actualizado
     */
    private function escribirCambiosPrincipales($usuario, $formularioData) {
        $personaData = extrarSubArreglo($formularioData, array(
            NOMBRES_CN, APELLIDOS_CN, SEXO_CN, FECHA_NACIMIENTO_CN, TELEFONO_CONTACTO_CN, TELEFONO_SECUNDARIO_CN,
            EMAIL_CN
        ));

        $usuarioData = extrarSubArreglo($formularioData, array(
            USERNAME_CN, CLAVE_CN, ESTADO_CN
        ));

        $clave = $usuarioData[CLAVE_CN];
        $usuarioData[CLAVE_CN] = hash('sha512', $clave);

        if (isset($usuario)) {
            if (!verificarIgualdad($usuario, $personaData)) {
                $this->Persona->actualizar($usuario, $personaData);

                if (!verificarIgualdad($usuario, $usuarioData)) {
                    $usuario = $this->Usuario->actualizar($usuario, $usuarioData);
                }else{
                    $usuario = $this->Usuario->leerPrimeroSegunClavePrincipal($usuario[ID_USUARIO]);
                }

            } else {
                $usuario = $this->Usuario->actualizar($usuario, $usuarioData);
            }

        } else {

            // completar el registro de la persona
            $personaData[FECHA_NACIMIENTO_CN] = date(FECHA_FORMATO, mktime(0, 0, 0, 8, 18, 1984));
            $personaData[HABILITADO_CN] = true;
            $persona = $this->Persona->crear($personaData);


            // completar el registro del usuario
            $usuarioData[ID_PERSONA] = $persona[ID_PERSONA];
            $usuarioData[HABILITADO_CN] = true;
            $usuario = $this->Usuario->crear($usuarioData);
        }

        return $usuario;
    }


    /**
     * Crear y correo el conjunto de validaciones a realizar al formulario
     *
     * @author Diego Sanchez
     * @version 0.0.3-ALPHA
     * @return bool - Retorna true si el formulario pasa la validacion, false si no
     */
    private function validarFormulario() {
        $rules=array();


        $rule['field'] = NOMBRES_CN;
        $rule['label'] = NOMBRES_CN;
        $rule['rules'] = 'required';
        $rules[] = $rule;


        $rule['field'] = APELLIDOS_CN;
        $rule['label'] = APELLIDOS_CN;
        $rule['rules'] = 'required';
        $rules[] = $rule;


        //$rule['field'] = FECHA_NACIMIENTO_CN;
        //$rule['label'] = FECHA_NACIMIENTO_CN;
        //$rule['rules'] = 'required';
        //$rules[] = $rule;


        $rule['field'] = TELEFONO_CONTACTO_CN;
        $rule['label'] = TELEFONO_CONTACTO_CN;
        $rule['rules'] = 'required';
        $rules[] = $rule;


        //$rule['field'] = TELEFONO_SECUNDARIO_CN;
        //$rule['label'] = TELEFONO_SECUNDARIO_CN;
        //$rule['rules'] = 'required';
        //$rules[] = $rule;


        $rule['field'] = EMAIL_CN;
        $rule['label'] = EMAIL_CN;
        $rule['rules'] = 'required';
        $rules[] = $rule;


        $rule['field'] = SEXO_CN;
        $rule['label'] = SEXO_CN;
        $rule['rules'] = 'required';
        $rules[] = $rule;

        $rule['field'] = USERNAME_CN;
        $rule['label'] = USERNAME_CN;
        $rule['rules'] = 'required';
        $rules[] = $rule;


        $rule['field'] = CLAVE_CN;
        $rule['label'] = CLAVE_CN;
        $rule['rules'] = 'required';
        $rules[] = $rule;

        $rule['field'] = ESTADO_CN;
        $rule['label'] = ESTADO_CN;
        $rule['rules'] = 'required';
        $rules[] = $rule;

        $this->form_validation->set_rules($rules);
        return $this->form_validation->run();
    }
}