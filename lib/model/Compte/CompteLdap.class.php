<?php
class CompteLdap extends acVinLdap {

    public function saveCompte($compte) 
    {
      return $this->save($compte->identifiant, $this->info($compte));
    }

    /**
     *
     * @param _Compte $compte
     * @return bool 
     */
    public function deleteCompte($compte) {
        return $this->delete($compte->identifiant);
    }
    
    /**
     *
     * @param _Compte $compte
     * @return array 
     */
    protected function info($compte) 
    {
      $info = array();
      $info['uid']              = $compte->identifiant;
      if ($compte->getNom()) 
	$info['sn']               = $compte->getNom();
      else
	$info['sn']               = $compte->nom_a_afficher;
      if ($compte->getPrenom())
      $info['givenName']        = $compte->getPrenom(); 
      $info['cn']               = $compte->nom_a_afficher;
      $info['objectClass'][0]   = 'top';
      $info['objectClass'][1]   = 'person';
      $info['objectClass'][2]   = 'posixAccount';
      $info['objectClass'][3]   = 'inetOrgPerson';
      $info['loginShell']       = '/bin/bash';
      $info['uidNumber']        = '1000';
      $info['gidNumber']        = '1000';
      $info['homeDirectory']    = '/home/'.$compte->identifiant;
      if ($compte->email)
      $info['mail']             = $compte->email;
      $info['street']           = preg_replace('/;/', '\n', $compte->adresse);
      if ($compte->adresse_complementaire)
	$info['street']        .= " \n ".preg_replace('/;/', '\n', $compte->adresse_complementaire);
      $info['o']                = $compte->getSociete()->raison_sociale;
      $info['l']                = $compte->commune;
      $info['postalCode']       = $compte->code_postal;
      if ($compte->telephone_bureau)
      $info['telephoneNumber']  = $compte->telephone_bureau;
      if ($compte->telephone_mobile)
      $info['mobile']           = $compte->telephone_mobile;
					      
      return $info;
    }
    
}
