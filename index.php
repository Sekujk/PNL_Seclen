<?php

session_start();


require_once 'config/config.php';


require_once 'models/Database.php';
require_once 'models/Denuncia.php';


require_once 'controllers/DenunciaController.php';
require_once 'controllers/DashboardController.php';


function view($view, $data = []) {

    extract($data);
    

    require_once 'views/layouts/main.php';
}

function redirect($url) {
    header('Location: ' . URL_ROOT . '/' . $url);
    exit();
}

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'dashboard';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch($controller) {
    case 'denuncias':
        $controller = new DenunciaController();
        break;
    case 'dashboard':
        $controller = new DashboardController();
        break;
    default:
        $controller = new DashboardController();
        break;
}

if(method_exists($controller, $action)) {
    $controller->$action();
} else {
    $controller->index();
}
?> 