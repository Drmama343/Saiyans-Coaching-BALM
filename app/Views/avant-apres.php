<?php
$title = "Saiyan's Coaching - Avant / Après";
$style = "stlAvantApres.css";
$navbar = "stlNavbar.css";
include 'templates/header.php';
include 'templates/navbar.php';
?>

<div class="conteneur-avant-apres">
	<div class="contenu-avant-apres">
		<h3>Avant / Après</h3>

		<p>
			Vous êtes sur le point de découvrir les incroyables transformations de personnes qui ont fait confiance à <span>Saiyan's Coaching.</span>
		</p>

		<p>
			Ces clichés avant/après mettent en lumière des membres de notre équipe, des individus comme vous qui ont décidé de prendre en main leur santé et leur forme physique.
		</p>

		<p>
			Ces images sont bien plus qu'une simple métamorphose physique.
		</p>

		<p>
			Elles représentent le dévouement, la persévérance et la confiance de ceux qui ont osé entreprendre ce voyage vers un meilleur mode de vie. Chaque transformation incarne le pouvoir de l'investissement dans sa santé pour se sentir mieux, être plus fort et vivre pleinement.
		</p>

		<p>
			Il ne tient qu'à <span>vous</span> de faire le premier pas vers une version améliorée de vous-même. Rejoignez la communauté <span>Saiyan's Coaching</span> et explorez les possibilités pour atteindre vos objectifs de santé et de bien-être. Vous méritez de vous sentir bien dans votre peau. Laissez ces medias vous inspirer à investir dans votre santé pour un physique et une vie meilleure.
		</p>

		<button id="openModalTemoignage" class="btnModal"> Donne nous ton avis de saiyan !!! </button>
		<!-- Modal -->
		<div id="creationTemoignageModal" class="modal">
			<div class="modal-content">
				<span class="close-btn" id="closeModalTemoignage">&times;</span>
				<?php if (!isset($_SESSION['utilisateur'])): ?>
					<a href="/connexion" class="btnFGBJ"><h5>Connectez vous !</h5></a>
				<?php else: ?>
					<?= form_open_multipart("/ajoutTemoignage/" . $_SESSION['utilisateur']['id'], ['class' => 'form-ajout']) ?>
					<h2>Votre témoignage :</h2>
					<div class="form-grid">
						<div class="cellule-grid">
							<?= form_label('Temoignage', 'temoignage') ?>
							<?= form_textarea('temoignage', '', ['placeholder' => 'Vos pensées sur les formations ...']) ?>
						</div>
						<div class="cellule-grid">
							<?= form_label('Votre note entre 1 - 5 *:', 'note') ?>
							<?= form_input('note', '', ['min' => '1', 'max' => '5', 'step' => '1', 'required' => 'required'],'number') ?>
						</div>	
						<div class="cellule-grid">
							<?= form_label('Transformation en image:', 'image') ?>
							<?= form_upload('image', '', ['accept' => 'image/*']) ?>
						</div>
						<div>
							<?= form_submit('submit', 'Sauvegarder', ['class' => 'btnFJBG']) ?>
						</div>
					</div>
					<? form_close(); ?>
				<?php endif; ?>
			</div>
		</div>

		<div class="medias">
			<?php if (!empty($medias) && is_array($medias)): ?>
				<?php foreach ($medias as $media) : ?>
					<div class="media">
						<video controls loop autoplay muted disablePictureInPicture>
							<source src="/assets/video/<?= $media['media']; ?>">
						</video>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<p>Aucune media disponible.</p>
			<?php endif; ?>
		</div>
	</div>
</div>

<script src="/assets/js/fctAvantApres.js"></script>

<?php include 'templates/footer.php'; ?>