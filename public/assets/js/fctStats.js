function initCharts(statsData) {
	// Graphique circulaire pour les sexes
	const sexeData = {
		labels: statsData.countBySexe.map(item => item.sexe), // H, F, etc.
		datasets: [{
			label: 'Nombre de Saiyans de ce sexe',
			data: statsData.countBySexe.map(item => parseInt(item.count)), // Compte des sexes
			backgroundColor: ['#FFD700', '#FF4500', '#1E90FF'], // Couleurs
			borderColor: '#1a1a1a',
			borderWidth: 1
		}]
	};

	new Chart(document.getElementById('sexeChart'), {
		type: 'pie',
		data: sexeData,
		options: {
			responsive: true,
			plugins: {
				legend: { position: 'top' },
			}
		}
	});

	// Graphique en barres pour les tranches d'âge
	const ageData = {
		labels: statsData.ageDistribution.map(item => `${item.tranche}-${+item.tranche + 9} ans`), // Tranches d'âge
		datasets: [{
			label: 'Nombre de Saiyans de cette tranche d\'âge',
			data: statsData.ageDistribution.map(item => parseInt(item.count)), // Compte des âges
			backgroundColor: '#FFD700',
			borderColor: '#1a1a1a',
			borderWidth: 1
		}]
	};

	new Chart(document.getElementById('ageChart'), {
		type: 'bar',
		data: ageData,
		options: {
			responsive: true,
			scales: {
				y: { beginAtZero: true }
			},
			plugins: {
				legend: { display: false }
			}
		}
	});

	// Graphique en barres pour les tranches de poids
	const poidsData = {
		labels: statsData.poidsDistribution.map(item => `${item.tranche}-${+item.tranche + 9} kg`), // Tranches de poids
		datasets: [{
			label: 'Nombre de Saiyans de cette tranche de poids',
			data: statsData.poidsDistribution.map(item => parseInt(item.count)), // Compte des poids
			backgroundColor: '#1E90FF',
			borderColor: '#1a1a1a',
			borderWidth: 1
		}]
	};

	new Chart(document.getElementById('poidsChart'), {
		type: 'bar',
		data: poidsData,
		options: {
			responsive: true,
			scales: {
				y: { beginAtZero: true }
			},
			plugins: {
				legend: { display: false }
			}
		}
	});

	// Graphique en barres pour les tranches de taille
	const tailleData = {
		labels: statsData.tailleDistribution.map(item => `${item.tranche}-${+item.tranche + 9} cm`), // Tranches de taille
		datasets: [{
			label: 'Nombre de Saiyans de cette tranche de taille',
			data: statsData.tailleDistribution.map(item => parseInt(item.count)), // Compte des tailles
			backgroundColor: '#FF4500',
			borderColor: '#1a1a1a',
			borderWidth: 1
		}]
	};

	new Chart(document.getElementById('tailleChart'), {
		type: 'bar',
		data: tailleData,
		options: {
			responsive: true,
			scales: {
				y: { beginAtZero: true }
			},
			plugins: {
				legend: { display: false }
			}
		}
	});
}
