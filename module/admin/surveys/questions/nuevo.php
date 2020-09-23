<?php

use Sysurvey\DB;

$backRoot = '../../../../';
require $backRoot . 'vendor/autoload.php';
$headers = ["Id", "Descripción", "Factor"];

$id = $_GET['idSurvey'];

$factores = new Models\Factor(new Db());
$listaFactores = $factores->getFactors($id, 1);

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
        <h3>Nueva pregunta</h3>
    </header>

    <hr>

    <table class="table table-sm">
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
                <td><input type="text" id='description' placeholder="Descripción"></td>
                <td>
                    <select id='description' placeholder="Descripción">
                        <option> -- Seleccione un factor -- </option>
                        <?php foreach ($listaFactores as $key => $factor) : ?>
                            <option value="<?php echo $key; ?>"><?php echo $factor; ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <button class="btn btn-success" onclick="javascript:SaveFactor('new');">Guardar</button>
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
        let f = document.getElementById('factor').value;

        // Preparando la función de respuesta
        connection.onreadystatechange = response;

        // Realizando la petición HTTP con método POST
        connection.open('POST', 'save-question.php');
        connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        connection.send("action=" + action + "&d=" + d + "&f=" + f);

    }

    function response() {
        if (connection.readyState == 4) {
            let obj = JSON.parse(connection.responseText);
            alert(obj.msj);
            if (obj.error == false)
                location.href = "/module/admin/surveys/factors/";

        }
    }
</script>