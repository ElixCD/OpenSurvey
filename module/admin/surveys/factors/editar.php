<?php

use Sysurvey\Db;

$backRoot = '../../../../';
require $backRoot . 'vendor/autoload.php';

$id = $_GET['idfactor'];
$factor = new Models\Factor(new Db());
$currentFactor = $factor->getFactor($id);
$headers = ["Id", "Descripción"];
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

<body class="container">
    <?php
    include_once $backRoot . "module/admin/surveys/survey-nav.php";
    ?>

    <header style="display:flex;justify-content: space-between;">
        <h3>Editar Factor</h3>
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
                <td><?php echo $currentFactor['idfactor']; ?></td>
                <td><input type="text" id='description' placeholder="Descripción" value="<?php echo $currentFactor['description']; ?>"></td>
                <td><button onclick="javascript:SaveFactor('update');">Guardar</button></td>
            </tr>
        </tbody>
    </table>
</body>
<?php include_once $backRoot . "module/common/cdn-js.php"; ?>

</html>

<script>
    function SaveFactor(action) {
        // De esta forma se obtiene la instancia del objeto XMLHttpRequest
        if (window.XMLHttpRequest) {
            connection = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            connection = new ActiveXObject("Microsoft.XMLHTTP");
        }

        let d = document.getElementById('description').value;
        let id = <?php echo $id; ?>;

        // Preparando la función de respuesta
        connection.onreadystatechange = response;

        // Realizando la petición HTTP con método POST
        connection.open('POST', 'save-factor.php');
        connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        connection.send("action=" + action + "&idfactor=" + id + "&d=" + d);
    }

    function response() {
        if (connection.readyState == 4) {
            let obj = JSON.parse(connection.responseText);
            alert(obj.msj);
            if(obj.error == false)
                location.href="/module/admin/surveys/factors/";
        }
    }
</script>