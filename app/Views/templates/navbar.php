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
		<li><a <?php if (isset($_SESSION['page']) && $_SESSION['page'] == 'index'): ?> class="enJaune"<?php endif; ?> href="/">Accueil</a></li>
		<li><a <?php if (isset($_SESSION['page']) && $_SESSION['page'] == 'apropos'): ?> class="enJaune"<?php endif; ?> href="/apropos">À propos</a></li>
		<li><a <?php if (isset($_SESSION['page']) && $_SESSION['page'] == 'prog'): ?> class="enJaune"<?php endif; ?> href="/programme">Programmes</a></li>
		<li><a <?php if (isset($_SESSION['page']) && $_SESSION['page'] == 'avtapr'): ?> class="enJaune"<?php endif; ?> href="/avant-apres">Avant / Après</a></li>
		<?php if ((isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['admin'] == 't') || (isset($_SESSION['utilisateur']) && isset($_SESSION['abonneAvecMutimedia']))): ?>
			<li><a <?php if (isset($_SESSION['page']) && $_SESSION['page'] == 'blog'): ?> class="enJaune"<?php endif; ?> href="/blog">Blog</a></li>
		<?php endif; ?>
		<li><a <?php if (isset($_SESSION['page']) && $_SESSION['page'] == 'actu'): ?> class="enJaune"<?php endif; ?> href="/actualite">Actualité</a></li>
		<li><a <?php if (isset($_SESSION['page']) && $_SESSION['page'] == 'contact'): ?> class="enJaune"<?php endif; ?> href="/contact">Contact</a></li>
		<?php if (isset($_SESSION['utilisateur'])): ?>
			<li>
				<div class="btn-wrapper" style="position: relative;">
					<button class="btnModal" id="openModalCompte">
						<img class="imgProfil" id="openModalCompte" src="/assets/images/profil.png" alt="Image profil">
					</button>
					<div id="creationCompteModal" class="modal">
						<div class="modal-content">
							<a href="/profil"><h5>Mon compte</h5></a>
							<?php if($_SESSION['utilisateur']['admin'] == 't'): ?>
								<a href="/admin"><h5>Admin</h5></a>
							<?php endif; ?>
							<a href="/logout"><h5>Déconnexion</h5></a>
						</div>
					</div>
				</div>
			</li>
		<?php else : ?>
			<li><a href="/connexion" class="btnFGBJ">Se Connecter</a></li>
		<?php endif; ?>
	</ul>
</nav>