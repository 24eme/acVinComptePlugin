<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class CompteSocieteModificationForm
 * @author mathurin
 */
class CompteSocieteModificationForm extends acCouchdbObjectForm {

    public function __construct(Compte $compte, $options = array(), $CSRFSecret = null) {
        parent::__construct($compte, $options, $CSRFSecret);
    }

    public function configure() {
        $this->setWidget('adresse', new sfWidgetFormInput());
        $this->setWidget('adresse_complementaire', new sfWidgetFormInput());
        $this->setWidget('code_postal', new sfWidgetFormInput());
        $this->setWidget('commune', new sfWidgetFormInput());
        $this->setWidget('cedex', new sfWidgetFormInput());
        $this->setWidget('pays', new sfWidgetFormChoice(array('choices' => $this->getCountryList()), array('class' => 'autocomplete')));
        $this->setWidget('email', new sfWidgetFormInput());
        $this->setWidget('telephone_bureau', new sfWidgetFormInput());
        $this->setWidget('telephone_mobile', new sfWidgetFormInput());
        $this->setWidget('fax', new sfWidgetFormInput());
     //   $this->setWidget('tags', new sfWidgetFormChoice(array('choices' => $this->getAllTags())));
        
        
        $this->widgetSchema->setLabel('adresse', 'N° et nom de rue');
        $this->widgetSchema->setLabel('adresse_complementaire', 'Adresse complémentaire');
        $this->widgetSchema->setLabel('code_postal', 'CP');
        $this->widgetSchema->setLabel('commune', 'Ville');
        $this->widgetSchema->setLabel('cedex', 'Cedex');
        $this->widgetSchema->setLabel('pays', 'Pays');
        $this->widgetSchema->setLabel('email', 'E-mail');
        $this->widgetSchema->setLabel('telephone_bureau', 'Telephone Bureau');
        $this->widgetSchema->setLabel('telephone_mobile', 'Mobile');
        $this->widgetSchema->setLabel('fax', 'Fax');
    //    $this->widgetSchema->setLabel('tags', 'Tags');
        
        $this->setValidator('adresse', new sfValidatorString(array('required' => true)));
        $this->setValidator('adresse_complementaire', new sfValidatorString(array('required' => false)));
        $this->setValidator('code_postal', new sfValidatorString(array('required' => true)));
        $this->setValidator('commune', new sfValidatorString(array('required' => true)));
        $this->setValidator('cedex', new sfValidatorString(array('required' => false)));
        $this->setValidator('pays', new sfValidatorChoice(array('required' => true, 'choices' => array_keys($this->getCountryList()))));
        $this->setValidator('email', new sfValidatorString(array('required' => false)));
        $this->setValidator('telephone_bureau', new sfValidatorString(array('required' => true)));
        $this->setValidator('telephone_mobile', new sfValidatorString(array('required' => false)));        
        $this->setValidator('fax', new sfValidatorString(array('required' => false)));
      //  $this->setValidator('tags', new sfValidatorChoice(array('required' => false, 'choices' => array_keys($this->getAllTags()))));
        
        $this->widgetSchema->setNameFormat('compte_modification[%s]');
    }

    public function getCountryList() {
        $destinationChoicesWidget = new sfWidgetFormI18nChoiceCountry(array('culture' => 'fr', 'add_empty' => true));
        $destinationChoices = $destinationChoicesWidget->getChoices();
        $destinationChoices['inconnu'] = 'Inconnu';
        return $destinationChoices;
    }
    
    public function getAllTags(){
        return CompteClient::getInstance()->getAllTags();
    }

    public function doUpdateObject($values) {
        parent::doUpdateObject($values);
    }

}