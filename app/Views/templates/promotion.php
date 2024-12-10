<div class="conteneur-promotion">
	<div class="contenu-promotion">
		<?php foreach($promotions as $promotion) : ?>
			<div class="promotion">
				<p>Promotion de <?= $promotion['reduction'] ?>% sur le <?= $promotion['produit']['nom'] ?> jusqu'au <?= date('d/m/Y', strtotime($promotion['date_fin']))?></p>
			</div>
		<?php endforeach; ?>

	</div>
</div>