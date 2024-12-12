<?php 

// Récupère l'url de la page actuelle
$url = current_url(true);

switch ($url->getSegment(1)) {
	case 'connexion':
		$title = "Saiyan's Coaching - Connexion";
		$style = 'stlConnexion.css';
		include 'templates/header.php';
		include 'templates/connexion.php';
		break;
	case 'inscription':
		$title = "Saiyan's Coaching - Inscription";
		$style = 'stlInscription.css';
		include 'templates/header.php';
		include 'templates/inscription.php';
		break;
	case 'forgotpwd':
		$title = "Saiyan's Coaching - Mot de passe oublié";
		$style = 'stlConnexion.css';
		include 'templates/header.php';
		include 'templates/forgotpwd.php';
		break;
	case 'resetpwd':
		$title = "Saiyan's Coaching - Réinitialisation du mot de passe";
		$style = 'stlConnexion.css';
		include 'templates/header.php';
		include 'templates/resetpwd.php';
		break;
}

?>

<?php include 'templates/footer.php'; ?>