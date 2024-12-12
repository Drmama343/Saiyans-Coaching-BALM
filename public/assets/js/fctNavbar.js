function toggleMenu() {
	const menu = document.querySelector('nav ul');
	menu.classList.toggle('active');
}

document.getElementById('openModalCompte').addEventListener('click', function () {
    const modal = document.getElementById('creationCompteModal');
    const isModalVisible = modal.style.display === 'block';

    // Toggle the modal visibility
    modal.style.display = isModalVisible ? 'none' : 'block';
});