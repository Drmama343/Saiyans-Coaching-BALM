<div class="conteneur-connexion">
	<img src="<?= base_url('assets/images/fondAccueil.jpg') ?>" alt="test" class="img-fond">

	<div class="contenu-connexion">
		<a href="/"><img src="<?= base_url('assets/images/fléche retour.png') ?>" alt="retour" class="img-flecheRetour"></a>
		<div class="form-group">
			<h1>Réinitialisation du mot de passe</h1>
			<?= form_open('/forgotpwd', ['class' => 'form-connexion']) ?>
				<?= form_label('Email', 'mail') ?>
				<?= form_input('mail', '', ['placeholder' => 'Email', 'required' => 'required']) ?>
				<br>
				<?= form_submit('submit', 'Envoyer un lien de réinitialisation') ?>
			<?= form_close() ?>
		</div>
			
		<div class="lien-inscription">
			<p>Se connecter ? <a href="/connexion">Connexion</a></p>
		</div>
	</div>
</div>
