<div class="conteneur-connexion">
	<img src="<?= base_url('assets/images/fondAccueil.jpg') ?>" alt="test" class="img-fond">

	<div class="contenu-connexion">
		<a href="/"><img src="<?= base_url('assets/images/fléche retour.png') ?>" alt="retour" class="img-flecheRetour"></a>
		<div class="form-group">
			<h1>Réinitialisation du mot de passe</h1>
			<?= form_open('/resetpwd/' .$token, ['class' => 'form-connexion']) ?>
			<div class="password-wrapper">
					<?= form_label('Mot de passe', 'mdp') ?>
					<div class="password-container">
						<?= form_password('mdp', '', [
							'placeholder' => 'Mot de passe',
							'required' => 'required',
							'id' => 'password1'
						]) ?>
						<button type="button" id="toggle-password" class="toggle-password">
							👁️
						</button>
					</div>
				</div>
				<?= session()->getFlashdata('error_mdp') ?>
				<br>
				<div class="password-wrapper">
					<?= form_label('Confirmer le mot de passe', 'mdp_confirm') ?>
					<div class="password-container">
						<?= form_password('mdp_confirm', '', [
							'placeholder' => 'Confirmer le mot de passe',
							'required' => 'required',
							'id' => 'password1'
						]) ?>
						<button type="button" id="toggle-password" class="toggle-password">
							👁️
						</button>
					</div>
				</div>
				<?= session()->getFlashdata('error_mdpconfirm') ?>
				<br>
				<br>
				<?= form_submit('submit', 'Modifier le mot de passe', ['class' => 'btnFJBG']) ?>
			<?= form_close() ?>
		</div>
			
		<div class="lien-inscription">
			<p>Mot de passe oublié ? <a href="/forgotpwd">Réinitialiser votre mot de passe</a></p>
			<p>Pas encore de compte ? <a href="/inscription">Devenez un Saiyan</a></p>
		</div>
	</div>
</div>
