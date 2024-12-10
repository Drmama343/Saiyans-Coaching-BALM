<?php
    $title = "Saiyan's Coaching - Accueil";
    $style = "stlProfil.css";
    $navbar = "stlNavbar.css"; 
	include __DIR__ . '/../templates/header.php';
	include __DIR__ . '/../templates/navbarAdmin.php'; 
?>

<div class="conteneur-modif">
    <div class="recherche">
        <?= form_open('/admin/rechercherSaiyan', ['method' => 'post']); ?>
            <?= csrf_field() ?>
            <?= form_label('<h5>Rechercher :</h5>', 'recherche'); ?>
            <?= form_input('recherche',isset($_SESSION['rechercheSaiyan']) ? $_SESSION['rechercheSaiyan'] : '',['id' => 'recherche', 'onchange' => 'this.form.submit()']); ?>
        <?= form_close(); ?>
    </div>
    <div class="contenu-modif">
        <table class="table-achat">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Sexe</th>
                    <th>Age</th>
                    <th>Taille</th>
                    <th>Poids</th>
                    <th>Administrateur</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($saiyans as $saiyan) : ?>
                        <tr>
                            <td><?= esc($saiyan['nom']); ?></td>
                            <td><?= esc($saiyan['prenom']); ?></td>
                            <td><?= esc($saiyan['mail']); ?></td>
                            <?php 
                            if (isset($saiyan['adresse'])){
                                $jsonString = $saiyan['adresse'];
                                $tmp = json_decode($jsonString, associative: true);
                                if (isset($tmp['query'])){
                                    $adresseFormattee = $tmp['query'];
                                }
                                else{
                                    $adresseFormattee = 'Adresse invalide';
                                }
                                $adr = $adresseFormattee;
                            }
                            else {
                                $adr = "Adresse invalide"; 
                            }?>
                            <td><?= esc($adr); ?></td>
                            <td class="tel"><?= esc($saiyan['tel']); ?></td>
                            <td><?= esc($saiyan['sexe']); ?></td>
                            <td><?= esc($saiyan['age']); ?></td>
                            <td><?= esc($saiyan['taille']); ?></td>
                            <td><?= esc($saiyan['poids']); ?></td>
                            <td><?= esc($saiyan['admin'] == 't' ? 'Oui' : 'Non'); ?></td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
        <div id="paginationSaiyan">
            <?= $pagerSaiyan->links('Saiyan', 'custom') ?>
        </div>
    </div>
</div>

<script src="/assets/js/fctSaiyan.js"></script>

<?php include __DIR__ . '/../templates/footerAdmin.php'; ?>