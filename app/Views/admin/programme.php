<?php
	$title = "Saiyan's Coaching - Programmes";
	$style = "stlProgramme.css";
	$navbar = "stlNavbar.css";
	include __DIR__ . '/../templates/header.php';
	include __DIR__ . '/../templates/navbarAdmin.php';
?>

<!--------------------------------->
<!-- Tableau pour les programmes -->
<!--------------------------------->
<div class="conteneur-admin-programme">
	<div class="contenu-admin-programme">
		<h2>Programmes</h2>
		<div class="recherche">
            <?= form_open('/admin/rechercherProgramme', ['method' => 'post']); ?>
                <?= csrf_field() ?>
                <?= form_label('<h5>Rechercher :</h5>', 'recherche'); ?>
                <?= form_input('recherche',isset($_SESSION['rechercheProgramme']) ? $_SESSION['rechercheProgramme'] : '',['id' => 'recherche', 'onchange' => 'this.form.submit()']); ?>
            <?= form_close(); ?>
        </div>
		<div class="tableau-admin-programme">
			<table>
				<thead>
					<tr>
						<th>Nom</th>
						<th>Description</th>
						<th>Prix</th>
						<th>Duree</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($programmes as $programme) : ?>
						<tr>
							<td><?= $programme['nom'] ?></td>
							<td><?= $programme['description'] ?></td>
							<td><?= $programme['prix'] ?> €</td>
							<td><?= $programme['duree'] ?> mois</td>
							<td>
								<a href="<?= base_url('admin/programme/' . $programme['id']) ?>">Modifier</a>
								<a href="<?= base_url('admin/supprProgramme/' . $programme['id']) ?>">Supprimer</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<a class="btnFGBJ" href="<?= base_url('admin/programme/ajouter') ?>">Ajouter un programme</a>
		<div id="paginationQuestion">
			<?= $pagerProgramme->links('Programme', 'custom') ?>
		</div>

		<div id="image-modal" class="modal">
			<div class="modal-content">
				<span class="close-btn" id="closeModal">&times;</span>
				<img src="" alt="" id="modalImage">
			</div>
		</div>
	</div>
</div>

<!--------------------------------->
<!-- Tableau pour les promotions -->
<!--------------------------------->
<div class="conteneur-admin-promotion">
	<div class="contenu-admin-promotion">
		<h2>Promotions</h2>
		<div class="recherche">
            <?= form_open('/admin/rechercherPromotion', ['method' => 'post']); ?>
                <?= csrf_field() ?>
                <?= form_label('<h5>Rechercher :</h5>', 'recherche'); ?>
                <?= form_input('recherche',isset($_SESSION['recherchePromotion']) ? $_SESSION['recherchePromotion'] : '',['id' => 'recherche', 'onchange' => 'this.form.submit()']); ?>
            <?= form_close(); ?>
        </div>
		<div class="tableau-admin-promotion">
			<table>
				<thead>
					<tr>
						<th>Date de début</th>
						<th>Date de fin</th>
						<th>Réduction</th>
						<th>Code</th>
						<th>Nombre d'utilisations</th>
						<th>Produit</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($promotions as $promotion) : ?>
						<tr>
							<td><?= esc($promotion['date_deb']) ?></td>
							<td><?= esc($promotion['date_fin']) ?></td>
							<td><?= esc($promotion['reduction']) ?>%</td>
							<td><?= esc($promotion['code']) ?></td>
							<td><?= esc($promotion['nb_utilisation']) ?></td>
							<td><?= esc($promotion['programme']['nom']) ?></td>
							<td>
								<a href="<?= base_url('admin/promotion/' . $promotion['id']) ?>">Modifier</a>
								<a href="<?= base_url('admin/supprPromotion/' . $promotion['id']) ?>">Supprimer</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<a href="<?= base_url('admin/promotion/ajouter') ?>">Ajouter un article</a>

		<div id="paginationQuestion">
			<?= $pagerPromotion->links('Promotion', 'custom') ?>
		</div>

		<div id="image-modal" class="modal">
			<div class="modal-content">
				<span class="close-btn" id="closeModal">&times;</span>
				<img src="" alt="" id="modalImage">
			</div>
		</div>
	</div>
</div>

<?php include __DIR__ . '/../templates/footerAdmin.php'; ?>
