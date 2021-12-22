<?php

class Conexao{

    private $link; 

    function __construct() {
        $this->conectar();
    }

    
    public function conectar()
    {
        $this->link = mysqli_connect('127.0.0.1', 'admin', '', 'gestaodevendas');
        $this->link->set_charset('utf8');
        return $this->link;
    }

    function getConnection()
    {
        return $this->link;
    }


}