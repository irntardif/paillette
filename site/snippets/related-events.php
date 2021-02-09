<?php

$carousel = true;
 if ($related->isNotEmpty()): 
?>
<div>
	<h2 class="h2 margin_b-m"><?= $page->intendedTemplate() == 'spectacle' ? 'Autour du spectacle' : 'Pour aller plus loin'; ?></h2>
  	<div class="carousel-related margin_b-l">
	    <?php foreach ($related->toPages() as $event): ?>
	      <?php snippet('carousel-thumb', array('event' => $event)); ?>
	    <?php endforeach; ?>
  	</div>
</div>
<?php endif; ?>
