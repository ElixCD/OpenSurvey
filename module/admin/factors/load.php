<?php
require '../../../vendor/autoload.php';

use Domain\FactorDomain;

$dbFactor = new FactorDomain();
$factorList = $dbFactor->getFactors(1);

?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="table-dark">
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Acción</th>
        </thead>
        <tbody>
            <?php foreach ($factorList as $factor) : ?>
                <tr>
                    <td class="text-center"><?php echo $factor['idfactor']; ?></td>
                    <td class="text-center"><?php echo $factor['description']; ?></td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-primary" href="./edit.php?id=<?php echo $factor['idfactor']; ?>" title="Editar">
                                <i class="material-icons">create</i>
                            </a>
                            <a class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#deleteFactorModal" onclick="setValues('delete',<?php echo $factor['idfactor']; ?>);">
                                <i class="material-icons">delete</i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include_once "../../common/modal.php";
$modal = new ModalConfirmation("deleteFactorModal", "Factores", "<div class='col-md-12'>Se eliminara el factor.<br />¿Desea continuar?</div>", "SaveFactor()");
$modal->DrawComponent();

include_once "../../common/register-js.php";
?>
