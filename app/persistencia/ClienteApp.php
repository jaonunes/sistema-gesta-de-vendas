<?php 


include "../app/modelos/Cliente.php";
include_once "Conexao.php";



class ClienteApp{
    private $conn;
    private $link;


    public function __construct()
    {
        $this->conn = new Conexao();
        $this->link = $this->conn->getConnection();
    }


    public function buscarCliente($id_cliente){

        $buscar_cliente= "SELECT * FROM clientes_cadastrados where id_cliente = $id_cliente;";

        $resultado_cliente =  mysqli_query($this->link,  $buscar_cliente);


       
        $dados = mysqli_fetch_object($resultado_cliente);
            
            $cliente = new Cliente();
            $cliente -> setId($dados->id_cliente);
            $cliente -> setNome_cliente($dados->nome_cliente);
            $cliente -> setEmail_cliente($dados->email_cliente);
            $cliente->setLogradouro_cliente($dados->logradouro_cliente);
            $cliente->setBairro_cliente($dados->bairro_cliente);  
            $cliente->setCep_cliente($dados->cep_cliente);
            $cliente->setCidade_cliente($dados->cidade_cliente);
            $cliente->setUf_cliente($dados->uf_cliente);
            

           
                   
        
        
    
        return $cliente;

        die();

    }
}