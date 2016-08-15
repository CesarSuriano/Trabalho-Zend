<?php

class Application_Model_Vo_Categoria {

    protected $id_categoria;
    protected $categoria;

    function getId() {
        return $this->id_categoria;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function setId($id) {
        $this->id_categoria = $id;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

}
