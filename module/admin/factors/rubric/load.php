<?php
require '../../../../vendor/autoload.php';

use Domain\RubricDomain;

$idFactor = $_GET['idfactor'];

$dbRubrica = new RubricDomain();
$listaRubricas = $dbRubrica->GetRubrics($idFactor);
$headers = ["Id", "Descripción", "Valor"];
?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark text-primary">
            <th>ID</th>
            <th>Name</th>
            <th>Valor</th>
            <th>Acción</th>
        </thead>
        <tbody>
            <?php foreach ($listaRubricas as $rubrica) : ?>
                <tr>
                    <td><span id="id-lbl<?php echo $rubrica['idrubric']; ?>"><?php echo $rubrica['idrubric']; ?></span></td>
                    <td>
                        <input type="hidden" id="desc-lbl<?php echo $rubrica['idrubric']; ?>" value="<?php echo $rubrica['description']; ?>" />
                        <?php echo $rubrica['description']; ?>
                    </td>
                    <td>
                        <input type="hidden" id="val-lbl<?php echo $rubrica['idrubric']; ?>" value="<?php echo $rubrica['value']; ?>">
                            <?php echo $rubrica['value']; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="" data-toggle="modal" data-target="#rubricModal" class="btn btn-primary" title="Editar" onclick="setValues('update',<?php echo $rubrica['idrubric']; ?>);CurrentRubric();">
                                <span class="material-icons">create</span>
                            </a>
                            <a href="" data-toggle="modal" data-target="#deleteRubricModal" class="btn btn-danger" title="Eliminar" onclick="setValues('delete',<?php echo $rubrica['idrubric']; ?>);">
                                <span class="material-icons">delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>