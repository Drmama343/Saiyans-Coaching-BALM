<?php
	$title = "Saiyan's Coaching - Temoignages";
	$style = "stlTemoignage.css";
	$navbar = "stlNavbar.css";
	include __DIR__ . '/../templates/header.php';
	include __DIR__ . '/../templates/navbarAdmin.php';
?>


<!--------------------------------->
<!-- Tableau pour les programmes -->
<!--------------------------------->
<div class="conteneur-admin-temoignage">
	<div class="recherche">
        <?= form_open('/admin/rechercherTemoignage', ['method' => 'post']); ?>
            <?= csrf_field() ?>
            <?= form_label('<h5>Rechercher :</h5>', 'recherche'); ?>
            <?= form_input('recherche',isset($_SESSION['rechercherTemoignage']) ? $_SESSION['rechercherTemoignage'] : '',['id' => 'recherche', 'onchange' => 'this.form.submit()']); ?>
        <?= form_close(); ?>
    </div>
	<div class="contenu-admin-temoignage">
		<h2>Temoignages</h2>
		<div class="tableau-admin-temoignage">
			<form action="<?= base_url('admin/ajoutProgramme') ?>" method="post" enctype="multipart/form-data">
			<?= csrf_field() ?>
				<table>
					<thead>
						<tr>
							<th>Saiyan</th>
							<th>Temoignage</th>
							<th>Note</th>
							<th>Date</th>
							<th>Image</th>
							<th>Affichage</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($temoignages as $temoignage) : ?>
							<tr>
								<td><?= esc($temoignage['saiyan']['nom']) ?> <?= esc($temoignage['saiyan']['prenom']) ?></td>
								<td><?= $temoignage['temoignage'] ?></td>
								<td><?= $temoignage['note'] ?></td>
								<td><?= $temoignage['date'] ?></td>
								<td><div class="celluleImage" id="<?= $temoignage['image'] ?>">Image</div></td>
								<td><input type="checkbox" name="affichage" id="" <?= $temoignage['affichage'] === "t" ? "checked" : "" ?> disabled></td>
								<td>
									<a href="<?= base_url('admin/temoignage/' . $temoignage['id']) ?>">Modifier</a>
									<a href="<?= base_url('admin/supprTemoignage/' . $temoignage['id']) ?>">Supprimer</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</form>
		</div>

		<div id="paginationTemoignage">
            <?= $pagerTemoignages->links('Temoignage', 'custom') ?>
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