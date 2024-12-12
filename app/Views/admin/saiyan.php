<?php
    $title = "Saiyan's Coaching - Accueil";
    $style = "stlSaiyan.css";
    $navbar = "stlNavbar.css";
	include __DIR__ . '/../templates/header.php';
	include __DIR__ . '/../templates/navbarAdmin.php'; 
?>

<div class="conteneur-modif">
    <div class="contenu-modif">
        <div class="recherche">
            <?= form_open('/admin/rechercherSaiyan', ['method' => 'post']); ?>
                <?= csrf_field() ?>
                <?= form_label('<h5>Rechercher :</h5>', 'recherche'); ?>
                <?= form_input('recherche',isset($_SESSION['rechercheSaiyan']) ? $_SESSION['rechercheSaiyan'] : '',['id' => 'recherche', 'onchange' => 'this.form.submit()']); ?>
            <?= form_close(); ?>
        </div>
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

<div class="conteneur-modif">
    <div class="contenu-modif">
        <div class="recherche">
            <?= form_open('/admin/rechercherAchat', ['method' => 'post']); ?>
                <?= csrf_field() ?>
                <?= form_label('<h5>Rechercher :</h5>', 'recherche'); ?>
                <?= form_input('recherche',isset($_SESSION['rechercheAchat']) ? $_SESSION['rechercheAchat'] : '',['id' => 'recherche', 'onchange' => 'this.form.submit()', 'placeholder' => 'Rechercher depuis une date ...']); ?>
            <?= form_close(); ?>
        </div>
        <table class="table-achat">
            <thead>
                <tr>
                    <th>Saiyan</th>
                    <th>Abonnement</th>
                    <th>Date d'achat</th>
                    <th>Date d'échéance</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($achats as $achat) : ?>
                        <tr>
                            <td><?= esc($achat['saiyan']); ?></td>
                            <td><?= esc($achat['abonnement']); ?></td>
                            <td><?= esc($achat['date']); ?></td>
                            <td><?= esc($achat['echeance']); ?></td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
        <div id="paginationAchat">
            <?= $pagerAchat->links('Achat', 'custom') ?>
        </div>
    </div>
</div>

<script src="/assets/js/fctSaiyan.js"></script>

<?php include __DIR__ . '/../templates/footerAdmin.php'; ?>