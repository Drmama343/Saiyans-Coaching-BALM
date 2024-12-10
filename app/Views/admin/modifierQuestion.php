

<?php 
	if(isset($data['id']))
	{
        echo '<h2>Modifier une question</h2>';
		echo form_open_multipart(base_url('admin/modifQuestion/' . ($data['id'] ?? '')));
	} else {
        echo '<h2>Ajouter une question</h2>';
		echo form_open_multipart(base_url('admin/question/ajouter'));
	}
?>

    <?= form_label('Question', 'question') ?>
    <?= form_textarea('question', $data['question'] ?? '') ?>
    <br>

    <?= form_label('Reponse', 'reponse') ?>
    <?= form_textarea('reponse', $data['reponse'] ?? '') ?>
    <br>


    <?= form_submit('submit', isset($data['id']) ? 'Modifier' : 'Ajouter', ['class' => 'btnFGBJ']) ?>
<?= form_close() ?>
