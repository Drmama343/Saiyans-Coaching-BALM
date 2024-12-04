<div class="conteneur-temoignage">
    <h2>Témoignages</h2>
    <div class="carousel">
        <div class="contenu-temoignage">
			<?php if (!empty($achats) && is_array($achats)): ?>
				<?php foreach ($achats as $achat): ?>
					<div class="temoignage">
						<span class="tJ"><span class="etoile"></span><span class="etoile"></span><span class="etoile"></span><span class="etoile"></span><span class="etoile"></span></span>
						<p><?= esc($achat['temoignage']) ?></p>
						<h4><?= esc($achat['idsaiyan']) ?></h4>
					</div>
				<?php endforeach; ?>
				<?php else: ?>
				<p>Aucune temoignange trouvée.</p>
			<?php endif; ?>
			</div>
        </div>
        <button class="prev">◀</button>
        <button class="next">▶</button>
    </div>
</div>