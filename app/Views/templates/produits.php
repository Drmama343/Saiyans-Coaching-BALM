<div class="conteneur-produits">
	<h2 class="tJ">Nos Offres</h2>
	<div class="carousel">
		<div class="contenu-produits">
			<?php if (!empty($produits) && is_array($produits)): ?>
					<?php
						$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
						$segments = explode('/', trim($path, '/'));

						if (end($segments) === "programme"):
					?>
					<?php foreach ($produits as $produit): ?>
						<button class="produit" onclick="openModal('<?= esc($produit['nom']) ?>', '<?= esc($produit['prix']) ?>', 'tous les mois')">
							<h3><?= esc($produit['nom']) ?></h3>
							<p id="prix"><strong><?= esc($produit['prix']) ?></strong></p>
							<p id="descPrix">tous les mois</p>
							<p><?= esc($produit['description']) ?></p>
							<hr>
							<p><?php if ($produit['entrainement'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Entraînement</p>
							<p><?php if ($produit['multimedia'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Multimédia</p>
							<p><?php if ($produit['alimentaire'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Alimentaire</p>
							<p><?php if ($produit['bilan'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Bilan</p>
							<p><?php if ($produit['whatsapp'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Whatsapp</p>
						</button>
					<?php endforeach; ?>
				<?php else: ?>
					<?php foreach ($produits as $produit): ?>
					<a href="/programme" class="produit">
						<h3><?= esc($produit['nom']) ?></h3>
						<p id="prix"><strong><?= esc($produit['prix']) ?></strong></p>
						<p id="descPrix">tous les mois</p>
						<p><?= esc($produit['description']) ?></p>
						<hr>
						<p><?php if ($produit['entrainement'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Entraînement</p>
						<p><?php if ($produit['multimedia'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Multimédia</p>
						<p><?php if ($produit['alimentaire'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Alimentaire</p>
						<p><?php if ($produit['bilan'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Bilan</p>
						<p><?php if ($produit['whatsapp'] == 't'): ?> <span style="color:green;">✔</span> <?php else: ?> <span style="color:red;">✕</span> <?php endif; ?> Whatsapp</p>
					</a>
				<?php endforeach; ?>
				<?php endif; ?>
			<?php else: ?>
				<p>Aucun produit disponible.</p>
			<?php endif; ?>
		</div>
		<button class="prev">◀</button>
		<button class="next">▶</button>
	</div>
</div>

<div class="modal" id="productModal">
	<div class="modal-content">
		<button onclick="closeModal()">&times;</button>
		<h3 id="modal-title"></h3>
		<p><strong>Prix :</strong> <span id="modal-price"></span></p>
		<p id="modal-description"></p>
		<button class="buy-btn">Finaliser l'achat</button>
	</div>
</div>