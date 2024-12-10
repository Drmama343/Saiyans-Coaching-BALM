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


// Optional: Close the modal when clicking outside of it
window.addEventListener('click', function (event) {
    const modal = document.getElementById('creationCompteModal');
    if (event.target !== modal && !modal.contains(event.target) && event.target.id !== 'openModalCompte') {
        modal.style.display = 'none';
    }
});
