<?php if($speaker): 
	if($speaker->isNotEmpty() && $speaker->bio()->isNotEmpty() || $speaker->isNotEmpty() && $speaker->links()->isNotEmpty()): ?>
		<div class="margin_t-l">
			<h2 class="h2">À propos de <?= $speaker->title(); ?></h2>
			<?= $speaker->bio()->kirbytext(); ?>
			<?php snippet('blocks/buttonLink', array('data' => $speaker->links()->toStructure(), 'class' => 'btn-light')) ?>	
		</div>
	<?php endif;
endif; ?>