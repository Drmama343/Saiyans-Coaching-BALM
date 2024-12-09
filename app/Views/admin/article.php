<?php
	$title = "Saiyan's Coaching - Articles";
	$style = "stlArticle.css";
	$navbar = "stlNavbar.css";
	include __DIR__ . '/../templates/header.php';
	include __DIR__ . '/../templates/navbarAdmin.php';
?>

<div class="conteneur-admin-article">
	<div class="contenu-admin-article">
		<h2>Articles</h2>
		<div class="tableau-admin-article">
			<table>
				<thead>
					<tr>
						<th>Titre</th>
						<th>Contenu</th>
						<th>Image</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($articles as $article) : ?>
						<tr>
							<td><?= $article['titre'] ?></td>
							<td><?= $article['contenu'] ?></td>
							<td><img src="<?= base_url('assets/images/' . $article['image']) ?>" alt="<?= $article['titre'] ?>"></td>
							<td>
								<a href="<?= base_url('admin/article/' . $article['id']) ?>">Modifier</a>
								<a href="<?= base_url('admin/article/' . $article['id']) ?>">Supprimer</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="ajout-article">
			<a href="<?= base_url('admin/article/ajout') ?>">Ajouter un article</a>
		</div>
	</div>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
