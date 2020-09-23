<?php
$backRoot = '../../../';
require $backRoot . 'vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sysurvey - Admin</title>
    <?php include_once $backRoot . "module/common/cdn-css.php"; ?>

</head>

<body class="container-fluid">
    <?php
    include_once $backRoot . "module/admin/surveys/survey-nav.php";
    ?>

    <nav id="breadcrumb" aria-label="breadcrumb">
        <ol id="breadcrumb-list" class="breadcrumb">
            <li class="breadcrumb-item active">Encuestas</li>
        </ol>
    </nav>

    <header style="display:flex;justify-content: space-between;">
        <div class="col-8">
            <h3>Ver Encuestas</h3>
        </div>
        <div class="col-4">
            <a class="btn btn-success" onclick="ViewLoad('Nuevo');Breadcrumb('Nuevo');">Nuevo</a>
        </div>
    </header>

    <hr>

    <main id="main">

    </main>
</body>
<?php include_once $backRoot . "module/common/cdn-js.php"; ?>

</html>

<script>
    ViewLoad('listar');

    function Breadcrumb(action) {
        let cont = document.getElementById('breadcrumb-list');
        let contains = false;

        if (action == 'listar' || action == '') {
            cont.innerHTML = '<li class="breadcrumb-item">Encuestas</li>';
        } else {
            cont.innerHTML = '<li class="breadcrumb-item"><a onclick="ViewLoad(\'Index\');">Encuestas</a></li><li class="breadcrumb-item active">' + action + '</li>';
        }
    }

    function SaveFactor(action) {
        if (window.XMLHttpRequest) {
            connection = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            connection = new ActiveXObject("Microsoft.XMLHTTP");
        }

        let d = document.getElementById('description').value;

        connection.onreadystatechange = Redirection;

        connection.open('POST', 'save-surveys.php');
        connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        connection.send("action=" + action + "&d=" + d);
    }

    function Redirection() {
        if (connection.readyState == 4) {
            let obj = JSON.parse(connection.responseText);
            alert(obj.msj);
            if (obj.error == false) {
                Breadcrumb('listar');
                ViewLoad('listar');
            }
        }
    }

    function EnableEdition(e) {
        let text = e.firstChild;
        let element = document.getElementById('description');
        text.data = text.data == "Editar" ? "Guardar" : "Editar";
        element.disabled = !element.disabled;
    }
</script>