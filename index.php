<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';

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

