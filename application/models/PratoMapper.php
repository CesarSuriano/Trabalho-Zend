<?php

class Application_Model_PratoMapper {

    public function apagar($idprato) {
        $tab = new Application_Model_DbTable_Prato();
        $tab->delete("id_prato = $idprato");
        return true;
    }

    public function atualizar(Application_Model_Vo_Prato $prato, $podeEditar) {
        $tab = new Application_Model_DbTable_Prato();


        if ($podeEditar) {
            $tab->update(array(
                'descricao' => $prato->getDescricao(),
                'preco' => number_format($prato->getPreco(), 2, ',' , '.'),
                'id_categoria' => $prato->getId_categoria()
            ),  'id_prato =' . $prato->getId());
        } else {
            $tab->update(array(
                'descricao' => $prato->getDescricao(),
                'id_categoria' => $prato->getId_categoria()
            ),  'id_prato =' . $prato->getId());
        }



        return true;
    }

    public function salvar(Application_Model_Vo_Prato $prato) {
        $tab = new Application_Model_DbTable_Prato();

        $tab->insert(array(
            'descricao' => $prato->getDescricao(),
            'preco' => number_format($prato->getPreco(), 2, ',' , '.'),
            'id_categoria' => $prato->getId_categoria()
        ));

        $id = $tab->getAdapter()->lastInsertId();
        $prato->getId($id);
        return true;
    }

}
