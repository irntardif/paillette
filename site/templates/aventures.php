<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>

    <?php if ($aventuresP = page('aventures')): ?>
      <?php $types = ['stage', 'immersion', 'projet', 'sortie-classe'];
      foreach ($types as $key => $type): ?>
        <?php switch ($type) {
        case 'stage':
            $title = 'Les Stages';
            $desc = $page->stageText()->kirbytext();
            break;
        case 'immersion':
            $title = 'Immersion dans la création';
            $desc =  $page->immersionText()->kirbytext();
            break;
        case 'projet':
            $title = 'Projets en complicité';
            $desc =  $page->projectText()->kirbytext();
            break;
        case 'sortie-classe':
            $title = 'Sorties de Classes';
            $desc =  $page->classExitsText()->kirbytext();
            break;

        }?>
        <section class="dropdown-bloc" data-dropdown="true" data-id="<?=$key?>">
          <header class="flex space-between">
            <h1 class="h1"><?= $title ?></h1>
            <span class="open-icon"></span>
          </header>
          <div class="wrapper">
            <div class='grid c-2'>
              <div class="text margin_t-m">
                <?= $desc; ?>
              </div>
            <?php snippet('artists-list', array('collection' => $aventuresP->children()->listed()->filterBy('intendedTemplate', $type))); ?>  
            </div class="text margin_t-m">
            <ul class="grid c-3">
            <?php foreach ($aventuresP->children()->listed()->filterBy('intendedTemplate', $type) as $adventure): ?>
              <?php snippet('thumb', array('event' => $adventure)); ?>
            <?php endforeach; ?>
            </ul>
          </div>
        </section>
      <?php endforeach; ?>
      <section class="dropdown-bloc" data-dropdown="true" data-id="visits">
          <header class="flex space-between">
            <h1 class="h1">Visite de la Paillette</h1>
            <span class="open-icon"></span>
          </header>
          <div class="wrapper">
            <div class='grid c-2'>
            	<div class="text margin_t-m">
                	<?= $page->visitsText()->kirbytext(); ?>
              	</div>
              	<div class="media margin_t-m">
			    	<?php if ($page->visitsImage()->isNotEmpty()):
			     	$img = $page->visitsImage()->toFile(); ?>
			      	<figure>
			       	<img class="<?php echo $img->extension() == 'jpg' ? 'blue-filter' : '' ?>" src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
			      	</figure>
			    	<?php endif ?>
			  	</div>
            </div>
            <ul class="grid c-3">
            <?php foreach ($aventuresP->children()->listed()->filterBy('template', $type) as $adventure): ?>
              <?php snippet('thumb', array('event' => $adventure)); ?>
            <?php endforeach; ?>
            </ul>
          </div>
        </section>
    <?php endif; ?>
  </div>
</main>
<?php if($page->focus()->isNotEmpty()):
  snippet('focus', array('focus' => $page->focus()->toStructure()));
endif ?>
<?php snippet('footer') ?>
