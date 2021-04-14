<div class="margin_t-m">
	<?php if($data->_key()): ?>
	
		<a style="max-width: 350px" class="btn icon <?= switchData($data->linkType()).' '.$class ?>" target="_blank" href="<?= fetchUrl($data); ?>"><?= $data->linkLabel(); ?></a>	
	
	<?php else: 
		
		foreach ($data as $key => $button): ?>
			<a style="max-width: 350px" class="btn icon <?= switchData($button->linkType()).' '.$class ?>" target="_blank" href="<?= fetchUrl($button); ?>"><?= $button->linkLabel(); ?></a>	
		<?php endforeach; ?>
	
	<?php endif; ?>

</div>

	



