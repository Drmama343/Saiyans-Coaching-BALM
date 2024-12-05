    <?php 
        $url = current_url(true);

        if($url->getSegment(1) == 'inscription' || $url->getSegment(1) == 'profil') {
            echo '<script src="/assets/js/fctRechercheAdresse.js"></script>';
        }
        else if ($url->getSegment(1) == '') {
            echo '  <script src="/assets/js/fctTemoignages.js"></script>
                    <script src="/assets/js/fctOffres.js"></script>';
        }
    ?>
</body>
</html>
