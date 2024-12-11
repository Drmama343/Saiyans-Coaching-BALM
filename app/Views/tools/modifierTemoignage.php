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

            <?= form_label('Image', 'image') ?>
            <?= form_upload('image') ?>
            <br>

            <?= form_submit('submit', 'Modifier', ['class' => 'btnFGBJ']) ?>
        <?= form_close() ?>

        <?= form_open("supprImageTemoignage/".$temoignage['id'], ['class' => 'form-suppression', 'onsubmit' => " return confirm('Êtes-vous sûr de vouloir supprimer l\'image ?');"]) ?>
            <?= form_submit('submit', 'Supprimer l\'image du témoignage', ['class' => 'btnFGBJ']) ?>
        <?= form_close(); ?>

        <a href="<?= base_url('profil') ?>" class="btnFGBJ">Annuler</a> 
	</div>

</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>