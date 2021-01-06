<?php foreach ($focus as $el):?>
<section class="focus bg-accent">
	<div class="main-wrapper grid c-2">
	
		<div class="media">

			<?php if($el->img()->isNotEmpty()):
			$img = $el->img()->toFile(); ?>
			<figure class='regular'>
		       <img class="<?php echo $img->extension() == 'jpg' ? 'blue-filter' : '' ?>" src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
		      </figure>
		    <?php endif; ?>
		</div>
		<div class="text">
			<span><?= $el->label()->kirbytext(); ?></span>
			<div class="margin_b-s">
				<?= $el->contentText()->kirbytext(); ?>
			</div>
			
			<?php snippet('links', array('links' => $el->links()->toStructure(), 'class' => 'bg-main')) ?>
			<?php snippet('press', array('pressData' => $el->press()->toStructure())) ?>
		</div>
	</div>
</section>

<?php endforeach;