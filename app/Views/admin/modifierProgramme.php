<h2>Modifier un programme</h2>
<?= form_open_multipart(base_url('admin/modifProgramme/' . $data['id'])) ?>
    <?= form_label('Nom', 'nom') ?>
    <?= form_input('nom', $data['nom']) ?>
    <br>
    <?= form_label('Description', 'description') ?>
    <?= form_textarea('description', $data['description']) ?>
    <br>
    <?= form_label('Prix (€)', 'prix') ?>
    <?= form_input(['type' => 'number', 'name' => 'prix', 'id' => 'prix', 'step' => '1'], $data['prix']) ?>
    <br>
    <?= form_label('Durée (jours)', 'duree') ?>
    <?= form_input(['type' => 'number', 'name' => 'duree', 'id' => 'duree'], $data['duree']) ?>
    <br>
    <?= form_label('Entraînement inclus', 'entrainement') ?>
    <?= form_checkbox('entrainement', 't', $data['entrainement'] === "t" ? true : false) ?>
    <br>
    <?= form_label('Contenu multimédia', 'multimedia') ?>
    <?= form_checkbox('multimedia', 't', $data['multimedia'] === "t" ? true : false) ?>
    <br>
    <?= form_label('Plan alimentaire inclus', 'alimentaire') ?>
    <?= form_checkbox('alimentaire', 't', $data['alimentaire'] === "t" ? true : false) ?>
    <br>
    <?= form_label('Bilan personnalisé', 'bilan') ?>
    <?= form_checkbox('bilan', 't', $data['bilan'] === "t" ? true : false) ?>
    <br>
    <?= form_label('Support WhatsApp', 'whatsapp') ?>
    <?= form_checkbox('whatsapp', 't', $data['whatsapp'] === "t" ? true : false) ?>
    <br>
    <?= form_submit('submit', 'Modifier', ['class' => 'btnFGBJ']) ?>
<?= form_close() ?>
