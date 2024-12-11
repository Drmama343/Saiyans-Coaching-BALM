<div class="conteneur-produits" id="scrollTo">
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
						<button class="produit" onclick="openModal('<?= esc($produit['nom']) ?>', '<?= esc($produit['prix']) ?>', 'Tous les mois', '<?= esc($produit['id']) ?>')">
							<h3><?= esc($produit['nom']) ?></h3>
							<p id="prix"><strong><?= esc($produit['prix']) ?></strong></p>
							<p id="descPrix">Tous les mois</p>
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
						<p id="descPrix">Tous les mois</p>
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
				<p id="alt">Aucun produit disponible.</p>
			<?php endif; ?>
		</div>
		<?php if (!empty($produits) && is_array($produits)): ?>
			<button class="prev">◀</button>
			<button class="next">▶</button>
		<?php endif; ?>
	</div>
</div>

<?php if (session()->getFlashdata('alert_message')): ?>
	<script type="text/javascript">
		var message = '<?= addslashes(session()->getFlashdata('alert_message')); ?>';
		alert(message);
	</script>
<?php endif; ?>

<div class="modal" id="productModal">
	<div class="modal-content">
		<button class="close-btn" onclick="closeModal()">&times;</button>
		<h3 id="modal-title"></h3>
		<p>Prix : <strong><span id="modal-price"></span></strong></p>
		<strong><p id="modal-description"></p></strong>
		<a class="btnFGBJ" id="btnAchat">Valider le paiement</a>
	</div>
</div>