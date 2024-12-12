document.getElementById('adresse').addEventListener('input', function() {
    const query = this.value;

    // Si l'utilisateur a saisi au moins 3 caractères
    if (query.length > 3) {
        fetch(`https://api-adresse.data.gouv.fr/search/?q=${encodeURIComponent(query)}&limit=1`)
		.then(response => response.json())
		.then(data => {
			// Efface les suggestions précédentes
			const suggestions = document.getElementById('suggestions');
			suggestions.innerHTML = '';

			// Ajoute les nouvelles suggestions
			data.features.forEach(feature => {
				const suggestion = document.createElement('p');
				suggestion.style.cursor = 'pointer';
				suggestion.textContent = feature.properties.label;
				suggestion.classList.add('suggestion');
				
				suggestion.style.border = '2px solid var(--gris)';
				suggestion.style.borderRadius = '10px';
				suggestion.style.padding = '1vh';

				suggestion.addEventListener('click', function() {
					document.getElementById('adresse').value = feature.properties.label;
					document.getElementById('suggestions').innerHTML = '';
				});
				suggestions.appendChild(suggestion);
			});
		});
	}
});

document.getElementById('tel').addEventListener('input', function() {	
	// Met un espace tous les 2 chiffres
	this.value = this.value.replace(/\D/g, '').replace(/(\d{2})(?=\d)/g, '$1 ').trim();
});

document.getElementById('age').addEventListener('input', function() {
	// Si l'utilisateur saisit autre chose qu'un entier positif ou nul (0 inclus) ou supérieur à 120 on supprime le dernier caractère
	if(!/^\d+$/.test(this.value) || this.value > 120) {
		this.value = this.value.slice(0, -1);
	}
});

document.getElementById('poids').addEventListener('input', function() {
	// Si l'utilisateur saisit autre chose qu'un float positif ou une virgule ou un point on supprime le dernier caractère
	if(!/^\d+[\.,]?\d*$/.test(this.value)) {
		this.value = this.value.slice(0, -1);
	}
});

document.getElementById('taille').addEventListener('input', function() {
	// Si l'utilisateur saisit autre chose qu'un entier positif ou nul (0 inclus) ou supérieur à 120 on supprime le dernier caractère
	if(!/^\d+$/.test(this.value)) {
		this.value = this.value.slice(0, -1);
	}
});

