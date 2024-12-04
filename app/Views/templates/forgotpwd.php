<div class="conteneur-connexion">

	<div class="contenu-connexion">
		<a href="/"><img src="assets/images/fléche retour.png" alt="retour" class="img-flecheRetour"></a>
		<?= form_open('/forgotpwd', ['class' => 'form-connexion']) ?>
			<h3>Réinitialisation du mot de passe</h3>
			<?= form_label('Email', 'mail') ?>
			<?= form_input('mail', '', ['placeholder' => 'Email', 'required' => 'required']) ?>
			<br>
			<?= form_submit('submit', 'Envoyer un lien de réinitialisation') ?>
		<?= form_close() ?>
			
		<div class="lien">
			<p>Se connecter ? <a href="/connexion">Connexion</a></p>
		</div>
	</div>
</div>
