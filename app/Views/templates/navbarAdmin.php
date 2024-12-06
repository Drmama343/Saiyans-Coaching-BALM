<nav>
	<div class="left-section">
		<img src="/assets/images/logo.png" alt="Logo">
	</div>
	<div class="burger-menu" onclick="toggleMenu()">
		<div></div>
		<div></div>
		<div></div>
	</div>
	<ul>
		<button class="close-btn" onclick="toggleMenu()">✖</button>
		<li><a href="/">Accueil</a></li>
		<li><a href="/admin">Statistiques</a></li>
		<li><a href="/programme-admin">Programmes</a></li>
		<li><a href="/temoignages-admin">Temoignages</a></li>
		<li><a href="/article-admin">Articles</a></li>
		<li><a href="/contact-admin">Contact</a></li>
		<?php if (isset($_SESSION['utilisateur'])): ?>
			<li><button class="btnModal" id="openModalCompte"><img class="imgProfil" src="/assets/images/profil.png" alt="Image profil"></button></li>
		<?php else : ?>
			<li><a href="/connexion" class="btnFGBJ">Se Connecter</a></li>
		<?php endif; ?>
	</ul>
</nav>

<!-- Modal -->
<div id="creationCompteModal" class="modal">
	<div class="modal-content">
		<span class="close-btn" id="closeModalCompte">&times;</span>
		<a href="/profil" class="btnFGBJ"><h5>Mon compte</h5></a>
		<a href="/" class="btnFGBJ"><h5>Accueil</h5></a>
		<a href="/logout" class="btnFGBJ"><h5>Déconnexion</h5></a>
	</div>
</div>