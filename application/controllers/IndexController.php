<?php

class IndexController extends Blog_Controller_Action {

    public function indexAction() {
        $idcategoria = (int) $this->getParam('id_categoria', 0);
        
//        echo $idcategoria;
//        exit;

        $select = $this->select();
        $selectCat = $this->selectCategoria();
        
        $select->where("p.preco > 0 ");

        if ($idcategoria != 0) {
            $select->where("p.id_categoria = ?", $idcategoria);
        }

        $selectCat->order('c.id_categoria desc');

        $select->order('p.id_prato desc');

        $consultaCat = $selectCat->query()->fetchAll();
        $this->view->categorias = $consultaCat;

        $consulta = $select->query()->fetchAll();
        $this->view->prato = $consulta;
        $this->view->idcategoria = $idcategoria;
    }

    public function categoriasAction() {
        // $idcategoria = (int) $this->getParam('idcategoria', 0);

        $select = $this->selectCategoria();
        //$select->where("c.idcategoria = ?", $idcategoria);

        $categoria = $select->query()->fetchAll();

        $this->view->categorias = $categoria;
    }

    public function pratoAction() {
        $idprato = (int) $this->getParam('id_prato', 0);
        $idcategoria = (int) $this->getParam('id_categoria', 0);

        $select = $this->select();
        $select->where("p.id_prato = ?", $idprato);

        $prato = $select->query()->fetch();

        $this->view->prato = $prato;
    }

    private function select() {
        $dbAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();
        $select = $dbAdapter->select();
        $select->from(array(
            'p' => 'prato'
                ), array(
            'descricao',
            'preco',
            'id_prato'
        ));
        $select->joinInner(array(
            'c' => 'categoria'
                ), "p.id_categoria = c.id_categoria", array(
            "categoria"
        ));
        return $select;
    }

    private function selectCategoria() {
        $dbAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();
        $select = $dbAdapter->select();
        $select->from(array(
            'c' => 'categoria'
                ), array(
            'categoria',
            'id_categoria'
        ));
        return $select;
    }

}
