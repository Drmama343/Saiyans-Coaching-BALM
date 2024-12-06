<?php
    $title = "Saiyan's Coaching - Accueil";
    $style = "stlProfil.css";
    $navbar = "stlNavbar.css"; 
    include 'templates/header.php';
    include 'templates/navbar.php'; 
?>

<div class="conteneur-modif">
    <div class="formulaire-et-table">
        <!-- Formulaire -->
        <div class="contenu-modif">
            <?= form_open("/modifProfil/" . $saiyan['id'], ['class' => 'form-modif']) ?>
                <h2>Modifier votre profil</h2>
                <div class="form-grid">
                    <!-- Contenu du formulaire (inchangé) -->
                    <div class="cellule-grid">
                        <?= form_label('Nom *', 'nom') ?>
                        <?= form_input('nom', $saiyan['nom'], ['placeholder' => 'Nom', 'required' => 'required']) ?>
                    </div>
                    
                    <div class="cellule-grid">
                        <?= form_label('Prénom *', 'prenom') ?>
                        <?= form_input('prenom', $saiyan['prenom'], ['placeholder' => 'Prénom', 'required' => 'required']) ?>
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
                        <?= form_input('telephone', $formattedTel == null ? '' : $formattedTel, ['placeholder' => 'Téléphone']) ?>
                    </div>
                    
                    <div class="cellule-grid">
                        <?= form_label('Sexe *', 'sexe'); ?>
                        <?= form_dropdown('sexe', ['H' => 'Homme', 'F' => 'Femme'], $saiyan['sexe'], ['id' => 'sexe', 'default' => 'Homme', 'required' => 'required']); ?>
                    </div>

                    <div class="cellule-grid">
                        <?= form_label('Adresse e-mail *', 'mail') ?>
                        <?= form_input('mail', $saiyan['mail'], ['placeholder' => 'Email', 'required' => 'required', 'id'=>'mail']) ?>
                    </div>
                    
                    <div class="cellule-grid">
                        <?= form_label('Age *', 'age') ?>
                        <?= form_input('age', $saiyan['age'], ['placeholder' => 'Age', 'required' => 'required']) ?>
                    </div>

                    <div class="cellule-grid">
                        <?= form_label('Poids (en kg) *', 'poids'); ?>
                        <?= form_input('poids', $saiyan['poids'], ['id' => 'poids', 'class' => '', 'required' => 'required', 'step' => '0.01'], 'number'); ?>
                    </div>
                    
                    <div class="cellule-grid">
                        <?= form_label('Taille (en cm) *', 'taille'); ?>
                        <?= form_input('taille', $saiyan['taille'], ['id' => 'taille', 'class' => '', 'required' => 'required'], 'number'); ?>
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
                </div>
                <?= form_submit('submit', 'Sauvegarder', ['class' => 'btnFJBG']) ?>
            <?= form_close(); ?>
        </div>

        <!-- Tableau des achats -->
        <h2>Vos Achats</h2>
        <table class="table-achat">
            <thead>
                <tr>
                    <th>Nom du produit</th>
                    <th>Date d'achat</th>
                    <th>Date d'échéance</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($achats as &$achat) : ?>
                    <tr>
                        <td><?= esc($achat['produit']); ?></td>
                        <td><?= esc(date('d/m/Y', strtotime($achat['date']))); ?></td>
                        <td><?= esc(date('d/m/Y', strtotime($achat['echeance']))); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
