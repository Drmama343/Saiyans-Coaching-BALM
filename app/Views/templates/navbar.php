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
			<li>
				<div class="btn-wrapper" style="position: relative;">
					<button class="btnModal" id="openModalCompte">
						<img class="imgProfil" id="openModalCompte" src="/assets/images/profil.png" alt="Image profil">
					</button>
					<div id="creationCompteModal" class="modal">
						<div class="modal-content">
							<span class="close-btn" id="closeModalCompte">&times;</span>
							<a href="/profil" class="btnFGBJ"><h5>Mon compte</h5></a>
							<?php if(isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['admin'] == 't'): ?>
								<a href="/admin" class="btnFGBJ"><h5>Admin</h5></a>
							<?php endif; ?>
							<a href="/logout" class="btnFGBJ"><h5>Déconnexion</h5></a>
						</div>
					</div>
				</div>
			</li>
		<?php else : ?>
			<li><a href="/connexion" class="btnFGBJ">Se Connecter</a></li>
		<?php endif; ?>
	</ul>
</nav>