<?php
require '../../../vendor/autoload.php';

use Sysurvey\Db;
use Models\UserSurvey;
use Models\Survey;

$idUser = $_GET['id'];

$dbSurvey = new Survey(new Db());
$dbUser = new UserSurvey(new Db());

// $userSurveys = $dbSurvey->getSurveys($idUser);
// $userSurveys = $dbUser->getUserSurveys($idUser);



?>

<!-- Modal asignar/eliminar encuestas al usuario actual -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle" id="addModal">Encuesta</h5>
                    <button type="button" class="close" data-dismiss="modal" arial-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Seleccione las encuestas que se asignarán al usuario actual</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                Sin asignar
                            </div>
                            <div class="col-2">
                            </div>
                            <div class="col-5">
                                Asignados
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group multiselect-picker">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="1">
                                            Si/No
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="2">
                                            Factor 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="3">
                                            Factor 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="4">
                                            Factor 4
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 p-1">
                                <div class="form-group pt-4">
                                    <input type="button" class="btn btn-default" value=">>" title="Asignar">
                                    <input type="button" class="btn btn-default" value="<<" title="Eliminar">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group multiselect-picker">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="1">
                                            Si/No
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="2">
                                            Factor 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="3">
                                            Factor 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="4">
                                            Factor 4
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="5">
                                            Factor 5
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="6">
                                            Factor 6
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="7">
                                            Factor 7
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="8">
                                            Factor 8
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="9">
                                            Factor 9
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>