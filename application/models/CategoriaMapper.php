<?php

class Application_Model_CategoriaMapper
{
        public function apagar($idcategoria) {
        $tabprato = new Application_Model_DbTable_Prato();
        $prato = $tabprato->fetchRow("id_categoria = $idcategoria");
        
        if($prato !== null){
            throw new Exception("Categoria com prato", 1); 
           
        }
        $tab = new Application_Model_DbTable_Categoria();
        $tab->delete("id_categoria = $idcategoria");
        
        return true;
    }

    public function atualizar(Application_Model_Vo_Categoria $categoria) {
        $tab = new Application_Model_DbTable_Categoria();
        $tab->update(array(
           'categoria' => $categoria->getCategoria() 
        ), 'id_categoria = '.$categoria->getId());
        
        return true;
    }

    public function salvar(Application_Model_Vo_Categoria $categoria) {
        $tab = new Application_Model_DbTable_Categoria();
        $tab->insert(array(
           'categoria' => $categoria->getCategoria() 
        ));
        
       $id = $tab->getAdapter()->lastInsertId();
       $categoria->setId($id);
       return true;
    }

}

