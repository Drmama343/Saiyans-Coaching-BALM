<?php 
	$title = "Saiyan's Coaching - Modfications";
	$style = "stlModifier.css";
	$navbar = "stlNavbar.css";
	include __DIR__ . '/../templates/header.php';
	include __DIR__ . '/../templates/navbarAdmin.php';
?>

<?php
	switch ($model) {
		case 'article':
			include __DIR__ . '/modifierArticle.php';
			break;
		case 'question':
			include __DIR__ . '/modifierQuestion.php';
			break;
		case 'progamme':
			include __DIR__ . '/modifierProgramme.php';
			break;
		case 'temoignage':
			include __DIR__ . '/modifierTemoignage.php';
			break;
		default:
			break;
	}
?>

<?php include __DIR__ . '/../templates/footer.php'; ?>