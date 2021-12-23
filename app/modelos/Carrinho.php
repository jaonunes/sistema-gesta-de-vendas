<?php


class Carrinho{
    private $id;
    private $nome_produto;
    private $valor_produto;
    private $quantidade_produto;
    private $id_produto;
    private $valor_total_produto;
    private $valor_total_carrinho;


    /**
     * Get the value of quantidade_produto
     */ 
    public function getQuantidade_produto()
    {
        return $this->quantidade_produto;
    }

    /**
     * Set the value of quantidade_produto
     *
     * @return  self
     */ 
    public function setQuantidade_produto($quantidade_produto)
    {
        $this->quantidade_produto = $quantidade_produto;

        return $this;
    }

    /**
     * Get the value of id_produto
     */ 
    public function getId_produto()
    {
        return $this->id_produto;
    }

    /**
     * Set the value of id_produto
     *
     * @return  self
     */ 
    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;

        return $this;
    }

    /**
     * Get the value of valor_produto
     */ 
    public function getValor_produto()
    {
        return $this->valor_produto;
    }

    /**
     * Set the value of valor_produto
     *
     * @return  self
     */ 
    public function setValor_produto($valor_produto)
    {
        $this->valor_produto = $valor_produto;

        return $this;
    }

    /**
     * Get the value of nome_produto
     */ 
    public function getNome_produto()
    {
        return $this->nome_produto;
    }

    /**
     * Set the value of nome_produto
     *
     * @return  self
     */ 
    public function setNome_produto($nome_produto)
    {
        $this->nome_produto = $nome_produto;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of valor_total_produto
     */ 
    public function getValor_total_produto()
    {
        return $this->valor_total_produto;
    }

    /**
     * Set the value of valor_total_produto
     *
     * @return  self
     */ 
    public function setValor_total_produto($valor_total_produto)
    {
        $this->valor_total_produto = $valor_total_produto;

        return $this;
    }

    /**
     * Get the value of valor_total_carrinho
     */ 
    public function getValor_total_carrinho()
    {
        return $this->valor_total_carrinho;
    }

    /**
     * Set the value of valor_total_carrinho
     *
     * @return  self
     */ 
    public function setValor_total_carrinho($valor_total_carrinho)
    {
        $this->valor_total_carrinho = $valor_total_carrinho;

        return $this;
    }
}