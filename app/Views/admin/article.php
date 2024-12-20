<?php
	$title = "Saiyan's Coaching - Articles";
	$style = "stlArticle.css";
	$navbar = "stlNavbar.css";
	include __DIR__ . '/../templates/header.php';
	include __DIR__ . '/../templates/navbarAdmin.php';
?>

<div class="conteneur-admin-article">
	<div class="contenu-admin-article">
		<div class="recherche">
			<?= form_open('/admin/rechercherArticle', ['method' => 'post']); ?>
				<?= csrf_field() ?>
				<?= form_label('<h5>Rechercher :</h5>', 'recherche'); ?>
				<?= form_input('recherche',isset($_SESSION['rechercheArticle']) ? $_SESSION['rechercheArticle'] : '',['id' => 'recherche', 'onchange' => 'this.form.submit()']); ?>
			<?= form_close(); ?>
		</div>
		<div class="tableau-admin-article">
			<table>
				<thead>
					<tr>
						<th>Titre</th>
						<th>Contenu</th>
						<th>Image</th>
						<th>Type</th>
						<th>Affichage</th>
						<th>Actions</th>
					</tr>
				</thead>	
				<tbody>
					<?php foreach ($articles as $article) : ?>
						<tr>
							<td id="titre"><?= $article['titre'] ?></td>
							<td id="desc"><?= $article['contenu'] ?></td>
							<?php if (isset($article['image'])) : ?>
								<td><div class="celluleImage" id="<?= $article['image'] ?>">Image</div></td>
							<?php else: ?>
								<td></td>
							<?php endif; ?>
							<td><?= $article['type']?></td>
							<td><input type="checkbox" name="affichage" id="" <?= $article['affichage'] === "t" ? "checked" : "" ?> disabled></td>
							<td id="actions">
								<a href="<?= base_url('admin/article/' . $article['id']) ?>">Modifier</a> |
								<a href="<?= base_url('admin/supprArticle/' . $article['id']) ?>">Supprimer</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<a id="ajoutArticle" class="btnFGBJ" href="<?= base_url('admin/article/ajouter') ?>">Ajouter un article</a>
		</div>

		<div id="paginationArticle">
            <?= $pagerArticles->links('Article', 'custom') ?>
        </div>

		<div id="image-modal" class="modal">
			<div class="modal-content">
				<img src="" alt="" id="modalImage">
			</div>
		</div>
	</div>
</div>

<?php include __DIR__ . '/../templates/footerAdmin.php'; ?>
