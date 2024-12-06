<?php 
	$title = "Saiyan's Coaching - Blog";
	$style = "stlBlog.css";
	$navbar = "stlNavbar.css";
	include 'templates/header.php';
	include 'templates/navbar.php';
?>
<div class="conteneur-blog">
	<div class="contenu-blog">
		<?php if (!empty($temoignages) && is_array($temoignages)): ?>
			<?php foreach ($temoignages as $temoignage) : ?>
				<div class="temoignage">
					<h3><?= $temoignage['saiyan']['nom']; ?></h3>
					<p><?= $temoignage['temoignage']; ?></p>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<p>Aucun temoignage disponible.</p>
		<?php endif; ?>
	</div>
</div>

<?php include 'templates/footer.php'; ?>