<?php 

include_once __DIR__ ."../../modelos/Produto.php";
include_once "Conexao.php";

class ProdutoApp{
    private $conn;
    private $link;


    public function __construct()
    {
        $this->conn = new Conexao();
        $this->link = $this->conn->getConnection();
    }


    public function buscarProdutos(){
        $buscar_produtos = "SELECT * FROM produtos;";

        $resultado = mysqli_query($this->link, $buscar_produtos);
        $i=0;
        while ($dados = mysqli_fetch_object($resultado)) {
            
            $cadastro = new Produto();
            $cadastro->setId($dados->id_produto);
            $cadastro->setDescricao($dados->descricao_produto);
            $cadastro->setValor($dados->valor_produto);
            $cadastro->setQuantidade($dados->quantidade_produto);

            if($dados->quantidade_produto > 0 ){
                $cadastro->setDisponibilidade(" ");
            }
            else{
                $cadastro->setDisponibilidade("disabled");
            }
           
            $arrayObjetos[$i] = $cadastro;
            $i++;
        }


        return $arrayObjetos;

        die();
    }
    public function alterarQuantidadeProduto( $id_produto, $quantidade){
        $atualizar_quantidade=" UPDATE produtos SET quantidade_produto = quantidade_produto +($quantidade) WHERE  id_produto = $id_produto";

        $atualizou_quantidade =  mysqli_query($this->link,  $atualizar_quantidade);

        return $atualizou_quantidade;

    }

    public function verificarQuantidadeProduto($id_produto){
        $buscar_produtos = "SELECT quantidade_produto FROM produtos where id_produto = $id_produto;";

        $resultado = mysqli_query($this->link, $buscar_produtos);
        $dados = mysqli_fetch_object($resultado);

        return $dados->quantidade_produto;

    }

}