<?php

/* This file is part of the acVinComptePlugin package.
 * Copyright (c) 2011 Actualys
 * Authors :	
 * Tangui Morlier <tangui@tangui.eu.org>
 * Charlotte De Vichet <c.devichet@gmail.com>
 * Vincent Laurent <vince.laurent@gmail.com>
 * Jean-Baptiste Le Metayer <lemetayer.jb@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * acVinComptePlugin form.
 * 
 * @package    acVinComptePlugin
 * @subpackage lib
 * @author     Tangui Morlier <tangui@tangui.eu.org>
 * @author     Charlotte De Vichet <c.devichet@gmail.com>
 * @author     Vincent Laurent <vince.laurent@gmail.com>
 * @author     Jean-Baptiste Le Metayer <lemetayer.jb@gmail.com>
 * @version    0.1
 */
class acVinCompteModificationForm extends acVinCompteForm 
{
    
    /**
     * 
     */
    public function configure() 
    {
        parent::configure();
        $this->getValidator('mdp1')->setOption('required', false);
        $this->getValidator('mdp2')->setOption('required', false);
    }
    
    
    
	public function doUpdateObject($values) {
		parent::doUpdateObject($values);
		if (!$this->getObject()->isNew()) {
			$this->getObject()->setMotDePasseSSHA($values['mdp1']);
		}
	}
}