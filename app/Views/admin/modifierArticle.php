<h2>Modifier un article</h2>
<?= form_open_multipart(base_url('admin/modifArticle/' . $data['id'])) ?>
	<?= form_label('Titre', 'titre') ?>
	<?= form_input('titre', $data['titre']) ?>
	<br>
	<?= form_label('Contenu', 'contenu') ?>
	<?= form_textarea('contenu', $data['contenu']) ?>
	<br>
	<?= form_label('Image', 'image') ?>
	<?= form_upload('image') ?>
	<br>
	<?= form_label('Affichage', 'affichage') ?>
	<?= form_checkbox('affichage', 't', $data['affichage'] === "t" ? true : false) ?>
	<br>
	<?= form_submit('submit', 'Modifier', ['class' => 'btnFGBJ']) ?>
<?= form_close() ?>