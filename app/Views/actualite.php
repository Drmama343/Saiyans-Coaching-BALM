<?php 
	$title = "Saiyan's Coaching - Actualités";
	$style = "stlActualite.css";
	$navbar = "stlNavbar.css";
	include 'templates/header.php';
	include 'templates/navbar.php';
?>

<div class="conteneur-actualite">
	<div class="contenu-actualite">
		<div class="articles">
			<?php if (!empty($articles) && is_array($articles)): ?>
				<?php foreach ($articles as $article) : ?>
					<div class="article">
						<h2><?= $article['titre']; ?></h2>
						<p class="date"><?= date('d/m/Y', strtotime($article['date_publi'])); ?></p>
						<p><?= $article['contenu']; ?></p>
						<p class="auteur"><?= $article['saiyan']['prenom']; ?> <?= $article['saiyan']['nom']; ?></p>
						<?php if (!empty($article['image'])): ?>
							<img src="<?= base_url('assets/images/'.$article['image']); ?>" alt="<?= $article['titre']; ?>">
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<p>Aucun article disponible.</p>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php include 'templates/footer.php'; ?>