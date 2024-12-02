<div class="conteneur-connexion">
	<div class="contenu-connexion">
		<h2>Se connecter</h2>
			<?= form_open('connexion', ['class' => 'form-modalConnexion']); ?>
			<div class="form-group">
				<?= form_label('Adresse e-mail', 'email'); ?>
				<?= form_input(['name' => 'email', 'id' => 'email', 'class' => '', 'value' => set_value('email')]); ?>
				<?= form_label('Mot de passe', 'password'); ?>
				<?= form_password(['name' => 'password', 'id' => 'password', 'class' => '']); ?>
				<?= form_submit(['name' => 'submit', 'value' => 'Se connecter', 'class' => 'btnFJBG']); ?>
			</div>
			<?= form_close(); ?>
	</div>
</div>
