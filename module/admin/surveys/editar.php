<?php

use Sysurvey\Db;

$backRoot = '../../../';
require $backRoot . 'vendor/autoload.php';

if (isset($_POST['idSurvey']))
    $id = $_POST['idSurvey'];
else
    $id = $_COOKIE['idSurvey'];

$survey = new Models\Survey(new Db());
$currentSurvey = $survey->getSurvey($id);

$factores = new Models\Factor(new Db());
$factorsList = $factores->getFactors($id, 1);

$question = new Models\Question(new Db());
$ListQuestions = $question->getQuestions($id);


?>

<h4>Titulo de encuesta</h4>
<div class="row ">
    <div class="col card-group">
        <div class="card col-md-2 mb-3 pl-0 pr-0">
            <div class="card-header card-header-dark">Id</div>
            <div class="card-body">
                <label class="form-control"><?php echo $currentSurvey['idsurvey']; ?></label>
            </div>
        </div>
        <div class="card col-md-8 mb-3 pl-0 pr-0">
            <div class="card-header card-header-dark">Descripcion</div>
            <div class="card-body">
                <input type="text" class="form-control" id='description' placeholder="Descripción" value="<?php echo $currentSurvey['name']; ?>" disabled>
            </div>
        </div>
        <div class="card col-md-2 mb-3 pl-0 pr-0">
            <div class="card-header card-header-dark">Accion</div>
            <div class="card-body">
                <button class="btn btn-primary form-control" onclick="EnableEdition(this);">Editar</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h4>Factores: </h4>
    </div>
    <?php if ($factorsList !== false) : ?>
        <div class="col-8">
            <select class="form-control" id='description'>
                <option> -- Seleccione un factor -- </option>
                <?php foreach ($factorsList as $key => $factor) : ?>
                    <option value="<?php echo $factor['idfactor']; ?>"><?php echo $factor['description']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col">
            <a class="btn btn-success" href="./factors/nuevo.php?idSurvey=<?php echo $id; ?>">
                Nuevo
            </a>
        </div>
    <?php endif ?>
</div>
<hr>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="questions-tab" data-toggle="tab" href="#questions" role="tab" aria-controls="questions" aria-selected="true">Preguntas</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="rubric-tab" data-toggle="tab" href="#rubric" role="tab" aria-controls="rubric" aria-selected="false">Rubrica</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent" style="border-top-right-radius: 0.25rem;border-bottom: #dee2e6 solid 1px;border-left: #dee2e6 solid 1px;border-right: #dee2e6 solid 1px;">
    <div class="tab-pane fade show active" id="questions" role="tabpanel" aria-labelledby="questions-tab">
        <div class="col-12 p-3">
            <?php if ($ListQuestions !== false) : ?>
                <?php if (count($ListQuestions) > 0) : ?>
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Precgunta</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ListQuestions as $row) : ?>
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
                <p>No se encontrarón datos</p>
            <?php endif ?>
        </div>
    </div>
    <div class="tab-pane fade" id="rubric" role="tabpanel" aria-labelledby="rubric-tab">
        <div class="col-12 p-3">
            <?php if ($factorsList !== false) : ?>
                <?php if (count($factorsList) > 0) : ?>
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Factor</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($factorsList as $row) : ?>
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
                <p>No se encontrarón datos</p>
            <?php endif ?>
        </div>
    </div>
</div>

<div class="col-12 p-3">
    <button class="btn btn-success" onclick="javascript:SaveSurvey('update');">Guardar</button>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
