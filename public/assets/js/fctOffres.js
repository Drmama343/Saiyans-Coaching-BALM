(function () {
    const conteneur = document.querySelector('.conteneur-offres');
    const carousel = conteneur.querySelector('.carousel');
    const contenu = document.querySelector('.contenu-offres');
    const prevButton = carousel.querySelector('.prev');
    const nextButton = carousel.querySelector('.next');

    let currentIndex = 0;
    const totalOffers = document.querySelectorAll('.offre').length;
    const visibleOffers = 3;

    function updateCarousel() {
        const maxIndex = Math.ceil(totalOffers / visibleOffers) - 1;
        currentIndex = Math.min(Math.max(currentIndex, 0), maxIndex);
        const offset = -currentIndex * 100; // Ajuste selon les besoins
        contenu.style.transform = `translateX(${offset}%)`;

        const offres = document.querySelectorAll('.offre');
        offres.forEach((offre, index) => {
            if (index >= currentIndex * visibleOffers && index < (currentIndex + 1) * visibleOffers) {
                offre.classList.remove('hidden');
            } else {
                offre.classList.add('hidden');
            }
        });
    }

    prevButton.addEventListener('click', () => {
        currentIndex -= 1;
        updateCarousel();
    });

    nextButton.addEventListener('click', () => {
        currentIndex += 1;
        updateCarousel();
    });

    // Initialize carousel
    updateCarousel();
})();
