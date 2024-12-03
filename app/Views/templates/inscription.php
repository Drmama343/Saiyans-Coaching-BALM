<div class="conteneur-inscription">
	<img src="assets/images/fondAccueil.jpg" alt="test" class="img-fond">
	
	<div class="contenu-inscription">
		<a href="/"><img src="assets/images/fléche retour.png" alt="retour" class="img-flecheRetour"></a>
		<h2>S'inscrire</h2>
		<?= form_open('inscription', ['class' => 'form-connexion']); ?>
		<div class="form-group">
			<?= form_label('Nom', 'nom'); ?>
			<?= form_input(['name' => 'nom', 'id' => 'nom', 'class' => '', 'value' => set_value('nom')]); ?>

			<?= form_label('Prénom', 'prenom'); ?>
			<?= form_input(['name' => 'prenom', 'id' => 'prenom', 'class' => '', 'value' => set_value('prenom')]); ?>
			
			<?= form_label('Adresse e-mail', 'email'); ?>
			<?= form_input(['name' => 'email', 'id' => 'email', 'class' => '', 'value' => set_value('email')]); ?>

			<?= form_label('Mot de passe', 'password'); ?>
			<?= form_password(['name' => 'password', 'id' => 'password', 'class' => '']); ?>

			<?= form_label('Confirmer le mot de passe', 'password_confirm'); ?>
			<?= form_password(['name' => 'password_confirm', 'id' => 'password_confirm', 'class' => '']); ?>

			<?= form_label('Adresse', 'adresse'); ?>
			<?= form_input(['name' => 'adresse', 'id' => 'adresse', 'class' => '', 'value' => set_value('adresse')]); ?>

			<?= form_label('Téléphone', 'telephone'); ?>
			<?= form_input(['name' => 'telephone', 'id' => 'telephone', 'class' => '', 'value' => set_value('telephone')]); ?>

			<?= form_label('Âge', 'age'); ?>
			<?= form_input(['name' => 'age', 'id' => 'age', 'class' => '', 'value' => set_value('age')]); ?>
			
			<?= form_label('Poids', 'poids'); ?>
			<?= form_input(['name' => 'poids', 'id' => 'poids', 'class' => '', 'value' => set_value('poids')]); ?>

			<?= form_label('Taille', 'taille'); ?>
			<?= form_input(['name' => 'taille', 'id' => 'taille', 'class' => '', 'value' => set_value('taille')]); ?>

			<?= form_submit(['name' => 'submit', 'value' => 'Se connecter', 'class' => 'btnFJBG']); ?>
		</div>
		<?= form_close(); ?>

		<div class="lien-connexion">
			<p>Déjà un Saiyan ? <a href="/connexion">Connectez-vous</a></p>
		</div>
	</div>
</div>
