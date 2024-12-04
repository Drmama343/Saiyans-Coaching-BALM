document.getElementById('adresse').addEventListener('input', function() {
    const query = this.value;

    // Si l'utilisateur a saisi au moins 3 caractères
    if (query.length > 3) {
		if(query.length >= 5){
			document.getElementById('cellule-grid-suggestions').style.display = 'block';
		}
        fetch(`https://api-adresse.data.gouv.fr/search/?q=${encodeURIComponent(query)}`)
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
					document.getElementById('cellule-grid-suggestions').style.display = 'none';
				});
				suggestions.appendChild(suggestion);
			});
		});
    } else {
		document.getElementById('cellule-grid-suggestions').style.display = 'none';
	}
});