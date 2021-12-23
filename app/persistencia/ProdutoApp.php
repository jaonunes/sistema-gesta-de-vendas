<?php 

include_once "../app/modelos/Produto.php";
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
            $cadastro->setFlag($dados->flag_reserva_produto);
            $cadastro->setId($dados->id_produto);
            $cadastro->setDescricao($dados->descricao_produto);
            $cadastro->setValor($dados->valor_produto);
            $cadastro->setQuantidade($dados->quantidade_produto);
           
            $arrayObjetos[$i] = $cadastro;
            $i++;
        }


        return $arrayObjetos;

        die();
    }

}