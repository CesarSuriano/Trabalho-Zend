<?php

class PratoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
                 $tb = new Application_Model_DbTable_Prato();
        $this->view->pratos = $tb->fetchAll();
    }


}

