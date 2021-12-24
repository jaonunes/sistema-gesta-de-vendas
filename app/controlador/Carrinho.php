<?php
include_once  "../app/persistencia/CarrinhoApp.php";
include_once "../app/persistencia/ProdutoApp.php";


$carrinhoApp = new CarrinhoApp();
$produtoApp = new ProdutoApp();
if(isset($_POST["atualizarQuantidade"])){

    $id_produto = $_POST["id_produto"];
    $id_carrinho = $_POST["id_carrinho"];


    if(isset($_POST["aumentar"])){
        if($produtoApp->verificarQuantidadeProduto($id_produto) > 0){
            $carrinhoApp->inserirItemCarrinho( $id_produto, $id_carrinho);
            $atualizarQuantidade = $produtoApp->alterarQuantidadeProduto( $id_produto, -1);
            
        }
        
    }
    if(isset($_POST["reduzir"])){
        $carrinhoApp->removerItemCarrinho( $id_produto, $id_carrinho);
        $atualizarQuantidade = $produtoApp->alterarQuantidadeProduto( $id_produto, +1);
    }

}


if(isset($_POST["acao"])){

    $id_carrinho = $_POST["id_carrinho"];

    if($_POST["acao"] == "finalizar"){
        $quantidadeItens  = $carrinhoApp -> buscarQuantidadeItens($id_carrinho);
        
      
         if($quantidadeItens){
            $carrinhoApp->finalizarCompra($id_carrinho);
            echo "<script>alert('Compra Finalizada com sucesso!');</script>";
         }
         else{
            echo "<script>alert('Erro, sem itens no carrinho!');</script>";
         }
 

    }
    else if($_POST["acao"] == "cancelar"){
        

        $resultadoQuantidade = $carrinhoApp->buscarQuantidadeItens($id_carrinho);

        
        foreach($resultadoQuantidade as $key){

            
            $atualizarQuantidade = $produtoApp->alterarQuantidadeProduto( $key -> id_produto, $key -> quantidade_produto);

            
        }

        $carrinhoApp->finalizarCompra($id_carrinho);
        echo "<script>alert('Compra Cancelada com sucesso!');</script>";
        
  
        
    }

}


$showCarrinho = $carrinhoApp->buscarCarrinho($_SESSION['id_cliente']);



