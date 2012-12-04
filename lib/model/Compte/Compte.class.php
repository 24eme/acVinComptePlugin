<?php

/**
 * Model for Compte
 *
 */
class Compte extends BaseCompte {

    public function constructId() {
        $this->set('_id', 'COMPTE-' . $this->identifiant);
    }

    public function getSociete() {
	return SocieteClient::getInstance()->find($this->id_societe);
    }

    public function setIdSociete($id) {
	$soc = SocieteClient::getInstance()->find($id);
	if (!$soc) {
		throw new sfException("Pas de société trouvée pour $id");
	}
	return $this->_set('id_societe', $soc->_id);
    }

    public function save() {
	parent::save();
	$soc = $this->getSociete();
	$soc->addCompte($this);
	$soc->save();
    }
}
