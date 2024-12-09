<?php 
	$title = "Saiyan's Coaching - Contact";
	$style = "stlContact.css";
	$navbar = "stlNavbar.css";
	include 'templates/header.php';
	include 'templates/navbar.php';
?>

<?php include 'templates/questions.php'; ?>

<div class="conteneur-contact">
	<div class="contenu-contact">
		
		<?= form_open('/contact', ['class' => 'form-connexion']); ?>
			<h2>Contact</h2>
			<br>
			<?= session()->getFlashdata('message') ?>
			<br>
			<?= form_label('Votre adresse e-mail', 'email'); ?>
			<?= form_input('email', isset($_SESSION['utilisateur']['mail']) ? $_SESSION['utilisateur']['mail'] : '', ['required' => 'required', 'placeholder' => 'Votre e-mail']) ?>
			<?= session()->getFlashdata('error_email') ?>
			<br>
			<?= form_label('Objet', 'subject'); ?>
			<?= form_input('subject', '', ['required' => 'required', 'placeholder' => 'Sujet de votre message']) ?>
			<br>
			<?= form_label('Message', 'message'); ?>
			<?= form_textarea('message', '', ['required' => 'required', 'placeholder' => 'Écrivez votre message ici...', 'rows' => 5]) ?>
			<br>
			<?= form_submit(['name' => 'submit', 'value' => 'Envoyer', 'class' => 'btnFJBG']); ?>

		<?= form_close(); ?>
	</div>
</div>

<?php include 'templates/footer.php'; ?>