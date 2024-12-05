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
        <li><a href="/profil"><img class="imgProfil" src="/assets/images/profil.png" alt="Image profil"></a></li>
        <li><a href="/logout"><img class="imgLogout" src="/assets/images/logout.png" alt="Image logout"></a></li>
        <?php else : ?>
        <li><a href="/connexion" class="btnFGBJ">Se Connecter</a></li>
        <?php endif; ?>
    </ul>
</nav>