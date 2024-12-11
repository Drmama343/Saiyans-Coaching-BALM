<div class="conteneur-accueil">
	<?php if(current_url(true)->getSegment(1) === '') { ?>
			<img class="imgAccueil" src="/assets/images/fondAccueil.jpg" alt="Image d'accueil">
		<?php } else { ?>
			<img class="imgAccueil" src="/assets/images/fondRejoinNous.jpg" alt="Image d'accueil">
		<?php } ?>

	<div class="contenu-accueil">
		<h2 class="tJ">Saiyan's Coaching</h2>
		<?php if(current_url(true)->getSegment(1) === '') { ?>
			<h1>Entraîne-toi comme un saiyan</h1>
			<p>Progresse comme un guerrier : ta transformation commence aujourd'hui !</p>
			<a href="/programme" class="btnFJBG">Commencez Maintenant !</a>
		<?php } else { ?>
			<h1>Un programme à ton image !</h1>
			<p>Progresse comme un guerrier : ta transformation commence aujourd'hui !</p>
			<a href="#scrollTo" class="btnFJBG">Commencez Maintenant !</a>
		<?php } ?>
	</div>
</div>