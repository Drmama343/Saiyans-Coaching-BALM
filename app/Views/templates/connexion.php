<div class="conteneur-connexion">
	<img src="assets/images/fondAccueil.jpg" alt="test" class="img-fond">
	
	<div class="contenu-connexion">
		<a href="/"><img src="assets/images/fléche retour.png" alt="retour" class="img-flecheRetour"></a>
		<h2>Se connecter</h2>
		<?= form_open('connexion', ['class' => 'form-connexion']); ?>
		<div class="form-group">
			<?= form_label('Adresse e-mail', 'email'); ?>
			<?= form_input(['name' => 'email', 'id' => 'email', 'class' => '', 'value' => set_value('email')]); ?>
			<?= form_label('Mot de passe', 'password'); ?>
			<?= form_password(['name' => 'password', 'id' => 'password', 'class' => '']); ?>
			<?= form_submit(['name' => 'submit', 'value' => 'Se connecter', 'class' => 'btnFJBG']); ?>
		</div>
		<?= form_close(); ?>

		<div class="lien-inscription">
			<p>Pas encore de compte ? <a href="/inscription">Inscrivez-vous</a></p>
		</div>
	</div>
</div>
