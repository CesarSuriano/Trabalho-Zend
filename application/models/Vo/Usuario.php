<?php

class Application_Model_Vo_Usuario {

    protected $funcao;
    protected $nome;
    protected $email;
    protected $senha;
    protected $id;

//    public function __construct(array $options = null) {
//        if (is_array($options)) {
//            $this->setOptions($options);
//        }
//    }
//
//    public function __set($name, $value) {
//        $method = 'set' . $name;
//        if (('mapper' == $name) || !method_exists($this, $method)) {
//            throw new Exception('Propriedade de usuario invalida');
//        }
//        $this->$method($value);
//    }
//
//    public function __get($name) {
//        $method = 'get' . $name;
//        if (('mapper' == $name) || !method_exists($this, $method)) {
//            throw new Exception('Propriedade de usuario invalida');
//        }
//        return $this->$method();
//    }
//
//    public function setOptions(array $options) {
//        $methods = get_class_methods($this);
//        foreach ($options as $key => $value) {
//            $method = 'set' . ucfirst($key);
//            if (in_array($method, $methods)) {
//                $this->$method($value);
//            }
//        }
//        return $this;
//    }
//
//    public function setNome($nome) {
//        $this->_nome = $nome;
//        return $this;
//    }
//
//    public function getNome() {
//        return $this->_nome;
//    }
//
//    public function setEmail($email) {
//        $this->_email =  $email;
//        return $this;
//    }
//
//    public function getEmail() {
//        return $this->_email;
//    }
//
//    public function setSenha($senha) {
//        $this->_senha = $senha;
//        return $this;
//    }
//
//    public function getSenha() {
//        return $this->_created;
//    }
//
//    public function setFuncao($funcao) {
//        $this->_funcao =  $funcao;
//        return $this;
//    }
//
//    public function getFuncao() {
//        return $this->_funcao;
//    }
//
//    public function setId($id) {
//        $this->_id = (int) $id;
//        return $this;
//    }
//
//    public function getId() {
//        return $this->_id;
//    }
    
    function getFuncao() {
        return $this->funcao;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getId() {
        return $this->id;
    }

    function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setId($id) {
        $this->id = $id;
    }



}
