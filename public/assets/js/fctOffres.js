(function () {
    const conteneur = document.querySelector('.conteneur-produits');
    const carousel = conteneur.querySelector('.carousel');
    const contenu = document.querySelector('.contenu-produits');
    const prevButton = carousel.querySelector('.prev');
    const nextButton = carousel.querySelector('.next');

    let currentIndex = 0;
    const totalProduits = document.querySelectorAll('.produit').length;
    let visibleProduits;

    function calculateVisibleProduits() {
        const screenWidth = window.innerWidth;
        if (screenWidth >= 1500) {
            visibleProduits = 3; // Grand écran
        } else if (screenWidth >= 1000) {
            visibleProduits = 2; // Écran moyen
        } else {
            visibleProduits = 1; // Petit écran
        }
    }

    function updateCarousel() {
        calculateVisibleProduits(); // Met à jour visibleProduits en fonction de la taille de l'écran
        const maxIndex = Math.ceil(totalProduits / visibleProduits) - 1;
        currentIndex = Math.min(Math.max(currentIndex, 0), maxIndex);

        // Ajuste la position du carousel
        const offset = -currentIndex * (53 + (1.9*(3 - visibleProduits))); // Divise en fonction des produits visibles
        contenu.style.transform = `translateX(${offset}vw)`;

        // Gérer l'affichage des produits
        const produits = document.querySelectorAll('.produit');
        produits.forEach((produit, index) => {
            if (index >= currentIndex * visibleProduits && index < (currentIndex + 1) * visibleProduits) {
                produit.classList.remove('hidden');
            } else {
                produit.classList.add('hidden');
            }
        });

        // Gérer la visibilité des boutons
        prevButton.style.display = currentIndex === 0 ? 'none' : 'block';
        nextButton.style.display = currentIndex === maxIndex ? 'none' : 'block';
    }

    prevButton.addEventListener('click', () => {
        currentIndex -= 1;
        updateCarousel();
    });

    nextButton.addEventListener('click', () => {
        currentIndex += 1;
        updateCarousel();
    });

    // Réagir au redimensionnement de la fenêtre
    window.addEventListener('resize', updateCarousel);

    // Initialize carousel
    updateCarousel();
})();

function openModal(title, price, description) {
    document.getElementById('modal-title').textContent = title;
    document.getElementById('modal-price').textContent = price + ' €';
    document.getElementById('modal-description').textContent = description;
    document.getElementById('productModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('productModal').style.display = 'none';
}