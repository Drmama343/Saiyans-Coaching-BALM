<?php
$title = "Saiyan's Coaching - Accueil";
$style = "stlProfil.css";
$navbar = "stlNavbar.css"; 
include 'templates/header.php';
?>
<?php include 'templates/navbar.php'; ?>

<div class="conteneur-modif">
    <div class="contenu-modif">
        <?= form_open("/modifProfil/" . session()->get('utilisateur')['id']); ['class' => 'form-modif']?>
            <div class="form-grid">
                <div class="cellule-grid">
                    <?= form_label('Nom *', 'nom') ?>
                    <?= form_input('nom', session()->get('utilisateur')['nom'], ['place holder' => 'Nom', 'required' => 'required']) ?>
                </div>

                <div class="cellule-grid">
                    <?= form_label('Prénom *', 'prenom') ?>
                    <?= form_input('prenom', session()->get('utilisateur')['prenom'], ['placeholder' => 'Prénom', 'required' => 'required']) ?>
                </div>

                <div class="cellule-grid">
                    <?= form_label('Email *', 'mail') ?>
                    <?= form_input('mail', session()->get('utilisateur')['mail'], ['placeholder' => 'Email', 'required' => 'required', 'id'=>'mail']) ?>
                </div>

                <div class="cellule-grid">
                    <?= form_label('Adresse', 'adresse'); ?>
                    <?= form_input('adresse', $stgAdr == null ? '' : $stgAdr, ['id' => 'adresse', 'class' => '']); ?>
                </div>
                
                <div class="cellule-grid" id="cellule-grid-suggestions">
                    <h3 id="titre-suggestions">Proposition d'adresse</h3>
                    <div id="suggestions" class="suggestions"></div>
                </div>
                
                <div class="cellule-grid">
                    <?= form_label('Téléphone', 'telephone') ?>
                    <?= form_input('telephone', session()->get('utilisateur')['tel'] == null ? '' : session()->get('utilisateur')['tel'], ['placeholder' => 'Téléphone']) ?>
                </div>
                
                <div class="cellule-grid">
                    <?= form_label('Sexe *', 'sexe'); ?>
                    <?= form_dropdown('sexe', ['H' => 'Homme', 'F' => 'Femme'], session()->get('utilisateur')['sexe'], ['id' => 'sexe', 'default' => 'Homme', 'required' => 'required']); ?>
                </div>
                
                <div class="cellule-grid">
                    <?= form_label('Age *', 'age') ?>
                    <?= form_input('age', session()->get('utilisateur')['age'], ['placeholder' => 'Age', 'required' => 'required']) ?>
                </div>

                <div class="cellule-grid">
                    <?= form_label('Poids (en kg) *', 'poids'); ?>
                    <?= form_input('poids', session()->get('utilisateur')['poids'], ['id' => 'poids', 'class' => '', 'required' => 'required', 'step' => '0.01'], 'number'); ?>
                </div>
                
                <div class="cellule-grid">
                    <?= form_label('Taille (en cm) *', 'taille'); ?>
                    <?= form_input('taille', session()->get('utilisateur')['taille'], ['id' => 'taille', 'class' => '', 'required' => 'required'], 'number'); ?>
                </div>
                
                <div class="cellule-grid">
                    <?= form_label('Mot de passe actuel', 'mdp_actuel') ?>
                    <?= form_password('mdp_actuel', '', ['placeholder' => 'Mot de passe actuel']) ?>
                </div>
                
                <div class="cellule-grid">
                    <?= form_label('Nouveau mot de passe', 'nouveau_mdp') ?>
                    <?= form_password('nouveau_mdp', '', ['placeholder' => 'Nouveau mot de passe']) ?>
                </div>
                
                <div class="cellule-grid">
                    <?= form_label('Confirmer le nouveau mot de passe', 'mdp_confirm') ?>
                    <?= form_password('mdp_confirm', '', ['placeholder' => 'Confirmer le nouveau mot de passe']) ?>
                </div>
                
                <?= form_submit('submit', 'Sauvegarder') ?>
            </div>
        <?= form_close(); ?>
    </div>
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
                    <td></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'templates/footer.php'; ?>