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
			<div class="margin_b-l">
				<?= $el->contentText()->kirbytext(); ?>
			</div>
			<div class="margin_t-m">
			<?php foreach ($el->links()->toStructure() as $link):
				$href = $link->document()->isNotEmpty() ? $link->document()->toFile()->url() :  $link->url(); ?>
				<p><a class="btn icon eye bg-main" target="_blank" href="<?= $href ?>"><?= $link->label() ?></a></p>
			<?php endforeach; ?>
			</div>
			<?php snippet('blocks/press', array('pressData' => $el->press()->toStructure())) ?>
		</div>
	</div>
</section>

<?php endforeach;