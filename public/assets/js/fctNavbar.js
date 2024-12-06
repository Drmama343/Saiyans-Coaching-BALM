function toggleMenu() {
	const menu = document.querySelector('nav ul');
	menu.classList.toggle('active');
}

const modalCompte = document.getElementById('creationCompteModal');
const openModalCompte = document.getElementById('openModalCompte');
const closeModalCompte = document.getElementById('closeModalCompte');

// Ouvrir le modal
openModalCompte.addEventListener('click', () => {
	modalCompte.style.display = 'flex';
});

closeModalCompte.addEventListener('click', () => {
	modalCompte.style.display = 'none';
});

// Fermer le modal si l'utilisateur clique en dehors du modal
window.addEventListener('click', (event) => {
	if (event.target === modalCompte) {
		modalCompte.style.display = 'none';
	}
});