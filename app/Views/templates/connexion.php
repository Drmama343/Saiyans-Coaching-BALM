<div class="conteneur-connexion">
	<img src="assets/images/fondAccueil.jpg" alt="test" class="img-fond">
	
	<div class="contenu-connexion">
		<a href="/"><img src="assets/images/fléche retour.png" alt="retour" class="img-flecheRetour"></a>
		<div class="form-group">
			<h2>Se connecter</h2>
			<?= form_open('connexion', ['class' => 'form-connexion']); ?>
				<?= form_label('Adresse e-mail', 'email'); ?>
				<?= form_input(['name' => 'email', 'id' => 'email', 'class' => '', 'value' => set_value('email')]); ?>
				<?= form_label('Mot de passe', 'password'); ?>
				<?= form_password(['name' => 'password', 'id' => 'password', 'class' => '']); ?>
				<?= form_submit(['name' => 'submit', 'value' => 'Se connecter', 'class' => 'btnFJBG']); ?>
			<?= form_close(); ?>
		</div>
			
		<div class="lien-inscription">
			<p>Pas encore de compte ? <a href="/inscription">Devenez un Saiyan</a></p>
		</div>
	</div>
</div>
