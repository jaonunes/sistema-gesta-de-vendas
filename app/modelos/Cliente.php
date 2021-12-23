<?php


class Cliente{
    private $id;
    private $nome_cliente;
    private $email_cliente;
    private $logradouro_cliente;
    private $bairro_cliente;
    private $cep_cliente;
    private $cidade_cliente;
    private $uf_cliente;

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
     * Get the value of nome_cliente
     */ 
    public function getNome_cliente()
    {
        return $this->nome_cliente;
    }

    /**
     * Set the value of nome_cliente
     *
     * @return  self
     */ 
    public function setNome_cliente($nome_cliente)
    {
        $this->nome_cliente = $nome_cliente;

        return $this;
    }

    /**
     * Get the value of email_cliente
     */ 
    public function getEmail_cliente()
    {
        return $this->email_cliente;
    }

    /**
     * Set the value of email_cliente
     *
     * @return  self
     */ 
    public function setEmail_cliente($email_cliente)
    {
        $this->email_cliente = $email_cliente;

        return $this;
    }

    /**
     * Get the value of logradouro_cliente
     */ 
    public function getLogradouro_cliente()
    {
        return $this->logradouro_cliente;
    }

    /**
     * Set the value of logradouro_cliente
     *
     * @return  self
     */ 
    public function setLogradouro_cliente($logradouro_cliente)
    {
        $this->logradouro_cliente = $logradouro_cliente;

        return $this;
    }

    /**
     * Get the value of bairro_cliente
     */ 
    public function getBairro_cliente()
    {
        return $this->bairro_cliente;
    }

    /**
     * Set the value of bairro_cliente
     *
     * @return  self
     */ 
    public function setBairro_cliente($bairro_cliente)
    {
        $this->bairro_cliente = $bairro_cliente;

        return $this;
    }

    /**
     * Get the value of cep_cliente
     */ 
    public function getCep_cliente()
    {
        return $this->cep_cliente;
    }

    /**
     * Set the value of cep_cliente
     *
     * @return  self
     */ 
    public function setCep_cliente($cep_cliente)
    {
        $this->cep_cliente = $cep_cliente;

        return $this;
    }

    /**
     * Get the value of cidade_cliente
     */ 
    public function getCidade_cliente()
    {
        return $this->cidade_cliente;
    }

    /**
     * Set the value of cidade_cliente
     *
     * @return  self
     */ 
    public function setCidade_cliente($cidade_cliente)
    {
        $this->cidade_cliente = $cidade_cliente;

        return $this;
    }

    /**
     * Get the value of uf_cliente
     */ 
    public function getUf_cliente()
    {
        return $this->uf_cliente;
    }

    /**
     * Set the value of uf_cliente
     *
     * @return  self
     */ 
    public function setUf_cliente($uf_cliente)
    {
        $this->uf_cliente = $uf_cliente;

        return $this;
    }
}