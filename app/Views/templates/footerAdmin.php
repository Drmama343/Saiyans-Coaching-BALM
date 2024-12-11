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
                break;
            case '':
                echo '  <script src="/assets/js/fctTemoignages.js"></script>
                        <script src="/assets/js/fctOffres.js"></script>';
                break;
            case 'programme':
                echo '  <script src="/assets/js/fctOffres.js"></script>';
                break;
        }

        echo '<script src="/assets/js/fctNavbar.js"></script>';
    ?>
</body>
</html>