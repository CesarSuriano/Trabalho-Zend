<?php

class Application_Form_Login extends Zend_Form
{
    public function init(){
        $this->setMethod("post"); 
        
        //$this->setAttrib('class', 'row col-xs-12');
        
        $email = new Zend_Form_Element_Text('email', array(
            'label' => 'Endereço de email',
            'required' => true
        ));
        
        $email->addValidator(new Zend_Validate_EmailAddress());
        $email->setAttrib('class', 'form-group form-control'); 
        $this->addElement($email);
        
        $senha = new Zend_Form_Element_Password('senha', array(
            'label' => 'Senha',
            'required' => true
        ));
        $senha->setAttrib('class', 'form-group form-control'); 
        $this->addElement($senha);
        
        $submit = new Zend_Form_Element_Submit('submit', array(
            'label' => "Entrar"
        ));
        $submit->setAttrib('class', 'btn btn-primary');
        $this->addElement($submit);     
        
    }


}

