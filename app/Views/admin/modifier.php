<?php 
	$title = "Saiyan's Coaching - Modfications";
	$style = "stlModifier.css";
	$navbar = "stlNavbar.css";
	include __DIR__ . '/../templates/header.php';
	include __DIR__ . '/../templates/navbarAdmin.php';
?>

<div class="conteneur-modifier">
	<div class="contenu-modifier">
		<?php
			switch ($model) {
				case 'article':
					include __DIR__ . '/modifierArticle.php';
					break;
				case 'question':
					include __DIR__ . '/modifierQuestion.php';
					break;
				case 'programme':
					include __DIR__ . '/modifierProgramme.php';
					break;
				case 'temoignage':
					include __DIR__ . '/modifierTemoignage.php';
					break;
				case 'promotion':
					include __DIR__ . '/modifierPromotion.php';
					break;
				default:
					break;
			}
		?>
	</div>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>