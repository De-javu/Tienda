<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'helpers/utils.php';
require_once 'config/parameters.php';

//CARGAR LAS VISTAS DE LA WEB 
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

    


function show_error()
{
    $error = new ErroController ();
    $error->index();   
}
// 2) Verificacion del parametros controller en la URL
if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
          $nombre_controlador = controller_default;
}else {
    show_error();
    exit();
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
}
// 3) Verificacion de la existencia de la clase controller 
if (isset($nombre_controlador) && class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();

    // 4)verificacion del parametro action en la URL, y si la clase controlador existe
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->$action_default();


} else {
        show_error();
    }
} else {
    show_error();

}

require_once 'views/layout/footer.php';

/*

session_start(); = La session se encarga de einviar informacion al por la url y los cokkis 
                   a las diferentes web que tengan session que esta se esta ejecuntando
                   lo que permiete que este logeado el usuario, es lo primero que debe ir
                   en el fichero 
require_once 'autoload.php'; = Indica que se incluira el fichero de auto carga de los controladores
require_once 'config/db.php'; = indica quie se incluira el fichero de la condiguracion 
require_once 'helpers/utils.php'; = Indica que se incluira los ficeros de ayuda que se utilicen en el proyecto
require_once 'config/parameters.php'; = Indica que se incluira el fichero de configuracio con parametros que nos ayudan a estanderizar y poner mas corta la url
require_once 'views/layout/header.php'; = Indica qu se incluira el fichero con la configuracion del heder
require_once 'views/layout/sidebar.php'; = Indica que se incluira el fichero de la barra lateral de registro
function show_error() = Funcion creada para instanciar la clase error de esta forma controlar los mensajes de erro
$ = Se utiliza para definir una variable
new = Es unmetodo que se utiiza para instanciar una clase yvulve la la clase en un objeto
-> = Es un apuntador que permiete acceder a los parametros que contiene actualmenete un elemento 
if = Se utiliza como condicional
isset = Se encarga de evaluar si una variable fue declara y si su valor es nulo
$_GET = ES un metodo de pasaar informacion por medio de la URL
elseif = ES ub condicional que permiete evaluar mas de una condicion 
! = Es un operador de negacion 
&& = Es un operador condicional se encarga de evaluar dos condiciones a la vez donde las dos
     se deben cumplir para que se ejecuete una accion dentro del progrma
else = Es un condicional que se activa al moemnto de que el if no se cumple 
show_error = funcion propia creada por el programador.
exit(); = Se utiliza para indicar que se saldra del fichero o de la ejecucion del codigo es lo mismo que el die
class_exists = Es una fucion que se utiliza para evaluar si una clase ya fue cargada
require_once 'views/layout/footer.php' = Indica que inlcuira el fichero de de la vista
                                         del pie de pagina.

NOTA: Este fichero es el encargado de realizar la conexion por medio de los includes,
     ya que por ser el index es el primer  archivo que se carga y es lo primero
     con lo que interactua el usuario se le conoce como controlador frontal tambien tiene la
     tarea de lograr hacer que las partes que las ruta se evaluae para asiganar los 
     controladores y metoods correspondientes o de lo contrario mostrar la alerta de erro
     .


*/