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
		<div class="tableau-admin-programme">
			<form action="<?= base_url('admin/ajoutProgramme') ?>" method="post" enctype="multipart/form-data">
			<?= csrf_field() ?>
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
								<td><?= $programme['prix'] ?></td>
								<td><?= $programme['duree'] ?></td>
								<td>
									<a href="<?= base_url('admin/programme/' . $programme['id']) ?>">Modifier</a>
									<a href="<?= base_url('admin/supprProgramme/' . $programme['id']) ?>">Supprimer</a>
								</td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td><input type="text" name="nom" placeholder="Nom du produit" required></td>
							<td><textarea name="description" placeholder="Description du produit" rows="2"></textarea></td>
							<td><input type="number" name="prix" placeholder="Prix (€)" step="0.01" min="0" required></td>
							<td><input type="number" name="duree" placeholder="Durée (en mois)" required></td>
							<td>
								<select name="paramProgramme[]" multiple>
									<option value="entrainement">Entraînement</option>
									<option value="multimedia">Multimédia</option>
									<option value="alimentaire">Alimentaire</option>
									<option value="bilan">Bilan</option>
									<option value="whatsapp">Whatsapp</option>
								</select>
							</td>
							
							<td><button type="submit">Ajouter un programme</button></td>
						</tr>
					</tbody>
				</table>
			</form>
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

		<div id="image-modal" class="modal">
			<div class="modal-content">
				<span class="close-btn" id="closeModal">&times;</span>
				<img src="" alt="" id="modalImage">
			</div>
		</div>
	</div>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
