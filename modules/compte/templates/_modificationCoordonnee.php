<?php
$isCompteSociete = isset($isCompteSociete) && $isCompteSociete;
$colClass = ($isCompteSociete) ? 'col-xs-8' : 'col-xs-4';
?>
<div id="coordonnees_modification">

    <div class="panel panel-default">
        <div class="panel-heading"><h4 class="panel-title">Adresse</h4><span class="pull-right clickable pointer" style="margin-top: -20px; font-size: 15px;"><i class="glyphicon glyphicon-chevron-up"></i></span></div>
        <div class="panel-body">                  
            <?php
            echo $compteForm->renderHiddenFields();
            echo $compteForm->renderGlobalErrors();
            ?>
            <div class="form-group">
                <?php echo $compteForm['adresse']->renderError(); ?>
                <?php echo $compteForm['adresse']->renderLabel(null, array("class" => "col-xs-4 control-label")); ?>
                <?php if (!$isCompteSociete) : ?>
                    <div class="col-xs-4 control-label"><?php echo $compteSociete->adresse; ?></div>
                <?php endif; ?>
                <div class="<?php echo $colClass; ?>"><?php echo $compteForm['adresse']->render(); ?></div>
            </div>
            <div class="form-group">

                <?php echo $compteForm['adresse_complementaire']->renderLabel(null, array('class' => 'col-xs-4 control-label')); ?>
                <?php if (!$isCompteSociete) : ?>
                    <div class="col-xs-4 control-label"><?php echo $compteSociete->adresse_complementaire; ?></div> 
                <?php endif; ?>
                <div class="<?php echo $colClass; ?>"><?php echo $compteForm['adresse_complementaire']->render(); ?></div>
                <?php echo $compteForm['adresse_complementaire']->renderError(); ?>
            </div>
            <div class="form-group">

                <?php echo $compteForm['code_postal']->renderLabel(null, array('class' => 'col-xs-4 control-label')); ?>
                <?php if (!$isCompteSociete) : ?>
                    <div class="col-xs-4 control-label"><?php echo $compteSociete->code_postal; ?></div>
                <?php endif; ?>
                <div class="<?php echo $colClass; ?>"><?php echo $compteForm['code_postal']->render(); ?></div>
                <?php echo $compteForm['code_postal']->renderError(); ?>
            </div>
            <div class="form-group">

                <?php echo $compteForm['commune']->renderLabel(null, array('class' => 'col-xs-4 control-label')); ?>
                <?php if (!$isCompteSociete) : ?>
                    <div class="col-xs-4 control-label"><?php echo $compteSociete->commune; ?></div>
                <?php endif; ?>
                <div class="<?php echo $colClass; ?>"><?php echo $compteForm['commune']->render(); ?></div>
                <?php echo $compteForm['commune']->renderError(); ?>
            </div>                
            <div class="form-group">

                <?php echo $compteForm['cedex']->renderLabel(null, array('class' => 'col-xs-4 control-label')); ?>
                <?php if (!$isCompteSociete) : ?>
                    <div class="col-xs-4 control-label"><?php echo $compteSociete->cedex; ?></div>
                <?php endif; ?>
                <div class="<?php echo $colClass; ?>"><?php echo $compteForm['cedex']->render(); ?></div>
                <?php echo $compteForm['cedex']->renderError(); ?>
            </div>                 
            <div class="form-group">

                <?php echo $compteForm['pays']->renderLabel(null, array('class' => 'col-xs-4 control-label')); ?>
                <?php if (!$isCompteSociete) : ?>
                    <div class="col-xs-4 control-label"><?php echo $compteSociete->pays; ?></div>
                <?php endif; ?>
                <div class="<?php echo $colClass; ?>"><?php echo $compteForm['pays']->render(); ?></div>
                <?php echo $compteForm['pays']->renderError(); ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><h4 class="panel-title">E-mail / téléphone / fax</h4><span class="pull-right clickable pointer" style="margin-top: -20px; font-size: 15px;"><i class="glyphicon glyphicon-chevron-up"></i></span></div>
        <div class="panel-body">
            <div class="form-group">

                <?php echo $compteForm['email']->renderLabel(null, array('class' => 'col-xs-4 control-label')); ?>
                <?php if (!$isCompteSociete) : ?>
                    <div class="col-xs-4 control-label"><?php echo $compteSociete->email; ?></div>
                <?php endif; ?>
                <div class="<?php echo $colClass; ?>"><?php echo $compteForm['email']->render(); ?></div>

                <?php echo $compteForm['email']->renderError(); ?>
            </div>
            <div class="form-group">

                <?php echo $compteForm['telephone_perso']->renderLabel(null, array('class' => 'col-xs-4 control-label')); ?>
                <?php if (!$isCompteSociete) : ?>
                    <div class="col-xs-4 control-label"><?php echo $compteSociete->telephone_perso; ?></div>
                <?php endif; ?>
                <div class="<?php echo $colClass; ?>"><?php echo $compteForm['telephone_perso']->render(); ?></div>
                <?php echo $compteForm['telephone_perso']->renderError(); ?>
            </div>
            <div class="form-group">

                <?php echo $compteForm['telephone_bureau']->renderLabel(null, array('class' => 'col-xs-4 control-label')); ?>
                <?php if (!$isCompteSociete) : ?>
                    <div class="col-xs-4 control-label"><?php echo $compteSociete->telephone_bureau; ?></div>
                <?php endif; ?>
                <div class="<?php echo $colClass; ?>"><?php echo $compteForm['telephone_bureau']->render(); ?></div>
                <?php echo $compteForm['telephone_bureau']->renderError(); ?>
            </div>
            <div class="form-group">

                <?php echo $compteForm['telephone_mobile']->renderLabel(null, array('class' => 'col-xs-4 control-label')); ?>
                <?php if (!$isCompteSociete) : ?>
                    <div class="col-xs-4 control-label"><?php echo $compteSociete->telephone_mobile; ?></div>
                <?php endif; ?>
                <div class="<?php echo $colClass; ?>"><?php echo $compteForm['telephone_mobile']->render(); ?></div>
                <?php echo $compteForm['telephone_mobile']->renderError(); ?>
            </div>
            <div class="form-group">

                <?php echo $compteForm['fax']->renderLabel(null, array('class' => 'col-xs-4 control-label')); ?>
                <?php if (!$isCompteSociete) : ?>
                    <div class="col-xs-4 control-label"><?php echo $compteSociete->fax; ?></div>
                <?php endif; ?>
                <div class="<?php echo $colClass; ?>"><?php echo $compteForm['fax']->render(); ?></div>
                <?php echo $compteForm['fax']->renderError(); ?>
            </div>
            <?php if ($isCompteSociete): ?>
                <div class="form-group">

                    <?php echo $compteForm['site_internet']->renderLabel(null, array('class' => 'col-xs-4 control-label')); ?>
                    <div class="<?php echo $colClass; ?>"><?php echo $compteForm['site_internet']->render(); ?></div>
                    <?php echo $compteForm['site_internet']->renderError(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($isCompteSociete) : ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Droits</h4><span class="pull-right clickable pointer" style="margin-top: -20px; font-size: 15px;" ><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <?php echo $compteForm['droits']->renderError(); ?>
                    <div class="<?php echo $colClass; ?>"><?php echo $compteForm['droits']->render(); ?></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

