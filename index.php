<?php
require 'vendor/autoload.php';

OurVoice\SessionStatus::startSession("user");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OurVoice</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link href="public/css/app.css" rel="stylesheet" />

</head>

<body class="container">
    <a href="module/admin">Admin</a>
    <a href="module/user">User</a>

    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-header text-center">
                Login
            </div>
            <div class="card-body">
                <form method="POST" name="sign-in">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary" onclick="login()">Aceptar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center text-muted">
                <small>
                    Elix Froylán Castillo Durán
                    <br />
                    Copyleft&copy; 2021
                </small>

            </div>
        </div>

    </div>

    <?php
//     $grid = new OurVoice\Components\GridList\GridList;

//     // $grid->readView();

//     $grid->TableClass = "table";
//     $grid->ListColumns = ["head 0", "head 1", "none", "actions"];
//     // $grid->SelectColumn = true;
//     $grid->SelectHeaderText = "Opcion";
//     $grid->HeadClass = "text-primary";
//     $grid->DataActionColumn = '<a href="" class="btn btn-primary btn-fab btn-fab-mini btn-link" title="Editar" onclick="Salir({{id}});">
//     <span class="material-icons">create</span>
// </a>
// <a href="" class="btn btn-danger btn-fab btn-fab-mini btn-link" title="Eliminar">
//     <span class="material-icons">delete</span>
// </a>';


//     $grid->DataCollection = [
//         ["id" => 1, "head 0" => "hola 0", "head 1" => "bye 0", "none" => "not null"],
//         ["id" => 2, "head 0" => "hola 1", "head 1" => "bye 1"]
//     ];
//     $grid->KeyColumn = "id";

//     $grid->drawComponent();

//     $paginator = new OurVoice\Components\Paginator\Paginator;
//     $paginator->CurrentPage = !isset($_GET['page']) ? 1 : $_GET['page'];
//     $paginator->VisiblePages = 4;
//     $paginator->TotalPages = 10;
//     $paginator->drawComponent();

    ?>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha256-t9UJPrESBeG2ojKTIcFLPGF7nHi2vEc7f5A2KpH/UBU=" crossorigin="anonymous"></script>

<script src="public/js/app.js"></script>

</html>