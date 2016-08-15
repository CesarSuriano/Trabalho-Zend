<?php

class Application_Model_Vo_Prato
{
    protected $id;
    protected $id_categoria;
    protected $descricao;
    protected $preco;
    protected $imagem;
    
    function getId() {
        return $this->id;
    }

    function getId_categoria() {
        return $this->id_categoria;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPreco() {
        return $this->preco;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }



}

