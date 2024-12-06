<div class="conteneur-temoignage">
	<h2>Témoignages</h2>
	<div class="carousel">
		<div class="contenu-temoignage">
			<?php if (!empty($temoignages) && is_array($temoignages)): ?>
				<?php foreach ($temoignages as $temoignage): ?>
					<div class="temoignage">
						<span class="tJ">
							<?php for($i = 0; $i < $temoignage['note']; $i++): ?>
								<span class="etoile"></span>
							<?php endfor; ?>
						</span>
						<p class="date"><?= date('d/m/Y', strtotime($temoignage['date'])) ?></p>
						<h3><?= $temoignage['saiyan']['prenom'] ?> <?= $temoignage['saiyan']['nom'] ?></h3>
						<p><?= esc($temoignage['temoignage']) ?></p>
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