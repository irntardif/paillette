<?php if($img->isNotEmpty()):
$img = $img->toFile(); ?>
<div class="media margin_t-m">
	<figure>
		<img class="<?php echo $img->extension() == 'jpg' ? 'blue-filter' : '' ?>" src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
	</figure>
</div>
<?php endif; ?>