<?php

use Sysurvey\Db;

$backRoot = '../../../../';
require $backRoot . 'vendor/autoload.php';

$id = 2; // $_GET['idSurvey'];
$survey = new Models\Survey(new Db());
$currentSurvey = $survey->getSurvey($id);

$factor = new Models\Factor(new Db);
$factors = $factor->getFactors($id, 1);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sysurvey - Admin</title>
    <?php include_once $backRoot . "module/common/cdn-css.php"; ?>
    <link rel="stylesheet" href="../../../../public/css/estilos_base.css">

</head>

<body class="container-fluid">

    <?php
    // include_once $backRoot . "module/admin/nav.php";
    include_once $backRoot . "module/admin/surveys/survey-nav.php";
    ?>

    <nav id="breadcrumb" aria-label="breadcrumb">
        <ol id="breadcrumb-list" class="breadcrumb">
            <li class="breadcrumb-item active">Encuestas</li>
        </ol>
    </nav>

    <header style="display:flex;justify-content: space-between;">
        <div class="col-8">
            <h3>Ver Factores</h3>
        </div>
        <div class="col-4" id="new-survey">
            <?php if ($factors !== false) : ?>
                <a class="btn btn-success" style="width:5em;" href="./nuevo.php">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                </a>
            <?php endif ?>
        </div>
    </header>
    <hr>

    <main id="main ">
        <div class="col-12">
            <?php if ($factors !== false) : ?>
                <?php if (count($factors) > 0) : ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($factors as $row) : ?>
                                <tr>
                                    <td><?php echo $row['idfactor']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><a href="./editar.php?idfactor=<?php echo $row['idfactor']; ?>">Editar</a> | Borrar</td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>No se encontrarón datos</p>
                <?php endif ?>
            <?php else : ?>
                <p>No se encontro la tabla</p>
            <?php endif ?>
        </div>
    </main>

</body>

<?php include_once $backRoot . "module/common/cdn-js.php"; ?>

</html>