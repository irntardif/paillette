<?php if($imgs->isNotEmpty()): 
foreach ($imgs->toFiles() as $img): ?>
 	 <div class="media margin_t-m">
		<figure class="<?php echo ($img->extension() == 'jpg' || $img->extension() == 'jpeg' || $img->extension() == 'webp') ? 'blue-filter regular' : 'regular' ?>">
			<img src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
		</figure>
	</div>
 <?php endforeach ?>


<?php endif; ?>