document.addEventListener('DOMContentLoaded', function() {
    // Sélectionnez toutes les cellules contenant les images
	var currentUrl = window.location.href;

    // Extraire le dernier segment de l'URL après le dernier '/'
    var urlParts = currentUrl.split('/');
    var lastSegment = urlParts[urlParts.length - 1];

    // Définir le basePath en fonction du dernier segment de l'URL
    var basePath;
    switch(lastSegment) {
        case 'temoignage': // Par exemple, si l'URL se termine par "page1"
            basePath = '../assets/images/temoignages/';
            break;
        default:
            basePath = '../assets/images/'; // Par défaut, utilisez ce chemin
            break;
    }

    document.querySelectorAll('.celluleImage').forEach(function(celluleImage) {
        celluleImage.addEventListener('click', function() {
            // Récupérer l'URL de l'image à partir de l'attribut ID
            var lienImg = basePath + this.getAttribute('id');

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
