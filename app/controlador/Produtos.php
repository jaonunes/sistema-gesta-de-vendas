<?php


include_once   '../app/persistencia/ProdutoApp.php';





$produtosDisponiveis = new ProdutoApp();
$showProdutos = $produtosDisponiveis->buscarProdutos();

