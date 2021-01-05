<?php if($data->linkType() == 'mail'):
	$href = 'mailto:'.$data->mailaddr()->value();
else: 
	$href = $data->linkUrl();
endif; ?>

<div class=text>
	<p>
		<a class="btn" target="_blank" href="<?= $href; ?>"><?= $data->linkLabel(); ?></a>
	</p>
</div>
