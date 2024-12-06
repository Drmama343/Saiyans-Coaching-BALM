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
		<li><a href="/apropos">À propos</a></li>
		<li><a href="/programme">Programmes</a></li>
		<li><a href="/avant-apres">Avant / Après</a></li>
		<li><a href="/blog">Blog</a></li>
		<li><a href="/actualite">Actualité</a></li>
		<li><a href="/contact">Contact</a></li>
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
		<button id="compteBtn"><h5>Mon compte</h5></button>
		<?php if ($_SESSION['utilisateur']['admin'] == 't'): ?><button id="adminBtn"><h5>Admin</h5></button><?php endif; ?>
		<button id="logoutBtn"><h5>Déconnexion</h5></button>
	</div>
</div>