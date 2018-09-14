<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


define('ID_MARCA','idMarca');
define('ID_MODELO','idModelo');
define('ID_VEHICULO','idVehiculo');
define('ID_SERVICIO','idServicio');
define('ID_PIEZA','idPieza');





define('VEHICULO_MODELO','vehiculo');


define('MARCA_PSEUDO','marca');
define('MODELO_PSEUDO','modelo');
define('CLIENTE_PSEUDO','cliente');


// Definicion de constantes de manejo del Template (orden alfabetico)
define('TEMPLATE_CONTENIDO', 'contenido');
define('TEMPLATE_MEMBRESIA','templateMembresia');
define('TEMPLATE_MENSAJE_ADVERTENCIA','mensajeAdvertencia');
define('TEMPLATE_VALORES_DEFECTO','valoresDefecto');


// Modulos
define('CLIENTES_MODULO','Clt');
define('COLABORADORES_MODULO', 'Clb');
define('EYM_MODULO','Eym');
define('FUNDAMENTOS_MODULO','Fnd');
define('PRESTAMOS_MODULO','Prt');
define('SEGURIDAD_MODULO','Seg');


// Modelos
define('CLIENTE_MODELO','Cliente');
define('COLABORADOR_MODELO', 'Colaborador');
define('CUOTA_MODELO', 'Cuota');
define('EMPRESA_MODELO','Empresa');
define('MARCA_MODELO','Marca');
define('PERMISO_MODELO','Permiso');
define('PERMISO_ROL_MODELO','Permiso_Rol');
define('ROL_MODELO','Rol');
define('PERSONA_MODELO','Persona');
define('PERMISO_USUARIO_MODELO','Permiso_Usuario');
define('PRESTAMO_MODELO','Prestamo');
define('USUARIO_MODELO','Usuario');


// Claves principales en tablas
define('ID_CLIENTE','idCliente');
define('ID_ORDEN_TRABAJO','idOrdenTrabajo');
define('ID_COLABORADOR','idColaborador');
define('ID_CUOTA', 'idCuota');
define('ID_EMPRESA','idEmpresa');
define('ID_INTERES_TIPO','idTipoInteres');
define('ID_PERMISO','idPermiso');
define('ID_PERMISO_USUARIO','idPermisoUsuario');
define('ID_PERSONA','idPersona');
define('ID_PLAZO_TIPO','idTipoPlazo');
define('ID_PRESTAMO','idPrestamo');
define('ID_ROL','idRol');
define('ID_PERMISO_ROL','idPermisoRol');
define('ID_USUARIO','idUsuario');


// Campos de bd
define('APELLIDOS_CN','apellidos');
define('APODO_CN','apodo');
define('CLAVE_CN', 'clave');
define('CUOTAS_CANTIDAD_CN','cantidadCuotas');
define('CUOTAS_NONTO_CN','montoCuotas');
define('CODIGO_PERMISO_CN','codigoPermiso');
define('DESCRIPCION_ROL', 'descripcion');
define('DIRECCION_CN','direccion');
define('EMAIL_CN','email');
define('ESTADO_CN', 'estado');
define('FECHA','fecha');
define('FECHA_DESEMBOLSO_CN','fechaDesembolso');
define('FECHA_PRIMERA_CUOTA_CN','fechaPrimeraCuota');
define('FECHA_NACIMIENTO_CN','fechaNacimiento');
define('FECHA_NOMINAL_CN','fechaSolicitud');
define('HABILITADO_CN','habilitado');
define('PRESTAMO_MONTO_CN','monto');
define('NOMBRE_CN','nombre');
define('NOMBRES_CN','nombres');
define('NUMERO_CN','numero');
define('RNC_CN','rnc');
define('SEXO_CN','sexo');
define('TASA_INTERES_PERIODO_CN','tasaInteresPeriodo');
define('TELEFONO_CN','telefono');
define('TELEFONO_CONTACTO_CN','telefonoContacto');
define('TELEFONO_SECUNDARIO_CN','telefonoSecundario');
define('USERNAME_CN','username');


define('APELLIDO_CN','apellido');
define('CELULAR_CN','celular');

define('PLACA_CN','placa');


// Identidad de la aplicacion
define('APP_TITULO','Taller EYM');
define('APP_LOGO', 'favicon.jpg');


define('SERVICIO_MODELO','Servicio');
define('ORDEN_TRABAJO_MODELO','Orden_trabajo');

