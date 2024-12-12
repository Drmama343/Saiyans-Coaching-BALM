<div class="conteneur-connexion">
	<div class="contenu-connexion">
		<a href="/"><img src="<?= base_url('assets/images/fléche retour.png') ?>" alt="retour" class="img-flecheRetour"></a>
			<?= form_open('/forgotpwd', ['class' => 'form-connexion']) ?>
				<h3>Réinitialisation du mot de passe</h3>
				<br>
				<?= session()->getFlashdata('message') ?>
				<br>
				<?= form_label('Email', 'mail') ?>
				<?= form_input('mail', '', ['placeholder' => 'Email', 'required' => 'required']) ?>
				<?= session()->getFlashdata('error_forgotpwd') ?>
				<br>
				<?= form_submit('submit', 'Envoyer un lien de réinitialisation', ['class' => 'btnFJBG']) ?>
			<?= form_close() ?>
		<div class="lien">
			<p>Se connecter ? <a href="/connexion">Connexion</a></p>
		</div>
	</div>
</div>
