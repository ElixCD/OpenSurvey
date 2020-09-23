<?php

use Sysurvey\Db;

$backRoot = '../../../';
require $backRoot . 'vendor/autoload.php';

$id = $_GET['idSurvey'];
$survey = new Models\Survey(new Db());
$currentSurvey = $survey->getSurvey($id);
// $headers = ["Id", "Descripción"];

$factores = new Models\Factor(new Db());
$listaFactores = $factores->getFactors($id, 1);

// $question = new Models\Question(new Db());
// $questions = $question->getQuestions($id);
// $headersQuestions = ["Id", "Descripción"];
?>

<!-- <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sysurvey - Admin</title>
    <?php //include_once $backRoot . "module/common/cdn-css.php"; ?>
    <link rel="stylesheet" href="../../../public/css/estilos_base.css">

</head>

<body class="container-fluid"> -->

    <?php
    //include_once $backRoot . "module/admin/surveys/survey-nav.php";
    ?>
    <!-- <main class="row"> -->
        <div class="col-12">
            <h3>Editar Encuesta</h3>
        </div>

        <hr>

        <div class="col-12">
            <h4>Texto</h4>
            <table class="table table-bordered table-striped ">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $currentSurvey['idsurvey']; ?></td>
                        <td><input type="text" id='description' placeholder="Descripción" value="<?php echo $currentSurvey['name']; ?>" disabled></td>
                        <td><button class="btn btn-primary" onclick="EnableEdition(this);">Editar</button></td>
                </tbody>
            </table>
        </div>

        <div class="col-12">
            <h4>Factores: </h4>
            <div>
                <?php if ($listaFactores !== false) : ?>
                    <div class="row">
                    <div class="col-sm-1">
                            <span>Factores: </span>
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control" id='description'>
                                <option> -- Seleccione un factor -- </option>
                                <?php foreach ($listaFactores as $key => $factor) : ?>
                                    <option value="<?php echo $factor['idfactor']; ?>"><?php echo $factor['description']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-sm-8">
                            <a class="btn btn-success" href="./factors/nuevo.php?idSurvey=<?php echo $id; ?>">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                        

                <?php endif ?>
            </div>
            <hr>

            <?php if ($listaFactores !== false) : ?>
                <?php if (count($listaFactores) > 0) : ?>
                    <div id="accordion">
                        <?php foreach ($listaFactores as $row) : ?>
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" onclick="LoadQuestions();" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <?php echo $row['description'] ?>
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>

                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Factor</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listaFactores as $row) : ?>
                                <tr>
                                    <?php foreach ($row as $key => $value) : ?>
                                        <?php if ($key == 'description') : ?>
                                            <td><?php echo $value; ?></td>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                    <td><a href="./editar.php?idSurvey=<?php //echo $row['idquestions']; 
                                                                        ?>">Editar</a> | Borrar </td>
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

            <button class="btn btn-success" onclick="javascript:SaveSurvey('update');">Guardar</button>

    <!-- </main> -->

<!-- </body> -->
<?php //include_once $backRoot . "module/common/cdn-js.php"; ?>

<!-- </html> -->

<script>
    function SaveSurvey(action) {
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
        connection.send("action=" + action + "&idsurvey=" + id + "&d=" + d);
    }

    function response() {
        if (connection.readyState == 4) {
            let obj = JSON.parse(connection.responseText);
            alert(obj.msj);
            if (obj.error == false)
                location.href = "/module/admin/surveys/factors/";
        }
    }

    // function EnableEdition(e) {
    //     let text = e.firstChild;
    //     let nombre = document.getElementById('description');
    //     text.data = text.data == "Editar" ? "Guardar" : "Editar";
    //     nombre.disabled = !nombre.disabled;
    //     // console.log(nombre);
    // }
</script>