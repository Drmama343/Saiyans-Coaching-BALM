<h2><?= isset($data['id']) ? 'Modifier une promotion' : 'Ajouter une promotion' ?></h2>

<?php 
    $url = isset($data['id']) ? 'admin/modifPromotion/' . $data['id'] : 'admin/ajouter/promotion';
    echo form_open(base_url($url));
?>

    <?= form_label('Date de début', 'date_deb') ?>
    <?= form_input(
        [
            'type' => 'date',
            'name' => 'date_deb',
            'id' => 'date_deb',
            'required' => 'required'
        ],
        isset($data['date_deb']) ? date('Y-m-d\TH:i', strtotime($data['date_deb'])) : ''
    ) ?>
    <br>

    <?= form_label('Date de fin', 'date_fin') ?>
    <?= form_input(
        [
            'type' => 'date',
            'name' => 'date_fin',
            'id' => 'date_fin',
            'required' => 'required'
        ],
        isset($data['date_fin']) ? date('Y-m-d\TH:i', strtotime($data['date_fin'])) : ''
    ) ?>
    <br>

    <?= form_label('Réduction (%)', 'reduction') ?>
    <?= form_input(
        [
            'type' => 'number',
            'name' => 'reduction',
            'id' => 'reduction',
            'min' => '0',
            'max' => '100',
            'required' => 'required'
        ],
        $data['reduction'] ?? ''
    ) ?>
    <br>

    <?= form_label('Code promotionnel', 'code') ?>
    <?= form_input(
        [
            'name' => 'code',
            'id' => 'code',
            'required' => 'required'
        ],
        $data['code'] ?? ''
    ) ?>
    <br>

    <?= form_label('Nombre d\'utilisations restantes', 'nb_utilisation') ?>
    <?= form_input(
        [
            'type' => 'number',
            'name' => 'nb_utilisation',
            'id' => 'nb_utilisation',
            'min' => '0',
            'required' => 'required'
        ],
        $data['nb_utilisation'] ?? ''
    ) ?>
    <br>

    <?= form_label('Produit associé', 'produit') ?>
    <?= form_dropdown(
        'produit',
        $programmes,
        $data['produit'] ?? '',
        ['id' => 'produit', 'required' => 'required']
    ) ?>
    <br>

    <?= form_submit(
        'submit',
        isset($data['id']) ? 'Modifier' : 'Ajouter',
        ['class' => 'btnFGBJ']
    ) ?>
<?= form_close() ?>
