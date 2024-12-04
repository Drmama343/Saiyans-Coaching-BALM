<?php
$title = "Saiyan's Coaching - Accueil";
//$style = "stlProfil.css";
include 'templates/header.php';
?>
<?php include 'templates/navbar.php'; ?>

<div class="conteneur-modif">
    <div class="contenu-modif">
        <?= form_open("/modifProfil/" . session()->get('utilisateur')['id']); ['class' => 'form-modif']?>
            <div class="form-grid">
                <div class="cellule-grid">
                <?= form_label('Nom', 'nom') ?>
                <?= form_input('nom', session()->get('utilisateur')['nom'], ['place holder' => 'Nom', 'required' => 'required']) ?>
                </div>
                <br>
                <div class="cellule-grid">
                <?= form_label('Prénom', 'prenom') ?>
                <?= form_input('prenom', session()->get('utilisateur')['prenom'], ['placeholder' => 'Prénom', 'required' => 'required']) ?>
                </div>
                <br>
                <div class="cellule-grid">
                <?= form_label('Email', 'mail') ?>
                <?= form_input('mail', session()->get('utilisateur')['mail'], ['placeholder' => 'Email', 'required' => 'required']) ?>
                </div>
                <br>
                <div class="cellule-grid">
                <?= form_label('Adresse', 'adresse') ?>
                <?= form_input('adresse', session()->get('utilisateur')['adresse'] == null ? '' : session()->get('utilisateur')['adresse'], ['placeholder' => 'Adresse']) ?>
                </div>
                <div class="cellule-grid-suggestions" id="cellule-grid-suggestions">
					<h3 id="titre-suggestions">Proposition d'adresse</h3>
					<div id="suggestions" class="suggestions"></div>
				</div>
                <br>
                <div class="cellule-grid">
                <?= form_label('Téléphone', 'tel') ?>
                <?= form_input('tel', session()->get('utilisateur')['tel'] == null ? '' : session()->get('utilisateur')['tel'], ['placeholder' => 'Téléphone']) ?>
                </div>
                <br>
                <div class="cellule-grid">
                <?= form_label('Sexe', 'sexe') ?>
                <?= form_input('sexe', session()->get('utilisateur')['sexe'], ['placeholder' => 'Sexe', 'required' => 'required']) ?>
                </div>
                <br>
                <div class="cellule-grid">
                <?= form_label('Age', 'age') ?>
                <?= form_input('age', session()->get('utilisateur')['age'], ['placeholder' => 'Age', 'required' => 'required']) ?>
                </div>
                <br>
                <div class="cellule-grid">
                <?= form_label('Taille', 'taille') ?>
                <?= form_input('taille', session()->get('utilisateur')['taille'], ['placeholder' => 'Taille', 'required' => 'required']) ?>
                </div>
                <br>
                <div class="cellule-grid">
                <?= form_label('Poids', 'poids') ?>
                <?= form_input('poids', session()->get('utilisateur')['poids'], ['placeholder' => 'Poids', 'required' => 'required']) ?>
                </div>
                <br>
                <div class="cellule-grid">
                <?= form_label('Mot de passe actuel', 'mdp_actuel') ?>
                <?= form_password('mdp_actuel', '', ['placeholder' => 'Mot de passe actuel']) ?>
                </div>
                <br>
                <div class="cellule-grid">
                <?= form_label('Nouveau mot de passe', 'nouveau_mdp') ?>
                <?= form_password('nouveau_mdp', '', ['placeholder' => 'Nouveau mot de passe']) ?>
                </div>
                <br>
                <div class="cellule-grid">
                <?= form_label('Confirmer le nouveau mot de passe', 'mdp_confirm') ?>
                <?= form_password('mdp_confirm', '', ['placeholder' => 'Confirmer le nouveau mot de passe']) ?>
                </div>
                <br>
                <?= form_submit('submit', 'Sauvegarder') ?>
            </div>
        <?= form_close(); ?>
    </div>
</div>

<div>
    <h2>Votre abonnement</h2>
    <p><?= esc($abonnement) ?></p>
</div>

<div>
    <h2>Vos Achats</h2>
    <table class="table-achat">
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