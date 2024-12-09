document.addEventListener('DOMContentLoaded', function() {
    // Sélectionnez toutes les cellules contenant les images
    document.querySelectorAll('.celluleImage').forEach(function(celluleImage) {
        celluleImage.addEventListener('click', function() {
            // Récupérer l'URL de l'image à partir de l'attribut ID
            var lienImg = '../assets/images/' + this.getAttribute('id');

            // Récupérer les éléments du modal
            var modal = document.getElementById('image-modal');
            var modalImage = document.getElementById('modalImage');

            // Mettre à jour la source et l'alt de l'image du modal
            modalImage.setAttribute('src', lienImg);
            modalImage.setAttribute('alt', 'Image de l\'article');

            // Afficher le modal
            modal.style.display = 'flex';
        });
    });

    // Fermer le modal lorsqu'on clique en dehors du contenu
    document.getElementById('image-modal').addEventListener('click', function(event) {
        if (event.target === this) {
            this.style.display = 'none';
        }
    });
});
