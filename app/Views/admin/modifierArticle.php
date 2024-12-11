<h2><?= isset($data['id']) ? 'Modifier un article' : 'Ajouter un article' ?></h2>

<?php
if (isset($data['id'])) {
    echo form_open_multipart(base_url('admin/modifArticle/' . ($data['id'] ?? '')));
} else {
    echo form_open_multipart(base_url('admin/article/ajouter'));
}
?>

<?= form_label('Titre *', 'titre') ?>
<?= form_input('titre', $data['titre'] ?? '', ['required' => 'required']) ?>
<br>

<?= form_label('Contenu', 'contenu') ?>
<?= form_textarea('contenu', $data['contenu'] ?? '', ['required' => 'required']) ?>
<br>

<?= form_label('Image', 'image') ?>
<?= form_upload('image') ?>
<br>

<?= form_label('Type *', 'type') ?>
<?= form_dropdown(
    'type',
    ['actu' => 'Actualité', 'blog' => 'Blog'],
    $data['type'] ?? ''
) ?>
<br>

<?= form_label('Affichage', 'affichage') ?>
<?= form_checkbox(
    'affichage',
    't',
    isset($data['affichage']) && $data['affichage'] === 't'
) ?>
<br>

<?= form_submit('submit', isset($data['id']) ? 'Modifier' : 'Ajouter', ['class' => 'btnFGBJ']) ?>
<?= form_close() ?>

<?php if (isset($data['id'])) : ?>
    <?= form_open("admin/supprImageArticle/".$data['id'], ['class' => 'form-suppression', 'onsubmit' => " return confirm('Êtes-vous sûr de vouloir supprimer l\'image ?');"]) ?>
        <?= form_submit('submit', 'Supprimer l\'image de l\'article', ['class' => 'btnFGBJ']) ?>
    <?= form_close(); ?>
<?php endif; ?>

<a href="<?= base_url('admin/article') ?>" class="btnFGBJ">Annuler</a>