<?php

use Sysurvey\Db;

$backRoot = '../../../';
require $backRoot . 'vendor/autoload.php';

$factor = new Sysurvey\Factor(new Db);

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
        <h3>Editar Factores</h3>
    </header>

    <hr>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <?php foreach ($headers as $key => $value) : ?>
                    <th scope="col"><?php echo $value; ?></th>
                <?php endforeach ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td><input type="text" id='descripcion' placeholder="Descripción"></td>
                <td><button onclick="javascript:SaveFactor('new');">Guardar</button></td>
            </tr>
        </tbody>
    </table>
</body>

<?php include_once $backRoot . "module/common/cdn-js.php"; ?>

</html>

<script>
    function SaveFactor(accion) {
        // De esta forma se obtiene la instancia del objeto XMLHttpRequest
        if (window.XMLHttpRequest) {
            connection = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            connection = new ActiveXObject("Microsoft.XMLHTTP");
        }

        let d = document.getElementById('descripcion').value;

        // Preparando la función de respuesta
        connection.onreadystatechange = response;

        // Realizando la petición HTTP con método POST
        connection.open('POST', 'save-factor.php');
        connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        connection.send("accion=" + accion + "&d=" + d);

    }

    function response() {
        if (connection.readyState == 4) {
            let obj = JSON.parse(connection.responseText);
            alert(obj.msj);
            if(obj.error == false)
                location.href="/module/admin/factores/";

        }
    }
</script>