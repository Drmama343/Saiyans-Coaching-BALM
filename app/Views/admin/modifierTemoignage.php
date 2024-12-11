<h2>Modifier un témoignage</h2>
<?= form_open_multipart(base_url('admin/modifTemoignage/' . $data['id'])) ?>
    <?= form_label('Saiyan *', 'idsaiyan') ?>
    <?= form_dropdown(
        'idsaiyan', 
        $saiyans,
        $data['idsaiyan'], 
        ['id' => 'idsaiyan', 'disabled' => 'disabled']
    ) ?>
    <br>

    <?= form_label('Témoignage', 'temoignage') ?>
    <?= form_textarea('temoignage', $data['temoignage'], ['id' => 'temoignage', 'disabled' => 'disabled']) ?>
    <br>

    <?= form_label('Note *', 'note') ?>
    <?= form_input(
        ['type' => 'number', 'name' => 'note', 'id' => 'note', 'min' => '1', 'max' => '5', 'step' => '1', 'disabled' => 'disabled'], 
        $data['note']
    ) ?>
    <br>

    <?= form_label('Date *', 'date') ?>
    <?= form_input(
        ['type' => 'date', 'name' => 'date', 'id' => 'date', 'disabled' => 'disabled'], 
        date('Y-m-d', strtotime($data['date']))
    ) ?>
    <br>

    <?= form_label('Affichage', 'affichage') ?>
    <?= form_checkbox('affichage', 't', $data['affichage'] === "t" ? true : false, ['id' => 'affichage']) ?>
    <br>

    <?= form_submit('submit', 'Modifier', ['class' => 'btnFGBJ']) ?>
	<a href="<?= base_url('admin/programme') ?>" class="btnFGBJ">Annuler</a>
<?= form_close() ?>
