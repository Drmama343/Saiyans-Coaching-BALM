<div class="conteneur-stats">
	<h3>Statistiques</h3>

	<!-- Graphique circulaire pour les sexes -->
	<div class="chart-container">
		<canvas id="sexeChart"></canvas>
	</div>

	<!-- Graphique en barres pour les tranches d'âge -->
	<div class="chart-container">
		<canvas id="ageChart"></canvas>
	</div>

	<!-- Graphique en barres pour les tranches de poids -->
	<div class="chart-container">
		<canvas id="poidsChart"></canvas>
	</div>

	<!-- Graphique en barres pour les tranches de taille -->
	<div class="chart-container">
		<canvas id="tailleChart"></canvas>
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