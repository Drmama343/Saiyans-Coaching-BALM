<div class="conteneur-inscription">
    <div class="contenu-inscription">
        <a href="<?= base_url('/'); ?>"><img src="<?= base_url('assets/images/fléche retour.png'); ?>" alt="retour" class="img-flecheRetour"></a>
        <?= form_open('inscription', ['class' => 'form-inscription']); ?>
            <h2>S'inscrire</h2>
			<?= session()->getFlashdata('error') ?>
            <div class="form-grid">
                <div class="cellule-grid">
                    <?= form_label('Nom *', 'nom'); ?>
                    <?= form_input(['name' => 'nom', 'id' => 'nom', 'class' => '', 'value' => set_value('nom'), 'required' => 'required']); ?>
                </div>

                <div class="cellule-grid">
                    <?= form_label('Prénom *', 'prenom'); ?>
                    <?= form_input('prenom', set_value('prenom'), ['id' => 'prenom', 'class' => '', 'required' => 'required']); ?>
                </div>

                <div class="cellule-grid">
                    <?= form_label('Adresse', 'adresse'); ?>
                    <?= form_input('adresse', set_value('adresse'), ['id' => 'adresse', 'class' => '']); ?>
                </div>
                
                <div class="cellule-grid" id="cellule-grid-suggestions">
                    <h3 id="titre-suggestions">Proposition d'adresse</h3>
                    <div id="suggestions" class="suggestions"></div>
                </div>

                <div class="cellule-grid">
                    <?= form_label('Téléphone', 'telephone'); ?>
                    <?= form_input('telephone', set_value('telephone'), ['id' => 'telephone', 'class' => '']);?>	
                </div>

                <div class="cellule-grid">
                    <?= form_label('Sexe *', 'sexe'); ?>
                    <?= form_dropdown('sexe', ['H' => 'Homme', 'F' => 'Femme'], set_value('sexe'), ['id' => 'sexe', 'default' => 'Homme', 'required' => 'required']); ?>
                </div>

                <div class="cellule-grid">
                    <?= form_label('Adresse e-mail *', 'email'); ?>
                    <?= form_input('email', set_value('email'), ['id' => 'email', 'class' => '', 'required' => 'required'], 'email'); ?>
                </div>

                <div class="cellule-grid">
                    <?= form_label('Âge *', 'age'); ?>
                    <?= form_input('age', set_value('age'), ['id' => 'age', 'class' => '', 'required' => 'required'], 'number'); ?>
                </div>
                
                <div class="cellule-grid">
                    <?= form_label('Poids (en kg) *', 'poids'); ?>
                    <?= form_input('poids', set_value('poids'), ['id' => 'poids', 'class' => '', 'required' => 'required', 'step' => '0.01'], 'number'); ?>
                </div>

                <div class="cellule-grid">
                    <?= form_label('Taille (en cm) *', 'taille'); ?>
                    <?= form_input('taille', set_value('taille'), ['id' => 'taille', 'class' => '', 'required' => 'required'], 'number'); ?>
                </div>

                <div class="cellule-grid">
                    <?= form_label('Mot de passe *', 'password'); ?>
                    <?= form_password('password', '', ['id' => 'password', 'class' => '', 'required' => 'required']); ?>
                </div>

                <div class="cellule-grid">
                    <?= form_label('Confirmer le mot de passe *', 'password_confirm'); ?>
                    <?= form_password('password_confirm', '', ['id' => 'password_confirm', 'class' => '', 'required' => 'required']); ?>
                </div>
            </div>
            <?= form_submit(['name' => 'submit', 'value' => 'S\'inscrire', 'class' => 'btnFJBG']); ?>
        <?= form_close(); ?>

        <div class="lien-connexion">
            <p>Déjà un Saiyan ? <a href="/connexion">Connectez-vous</a></p>
        </div>
    </div>
</div>