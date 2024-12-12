document.addEventListener('DOMContentLoaded', function() {
    // Sélectionnez toutes les cellules contenant les images
	var currentUrl = window.location.href;

    // Extraire le dernier segment de l'URL après le dernier '/'
    var urlParts = currentUrl.split('/');
    var lastSegment = urlParts[urlParts.length - 1];

    // Définir le basePath en fonction du dernier segment de l'URL
    var basePath;
    var mess;
    switch(lastSegment) {
        case 'temoignage': 
            basePath = '../assets/images/temoignages/';
            mess = "Image du temoignage";
            break;
        case 'profil': 
            basePath = '../assets/images/temoignages/';
            mess = "Image du temoignage";
            break;
        default:
            basePath = '../assets/images/'; // Par défaut, utilisez ce chemin
            mess = "Image de l'article";
            break;
    }

    document.querySelectorAll('.celluleImage').forEach(function(celluleImage) {
        celluleImage.addEventListener('click', function() {
            // Récupérer l'URL de l'image à partir de l'attribut ID
            if(window.location.href.includes('index.php')) {
                var lienImg = '../' + basePath + this.getAttribute('id');
            } else {
                var lienImg = basePath + this.getAttribute('id');
            }

            // Récupérer les éléments du modal
            var modal = document.getElementById('image-modal');
            var modalImage = document.getElementById('modalImage');

            // Mettre à jour la source et l'alt de l'image du modal
            modalImage.setAttribute('src', lienImg);
            modalImage.setAttribute('alt', mess);

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
