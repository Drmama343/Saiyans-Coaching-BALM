<div class="conteneur-modifier-article">
	<div class="contenu-modifier-article">
		<h2>Modifier un article</h2>
		<form action="<?= base_url('admin/article/' . $data['id']) ?>" method="post">
			<div class="form-group">
				<label for="titre">Titre</label>
				<input type="text" name="titre" id="titre" value="<?= $data['titre'] ?>">
			</div>
			<div class="form-group">
				<label for="contenu">Contenu</label>
				<textarea name="contenu" id="contenu" cols="30" rows="10"><?= $data['contenu'] ?></textarea>
			</div>
			<div class="form-group">
				<label for="image">Image</label>
				<input type="text" name="image" id="image" value="<?= $data['image'] ?>">
			</div>
			<div class="form-group">
				<label for="affichage">Affichage</label>
				<input type="checkbox" name="affichage" id="affichage" <?= $data['affichage'] === "t" ? "checked" : "" ?>>
			</div>
			<div class="form-group">
				<button type="submit">Modifier</button>
			</div>
		</form>
	</div>
</div>