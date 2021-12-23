<?php
include_once '../configuracoes.php';
include_once  "../persistencia/LoginApp.php";


$email = filter_var($_POST["email_login"], FILTER_SANITIZE_STRING);
$senha = filter_var($_POST["senha_login"], FILTER_SANITIZE_STRING);
$senha = sha1($senha);


$login = new LoginApp();


if(!($login->verificarLoginUsuario($email,$senha))){
    header('Location: '. URL .'public');

}else{
    echo URL .'public/loja.php';
    
    header('Location: '. URL .'public/loja.php');
}