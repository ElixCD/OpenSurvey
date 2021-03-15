<?php
// echo $_SERVER["REQUEST_URI"];
$lng = explode('/', trim($_SERVER["REQUEST_URI"], '/'));
// print_r($lng);

if (count($lng) > 3)
    $module = strtolower($lng[3]);
else
    $module = strtolower($lng[2]);


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
    default:
        break;
}

if ($module != 'dashboard') {

    $action = (count($lng) > 4) ? strtolower(str_ireplace(".php", "", $lng[4])) : "";

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
            $actionName = "";
            break;
    }
}

// print_r($module);
