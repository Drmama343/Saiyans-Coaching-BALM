<div class="conteneur-stats">
	<div class="leReste">
		<!-- Graphique circulaire pour les sexes -->
		<div class="chart-container">
			<canvas id="sexeChart"></canvas>
		</div>

		<div class="conteneur-saiyans">
			<div class="recherche">
				<?= form_open('/admin/rechercherSaiyanStats', ['method' => 'post']); ?>
					<?= csrf_field() ?>
					<?= form_label('<h5>Rechercher :</h5>', 'recherche'); ?>
					<?= form_input('recherche',isset($_SESSION['rechercheSaiyan']) ? $_SESSION['rechercheSaiyan'] : '',['id' => 'recherche', 'onchange' => 'this.form.submit()']); ?>
				<?= form_close(); ?>
			</div>
			<table class="table-saiyans">
				<thead>
					<tr>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Sexe</th>
						<th>Age</th>
						<th>Poids</th>
						<th>Taille</th>
						<th>IMC</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($saiyans as $saiyan) : ?>
						<tr>
							<td><?= esc($saiyan['nom']); ?></td>
							<td><?= esc($saiyan['prenom']); ?></td>
							<td><?= esc($saiyan['sexe']); ?></td>
							<td><?= esc($saiyan['age']); ?></td>
							<td><?= esc($saiyan['poids']); ?></td>
							<td><?= esc($saiyan['taille']); ?></td>
							<td>
								<?= number_format(esc($saiyan['poids']) / pow((esc($saiyan['taille']) / 100), 2), 2); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<!-- Affichage des liens de pagination -->
			<div class="pagi-table-saiyans">
				<?= $pagerSaiyans->links('Saiyan', 'custom') ?>
			</div>
		</div>
	</div>

	<div class="diagBarre">
		<!-- Graphique en barres pour les tranches de taille -->
		<div class="chart-container">
			<canvas id="tailleChart"></canvas>
		</div>

		<!-- Graphique en barres pour les tranches d'âge -->
		<div class="chart-container">
			<canvas id="ageChart"></canvas>
		</div>

		<!-- Graphique en barres pour les tranches de poids -->
		<div class="chart-container">
			<canvas id="poidsChart"></canvas>
		</div>
	</div>

	<script>
		// Passer les données de PHP à JavaScript en les encodant en JSON
		const statsData = {
			countBySexe: <?php echo json_encode(array_map(function($item) {
				return [
					'sexe' => ($item->sexe == 'H' ? 'Homme' : 'Femme'),
					'count' => (int)$item->count,
				];
			}, $sexe)); ?>,
			ageDistribution: <?php echo json_encode(array_map(function($item) {
				return [
					'tranche' => (int)$item->tranche_age,
					'count' => (int)$item->count,
				];
			}, $age)); ?>,
			poidsDistribution: <?php echo json_encode(array_map(function($item) {
				return [
					'tranche' => (int)$item->tranche_poids,
					'count' => (int)$item->count,
				];
			}, $poids)); ?>,
			tailleDistribution: <?php echo json_encode(array_map(function($item) {
				return [
					'tranche' => (int)$item->tranche_taille,
					'count' => (int)$item->count,
				];
			}, $taille)); ?>
		};
		
		// Initialiser les graphiques avec les données
		window.onload = function () {
			initCharts(statsData);
		};
	</script>

	<script src="/assets/js/fctStats.js"></script>
</div>