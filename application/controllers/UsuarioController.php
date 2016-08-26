<?php

class UsuarioController extends Blog_Controller_Action {

    public function indexAction() {
        $tb = new Application_Model_DbTable_Usuario();
        $this->view->usuarios = $tb->fetchAll();

    }

    public function createAction() {
        $form = new Application_Form_Usuario();

        if($this->getRequest()->isPost()){
            $values = $this->getAllParams();
            
            if($form->isValid($values)){
                $model = new Application_Model_UsuarioMapper();
                
                $vo = new Application_Model_Vo_Usuario();
                $vo->setNome($form->getValue('nome'));
                $vo->setEmail($form->getValue('email'));
                $vo->setSenha($form->getValue('senha'));
                $vo->setFuncao($form->getValue('funcao'));
                
                $model->salvar($vo);
                
                $flashMessenger = $this->_helper->FlashMessenger;
                $flashMessenger->addMessage("Adiministrador salvo");
                
                $this->_helper->redirector->gotoSimpleAndExit('index');
                
            }
        }

        $this->view->frm = $form;
    }
    
        public function updateAction() {
        $flashMessenger = $this->_helper->FlashMessenger;

        $idusuario = (int) $this->getParam('id_usuario');
        $tb = new Application_Model_DbTable_Usuario();
        $usuarioRow = $tb->fetchRow('id_usuario = ' . $idusuario);

        if (!$usuarioRow) {
            $flashMessenger->addMessage('Administrador inexistente!');
            $this->_helper->redirector->gotoSimpleAndExit('index');
        }

        $form = new Application_Form_Usuario();
        $form->setIdusuario($idusuario);

        if ($this->getRequest()->isPost()) {
            $values = $this->getAllParams();
            if ($form->isValid($values)) {
                $model = new Application_Model_UsuarioMapper();

                $vo = new Application_Model_Vo_Usuario();
                $vo->setId($form->getValue('id_usuario'));
                $vo->setNome($form->getValue('nome'));
                $vo->setEmail($form->getValue('email'));
                $vo->setSenha($form->getValue('senha'));
                $vo->setFuncao($form->getValue('funcao'));

                $model->atualizar($vo);

                $flashMessenger->addMessage('Administrador atualizado!');

                $this->_helper->redirector->gotoSimpleAndExit('index');
            }
        } else {
            $form->populate(array(
                'id_usuario' => $usuarioRow->id_usuario,
                'nome' => $usuarioRow->nome,
                'email' => $usuarioRow->email,
                'senha' => $usuarioRow->senha,
                'funcao' =>$usuarioRow->funcao,
            ));
        }

        $this->view->frm = $form;
    }
    
    public function deleteAction(){
        $idusuario = (int) $this->getParam('id_usuario');
        $model = new Application_Model_UsuarioMapper();
        
        $flashMessenger = $this->_helper->FlashMessenger;
        
        try {
            $model->apagar($idusuario);
            $flashMessenger->addMessage("Usuario apagado");
        } catch (Exception $ex) {
            $flashMessenger->addMessage($ex->getMessage());
        }
        
        $this->_helper->redirector->gotoSimpleAndExit('index');
    }

}
