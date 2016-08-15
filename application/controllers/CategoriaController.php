<?php

class CategoriaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
                 $tb = new Application_Model_DbTable_Categoria();
        $this->view->categorias = $tb->fetchAll();
    }


}

