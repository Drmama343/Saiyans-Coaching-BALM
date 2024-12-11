<?php
	if(isset($data['id']))
	{
		echo '<h2>Modifier un programme</h2>';
		echo form_open_multipart(base_url('admin/modifProgramme/' . ($data['id'] ?? '')));
	} else {
		echo '<h2>Ajouter un programme</h2>';
		echo form_open_multipart(base_url('admin/programme/ajouter'));
	}
?>

    <?= form_label('Nom *', 'nom') ?>
    <?= form_input('nom', isset($data['nom']) ? $data['nom'] : '', ['required' => 'required']) ?>
    <br>
    <?= form_label('Description', 'description') ?>
    <?= form_textarea('description', isset($data['description']) ? $data['description'] : '') ?>
    <br>
    <?= form_label('Prix (€) *', 'prix') ?>
    <?= form_input(['required' => 'required', 'type' => 'number', 'min' => '0', 'name' => 'prix', 'id' => 'prix', 'step' => '1'], isset($data['prix']) ? $data['prix'] : '') ?>
    <br>
    <?= form_label('Durée (jours) *', 'duree') ?>
    <?= form_input(['required' => 'required', 'type' => 'number', 'min' => '0', 'name' => 'duree', 'id' => 'duree'], isset($data['duree']) ? $data['duree'] : '') ?>
    <br>
    <?= form_label('Entraînement inclus', 'entrainement') ?>
    <?= form_checkbox('entrainement', 't', isset($data['entrainement']) && $data['entrainement'] === "t" ? true : false) ?>
    <br>
    <?= form_label('Contenu multimédia', 'multimedia') ?>
    <?= form_checkbox('multimedia', 't', isset($data['multimedia']) && $data['multimedia'] === "t" ? true : false) ?>
    <br>
    <?= form_label('Plan alimentaire inclus', 'alimentaire') ?>
    <?= form_checkbox('alimentaire', 't', isset($data['alimentaire']) && $data['alimentaire'] === "t" ? true : false) ?>
    <br>
    <?= form_label('Bilan personnalisé', 'bilan') ?>
    <?= form_checkbox('bilan', 't', isset($data['bilan']) && $data['bilan'] === "t" ? true : false) ?>
    <br>
    <?= form_label('Support WhatsApp', 'whatsapp') ?>
    <?= form_checkbox('whatsapp', 't', isset($data['whatsapp']) && $data['whatsapp'] === "t" ? true : false) ?>
    <br>
    <?= form_submit('submit', isset($data['id']) ? 'Modifier' : 'Ajouter', ['class' => 'btnFGBJ']) ?>
	<a href="<?= base_url('admin/programme') ?>" class="btnFGBJ">Annuler</a>
<?= form_close() ?>
