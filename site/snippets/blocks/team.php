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
				    <?php switch ($item->area()) {
				        case 'arts-plastiques':
				            $label = 'Arts Plastiques';
				            break;
				        case 'bien-être':
				            $label = 'Bien-être';
				            break;
				        case 'danse':
				            $label = 'Danse';
				            break;
				        case 'musique':
				            $label = 'Musique';
				            break;
				        case 'chant':
				            $label = 'Chant';
				            break;
				        case 'theatre':
				            $label = 'Théâtre';
				            break;
				        case 'mixed':
				            $label = 'Pluridisciplinaire';
				            break;
				        default:
				            $label = '';
				            $desc =  '';
				            break;
				        }?>
	    			<p><span class="micro-text"><?= $label ?></span></p>
	    			
	    		<?php endif; ?>
	    	</div>
	    <?php endforeach;?>
	<?php if($type == 'pageType'): ?>
	</div>
	<?php endif; ?>
</div>