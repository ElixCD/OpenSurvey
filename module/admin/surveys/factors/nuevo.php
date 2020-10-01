<?php
$backRoot = '../../../../';
require $backRoot . 'vendor/autoload.php';
$id = $_GET['idSurvey'];
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
    include_once $backRoot . "module/admin/surveys/survey-nav.php";
    ?>
    <nav id="breadcrumb" aria-label="breadcrumb">
        <ol id="breadcrumb-list" class="breadcrumb">
            <li class="breadcrumb-item active">Encuestas</li>
        </ol>
    </nav>

    <header style="display:flex;justify-content: space-between;">
        <div class="col-8">
            <h1>Nuevo Factor</h1>
        </div>
    </header>
    <hr>

    <main id="main">
        <div class="col-12">

            <table class="table table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" id='description' placeholder="Descripción"></td>
                        <td><button class="btn btn-success" onclick="javascript:SaveFactor('new');">Guardar</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

<?php include_once $backRoot . "module/common/cdn-js.php"; ?>

</html>

<script>
    console.log(document.referrer);

    function SaveFactor(action) {
        // De esta forma se obtiene la instancia del objeto XMLHttpRequest
        if (window.XMLHttpRequest) {
            connection = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            connection = new ActiveXObject("Microsoft.XMLHTTP");
        }

        let d = document.getElementById('description').value;

        if (d != '') {
            // Preparando la función de respuesta
            connection.onreadystatechange = response;

            // Realizando la petición HTTP con método POST
            connection.open('POST', 'save-factor.php');
            connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            connection.send("action=" + action + "&idSurvey=" + <?php echo $id; ?> + "&d=" + d);

        } else {
            alert('La caja de texto no puede estar vacia.');
        }

    }

    function response() {
        if (connection.readyState == 4) {
            let obj = JSON.parse(connection.responseText);
            alert(obj.msj);
            if (obj.error == false)
                //window.history.back();
                location.href = document.referrer;

        }
    }
</script>