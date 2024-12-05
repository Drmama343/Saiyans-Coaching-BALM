<div class="conteneur-offres">
	<h2 class="tJ">Choisi ton besoin</h2>
	<div class="carousel">
		<div class="contenu-offres">
			<?php if (!empty($offres) && is_array($offres)): ?>
				<?php foreach ($offres as $offre): ?>
					<div class="offre">
						<h3><?= esc($offre['nom']) ?></h3>
						<p>✔ <?= esc($offre['description']) ?></p>
						<p><strong>Prix : <?= esc($offre['prix']) ?>/an</strong></p>
					</div>
				<?php endforeach; ?>
				<?php else: ?>
				<p>Aucune offre trouvée.</p>
			<?php endif; ?>
		</div>
		<button class="prev">◀</button>
		<button class="next">▶</button>
	</div>
</div>