<?php 
	$title = "Saiyan's Coaching - Questionnaire";
	$style = "stlQuestionnaire.css";
	$navbar = "stlNavbar.css";
	include 'header.php';
	include 'navbar.php';
?>

<div class="conteneur-questionnaire">
	<div class="contenu-questionnaire">

		<h2>Formulaire de coaching</h2>
		<?= form_open('/questionnaire', ['class' => 'form-coaching']); ?>

			<!-- Question 1 -->
			<?= form_label('1. Êtes-vous ? *', 'genre', ['class' => 'question']); ?>
			<div class="reponses">
				<?= form_radio('genre', 'homme', false, ['id' => 'homme']); ?>
				<?= form_label('Un homme', 'homme'); ?>
				<br>
				<?= form_radio('genre', 'femme', false, ['id' => 'femme']); ?>
				<?= form_label('Une femme', 'femme'); ?>
			</div>
			<br>

			<!-- Question 2 -->
			<?= form_label('2. Quels sont vos principaux objectifs ? *', 'objectifs', ['class' => 'question']); ?>
			<div class="reponses">
				<?= form_checkbox('objectifs[]', 'perte_de_poids', false); ?>
				<?= form_label('Perte de poids', 'perte_de_poids'); ?>
				<br>
				<?= form_checkbox('objectifs[]', 'prise_de_muscle', false); ?>
				<?= form_label('Prise de muscle', 'prise_de_muscle'); ?>
				<br>
				<?= form_checkbox('objectifs[]', 'amelioration_flexibilite', false); ?>
				<?= form_label('Amélioration de la flexibilité et de la mobilité', 'amelioration_flexibilite'); ?>
				<br>
				<?= form_checkbox('objectifs[]', 'amelioration_endurance', false); ?>
				<?= form_label('Amélioration de l’endurance et de la condition physique', 'amelioration_endurance'); ?>
				<br>
				<?= form_checkbox('objectifs[]', 'bien_etre_general', false); ?>
				<?= form_label('Amélioration du bien-être général (santé, sommeil, gestion du stress)', 'bien_etre_general'); ?>
				<br>
				<?= form_checkbox('objectifs[]', 'developpement_personnel', false); ?>
				<?= form_label('Développement personnel et confiance en soi', 'developpement_personnel'); ?>
				<br>
				<?= form_checkbox('objectifs[]', 'autre', false); ?>
				<?= form_label('Autre (précisez)', 'autre'); ?>
				<?= form_input(['name' => 'objectif_autre', 'id' => 'objectif_autre', 'placeholder' => 'Précisez...']); ?>
			</div>
			<br>

			<!-- Question 3 -->
			<?= form_label('3. Quel est votre niveau actuel de condition physique ? *', 'condition_physique', ['class' => 'question']); ?>
			<div class="reponses">
				<?= form_radio('condition_physique', 'debutant', false, ['id' => 'debutant']); ?>
				<?= form_label('Débutant', 'debutant'); ?>
				<br>
				<?= form_radio('condition_physique', 'intermediaire', false, ['id' => 'intermediaire']); ?>
				<?= form_label('Intermédiaire', 'intermediaire'); ?>
				<br>
				<?= form_radio('condition_physique', 'avance', false, ['id' => 'avance']); ?>
				<?= form_label('Avancé', 'avance'); ?>
			</div>
			<br>

			<!-- Question 4 -->
			<?= form_label('4. Combien de temps pouvez-vous consacrer à votre programme par semaine ? *', 'temps_par_semaine', ['class' => 'question']); ?>
			<div class="reponses">
				<?= form_radio('temps_par_semaine', 'moins_de_2_heures', false); ?>
				<?= form_label('Moins de 2 heures par semaine', 'moins_de_2_heures'); ?>
				<br>
				<?= form_radio('temps_par_semaine', '2_a_4_heures', false); ?>
				<?= form_label('2 à 4 heures par semaine', '2_a_4_heures'); ?>
				<br>
				<?= form_radio('temps_par_semaine', '4_a_6_heures', false); ?>
				<?= form_label('4 à 6 heures par semaine', '4_a_6_heures'); ?>
				<br>
				<?= form_radio('temps_par_semaine', 'plus_de_6_heures', false); ?>
				<?= form_label('Plus de 6 heures par semaine', 'plus_de_6_heures'); ?>
			</div>
			<br>

			<!-- Question 5 -->
			<?= form_label('5. Avez-vous des contraintes physiques ou des blessures à prendre en compte ? *', 'contraintes', ['class' => 'question']); ?>
			<div class="reponses">
				<?= form_checkbox('contraintes', 'oui', false, ['id' => 'oui']); ?>
				<?= form_label('Oui (précisez)', 'oui'); ?>
				<?= form_input(['name' => 'detail_contraintes', 'id' => 'detail_contraintes', 'placeholder' => 'Précisez...']); ?>
				<br>
				<?= form_checkbox('contraintes', 'non', false, ['id' => 'non']); ?>
				<?= form_label('Non, aucune limitation', 'non'); ?>
			</div>
			<br>

			<!-- Question 6 -->
			<?= form_label('6. Quels types d’exercices ou d’activités préférez-vous ? *', 'activites', ['class' => 'question']); ?>
			<div class="reponses">
				<?= form_checkbox('activites[]', 'cardio', false); ?>
				<?= form_label('Cardio (course, vélo, HIIT, etc.)', 'cardio'); ?>
				<br>
				<?= form_checkbox('activites[]', 'renforcement', false); ?>
				<?= form_label('Renforcement musculaire (musculation, poids libres)', 'renforcement'); ?>
				<br>
				<?= form_checkbox('activites[]', 'souplesse', false); ?>
				<?= form_label('Exercices de souplesse (yoga, pilates)', 'souplesse'); ?>
				<br>
				<?= form_checkbox('activites[]', 'sports_collectifs', false); ?>
				<?= form_label('Sports collectifs ou d’équipe', 'sports_collectifs'); ?>
				<br>
				<?= form_checkbox('activites[]', 'exterieur', false); ?>
				<?= form_label('Exercices en extérieur (randonnée, course à pied, etc.)', 'exterieur'); ?>
				<br>
				<?= form_checkbox('activites[]', 'autre', false); ?>
				<?= form_label('Autre (précisez)', 'autre'); ?>
				<?= form_input(['name' => 'activite_autre', 'id' => 'activite_autre', 'placeholder' => 'Précisez...']); ?>
			</div>
			<br>

			<!-- Question 7 -->
			<?= form_label('7. Avez-vous des préférences pour le suivi de votre programme ? *', 'suivi_programme', ['class' => 'question']); ?>
			<div class="reponses">
				<?= form_radio('suivi_programme', 'coaching_presentiel', false); ?>
				<?= form_label('Coaching individuel en présentiel', 'coaching_presentiel'); ?>
				<br>
				<?= form_radio('suivi_programme', 'coaching_ligne', false); ?>
				<?= form_label('Coaching individuel en ligne', 'coaching_ligne'); ?>
				<br>
				<?= form_radio('suivi_programme', 'programme_autonome', false); ?>
				<?= form_label('Programme autonome avec support en ligne', 'programme_autonome'); ?>
				<br>
				<?= form_radio('suivi_programme', 'programme_groupe', false); ?>
				<?= form_label('Programme en groupe ou en classe', 'programme_groupe'); ?>
				<br>
				<?= form_radio('suivi_programme', 'peu_importe', false); ?>
				<?= form_label('Peu importe', 'peu_importe'); ?>
			</div>
			<br>

			<!-- Question 8 -->
			<?= form_label('8. Quels résultats souhaitez-vous atteindre et dans quel délai ? *', 'resultats', ['class' => 'question']); ?>
			<div class="reponses">
				<?= form_textarea(['name' => 'resultats', 'id' => 'resultats', 'placeholder' => 'Exemple : “Perdre 5 kg en 3 mois” ou “Augmenter ma force d’ici 6 mois”']); ?>
			</div>
			<br>

			<!-- Question 9 -->
			<?= form_label('9. Privilégiez-vous un style de coaching particulier ? *', 'style_coaching', ['class' => 'question']); ?>
			<div class="reponses">
				<?= form_radio('style_coaching', 'motivant', false); ?>
				<?= form_label('Coaching motivant et énergique', 'motivant'); ?>
				<br>
				<?= form_radio('style_coaching', 'calme', false); ?>
				<?= form_label('Coaching plus calme et structuré', 'calme'); ?>
				<br>
				<?= form_radio('style_coaching', 'mental', false); ?>
				<?= form_label('Coaching avec un focus mental (méditation, gestion du stress)', 'mental'); ?>
				<br>
				<?= form_radio('style_coaching', 'peu_importe', false); ?>
				<?= form_label('Peu importe', 'peu_importe'); ?>
			</div>
			<br>

			<!-- Question 10 -->
			<?= form_label('10. Êtes-vous intéressé par des conseils nutritionnels dans le cadre de votre programme ? *', 'conseils_nutritionnels', ['class' => 'question']); ?>
			<div class="reponses">
				<?= form_radio('conseils_nutritionnels', 'oui', false); ?>
				<?= form_label('Oui', 'oui'); ?>
				<br>
				<?= form_radio('conseils_nutritionnels', 'non', false); ?>
				<?= form_label('Non', 'non'); ?>
				<br>
				<?= form_radio('conseils_nutritionnels', 'peut_etre', false); ?>
				<?= form_label('Peut-être', 'peut_etre'); ?>
			</div>
			<br>

			<!-- Question 11 -->
			<?= form_label('11. Souhaitez-vous ajouter des précisions ou des informations supplémentaires ? *', 'precisions', ['class' => 'question']); ?>
			<div class="reponses">
				<?= form_textarea(['name' => 'precisions', 'id' => 'precisions', 'placeholder' => 'Exemple : disponibilité, objectifs spécifiques, attentes']); ?>
			</div>
			<br>

			<?= form_submit('submit', 'Envoyer', ['class' => 'btnFJBG']); ?>
		<?= form_close(); ?>

	</div>
</div>

<?php include 'footer.php'; ?>