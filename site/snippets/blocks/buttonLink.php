<?php 

if(!$data->stringLabel()): ?>
	<div class="margin_t-m">
		<?php foreach ($data as $key => $button): 
			if($button->linkType() == 'mail'):
				$href = 'mailto:'.$button->mailaddr()->value();
			else: 
				$href = $button->linkUrl();
			endif; ?>
		<a style="max-width: 180px" class="btn icon <?= switchData($button->linkType()).' '.$class ?>" target="_blank" href="<?= $href; ?>"><?= $button->linkLabel(); ?></a>	
	<?php endforeach; ?>
	</div>
<?php else:
	if($data->linkType() == 'mail'):
		$href = 'mailto:'.$data->mailaddr()->value();
	else: 
		$href = $data->linkUrl();
	endif; ?>

	<a style="max-width: 180px" class="btn icon <?= switchData($data->linkType()).' '.$class ?>" target="_blank" href="<?= $href; ?>"><?= $data->linkLabel(); ?></a>	
<?php endif; ?>
	
	



