<div id="principal" class="clearfix">
    <form action="" method="post" id="principal">

        <h2 class="titre_principal">Création de votre compte</h2>


        <p class="titre_section">Merci d'indiquer votre e-mail et un mot de passe: </p>
        <br/>
        <div id="creation_compte_teledeclaration" class="fond" >
            <div class="bloc_form bloc_form_condensed">               

                <?php echo $form->renderHiddenFields(); ?>
                <?php echo $form->renderGlobalErrors(); ?>
                <div class="ligne_form ligne_form_alt">
                    <?php echo $form['email']->renderError() ?>
                    <?php echo $form['email']->renderLabel() ?>
                    <?php echo $form['email']->render() ?>
                </div>
                <div class="ligne_form">
                    <?php echo $form['mdp1']->renderError() ?>
                    <?php echo $form['mdp1']->renderLabel() ?>
                    <?php echo $form['mdp1']->render() ?>
                </div>
                <div class="ligne_form ligne_form_alt">
                    <?php echo $form['mdp2']->renderError() ?>
                    <?php echo $form['mdp2']->renderLabel() ?>
                    <?php echo $form['mdp2']->render() ?>
                </div>
                <?php if ($form->getTypeCompte() == SocieteClient::SUB_TYPE_COURTIER): ?>
                    <div class="ligne_form ">
                        <?php echo $form['carte_pro']->renderError() ?>
                        <?php echo $form['carte_pro']->renderLabel() ?>
                        <?php echo $form['carte_pro']->render() ?>
                    </div>
                <?php endif; ?>
                <?php if (($form->getTypeCompte() == SocieteClient::SUB_TYPE_VITICULTEUR) || ($form->getTypeCompte() == SocieteClient::SUB_TYPE_NEGOCIANT)): ?>
                    <div class="ligne_form ">
                        <?php echo $form['siret']->renderError() ?>
                        <?php echo $form['siret']->renderLabel() ?>
                        <?php echo $form['siret']->render() ?>
                    </div>
                <?php endif; ?>             
            </div>
        </div> 
        <div style="margin: 10px 0; clear: both; float: right;">
            <button class="btn_vert btn_majeur " type="submit">Valider</button> 
        </div>
    </form>
</div>   
<?php slot('colReglementation'); ?>
<?php include_partial('compte_teledeclarant/colReglementation'); ?>
<?php end_slot(); ?>
