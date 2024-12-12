document.addEventListener('DOMContentLoaded', () => {
	const contenuPromotion = document.querySelector('.contenu-promotion');
	const promotions = document.querySelectorAll('.promotion');
	let currentIndex = 0;

	function afficherPromotionSuivante() {
		// Déplace le conteneur pour afficher la promotion suivante
		currentIndex = (currentIndex + 1) % promotions.length;
		const offset = -currentIndex * 100; // Déplacement basé sur la largeur (100%)
		contenuPromotion.style.transform = `translateX(${offset}%)`;
	}

	// Démarrer le carrousel
	setInterval(afficherPromotionSuivante, 5000); // Change toutes les 5 secondes
});
