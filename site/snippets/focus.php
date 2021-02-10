<?php foreach ($focus as $el):?>
<section class="focus bg-accent">
	<div class="main-wrapper grid c-2" style="padding-top: 3.77em;padding-bottom: 3.77em">
	
		<div class="media">
			<div class="carousel-wrapper">
				<?php if($el->imgs()->isNotEmpty()):
				if($el->diaporama()->toBool()): ?>
					<div class="carousel-img">
				<?php endif;
				foreach ($el->imgs()->toFiles() as $img): ?>
					<figure class='regular'>
				       <img src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
				    </figure>
				<?php endforeach;
				if($el->diaporama()->toBool()): ?>
					</div>
					<nav class="carousel-nav">
						<button class="prev">Prev</button>
						<button class="next">Next</button>
					</nav>
				<?php endif;
			endif; ?>
			</div>
			<div class="media">
				<?php snippet('blocks/videoContent', array('data' => $el->video()->toStructure()->first())) ?>
			</div>
		</div>
		<div class="text">
			<span><?= $el->label()->kirbytext(); ?></span>
			<div class="margin_b-s">
				<?= $el->contentText()->kirbytext(); ?>
			</div>
			
			<?php snippet('blocks/buttonLinks', array('data' => $el->links()->toStructure(), 'class' => 'bg-main')) ?>
			<?php snippet('press', array('pressData' => $el->press()->toStructure())) ?>
		</div>
	</div>
</section>

<?php endforeach; ?>