<?php
$backRoot = '../../../';
require $backRoot . 'vendor/autoload.php';
$headers = ["Id", "Descripción"];
?>
<table class="table table-sm">
    <thead class="thead-dark">
        <tr>
            <?php foreach ($headers as $key => $value) : ?>
                <th scope="col"><?php echo $value; ?></th>
            <?php endforeach ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td><input type="text" id='description' placeholder="Descripción"></td>
        </tr>
    </tbody>
</table>
<button class="btn btn-success" onclick="javascript:SaveFactor('new');">Guardar</button>