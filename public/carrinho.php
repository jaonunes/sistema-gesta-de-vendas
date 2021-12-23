<?php
session_start();

if (!(isset($_SESSION['id_cliente']))) {
  header('Location: index.php');
  die();
}
include_once '../app/configuracoes.php';
include_once '../app/controlador/Carrinho.php';
include_once '../app/controlador/Cliente.php';



?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/carrinho.css">

  <title> <?= NOME_SITE ?> </title>
</head>

<body>


  <div class=" pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Carrinho de compras</h1>
    <p class="lead">Veja os seus produtos</p>
  </div>


  <div class="container">

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
         
          <?php
          if(!isset($showCarrinho)){ ?>
             
             
            
             <span class='text-muted'>Seu carrinho está Vazio! </span>
             
             <hr>

              
           <a class="btn btn-primary btn-sm btn-block" href="./loja.php">Voltar</a>


          <?php
          
        }
         
          else{

          
          
          ?>
           
          <span class="badge badge-secondary badge-pill"><?= sizeof($showCarrinho) ?> </span>
        </h4>
        <ul class="list-group mb-3">
          <?php $valor_total_carrinho = 0;
          foreach ($showCarrinho as  $key => $value) {
            $valor_total_carrinho +=  $value->getValor_total_produto();

          ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
            <?php  if(isset($msgerro)){ echo  $msgerro ; }?> 
              <div>
                
                <h6 class="my-0"><?= $value->getNome_produto(); ?> </h6>
                <small class="text-muted"> <?= $value->getQuantidade_produto() . " x "  . $value->getValor_produto(); ?> </small>
              </div>
              <span class="text-muted">R$ <?= $value->getValor_total_produto(); ?></span>
              <div class="qty mt-5">
                <form action="" method="post">
                  <input type="submit" class="minus bg-dark" id="minus-<?= $value->getId_produto(); ?>" value='-' name="reduzir">
                  <input type="hidden" value="true" name="atualizarQuantidade">
                  <input type="hidden" value=" <?= $value->getId() ?>" name="id_carrinho">
                  <input type="hidden" value=" <?= $value->getId_produto() ?>" name="id_produto">
                </form>


                <input type="" class="count" name="qty" value="<?= $value->getQuantidade_produto() ?> " id="seletor<?= $value->getId_produto(); ?>">


                <form action="" method="post">
                  <input type="submit" class="plus bg-dark" id="plus-<?= $value->getId_produto(); ?>" value='+' name="aumentar">
                  <input type="hidden" value="true" name="atualizarQuantidade">
                  <input type="hidden" value=" <?= $value->getId() ?>" name="id_carrinho">
                  <input type="hidden" value=" <?= $value->getId_produto() ?>" name="id_produto">
                </form>



              </div>
            </li>
          <?php } ?>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total: </span>
            <strong>R$ <?= number_format($valor_total_carrinho, 2, '.', '');?> </strong>
          </li>
        </ul>
      </div>




      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate name="form-compra" id="form-compra" action="" method="post">
        <input type="hidden" name="acao" value="" id="acao">
          <input type="hidden" value=" <?= $value->getId() ?>" name="id_carrinho">
          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="firstName">Nome Completo</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="<?= $showCliente->getNome_cliente(); ?>" required disabled>
            </div>
          </div>


          <div class="mb-3">
            <label for="email">Email <span class="text-muted"></span></label>
            <input type="email" class="form-control" id="email" placeholder="" disabled value=" <?= $showCliente->getEmail_cliente(); ?>">
          </div>

          <div class="mb-3">
            <label for="address">Logradouro</label>
            <input type="text" class="form-control" id="address" placeholder="" value="<?= $showCliente->getLogradouro_cliente(); ?>" disabled>

          </div>



          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="country">Cidade</label>
              <input type="text" class="form-control" id="cidade" placeholder="" value="<?= $showCliente->getCidade_cliente(); ?>" disabled>
            </div>
            <div class="col-md-4 mb-3">
              <label for="state">Estado</label>
              <input type="text" class="form-control" id="uf" placeholder="" value="<?= $showCliente->getUf_cliente(); ?>" disabled>

            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">CEP</label>
              <input type="text" class="form-control" id="zip" placeholder="" required value="<?= $showCliente->getCep_cliente(); ?>" disabled>

            </div>
          </div>
          <hr class="mb-4">

          <h4 class="mb-3">Pagamento</h4>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="Boleto" name="paymentMethod" type="radio" class="custom-control-input" checked required>
              <label class="custom-control-label" for="credit">Boleto</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="pix" name="paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="debit">Pix</label>
            </div>

          </div>



          <hr class="mb-4">
          <a class="btn btn-primary btn-sm btn-block btn-fim" id="finalizar_compra" >Finalizar Compra</a>
          <a class="btn btn-danger btn-sm btn-block btn-fim" id="cancelar_compra" >Cancelar Compra</a>
          
        </form>
      </div>
    </div>
    <?php  } ?>











  </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="./js//carrinho.js"></script>

</html>