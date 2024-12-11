<div class="contacts">
    <div class="menu">
        <h4>Menu</h4>
        <ul>
            <li><a href="/apropos">À propos</a></li>
            <li><a href="/programme">Programmes</a></li>
            <li><a href="/avant-apres">Avant / Après</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/actualite">Actualité</a></li>
        </ul>
    </div>
    <div class="contact">
        <h4>Contact</h4>
        <a href="/contact">Coachingss9800@gmail.com</a>
        <div class="social-icons">
            <a href="https://www.facebook.com/clem.cr"><img src="/assets/images/facebook.png"></a>
            <a href="https://www.instagram.com/saiyan_coaching/"><img src="/assets/images/instagram.png"></a>
            <a href="/contact"><img src="/assets/images/whatsapp.png"></a>
        </div>
    </div>
    <div>
        <img src="/assets/images/logo.png" alt="Logo">
    </div>
    <a href="/cgv" class="cgv">Conditions générales de ventes</a>
</div>
    
    <?php 
        $url = current_url(true);

        switch($url->getSegment(1)) {
            case 'inscription':
                echo '<script src="/assets/js/fctRechercheAdresse.js"></script>';
                break;
			case 'admin':
				echo '<script src="/assets/js/fctStats.js"></script>';
                if(($url->getSegment(2) == 'temoignage' || $url->getSegment(2) == 'article') && $url->getSegment(3) == '') {
                    echo '<script src="/assets/js/fctAffichageImage.js"></script>';
                }
				break;
            case 'profil':
                echo '<script src="/assets/js/fctRechercheAdresse.js"></script>';
                echo '<script src="/assets/js/fctAffichageImage.js"></script>';
                break;
            case '':
                echo '<script src="/assets/js/fctTemoignages.js"></script>
                        <script src="/assets/js/fctOffres.js"></script>
                        <script src="/assets/js/fctPromotion.js"></script>';
                break;
            case 'programme':
                echo '  <script src="/assets/js/fctOffres.js"></script>';
                break;
        }

        echo '<script src="/assets/js/fctNavbar.js"></script>';
    ?>
</body>
</html>
