<?php
require '../../../../vendor/autoload.php';

use Domain\RubricDomain;

$idFactor = $_GET['idfactor'];

$dbRubrica = new RubricDomain();
$listaRubricas = $dbRubrica->GetRubrics($idFactor);
$headers = ["Id", "Descripción", "Valor"];
?>

<div class="table-responsive">
    <table class="table table-striped ">
        <thead class="table-dark">
            <th class="text-center">ID</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Valor</th>
            <th class="text-center">Acción</th>
        </thead>
        <tbody>
            <?php foreach ($listaRubricas as $rubrica) : ?>
                <tr>
                    <td class="text-center"><span id="id-lbl<?php echo $rubrica['idrubric']; ?>"><?php echo $rubrica['idrubric']; ?></span></td>
                    <td class="text-center">
                        <input type="hidden" id="desc-lbl<?php echo $rubrica['idrubric']; ?>" value="<?php echo $rubrica['description']; ?>" />
                        <?php echo $rubrica['description']; ?>
                    </td>
                    <td class="text-center">
                        <input type="hidden" id="val-lbl<?php echo $rubrica['idrubric']; ?>" value="<?php echo $rubrica['value']; ?>">
                        <?php echo $rubrica['value']; ?>
                    </td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="" data-bs-toggle="modal" data-bs-target="#rubricModal" class="btn btn-primary" title="Editar" onclick="setValues('update',<?php echo $rubrica['idrubric']; ?>);CurrentRubric();">
                                <span class="material-icons">create</span>
                            </a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#deleteRubricModal" class="btn btn-danger" title="Eliminar" onclick="setValues('delete',<?php echo $rubrica['idrubric']; ?>);">
                                <span class="material-icons">delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>