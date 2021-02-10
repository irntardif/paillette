<div class="margin_t-m">
	<?php foreach ($data as $key => $button): ?>
	<a style="max-width: 200px" class="btn icon <?= switchData($button->linkType()).' '.$class ?>" target="_blank" href="<?= fetchUrl($data); ?>"><?= $button->linkLabel(); ?></a>	
<?php endforeach; ?>
</div>

	



