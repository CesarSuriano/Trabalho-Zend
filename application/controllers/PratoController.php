<?php

class PratoController extends Blog_Controller_Action {

    public function indexAction() {

        $tab = new Application_Model_DbTable_Prato();
        $consulta = $tab->getAdapter()->select();
        $consulta->from(array(
            'p' => "prato"
                ), array(
            "id_prato",
            "descricao",
            "preco"
        ));


        $consulta->joinInner(array("c" => "categoria"), "c.id_categoria = p.id_categoria", array(
            "categoria"
        ));
        $consulta->where("p.id_categoria > ?", 0, Zend_Db::INT_TYPE);
        $consultaBd = $consulta->query()->fetchAll();


        $this->view->pratos = $consultaBd;
        $this->view->podeApagar = $this->aclIsAllowed('prato', 'delete');
        $this->view->podeEditar = $this->aclIsAllowed('prato', 'update');
    }

    public function createAction() {

        $podeEditar = $this->aclIsAllowed('categoria', 'create');

        if ($podeEditar) {
            $frm = new Application_Form_PratoGerente();
        } else {
            $frm = new Application_Form_Prato();
        }


        if ($this->getRequest()->isPost()) {
            $params = $this->getAllParams();

            if ($frm->isValid($params)) {
                $params = $frm->getValues();

                $prato = new Application_Model_Vo_Prato();
                $prato->setDescricao($params['descricao']);
                $prato->setId_categoria($params['id_categoria']);
                $prato->setPreco(str_replace(",", ".", $params['preco']));

                $model = new Application_Model_PratoMapper();
                $model->salvar($prato);

                $flashMessendge = $this->_helper->FlashMessenger;
                $flashMessendge->addMessage("Prato salvo");

                $this->_helper->Redirector->gotoSimpleAndExit('index');
            }
        }

        $this->view->frm = $frm;
    }

    public function updateAction() {

        $idprato = (int) $this->getParam('id_prato', 0);

        $tab = new Application_Model_DbTable_Prato();
        $row = $tab->fetchRow('id_prato = ' . $idprato);

        if ($row === null) {
            echo "Prato inexistente";
            exit;
        }

        $podeEditar = $this->aclIsAllowed('categoria', 'create');

        if ($podeEditar) {
            $frm = new Application_Form_PratoGerente();
        } else {
            $frm = new Application_Form_Prato();
        }

        if ($this->getRequest()->isPost()) {
            $params = $this->getAllParams();

            if ($frm->isValid($params)) {
                $params = $frm->getValues();

                $prato = new Application_Model_Vo_Prato();
                $prato->setDescricao($params['descricao']);
                $prato->setPreco(str_replace(",", ".", $params['preco']));
                $prato->setId_categoria($params['id_categoria']);
                $prato->setId($idprato);

                $model = new Application_Model_PratoMapper();
                $model->atualizar($prato, $podeEditar);

                $flashMessendge = $this->_helper->FlashMessenger;
                $flashMessendge->addMessage("O prato foi salvo");

                $this->_helper->Redirector->gotoSimpleAndExit('index');
            }
        } else {
            $frm->populate($row->toArray());
            $frm->populate(array(
                'descricao' => $row->descricao,
                'preco' => $row->preco,
                'id_categoria' => $row->id_categoria
            ));
        }

        $this->view->frm = $frm;
    }

    public function deleteAction() {
        $idprato = (int) $this->getParam('id_prato', 0);
        $model = new Application_Model_PratoMapper();
        $model->apagar($idprato);

        $flashMessenger = $this->_helper->FlashMessenger;
        $flashMessenger->addMessage("Prato apagado");
        $this->_helper->Redirector->gotoSimpleAndExit('index');
    }

}
