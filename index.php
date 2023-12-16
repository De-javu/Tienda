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
// 2) Verificacion del parametros conroller en la URL
if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';

}elseif(!isset($_GET['controller']) && isset($_GET['action'])){
          $nombre_controlador = controller_default;
}else {
    show_error();
    exit();
}

// 3) Verificacion de la existencia de la clase controller 
if (isset($nombre_controlador) && class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();

    // 4)verificacion del parametro action en la URL, y si la clase controlador existe
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
}elseif(!isset($_GET['controller']) && isset($_GET['action'])){
        $action_default = action_defaul;
        $controlador->action_default();


} else {
        show_error();
    }
} else {
    show_error();

}

require_once 'views/layout/footer.php';

/*

session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'helpers/utils.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';
function show_error()
$ = Se utiliza para definir una variable
new = Es unmetodo que se utiiza para instanciar una calse vulve la laclase en un objeto
-> = Es un apuntador que permiete acceder a los parametros que contiene actualmenete un elemento 
if = Se utiliza como condicional
isset = Se encarga de evaluar si una variable fue declara y si su valor es nulo
$_GET = ES un metodo de pasaar informacion por medio de la URL
elseif
! = Es un operador de negacion 
&& = Es un operador condicional se encarga de evaluar dos condiciones a la vez donde las dos
     se deben cumplir para que se ejecuete una accion dentro del progrma
else = Es un condicional que se activa al moemnto de que el if no se cumple 
show_error
exit();
class_existsexiste
require_once 'views/layout/footer.php';


*/