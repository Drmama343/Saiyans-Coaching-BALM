<div class="conteneur-accueil">
	<img class="imgAccueil" src="/assets/images/fondAccueil.jpg" alt="Image d'accueil">

	<div class="contenu-accueil">
		<h2 class="tJ">Saiyan's Coaching</h2>
		<?php if(current_url(true)->getSegment(1) === '') { ?>
			<h1>Entraîne-toi comme un saiyan</h1>
		<?php } else { ?>
			<h1>Un programme à ton image !</h1>
		<?php } ?>
		<p>Progresse comme un guerrier : ta transformation commence aujourd'hui !</p>
		<a href="/programme" class="btnFJBG">Commencez Maintenant !</a>
	</div>
</div>