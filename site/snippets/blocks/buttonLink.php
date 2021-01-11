<?php if(!$data->stringLabel()):
	foreach ($data as $key => $button): 
		if($button->linkType() == 'mail'):
			$href = 'mailto:'.$button->mailaddr()->value();
		else: 
			$href = $button->linkUrl();
		endif; ?>
	<a style="max-width: 120px" class="btn large" target="_blank" href="<?= $href; ?>"><?= $button->linkLabel(); ?></a>	
	<?php endforeach;
else:
	if($data->linkType() == 'mail'):
		$href = 'mailto:'.$data->mailaddr()->value();
	else: 
		$href = $data->linkUrl();
	endif; ?>

	<a style="max-width: 120px" class="btn large" target="_blank" href="<?= $href; ?>"><?= $data->linkLabel(); ?></a>	
<?php endif; ?>
	
	



