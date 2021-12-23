<?php

session_start();
include_once '../app/configuracoes.php';

if ((isset($_SESSION['id_cliente']))) {
    header('Location: loja.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"">
    <link rel=" stylesheet" href="<?= URL ?>public/css/login.css">
    <title> <?= NOME_SITE ?> </title>
</head>

<body>
    <form class="form-signin" action="<?= URL?>app/controlador/RealizarLogin.php" method="POST">

        <div class="form-label-group">
            <input type="email" id="email_login" name="email_login" class="form-control" placeholder="Email" autofocus>
            <label for="email_login">Email</label>
        </div>
        <div class="form-label-group">
            <input type="password" id="senha_login" name="senha_login" class="form-control" placeholder="Senha">
            <label for="senha_login">Senha</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
    </form>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>