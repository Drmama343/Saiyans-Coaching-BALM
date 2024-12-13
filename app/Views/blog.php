<?php 
	$title = "Saiyan's Coaching - Blog";
	$style = "stlBlog.css";
	$navbar = "stlNavbar.css";
	include 'templates/header.php';
	include 'templates/navbar.php';
?>

<div class="conteneur-blog">
	<div class="contenu-blog">
		<div class="articles">
			<?php if (!empty($articles) && is_array($articles)): ?>
				<?php foreach ($articles as $article) : ?>
					<div class="article" onclick="openModal('<?= esc($article['titre'], 'js') ?>', '<?= esc($article['contenu'], 'js') ?>')">
						<h2><?= $article['titre']; ?></h2>
						<p class="date"><?= date('d/m/Y', strtotime($article['date_publi'])); ?></p>
						<p><?= $article['contenu']; ?></p>
						<p class="saiyan"><?= $article['saiyan']['prenom']; ?> <?= $article['saiyan']['nom']; ?></p>
						<?php if (!empty($article['image'])): ?>
							<img src="<?= base_url('assets/images/'.$article['image']); ?>" alt="Image indisponible">
						<?php else: ?>
							<img src="<?= base_url('assets/images/logo.png')?>" alt="Saiyan">
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<p>Aucun article disponible.</p>
			<?php endif; ?>
		</div>
	</div>

	<div class="modal-article" id="modal-article">
		<div class="modal-content">
			<h3 id="modal-titre"></h3>
			<p id="modal-contenu"></p>
			<button class="close-btn" onclick="closeModal()">&times;</button>
		</div>
	</div>
</div>

<?php include 'templates/footer.php'; ?>