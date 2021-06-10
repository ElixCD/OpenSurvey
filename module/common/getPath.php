<?php

$lng = explode('/', trim($_SERVER["REQUEST_URI"], '/'));

if (stristr($lng[count($lng) - 1], ".php")) {
    $module = strtolower($lng[count($lng) - 2]);    
} else {
    $module = strtolower($lng[count($lng) - 1]);
}

$moduleName = "";
$actionName = "";

switch ($module) {
    case 'dashboard':
        $moduleName = "Dashboard";
        break;
    case 'surveys':
        $moduleName = "Encuestas";
        break;
    case 'factors':
        $moduleName = "Factores";
        break;
    case 'rubrics':
        $moduleName = "Rúbricas";
        break;
    case 'questions':
        $moduleName = "Reactivos";
        break;
    case 'users':
        $moduleName = "Usuarios";
        break;
    case 'account':
        $moduleName = "Cuenta";
        break;
    case 'poll':
        $moduleName = "Encuestas";
        break;
    // case 'settings':
    //     $moduleName = "Configuración";
    //     break;
    default:
        break;
}

if ($module != 'dashboard') {
    $action = explode('.',strtolower($lng[count($lng) - 1]))[0];
    switch ($action) {
        case 'list':
            $actionName = "Listar";
            break;
        case 'detail':
            $actionName = "Detalle";
            break;
        case 'new':
            $actionName = "Nuevo";
            break;
        case 'edit':
            $actionName = "Editar";
            break;
        case 'delete':
            $actionName = "Eliminar";
            break;
        case 'response':
            $actionName = "Contestar";
            break;
        default:
            $actionName = "Index";
            break;
    }
}

// print_r($module);
