<?php

class Application_Model_UsuarioMapper {

    public function apagar($idusuario) {
        $tab = new Application_Model_DbTable_Usuario();
        //$tab->delete("id_usuario = $idusuario");
        throw new Exception('O usuário não pode ser apagado do sistema');
    }

    public function atualizar(Application_Model_Vo_Usuario $usario) {
        $tb = new Application_Model_DbTable_Usuario();

        $tb->update(array(
            'nome' => $usario->getNome(),
            'email' => $usario->getEmail(),
            'senha' => $usario->getSenha(),
            'funcao' => $usario->getFuncao(),
                ), 'id_usuario = ' . $usario
                ->getId());
    }

    public function salvar(Application_Model_Vo_Usuario $usario) {
        $tb = new Application_Model_DbTable_Usuario();

        $tb->insert(array(
            'nome' => $usario->getNome(),
            'email' => $usario->getEmail(),
            'senha' => $usario->getSenha(),
            'funcao' => $usario->getFuncao(),
        ));

        $usario->setId($tb->getAdapter()->lastInsertId());
    }


}
