<?php if(!empty($promotions)) : ?>
	<div class="conteneur-promotion">
		<div class="contenu-promotion">
			<?php foreach($promotions as $promotion) : ?>
				<div class="promotion">
					<p>
						Promotion de <span><?= $promotion['reduction'] ?>%</span> sur le 
						<span><?= $promotion['produit']['nom'] ?></span> jusqu'au 
						<span><?= date('d/m/Y', strtotime($promotion['date_fin']))?></span> avec le code "
						<span><?= $promotion['code'] ?></span>" !
					</p>
				</div>
			<?php endforeach; ?>

		</div>
	</div>
<?php endif; ?>