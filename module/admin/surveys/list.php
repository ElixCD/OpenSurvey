<?php
require '../../../vendor/autoload.php';
include_once "../../common/getPath.php";

use Sysurvey\Db;
use Models\Survey;

$Survey = new Survey(new Db());
$Surveys = $Survey->getSurveys(1);
$headers = ["Id", "Descripción"];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - <?php echo $moduleName; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <?php
    include_once "../../common/register-css.php";
    ?>
</head>

<body>
    <?php
    include_once "../admin-nav.php";
    include_once "../../common/header.php";
    ?>

    <main class="container">
        <div class="row">
            <div class="col-12 m-2">
                <a class="btn btn-primary" href="./new.php">Nueva encuesta</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Encuestas registradas</h4>
                        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark text-primary">
                                    <th class="text-center">
                                        ID
                                    </th>
                                    <th class="text-center">
                                        Name
                                    </th>
                                    <th class="text-center">
                                        Accion
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            1
                                        </td>
                                        <td>
                                            Dakota Rice sgserger tgj gdfgdf dfghdf
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <!-- <a href="#" class="btn btn-info btn-fab btn-fab-mini btn-link">
                                                        <span class="material-icons">pageview</span>
                                                    </a> -->
                                                <a class="btn btn-primary" href="./edit.php" title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger" title="Eliminar">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            2
                                        </td>
                                        <td>
                                            Minerva Hooper gh gdfdfgh ght retyer bghrtert
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <!-- <a href="#" class="btn btn-info btn-fab btn-fab-mini btn-link">
                                                        <span class="material-icons">pageview</span>
                                                    </a> -->
                                                <a class="btn btn-primary" href="./edit.php" title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger" title="Eliminar">
                                                    <i class="material-icons" >delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            3
                                        </td>
                                        <td>
                                            Sage Rodriguez
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-primary" href="./edit.php" title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger" title="Eliminar">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            4
                                        </td>
                                        <td>
                                            Philip Chaney
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-primary" href="./edit.php" title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger" title="Eliminar">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            5
                                        </td>
                                        <td>
                                            Doris Greene
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-primary" href="./edit.php" title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger" title="Eliminar">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            6
                                        </td>
                                        <td>
                                            Mason Porter
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn btn-primary" href="./edit.php" title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a class="btn btn-danger" title="Eliminar">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once "../../common/register-js.php";
    ?>

</body>

</html>