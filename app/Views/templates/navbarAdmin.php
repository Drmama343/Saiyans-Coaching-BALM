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
		<li><a <?php if (isset($_SESSION['page']) && $_SESSION['page'] == 'admin'): ?> class="enJaune"<?php endif; ?> href="/admin">Statistiques <span>&#128081;</span></a></li>
		<li><a <?php if (isset($_SESSION['page']) && $_SESSION['page'] == 'adminSaiyan'): ?> class="enJaune"<?php endif; ?> href="/admin/saiyan">Saiyans <span>&#128081;</span></a></li>
		<li><a <?php if (isset($_SESSION['page']) && $_SESSION['page'] == 'adminProg'): ?> class="enJaune"<?php endif; ?> href="/admin/programme">Programmes <span>&#128081;</span></a></li>
		<li><a <?php if (isset($_SESSION['page']) && $_SESSION['page'] == 'adminTemoi'): ?> class="enJaune"<?php endif; ?> href="/admin/temoignage">Temoignages <span>&#128081;</span></a></li>
		<li><a <?php if (isset($_SESSION['page']) && $_SESSION['page'] == 'adminArt'): ?> class="enJaune"<?php endif; ?> href="/admin/article">Articles <span>&#128081;</span></a></li>
		<li><a <?php if (isset($_SESSION['page']) && $_SESSION['page'] == 'adminQuest'): ?> class="enJaune"<?php endif; ?> href="/admin/question">Questions <span>&#128081;</span></a></li>
		<?php if (isset($_SESSION['utilisateur'])): ?>
			<div class="btn-wrapper" style="position: relative;">
				<button class="btnModal" id="openModalCompte">
					<img class="imgProfil" id="openModalCompte" src="/assets/images/profil.png" alt="Image profil">
				</button>
				<div id="creationCompteModal" class="modal">
					<div class="modal-content">
						<a href="/profil"><h5>Mon compte</h5></a>
						<?php if(isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['admin'] == 't'): ?>
							<a href="/admin"><h5>Admin</h5></a>
						<?php endif; ?>
						<a href="/logout"><h5>Déconnexion</h5></a>
					</div>
				</div>
			</div>
		<?php else : ?>
			<li><a href="/connexion" class="btnFGBJ">Se Connecter</a></li>
		<?php endif; ?>
	</ul>
</nav>