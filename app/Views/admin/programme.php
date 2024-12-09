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
							<th>Image</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($programmes as $programme) : ?>
							<tr>
								<td><?= $programme['nom'] ?></td>
								<td><?= $programme['description'] ?></td>
								<td><?= $programme['prix'] ?></td>
								<td><?= $programme['duree'] ?></td>
								<td><div class="celluleImage" id="<?= $programme['photo'] ?>">Image</div></td>
								<td>
									<a href="<?= base_url('admin/modifProgramme/' . $programme['id']) ?>">Modifier</a>
									<a href="<?= base_url('admin/supprProgramme/' . $programme['id']) ?>">Supprimer</a>
								</td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td><input type="text" name="nom" placeholder="Nom du produit" required></td>
							<td><textarea name="description" placeholder="Description du produit" rows="2" required></textarea></td>
							<td><input type="number" name="prix" placeholder="Prix (€)" step="0.01" min="0" required></td>
							<td><input type="text" name="duree" placeholder="Durée (en mois)" required></td>
							<td><input type="file" name="image" accept="image/*" required></td>
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
			<form action="<?= base_url('admin/ajoutPromotion') ?>" method="post" enctype="multipart/form-data">
			<?= csrf_field() ?>
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
									<a href="<?= base_url('admin/modifPromotion/' . $promotion['id']) ?>">Modifier</a>
									<a href="<?= base_url('admin/supprPromotion/' . $promotion['id']) ?>">Supprimer</a>
								</td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td><input type="date" name="date_deb" required></td>
							<td><input type="date" name="date_fin" required></td>
							<td><input type="number" name="reduction" placeholder="Réduction (%)" step="1" min="0" max="100" required></td>
							<td><input type="text" name="code" placeholder="Code promo" required></td>
							<td><input type="number" name="nb_utilisation" placeholder="Nombre d'utilisations" min="0" required></td>
							<td>
								<label for="produit">Produit :</label>
								<select name="produit" id="produit" required>
									<option value="" disabled selected>-- Choisissez un produit --</option>
									<?php foreach ($programmes as $programme) : ?>
										<option value="<?= esc($programme['id']); ?>"><?= esc($programme['nom']); ?></option>
									<?php endforeach; ?>
								</select>
							</td>
							<td><button type="submit">Ajouter une promotion</button></td>
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

<?php include __DIR__ . '/../templates/footer.php'; ?>
