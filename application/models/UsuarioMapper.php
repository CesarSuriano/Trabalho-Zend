<?php

class Application_Model_UsuarioMapper {

//    protected $_dbTable;
//
//    public function setDbTable($dbTable) {
//        if (is_string($dbTable)) {
//            $dbTable = new $dbTable();
//        }
//        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
//            throw new Exception('Invalid table data gateway provided');
//        }
//        $this->_dbTable = $dbTable;
//        return $this;
//    }
//
//    public function getDbTable() {
//        if (null === $this->_dbTable) {
//            $this->setDbTable('Application_Model_DbTable_Usuario');
//        }
//        return $this->_dbTable;
//    }
//
//    public function save(Application_Model_Vo_Usuario $usuario) {
//        $data = array(
//            'email' => $usuario->getEmail(),
//            'nome' => $usuario->getNome(),
//            'senha' => $usuario->getSenha(),
//            'funcao' => $usuario->getFuncao(),
//        );
//
//        if (null === ($id = $usuario->getId())) {
//            unset($data['id']);
//            $this->getDbTable()->insert($data);
//        } else {
//            $this->getDbTable()->update($data, array('id = ?' => $id));
//        }
//    }
//
//    public function find($id, Application_Model_Vo_Usuario $usuario) {
//        $result = $this->getDbTable()->find($id);
//        if (0 == count($result)) {
//            return;
//        }
//        $row = $result->current();
//        $usuario->setId($row->id_usuario)
//                ->setEmail($row->email)
//                ->setNome($row->nome)
//                ->setSenha($row->senha)
//                ->setFuncao($row->funcao);
//    }
//
//    public function fetchAll() {
//        $resultSet = $this->getDbTable()->fetchAll();
//        $entries = array();
//        foreach ($resultSet as $row) {
//            $entry = new Application_Model_Vo_Usuario();
//            $entry->setId($row->id_usuario)
//                    ->setEmail($row->email)
//                    ->setNome($row->nome)
//                    ->setSenha($row->senha)
//                    ->setFuncao($row->funcao);
//            $entries[] = $entry;
//        }
//        return $entries;
//    }

}
