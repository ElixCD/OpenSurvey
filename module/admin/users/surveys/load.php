<?php
require '../../../vendor/autoload.php';

use Domain\UserDomain;

$idUser = $_GET['id'];

$dbUser = new UserDomain();
$user = $dbUser->getUserData($idUser);
$userSurveys = $dbUser->getUserSurveysPropetary($idUser);

?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark text-primary">
            <th class="text-center">
                ID
            </th>
            <th class="text-center">
                Nombre
            </th>
            <th class="text-center">
                Activa
            </th>
            <!-- <th class="text-center">
                Accion
            </th> -->
        </thead>
        <tbody>

            <?php foreach ($userSurveys as $survey) : ?>
                <tr>
                    <td class="text-center">
                        <?php echo $survey['idsurvey']; ?>
                    </td>
                    <td>
                        <?php echo $survey['name'];  ?>
                    </td>
                    <td class="text-center">
                    <input type="checkbox" <?php echo ($survey["active"] ? "checked" : ""); ?> disabled >
                    </td>
                    <!-- <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">                           
                            <a class="btn btn-primary" href="./edit.php?id=<?php //echo $survey['idsurvey']; ?>" title="Editar">
                                <i class="material-icons">edit</i>
                            </a>
                            <a class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#deleteFactorModal" onclick="setValues('delete',<?php //echo $survey['idsurvey']; ?>);">
                                <i class="material-icons">delete</i>
                            </a>
                        </div>
                    </td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>