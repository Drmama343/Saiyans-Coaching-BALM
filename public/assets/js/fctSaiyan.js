const tels = document.querySelectorAll('.tel');
tels.forEach(tel => {
    const cleaned = tel.textContent.replace(/\D/g, '').replace(/(\d{2})(?=\d)/g, '$1 ').trim();
    tel.textContent = cleaned; // Met à jour le contenu affiché dans le DOM
});