<?php
session_start();

if (!(isset($_SESSION['id_cliente']))) {
    header('Location: index.php');
    die();
}
include_once '../app/configuracoes.php';
include_once '../app/controlador/Produtos.php';
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title> <?= NOME_SITE ?> </title>
</head>

<body>


    <div class=" pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Produtos disponíveis</h1>
    <p class="lead">Escolha os seus produtos</p>
    </div>

    <div class="container">
        <div class="card-deck mb-3 text-center">
        <?php
        $i = 0;
        $cont = 0;

        foreach ($showProdutos as  $key => $value) {
            $i++;
            if (($i-1) % 3 == 0) {
               
        ?>
                </div>
                 <div class="card-deck mb-3 text-center">
            <?php } ?>

                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">
                        <?php echo $value->getDescricao(); ?>
                        </h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">
                            R$ <?= $value->getValor(); ?> 
                            <small class="text-muted">/ kg</small>
                        </h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li><?php echo $value->getQuantidade(); ?> disponíveis</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-primary">Adicionar Carrinho</button>
                    </div>
                </div>
                <?php } ?>




                




                


    </div>

    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>