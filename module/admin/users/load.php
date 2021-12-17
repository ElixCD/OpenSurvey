<?php


require '../../../vendor/autoload.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$User = new Domain\UserDomain();
$Users = $User->GetUsers();

?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="table-dark">
            <th class="text-center">
                ID
            </th>
            <th class="text-center">
                Nombre
            </th>
            <th class="text-center">
                Correo
            </th>
            <th class="text-center">
                Activo
            </th>
            <th class="text-center">
                Accion
            </th>
        </thead>
        <tbody>
            <?php foreach ($Users as $user) : ?>
                <tr>
                    <td class="text-center">
                        <?php echo $user['iduser']; ?>
                    </td>
                    <td>
                        <?php echo $user['name']; ?>
                    </td>
                    <td>
                        <?php echo $user['email']; ?>
                    </td>
                    <td class="text-center">
                        <div class="form-check disabled">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" <?php echo $user['active'] == 1 ? 'checked' : ''; ?> disabled>
                            </label>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <a class="btn btn-primary" title="Editar" href="./edit.php?id=<?php echo $user['iduser']; ?>">
                                <i class="material-icons">edit</i>
                            </a>
                            <a class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#deleteFactorModal" onclick="setValues('delete',<?php echo $user['iduser']; ?>);">
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
$modal = new ModalConfirmation("deleteFactorModal", "Usuarios", "<div class='col-md-12'>Se eliminara el usuario.<br />¿Desea continuar?</div>", "SaveUser()");
$modal->DrawComponent();

?>