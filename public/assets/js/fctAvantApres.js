
document.addEventListener('DOMContentLoaded', () => {
    const modalTemoignage = document.getElementById('creationTemoignageModal');
    const openModalTemoignage = document.getElementById('openModalTemoignage');
    const closeModalTemoignage = document.getElementById('closeModalTemoignage');

    if (modalTemoignage && openModalTemoignage && closeModalTemoignage) {
        openModalTemoignage.addEventListener('click', () => {
            modalTemoignage.style.display = 'flex';
        });

        closeModalTemoignage.addEventListener('click', () => {
            modalTemoignage.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === modalTemoignage) {
                modalTemoignage.style.display = 'none';
            }
        });
    } else {
        console.error('Un ou plusieurs éléments nécessaires au fonctionnement du modal sont manquants.');
    }
});
