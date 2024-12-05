<div class="conteneur-produits">
	<h2 class="tJ">Nos Offres</h2>
	<div class="carousel">
		<div class="contenu-produits">
			<?php if (!empty($produits) && is_array($produits)): ?>
				<?php foreach ($produits as $produit): ?>
					<div class="produit">
						<h3><?= esc($produit['nom']) ?></h3>
						<p><?= esc($produit['description']) ?></p>
						<p><strong>Prix : <?= esc($produit['prix']) ?> €/an</strong></p>
						<br>
						<p><?php if ($produit['entrainement'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Entraînement</p>
						<p><?php if ($produit['multimedia'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Multimédia</p>
						<p><?php if ($produit['alimentaire'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Alimentaire</p>
						<p><?php if ($produit['bilan'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Bilan</p>
						<p><?php if ($produit['whatsapp'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Whatsapp</p>
					</div>
				<?php endforeach; ?>
				<?php else: ?>
				<p>Aucun produit disponible.</p>
			<?php endif; ?>
		</div>
		<button class="prev">◀</button>
		<button class="next">▶</button>
	</div>
</div>