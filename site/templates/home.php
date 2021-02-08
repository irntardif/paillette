<?php
?>
<?php snippet('header') ?>
<main class="main">
	<div class="main-wrapper padding_b-xxl">
		
		<div class="carousel-wrapper margin_t-l">
			<div class="carousel-events">
				<?php foreach ($kirby->collection('incoming-shows') as $event): ?>
		      		<?php snippet('event-thumb', array('event' => $event)); ?>
		    	<?php endforeach; ?>
		    	<div style="width:100%"></div>
			</div>
			<nav class="carousel-nav">
				<button class="prev">Prev</button>
				<button class="next">Next</button>
			</nav>
		</div>

		<?php snippet('agenda', array('img' => $page->workshopImage())); ?>
		
		<div class="grid <?= $page->news()->isNotEmpty() ? 'c-3' : 'c-2' ?>">
			<?php if($page->news()->isNotEmpty()):?>
			<div>
				<h2 class="h2">Actualités</h2>
				<?php foreach($page->news()->toStructure() as $key => $new): ?>
				<section class="dropdown-bloc small <?= $key == 0 ? 'open' : '' ?>" data-dropdown="true" data-id="<?=$key?>">
		        	<header class="flex space-between">
		        		<h4 class="uppercase h4"><?= $new->title() ?></h4>
		        		<span class="open-icon"></span>
					</header>
					<div class="wrapper grid-wrapper">
						<div class="text margin_t-m">
							<?= $new->contentText()->kirbyText() ?>
							<?php snippet('links', array('links'=> $new->links()->toStructure(), 'class' => 'eye' )) ?>
						</div>
					</div>
		        </section>
		    	<?php endforeach; ?>
			</div>
			<?php endif; ?>
			
			<?php if($page->highlightedBlocks()->isNotEmpty()):?>
				<?php foreach($page->highlightedBlocks()->toStructure() as $key => $block): ?>
					<div>
						<h2 class="h2"><?= $block->title() ?></h2>
						<?php snippet('headerImg', array('imgs' => $block->img())); ?>
						<div class="text margin_t-m">
							<?php if($block->contentText()->isNotEmpty()):?>
								<?= $block->contentText()->kirbyText() ?>
							<?php endif; ?>
							<?php snippet('links', array('links'=> $block->links()->toStructure(), 'class' => 'eye' )) ?>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</main>
<?php if($page->focus()->isNotEmpty()):
  snippet('focus', array('focus' => $page->focus()->toStructure()));
endif ?>
<?php snippet('footer') ?>

<script>

  const carousel = new Siema({
    selector: '.carousel-events',
    duration: 400,
    easing: 'ease-out',
    perPage: {
	    768: 1,
	    1024: 3,
	  },
    startIndex: 0,
    draggable: true,
    multipleDrag: true,
    threshold: 20,
    loop: false,
    rtl: false,
    onInit: () => {},
    onChange: () => {},
  });
  	const prev = document.querySelector('.prev');
	const next = document.querySelector('.next');

	prev.classList.add('inactive');

    prev.addEventListener('click', () => {
        carousel.prev();
        console.log(Math.round(carousel.innerElements.length / carousel.perPage));
        carousel.currentSlide == 0 ? prev.classList.add('inactive') : prev.classList.remove('inactive');
        carousel.currentSlide == carousel.innerElements.length - carousel.perPage ? next.classList.add('inactive') : next.classList.remove('inactive');
      }
    );
    next.addEventListener('click',  () => {
      carousel.next()
      carousel.currentSlide == 0 ? prev.classList.add('inactive') : prev.classList.remove('inactive');
      carousel.currentSlide == carousel.innerElements.length - carousel.perPage ? next.classList.add('inactive') : next.classList.remove('inactive');
    });

</script>
