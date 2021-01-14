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
				<section class="dropdown-bloc small" data-dropdown="true" data-id="<?=$key?>">
		        	<header class="flex space-between">
		        		<h4 class="uppercase h4"><?= $new->title() ?></h4>
		        		<span class="open-icon"></span>
					</header>
					<div class="wrapper grid-wrapper">
						<div class="text margin_t-m">
							<?= $new->contentText()->kirbyText() ?>
						</div>
					</div>
		        </section>
		    	<?php endforeach; ?>
			</div>
			<?php endif; ?>
			<div>
				<h2 class="h2">Aventures à partager</h2>
				<?php snippet('headerImg', array('img' => $page->adventuresImage())); ?>
				<div class="text margin_t-m">
					<?php if($page->adventuresText()->isNotEmpty()):?>
						<?= $page->adventuresText()->kirbyText() ?>
					<?php endif; ?>
					<p><a href="<?= $site->find('aventures')->url() ?>" class="btn bg-accent icon eye">Toutes les aventures</a></p>
				</div>
			</div>
			<div>
				<h2 class="h2">Ateliers</h2>
				<?php snippet('headerImg', array('img' => $page->workshopImage())); ?>
				<div class="text margin_t-m">
					<?php if($page->workshopText()->isNotEmpty()):?>
						<?= $page->workshopText()->kirbyText() ?>
					<?php endif; ?>
					<p><a href="<?= $site->find('ateliers')->url() ?>" class="btn bg-accent icon eye">Tous les ateliers</a></p>
				</div>
			</div>
		</div>
    
    
	</div>
</main>
<?php if($page->focus()->isNotEmpty()):
  snippet('focus', array('focus' => $page->focus()->toStructure()));
endif ?>
<?php snippet('footer') ?>
<?= js(['assets/js/siema.min.js']) ?>

<script>

  const carousel = new Siema({
    selector: '.carousel-events',
    duration: 400,
    easing: 'ease-out',
    perPage: 3,
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

	prev.addEventListener('click', () => carousel.prev());
	next.addEventListener('click', () => carousel.next());

</script>
