<div class="conteneur-inscription">
	
	<div class="contenu-inscription">
		<a href="/"><img src="assets/images/fléche retour.png" alt="retour" class="img-flecheRetour"></a>
		<?= form_open('inscription', ['class' => 'form-inscription']); ?>
			<h2>S'inscrire</h2>
			<div class="form-grid">
				<div class="cellule-grid">
					<?= form_label('Nom *', 'nom'); ?>
					<?= form_input(['name' => 'nom', 'id' => 'nom', 'class' => '', 'value' => set_value('nom')]); ?>
				</div>

				<div class="cellule-grid">
					<?= form_label('Prénom *', 'prenom'); ?>
					<?= form_input(['name' => 'prenom', 'id' => 'prenom', 'class' => '', 'value' => set_value('prenom')]); ?>
				</div>

				<div class="cellule-grid">
					<?= form_label('Adresse', 'adresse'); ?>
					<?= form_input(['name' => 'adresse', 'id' => 'adresse', 'class' => '', 'value' => set_value('adresse')]); ?>
				</div>
				
				<div class="cellule-grid-suggestions" id="cellule-grid-suggestions">
					<h3 id="titre-suggestions">Proposition d'adresse</h3>
					<div id="suggestions" class="suggestions"></div>
				</div>

				<div class="cellule-grid">
					<?= form_label('Téléphone', 'telephone'); ?>
					<?= form_input(['name' => 'telephone', 'id' => 'telephone', 'class' => '', 'value' => set_value('telephone')]); ?>
				</div>

				<div class="cellule-grid">
					<?= form_label('Adresse e-mail *', 'email'); ?>
					<?= form_input(['name' => 'email', 'id' => 'email', 'class' => '', 'value' => set_value('email')]); ?>
				</div>

				<div class="cellule-grid">
					<?= form_label('Âge *', 'age'); ?>
					<?= form_input(['name' => 'age', 'id' => 'age', 'class' => '', 'value' => set_value('age')]); ?>
				</div>
				
				<div class="cellule-grid">
					<?= form_label('Poids *', 'poids'); ?>
					<?= form_input(['name' => 'poids', 'id' => 'poids', 'class' => '', 'value' => set_value('poids')]); ?>
				</div>

				<div class="cellule-grid">
					<?= form_label('Taille *', 'taille'); ?>
					<?= form_input(['name' => 'taille', 'id' => 'taille', 'class' => '', 'value' => set_value('taille')]); ?>
				</div>

				<div class="cellule-grid">
					<?= form_label('Mot de passe *', 'password'); ?>
					<?= form_password(['name' => 'password', 'id' => 'password', 'class' => '']); ?>
				</div>

				<div class="cellule-grid">
					<?= form_label('Confirmer le mot de passe *', 'password_confirm'); ?>
					<?= form_password(['name' => 'password_confirm', 'id' => 'password_confirm', 'class' => '']); ?>
				</div>
			</div>
			<?= form_submit(['name' => 'submit', 'value' => 'S\'inscrire', 'class' => 'btnFJBG']); ?>
		<?= form_close(); ?>

		<div class="lien-connexion">
			<p>Déjà un Saiyan ? <a href="/connexion">Connectez-vous</a></p>
		</div>
	</div>
</div>
