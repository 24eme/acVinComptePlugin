<section id="principal" class="recherche_contact">
<script>
   $(document).ready(function() {
   $(".removetag").click(function() {
       return confirm('Etes vous sur(e) de vouloir supprimer définivement ce tag pour ces <?php echo $nb_results; ?> fiches ?');
     });
     });
</script>
	<section id="contenu_etape">
		<form>
			<div id="recherche_contact" class="section_label_maj">
                           <div>
   <label for="champ_recherche">Recherche d'un contact&nbsp;:</label><br /><?php //'; ?>
				<input id="champ_recherche" class="ui-autocomplete-input" type="text" name="q" value="<?php echo $q; ?>" role="textbox" aria-autocomplete="list" aria-haspopup="true"> 
				<button id="btn_rechercher" type="submit">Rechercher</button>
                           </div>
<div>
<label for="contacts_all">Inclure les contacts suspendus </label>
<input type="checkbox" value="1" name="contacts_all" id="contacts_all"<?php if($contacts_all) echo " CHECKED"; ?>/>
</div>
			</div>
		</form>
	</section>

	<span><?php echo $nb_results; ?> résultat(s) trouvé(s) (page <?php echo $current_page; ?> sur <?php echo $last_page; ?>)</span>
	
	<a class="btn_majeur btn_excel" href="<?php echo url_for('compte_search_csv', $args); ?>">Télécharger le tableur</a>
	
	
	
	<?php if($nb_results > 0): ?>
	
		<table id="resultats_contact" class="table_recap">	
			<?php $cpt = 0; ?>

			<thead>
				<tr>
					<th>Nom</th>
					<th>Adresse</th>
					<th>Téléphone</th>
					<th>Email</th>
					<th>Détail</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach($results as $res): ?>

					<?php 
						$data = $res->getData();
						$class = ($cpt % 2) ? ' class="even"' : ''; 
					?>

					<tr <?php echo $class; ?>>
						<td><?php echo $data['nom_a_afficher']; ?></td>
						<td><?php echo $data['adresse']; ?>, <?php echo $data['code_postal']; ?>, <?php echo $data['commune']; ?></td>
						<td><?php echo $data['telephone_bureau']; ?> <?php echo $data['telephone_mobile'] ?> <?php echo $data['telephone_perso']; ?> <?php echo $data['fax']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><a href="<?php echo url_for('compte_visualisation', array('identifiant' => $data['identifiant'])); ?>">détail</a></td>
					</tr>

				<?php endforeach; ?>
			</tbody>
		</table>

		<div class="pagination">
			<div class="page_precedente">
				<?php 
                                $args_copy = $args;
                                $args = array('q' => $q); ?>
<?php if ($current_page > 1) : ?>
				<a href="<?php echo url_for('compte_search', $args); ?>"> <<- </a>
				<?php if ($current_page > 1) $args['page'] = $current_page - 1; ?>
				<a href="<?php echo url_for('compte_search', $args); ?>"> <- </a>
<?php endif; ?>
			</div>
			<div class="page_suivante">
				<?php if ($current_page < $last_page) $args['page'] = $current_page + 1; else $args['page'] = $last_page ;?>
<?php if ($current_page != $args['page']): ?>
				<a href="<?php echo url_for('compte_search', $args); ?>"> -> </a>
<?php endif; ?>
				<?php $args['page'] = $last_page; ?>
<?php if ($current_page != $args['page']): ?>
                                <a href="<?php echo url_for('compte_search', $args); ?>"> ->> </a>
<?php endif; ?>
			</div>
		</div>
	
	<?php endif; ?>

</section>
<?php
	slot('colButtons'); 
?>
 <div class="bloc_col" >
	<h2>Actions</h2>

	<div class="contenu">
		<ul>
			<li class=""><a class="btn_majeur btn_acces" href="<?php echo url_for('societe');?>">Accueil des contacts</a></li>
		</ul>
	</div>
</div>
<?php
	end_slot();
?>

<?php slot('colApplications');  ?>
		<?php if (count($selected_typetags)) :  ?>
			<div class="bloc_col">
				<h2>tags sélectionnés</h2>
				<ul class="liste_tags">
					<li>
						<?php foreach($selected_typetags as $type => $selected_tags) : ?>
							<ul>
								<li class="typetag"><h3><?php echo $type; ?></h3></li>
								<?php foreach($selected_tags as $t) {
									$targs = $args_copy->getRawValue();
									$targs['tags'] = implode(',', array_diff($selected_rawtags->getRawValue(), array($type.':'.$t)));
									echo '<li><a href="'.url_for('compte_search', $targs).'">'.str_replace('_', ' ', $t).'</a>&nbsp;';
									$targs = $args_copy->getRawValue();
									$targs['tag'] = $t;
									if ($type == 'manuel') {
									  echo '(<a class="removetag" href="'.url_for('compte_removetag', $targs).'">X</a>)';
									}
									echo '</li>';
									} ?>
							</ul>
						<?php endforeach ?>
					</li>
				</ul>
			</div>
		<?php endif; ?>

		<div class="bloc_col">
			<h2>tags dispos</h2>
			<ul class="liste_tags">
				<?php 
				foreach($facets as $type => $ftype) {
				  if (count($ftype['terms'])) {
					echo '<li class="typetag">'.$type.'</li><ul>';
					foreach($ftype['terms'] as $f) {
                                           if (preg_match('/^(export|produit)_/', $f['term'])) {
                                                continue;
                                            }

					  $targs = $args_copy->getRawValue();
					  $targs['tags'] = implode(',', array_merge($selected_rawtags->getRawValue(), array($type.':'.$f['term'])));
					  echo '<li><a href="'.url_for('compte_search', $targs).'">'.str_replace('_', ' ', $f['term']).' ('.$f['count'].')</a></li>';
					}
					echo '</ul>';
				  }
				}
				?>
			</ul>
		</div>

		<div class="bloc_col">
		
			<h2>Créer un tag</h2>

			<form class="form_ajout_tag" action="<?php echo url_for('compte_addtag', $args_copy->getRawValue()); ?>" method="GET">
			<input id="creer_tag" name="tag" class="tags" type="text" />
			<input type="submit" value="ajouter" class="btn_majeur btn_modifier"/>
			<input type="hidden" name="q" value="<?php echo $q;?>"/>
			<input type="hidden" name="tags" value="<?php echo implode(',', $selected_rawtags->getRawValue()); ?>"/>
			</form>
		</div>
<?php end_slot(); ?>
