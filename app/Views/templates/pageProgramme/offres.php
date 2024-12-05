<div class="conteneur-produits">
	<h2 class="tJ">Choisi ton besoin</h2>
	<div class="carousel">
		<div class="contenu-produits">
			<?php if (!empty($produits) && is_array($produits)): ?>
				<?php foreach ($produits as $produit): ?>
					<div class="produit">
						<h3><?= esc($produit['nom']) ?></h3>
						<p>✔ <?= esc($produit['description']) ?></p>
						<p><strong>Prix : <?= esc($produit['prix']) ?>/an</strong></p>
					</div>
				<?php endforeach; ?>
				<?php else: ?>
				<p>Aucun produit trouvé.</p>
			<?php endif; ?>
		</div>
		<button class="prev">◀</button>
		<button class="next">▶</button>
	</div>
</div>