<?php if($data->linkType() == 'mail'):
	$href = 'mailto:'.$data->mailaddr()->value();
else: 
	$href = $data->linkUrl();
endif; ?>
<a style="max-width: 120px" class="btn large" target="_blank" href="<?= $href; ?>"><?= $data->linkLabel(); ?></a>

