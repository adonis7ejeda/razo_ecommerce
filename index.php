<?php

session_start();

/*CONTROLADOR FRONTAL: SE ENCARGARA DE RECOGER PARAMETROS GET POR LA URL Y VER A QUE CONTROLADOR PERTENECEN, CARGAR EL OBJETO Y LUEGO LLAMAR AL METODO CORRESPONDIENTE QUE TAMBIEN LLEGARA POR LA URL*/


//Se carga el autoload para tener acceso a todos los objetos de todos los controladores, a todas las clases 
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';


error_reporting(0);

function show_error()
{
    $error = new ErrorController();
    $error->index();
}


//Se comprueba si llega el controlador por la URL
if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
} else if (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = controller_default;
} else {
    show_error();
    exit();
}

//Se comprueba si existe la clase 
if (class_exists($nombre_controlador)) {
    // Si existe la clase se crea el objeto
    $controlador = new $nombre_controlador();

    //Se comprueba si llega la accion y de que el metodo exista en el controlador 
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } else if (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controlador->$action_default();
    } else {
        show_error();
    }
} else {
    show_error();
}

require_once 'views/layout/footer.php';
