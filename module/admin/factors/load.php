<?php
require '../../../vendor/autoload.php';

use Sysurvey\Db;
use Models\Factor;

$dbFactor = new Factor(new Db());
$factorList = $dbFactor->getFactors(1);
$headers = ["Id", "Descripción"];

?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark text-primary">
            <th>ID</th>
            <th>Name</th>
            <th>Acción</th>
        </thead>
        <tbody>
            <?php foreach ($factorList as $factor) : ?>
                <tr>
                    <td><?php echo $factor['idfactor']; ?></td>
                    <td><?php echo $factor['description']; ?></td>
                    <td>
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
