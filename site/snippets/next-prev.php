<nav class="flex noflex-mob margin_t-l margin_b-m" style="justify-content:space-between">
	<?php if($page->hasPrevListed()): ?>
	<a class="btn bg-light prev" href="<?= $page->prevListed()->url() ?>"><?= $type == 'm' ? $template.' '.'précédent' : $template.' '.'précédente' ?></a>
	<?php endif; ?>
	<?php if($template == 'Sortie de classe' || $template == 'Projet' || $template == 'Stage' || $template == 'Immersion'): ?>
		<a class="btn bg-light" href="<?= $page->parent()->url() ?>">Toutes les Aventures</a>
	<?php else: ?>
		<a class="btn bg-light" href="<?= $page->parent()->url() ?>"><?= $type == 'm' ? 'Tous les '.$template.'s' : 'Toutes les  '.$template.'s' ?></a>
	<?php endif; ?>
	<?php if($page->hasNextListed()): ?>
	<a class="btn bg-light next" href="<?= $page->nextListed()->url() ?>"><?= $type == 'm' ? $template.' '.'suivant' : $template.' '.'suivante' ?></a>
	<?php endif; ?>
</nav>