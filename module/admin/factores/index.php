<?php

use Sysurvey\Db;

$backRoot = '../../../';
require $backRoot . 'vendor/autoload.php';
$factor = new Sysurvey\Factor(new Db);
$factors = $factor->getFactors(1);
$headers = ["Id", "Descripción"]; // array_keys($factors[0]);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sysurvey - Admin</title>
    <?php include_once $backRoot . "module/common/cdn-css.php"; ?>
    <link rel="stylesheet" href="../../../public/css/estilos_base.css">

</head>

<body class="container">
    <?php
    include_once $backRoot . "module/admin/nav.php";
    ?>

    <header style="display:flex;justify-content: space-between;">
        <h3>Ver Factores</h3>
        <a class="btn btn-success" style="width:5em;" href="./nuevo.php">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
        </a>
    </header>

    <hr>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <?php foreach ($headers as $key => $value) : ?>
                    <th scope="col"><?php echo $value; ?></th>
                <?php endforeach ?>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($factors as $row) : ?>
                <tr>
                    <?php foreach ($row as $key => $value) : ?>
                        <td><?php echo $value; ?></td>
                    <?php endforeach ?>
                    <td><a href="./editar.php?idfactor=<?php echo $row['idfactor']; ?>">Editar</a> | Borrar</td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>
<?php include_once $backRoot . "module/common/cdn-js.php"; ?>

</html>