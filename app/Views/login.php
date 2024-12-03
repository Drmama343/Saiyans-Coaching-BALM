<?php 

// Récupère l'url de la page actuelle
$url = current_url(true);

if($url->getSegment(1) == 'connexion') {
    $title = "Saiyan's Coaching - Connexion"; 
    $style = 'stlConnexion.css';
    include 'templates/header.php'; 
    include 'templates/connexion.php';
} else {
    $title = "Saiyan's Coaching - Inscription"; 
    $style = 'stlInscription.css';
    include 'templates/header.php'; 
    include 'templates/inscription.php';
}

?>

<?php include 'templates/footer.php'; ?>