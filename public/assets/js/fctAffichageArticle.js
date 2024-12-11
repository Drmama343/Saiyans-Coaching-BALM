function openModal(titre, contenu) {
	const modal = document.getElementById('modal-article');
	const modalTitre = document.getElementById('modal-titre');
	const modalContenu = document.getElementById('modal-contenu');

	console.log(modal);
	modalTitre.innerHTML = titre;
	modalContenu.innerHTML = contenu;

	modal.style.display = 'block';
}

function closeModal() {
	const modal = document.getElementById('modal-article');
	modal.style.display = 'none';
}