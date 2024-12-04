<?php
$title = "Saiyan's Coaching - Accueil";
$style = "stlAccueil.css";
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
<?= form_label('Email', 'mail') ?>
<?= form_input('mail', session()->get('utilisateur')['mail'], ['placeholder' => 'Email', 'required' => 'required']) ?>
<br>
<?= form_label('Adresse', 'adresse') ?>
<?= form_input('adresse', session()->get('utilisateur')['adresse'] == null ? '' : session()->get('utilisateur')['adresse'], ['placeholder' => 'Adresse']) ?>
<br>
<?= form_label('Téléphone', 'tel') ?>
<?= form_input('tel', session()->get('utilisateur')['tel'] == null ? '' : session()->get('utilisateur')['tel'], ['placeholder' => 'Téléphone']) ?>
<br>
<?= form_label('Sexe', 'sexe') ?>
<?= form_input('sexe', session()->get('utilisateur')['sexe'], ['placeholder' => 'Sexe', 'required' => 'required']) ?>
<br>
<?= form_label('Age', 'age') ?>
<?= form_input('age', session()->get('utilisateur')['age'], ['placeholder' => 'Age', 'required' => 'required']) ?>
<br>
<?= form_label('Taille', 'taille') ?>
<?= form_input('taille', session()->get('utilisateur')['taille'], ['placeholder' => 'Taille', 'required' => 'required']) ?>
<br>
<?= form_label('Poids', 'poids') ?>
<?= form_input('poids', session()->get('utilisateur')['poids'], ['placeholder' => 'Poids', 'required' => 'required']) ?>
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