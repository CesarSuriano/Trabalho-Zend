<?php

class Application_Form_Usuario extends Zend_Form {

    private $emailNaoRepetidoVal;

    public function init() {
        $this->setMethod('post');

        $idusuario = new Zend_Form_Element_Hidden('id_usuario');
        $this->addElement($idusuario);

        $nome = new Zend_Form_Element_Text('nome', array(
            'label' => 'Nome completo',
            'required' => true,
        ));
        $nome->setAttrib('class', 'form-group form-control');
        $this->addElement($nome);

        $this->emailNaoRepetidoVal = new Zend_Validate_Db_NoRecordExists(array(
            'table' => 'usuario',
            'field' => 'email'
        ));
        

        $email = new Zend_Form_Element_Text('email', array(
            'label' => 'Endereço de email',
            'required' => true,
        ));
        $email->addValidator(new Zend_Validate_EmailAddress());
        $email->addValidator($this->emailNaoRepetidoVal);
        $email->setAttrib('class', 'form-group form-control');
        $this->addElement($email);

        $senha = new Zend_Form_Element_Password('senha', array(
            'label' => 'Senha',
            'required' => true,
        ));
        $senha->setAttrib('class', 'form-group form-control');
        $this->addElement($senha);

        $funcao = new Zend_Form_Element_Select('funcao', array(
            'label' => 'Função',
            'required' => true,
        ));
        $funcao->setMultiOptions(array(
            1 => 'Cozinheiro',
            2 => 'Gerente'
        ));
        $funcao->setAttrib('class', 'form-group form-control');
        $this->addElement($funcao);

        $submit = new Zend_Form_Element_Submit('submit', array(
            'label' => 'Salvar'
        ));
        $submit->setAttrib('class', 'btn btn-primary');
        
        $this->addElement($submit);
    }

    function setIdusuario($idusuario) {
        $this->emailNaoRepetidoVal->setExclude('id_usuario != ' . $idusuario);
    }

}
