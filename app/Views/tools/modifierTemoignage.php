<?php 
	$title = "Saiyan's Coaching - Modfications";
	$style = "stlModifier.css";
	$navbar = "stlNavbar.css";
	include __DIR__ . '/../templates/header.php';
	include __DIR__ . '/../templates/navbarAdmin.php';
?>

<div class="conteneur-modifier">
	<div class="contenu-modifier">
        <h2>Modifier votre témoignage</h2>
        <?= form_open_multipart(base_url('modifTemoignage/' . $temoignage['id'])) ?>

        <?= form_label('Témoignage', 'temoignage') ?>
            <?= form_textarea('temoignage', $temoignage['temoignage'], ['id' => 'temoignage']) ?>
            <br>

            <?= form_label('Note', 'note') ?>
            <?= form_input(
                ['type' => 'number', 'name' => 'note', 'id' => 'note', 'min' => '1', 'max' => '5', 'step' => '1', 'required' => 'required'], 
                $temoignage['note']
            ) ?>
            <br>

            <?= form_label('Date', 'date') ?>
            <?= form_input(
                ['type' => 'date', 'name' => 'date', 'id' => 'date', 'disabled' => 'disabled'], 
                date('Y-m-d', strtotime($temoignage['date']))
            ) ?>
            <br>

            <?= form_submit('submit', 'Modifier', ['class' => 'btnFGBJ']) ?>
            <a href="<?= base_url('profil') ?>" class="btnFGBJ">Annuler</a>
        <?= form_close() ?>
	</div>
</div>

<?php include __DIR__ . '/../templates/footerAdmin.php'; ?>