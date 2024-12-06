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

const compteBtn = document.getElementById('compteBtn');
const adminBtn = document.getElementById('adminBtn');
const logoutBtn = document.getElementById('logoutBtn');

// Redirection pour le bouton compte
compteBtn.addEventListener('click', () => {
	window.location.href = '/profil'; // Redirige vers la route PHP /compte
});

// Redirection pour le bouton admin
adminBtn.addEventListener('click', () => {
	window.location.href = '/admin'; // Redirige vers la route PHP /admin
});

// Redirection pour le bouton logout
logoutBtn.addEventListener('click', () => {
	window.location.href = '/logout'; // Redirige vers la route PHP /logout
});