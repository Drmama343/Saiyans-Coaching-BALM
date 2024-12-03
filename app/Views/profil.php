<?php
$title = "Saiyan's Coaching - Accueil";
//$style = "stlAccueil.css";
include 'templates/header.php';
?>
<?php include 'templates/navbar.php'; ?>

<?= form_open("/modifProfil/" . session()->get('utilisateur')['id']); ?>
<?= form_label('Nom', 'nom') ?>
<?= form_input('nom', session()->get('utilisateur')['nom'], ['place holder' => 'Nom', 'required' => 'required']) ?>
<br>
<?= form_label('Prénom', 'prenom') ?>
<?= form_input('prenom', session()->get('utilisateur')['prenom'], ['placeholder' => 'Prénom', 'required' => 'required']) ?>
<br>
<?= form_label('Email', 'email') ?>
<?= form_input('email', session()->get('utilisateur')['mail'], ['placeholder' => 'Email', 'required' => 'required']) ?>
<br>
<?= form_label('Mot de passe actuel', 'mdp_actuel') ?>
<?= form_password('mdp_actuel', '', ['placeholder' => 'Mot de passe actuel']) ?>
<br>
<?= form_label('Nouveau mot de passe', 'nouveau_mdp') ?>
<?= form_password('nouveau_mdp', '', ['placeholder' => 'Nouveau mot de passe']) ?>
<br>
<?= form_label('Confirmer le nouveau mot de passe', 'mdp_confirm') ?>
<?= form_password('mdp_confirm', '', ['placeholder' => 'Confirmer le nouveau mot de passe']) ?>
<br>
<?= form_submit('submit', 'Sauvegarder') ?>
<?= form_close(); ?>

<div>
    <p>Votre abonnement : <?= esc($abonnement) ?></p>
</div>

<div>
    <table>
        <thead>
            <tr>
                <th>Nom du produit</th>
                <th>Date d'achat</th>
                <th>Votre évaluation du produit</th>
                <th>Votre avis</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($achats as &$achat) : ?>
                <tr>
                    <td><?= esc($achat['produit']); ?></td>
                    <td><?= esc($achat['date']); ?></td>
                    <td><?= esc($achat['note']); ?></td>
                    <td><?= esc($achat['temoignage']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'templates/footer.php'; ?>