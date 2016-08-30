<?php

class CategoriaController extends Blog_Controller_Action {

    public function indexAction() {
        $tb = new Application_Model_DbTable_Categoria();
        $this->view->categorias = $tb->fetchAll();
        
        $this->view->podeCadastrar = $this->aclIsAllowed('categoria', 'create');
        $this->view->podeApagar = $this->aclIsAllowed('categoria', 'delete');
        $this->view->podeEditar = $this->aclIsAllowed('categoria', 'update');
    }

    public function createAction() {
        $frm = new Application_Form_Categoria();

        if ($this->getRequest()->isPost()) {
            $params = $this->getAllParams();

            if ($frm->isValid($params)) {
                $params = $frm->getValues();

                $categoria = new Application_Model_Vo_Categoria();
                $categoria->setCategoria($params['categoria']);

                $model = new Application_Model_CategoriaMapper();
                $model->salvar($categoria);

                $flashMessendge = $this->_helper->FlashMessenger;
                $flashMessendge->addMessage("A categoria foi salva");

                $this->_helper->Redirector->gotoSimpleAndExit('index');
            }
        }

        $this->view->frm = $frm;
    }

    public function updateAction() {

        $idcategoria = (int) $this->getParam('id_categoria', 0);

        $tab = new Application_Model_DbTable_Categoria();

        $row = $tab->fetchRow('id_categoria = ' . $idcategoria);

        if ($row === null) {
            echo "categoria inexistente";
            exit;
        }

        $frm = new Application_Form_Categoria();

        if ($this->getRequest()->isPost()) {
            $params = $this->getAllParams();

            if ($frm->isValid($params)) {
                $params = $frm->getValues();

                $categoria = new Application_Model_Vo_Categoria();
                $categoria->setCategoria($params['categoria']);
                $categoria->setId($idcategoria);

                $model = new Application_Model_CategoriaMapper();
                $model->atualizar($categoria);

                $flashMessendge = $this->_helper->FlashMessenger;
                $flashMessendge->addMessage("A categoria foi salva");

                $this->_helper->Redirector->gotoSimpleAndExit('index');
            }
        } else {
            // $frm->populate($row->toArray());
            $frm->populate(array(
                'categoria' => $row->categoria
            ));
        }

        $this->view->frm = $frm;
    }

    public function deleteAction() {
        $idcategoria = (int) $this->getParam('id_categoria', 0);
        $model = new Application_Model_CategoriaMapper();
        $flashMessenger = $this->_helper->FlashMessenger; 
        
        try {
            $model->apagar($idcategoria);
            $flashMessenger->addMessage('Registro apagado');
        } catch (Exception $ex) {
            $flashMessenger->addMessage($ex->getMessage());
        }
 
        $this->_helper->Redirector->gotoSimpleAndExit('index');
    }
  
}
