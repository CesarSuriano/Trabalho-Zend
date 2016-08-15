<?php

class UsuarioController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
         $tb = new Application_Model_DbTable_Usuario();
        $this->view->admins = $tb->fetchAll();
    
//        $usuario = new Application_Model_UsuarioMapper();
//        $this->view->entries = $usuario->fetchAll();
    
    }


}

