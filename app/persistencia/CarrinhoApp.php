<?php 


include __DIR__ . "../../modelos/Carrinho.php";
include_once "Conexao.php";

class CarrinhoApp{
    private $conn;
    private $link;


    public function __construct()
    {
        $this->conn = new Conexao();
        $this->link = $this->conn->getConnection();
    }


    public function verificarCarrinho($id_cliente){
        $buscar_carrinho = "SELECT id_carrinho FROM carrinho_compras where id_cliente = $id_cliente;";

        $resultado = mysqli_query($this->link, $buscar_carrinho);

   
             
        if($resultado-> num_rows > 0){
            $dados = mysqli_fetch_object($resultado);
            return $dados->id_carrinho;
             
        }

        else{
            $criar_carrinho = "INSERT INTO CARRINHO_COMPras (ID_CLIENTE) VALUES ($id_cliente)";
            $resultado_inserir = mysqli_query($this->link, $criar_carrinho);
            
            if($resultado_inserir){

                return $id_inserido = mysqli_insert_id($this->link);;
            }
        }
    }

    public function inserirItemCarrinho( $id_produto, $id_carrinho){
        $verificar_item = "Select id_item from itens_carrinho where id_carrinho =  $id_carrinho and id_produto = $id_produto";

        $existe_item = mysqli_query($this->link, $verificar_item);

        if($existe_item->num_rows == 0 ){
            $insert_item = "INSERT INTO itens_carrinho (ID_PRODUTO, ID_CARRINHO, quantidade_produto) VALUES ($id_produto, $id_carrinho, 1)";
        }
        else{
            $insert_item=" UPDATE itens_carrinho SET quantidade_produto = quantidade_produto + 1 WHERE id_carrinho =  $id_carrinho and id_produto = $id_produto";
            
            
        
        }
        $inseriu_item =  mysqli_query($this->link,  $insert_item);
            if($inseriu_item){
               
                return true;
            }
            else{
                return false;
            }


    }

    public function removerItemCarrinho($id_produto, $id_carrinho){
        $verificar_item = "Select * from itens_carrinho where id_carrinho =  $id_carrinho and id_produto = $id_produto";

        $existe_item = mysqli_query($this->link, $verificar_item);
        $item = mysqli_fetch_object($existe_item);


        if($existe_item->num_rows > 0 ){
            if($item -> quantidade_produto == 1){
                $atualiza_item = "DELETE FROM itens_carrinho WHERE id_item = $item->id_item; ";
            }
            else{
                $atualiza_item=" UPDATE itens_carrinho SET quantidade_produto = quantidade_produto - 1 WHERE id_carrinho =  $id_carrinho and id_produto = $id_produto";

            }
            
            
            
        }
        else{
            
            return false;
            
        
        }
        $inseriu_item =  mysqli_query($this->link,  $atualiza_item);
            if($inseriu_item){
               
                return true;
            }
            else{
                return false;
            }

    }
    

    public function buscarCarrinho($id_cliente){

        $buscar_carrinho="SELECT p.id_produto, p.descricao_produto, p.valor_produto, i.quantidade_produto, cc.id_carrinho FROM carrinho_compras cc
        INNER JOIN itens_carrinho i ON  cc.id_carrinho = i.id_carrinho 
        INNER JOIN produtos p ON p.id_produto = i.id_produto
        WHERE cc.id_cliente = $id_cliente";

        $resultado_carrinho =  mysqli_query($this->link,  $buscar_carrinho);

        $i=0;
       
        while ($dados = mysqli_fetch_object($resultado_carrinho)) {
            
            $carrinho = new Carrinho();
            $carrinho -> setQuantidade_produto($dados->quantidade_produto);
            $carrinho -> setId_produto($dados->id_produto);
            $carrinho -> setValor_produto($dados->valor_produto);
            $carrinho->setNome_produto($dados->descricao_produto);
            $carrinho->setId($dados->id_carrinho);  
            $carrinho->setValor_total_produto(number_format(($dados->valor_produto) * ($dados->quantidade_produto),2,'.',''  ));  
            

            


            
            

            $arrayObjetos[$i] = $carrinho;
            $i++;
        }
        
        
        if(isset( $arrayObjetos)){
            return $arrayObjetos;
        }
        
       

    }

    public function finalizarCompra($id_carrinho){

        $deleta_itens = "DELETE FROM itens_carrinho WHERE id_carrinho = $id_carrinho;";
        $deletou_itens =  mysqli_query($this->link,  $deleta_itens);
            if($deletou_itens){
               
                return true;
            }
            else{
                return false;
            }

    }

    public function buscarQuantidadeItens($id_carrinho)
    {
        $buscar_quantidade = "SELECT id_produto, quantidade_produto  FROM itens_carrinho WHERE ID_CARRINHO = $id_carrinho ";
        $resultado_quantidade =  mysqli_query($this->link,  $buscar_quantidade);


       
      

        while ($dados=mysqli_fetch_object($resultado_quantidade)){
            $data[] = $dados;
         }
         

         if(isset( $data)){
            return $data;
        }else{
            return false;
        }
            
        
       

 


    }


}