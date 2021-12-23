<?php
include __DIR__ . "../../persistencia/CarrinhoApp.php";
include __DIR__ . "../../persistencia/ProdutoApp.php";



$id_produto= filter_var($_POST["id_produto"], FILTER_SANITIZE_NUMBER_INT);
$id_cliente = filter_var($_POST["id_cliente"], FILTER_SANITIZE_NUMBER_INT);



$carrinho = new CarrinhoApp();
$produto = new ProdutoApp();

$id_carrinho = $carrinho->verificarCarrinho($id_cliente);
 

 if($carrinho->inserirItemCarrinho( $id_produto , $id_carrinho)){

    if($produto->alterarQuantidadeProduto( $id_produto, -1)){
        header("Location: ../../public/loja.php?sucess");
    } 
    else{
        header("Location: ../../public/loja.php?error");
    }


    
 }  

