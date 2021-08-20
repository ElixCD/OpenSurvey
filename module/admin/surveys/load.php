<?php
require '../../../vendor/autoload.php';

use Domain\SurveyDomain;

$Survey = new SurveyDomain();
$Surveys = $Survey->getSurveys(1);

?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="table-dark">
            <th class="text-center">
                ID
            </th>
            <th class="text-center">
                Name
            </th>
            <th class="text-center">
                Accion
            </th>
        </thead>
        <tbody>

            <?php foreach ($Surveys as $survey) : ?>
                <tr>
                    <td class="text-center">
                        <?php echo $survey['idsurvey']; ?>
                    </td>
                    <td>
                        <?php echo $survey['name'];  ?>
                    </td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <!-- <a href="#" class="btn btn-info btn-fab btn-fab-mini btn-link">
                                                        <span class="material-icons">pageview</span>
                                                    </a> -->
                            <a class="btn btn-primary" href="./edit.php?id=<?php echo $survey['idsurvey']; ?>" title="Editar">
                                <i class="material-icons">edit</i>
                            </a>
                            <a class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#deleteFactorModal" onclick="setValues('delete',<?php echo $survey['idsurvey']; ?>);">
                                <i class="material-icons">delete</i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>