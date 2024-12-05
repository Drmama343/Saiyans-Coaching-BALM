<div class="conteneur-temoignage">
	<h2>Témoignages</h2>
	<div class="carousel">
		<div class="contenu-temoignage">
			<?php if (!empty($avis) && is_array($avis)): ?>
				<?php foreach ($avis as $avi): ?>
					<div class="temoignage">
						<span class="tJ"><span class="etoile"></span><span class="etoile"></span><span
								class="etoile"></span><span class="etoile"></span><span class="etoile"></span></span>
						<p><?= esc($avi['temoignage']) ?></p>
						<h4><?= esc($avi['idachat']) ?></h4>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<p>Aucun temoignange trouvée.</p>
			<?php endif; ?>
		</div>
		<button class="prev">◀</button>
		<button class="next">▶</button>
	</div>
</div>