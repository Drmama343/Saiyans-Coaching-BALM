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



    ?>
</body>
</html>
