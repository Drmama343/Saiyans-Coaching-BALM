<div class="contacts">
    <div class="menu">
        <h4>Menu</h4>
        <ul>
        <li>A propos</li>
        <li>Programmes</li>
        <li>Témoignages</li>
        <li>Blog</li>
        <li>Actualité</li>
        </ul>
    </div>
    <div class="contact">
        <h4>Contact</h4>
        <p>Coachingss9800@gmail.com</p>
        <div class="social-icons">
            <img src="/assets/images/facebook.png">
            <img src="/assets/images/tiktok.png">
            <img src="/assets/images/instagram.png">
            <img src="/assets/images/youtube.png">
            <img src="/assets/images/whatsapp.png">
        </div>
    </div>
    <div class="connectezvous">
        <h4>Connectez vous!</h4>
        <input type="email" placeholder="exemple@gmail.com"><br>
        <button>Se connecter</button>
    </div>
    <div>
        <img src="/assets/images/logo.png" alt="Logo">
    </div>
</div>
    
    <?php 
        $url = current_url(true);

        switch($url->getSegment(1)) {
            case 'inscription':
                echo '<script src="/assets/js/fctRechercheAdresse.js"></script>';
                break;
            case 'profil':
                echo '<script src="/assets/js/fctRechercheAdresse.js"></script>';
                break;
            case '':
                echo '  <script src="/assets/js/fctTemoignages.js"></script>
                        <script src="/assets/js/fctOffres.js"></script>';
                break;
            case 'apropos':
                
                break;
        }

        echo '<script src="/assets/js/fctNavbar.js"></script>';
    ?>
</body>
</html>
