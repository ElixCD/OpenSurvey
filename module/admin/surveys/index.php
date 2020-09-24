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
            <h1>Encuestas</h1>
        </div>
        <div class="col-4" id="new-survey">
            <a class="btn btn-success" onclick="ViewLoad('Nuevo');Breadcrumb('Encuestas','Nuevo');">Nuevo</a>
        </div>
    </header>

    <hr>

    <main id="main"></main>
</body>
<?php include_once $backRoot . "module/common/cdn-js.php"; ?>

</html>

<script>
    let actionCookie = getCookie('vista');
    ViewLoad(actionCookie);
    Breadcrumb('Encuestas',actionCookie);

    function setCookieAction(action){
        document.cookie = "vista="+action;
    }

    function Breadcrumb(index, action) {
        let cont = document.getElementById('breadcrumb-list');
        let contains = false;
        let newSurvey = document.getElementById('new-survey');


        setCookieAction(action);
        if (action == 'listar' || action == undefined  || action == 'undefined' || action == '' ) {
            cont.innerHTML = '<li class="breadcrumb-item">'+index+'</li>';
            newSurvey.style.display='block';
        } else {
            cont.innerHTML = '<li class="breadcrumb-item alert-link"><a onclick="setCookieAction();" href="/module/admin/surveys">'+index+'</a></li><li class="breadcrumb-item active">' + action + '</li>';
            newSurvey.style.display = 'none';
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