<?php if($teamBlock->permanents()->isNotEmpty() ){
	$style = "--columns: 4";
	$class = "column";
	$teamArray = $teamBlock->permanents()->toStructure();
	$type = 'structureType';
	$title = "Les permanents";
}else{
	$style = "--columns: 8";
	$class = "column grid c-2";
	$teamArray = $teamBlock->intervenants()->toPages();
	$type = 'pageType';
	$title = "Les intervenants";
} ?>


<div class='column' style="<?=$style?>">
	<h2 class="margin_b-s margin_t-m"><?= $title; ?></h2>
	<?php if($type == 'pageType'): ?>
	<div class="grid c-2">
	<?php endif;
	    foreach($teamArray as $item): ?>
	    	<div class="card <?=$type?>">
	    		<?php if($type == 'structureType'):?>
	    		<p><span class="h3 cap"><?= $item->pname() ?></span></p>
	    		<p><span class="micro-text"><?= $item->pfunction() ?></span></p>
	    		<p><a class="micro-text" href="mailto:<?= $item->pemail() ?>"><?= $item->pemail() ?></a></p>
	    		<?php else: ?>
	    			<p><span class="small-title"><?= $item->title() ?></span></p>
	    			<p><span class="micro-text cap"><?= $item->area() ?></span></p>
	    			<?php foreach($item->workshops()->toPages() as $workshop): ?>
	    				<p><a class="micro-text" href="<?= $workshop->url()?>"><?= $workshop->title() ?></a></p>
	    			<?php endforeach;
	    		endif; ?>
	    	</div>
	    <?php endforeach;?>
	<?php if($type == 'pageType'): ?>
	</div>
	<?php endif; ?>
</div>