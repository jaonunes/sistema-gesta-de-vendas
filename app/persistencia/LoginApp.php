<?php 
session_start();
include_once "Conexao.php";


class LoginApp{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexao();
        $this->link = $this->conn->getConnection();
    }

    public function verificarLoginUsuario($email,$senha){
        
            
            $sql = "select * from clientes_cadastrados as c where c.email_cliente like '$email' and c.senha_cliente like '$senha'";


            $resultado = mysqli_query($this->link, $sql);
           
           
            if($resultado->num_rows==0){
                return false;
            }
            else{
                $row = mysqli_fetch_assoc($resultado);

                $_SESSION["nome_cliente"] = $row["nome_cliente"];
                $_SESSION["id_cliente"] = $row["id_cliente"];
                $_SESSION["cep_cliente"] = $row["cep_cliente"];

                
                
                return true;
            }

        
            
        

            mysqli_close($this->link);
        
    }


}