<div class="conteneur-connexion">
	<div class="contenu-connexion">
		<a href="/"><img src="<?= base_url('assets/images/fléche retour.png') ?>" alt="retour" class="img-flecheRetour"></a>
		
		<?= form_open('/connexion', ['class' => 'form-connexion']); ?>
			<h2>Se connecter</h2>
			<?= form_label('Adresse e-mail', 'email'); ?>
			<?= form_input(['name' => 'email', 'id' => 'email', 'class' => '', 'value' => isset($_COOKIE['identifiant']) ? $_COOKIE['identifiant'] : '']); ?>
			<?= session()->getFlashdata('email') ?>
			<br>
			<?= form_label('Mot de passe *', 'password'); ?>
			<?= form_password(['name' => 'password', 'id' => 'password', 'class' => '']); ?>
			<?= session()->getFlashdata('password') ?>
			<br>
			<?= form_label('Se souvenir de moi', 'remember'); ?>
			<?= form_checkbox('remember', '1', isset($_COOKIE['identifiant']) && !empty($_COOKIE['identifiant']), ['id' => 'remember']) ?>

			<?= form_submit(['name' => 'submit', 'value' => 'Se connecter', 'class' => 'btnFJBG']); ?>

		<?= form_close(); ?>
			
		<div class="lien">
			<p>Mot de passe oublié ? <a href="/forgotpwd">Réinitialiser votre mot de passe</a></p>
			<p>Pas encore de compte ? <a href="/inscription">Devenez un Saiyan</a></p>
		</div>
	</div>
</div>
