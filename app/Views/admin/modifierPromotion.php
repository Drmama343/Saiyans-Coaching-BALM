<h2>Modifier une promotion</h2>
<?= form_open(base_url('admin/modifPromotion/' . $data['id'])) ?>
    <?= form_label('Date de début', 'date_deb') ?>
    <?= form_input(['type' => 'datetime-local', 'name' => 'date_deb', 'id' => 'date_deb'], date('Y-m-d\TH:i', strtotime($data['date_deb']))) ?>
    <br>
    <?= form_label('Date de fin', 'date_fin') ?>
    <?= form_input(['type' => 'datetime-local', 'name' => 'date_fin', 'id' => 'date_fin'], date('Y-m-d\TH:i', strtotime($data['date_fin']))) ?>
    <br>
    <?= form_label('Réduction (%)', 'reduction') ?>
    <?= form_input(['type' => 'number', 'name' => 'reduction', 'id' => 'reduction', 'min' => '0', 'max' => '100'], $data['reduction']) ?>
    <br>
    <?= form_label('Code promotionnel', 'code') ?>
    <?= form_input(['name' => 'code', 'id' => 'code'], $data['code']) ?>
    <br>
    <?= form_label('Nombre d\'utilisations restantes', 'nb_utilisation') ?>
    <?= form_input(['type' => 'number', 'name' => 'nb_utilisation', 'id' => 'nb_utilisation', 'min' => '0'], $data['nb_utilisation']) ?>
    <br>
    <?= form_label('Produit associé', 'produit') ?>
    <?= form_dropdown('produit', $programmes, $data['produit'], ['id' => 'produit']) ?>
    <br>
    <?= form_submit('submit', 'Modifier', ['class' => 'btnFGBJ']) ?>
<?= form_close() ?>
