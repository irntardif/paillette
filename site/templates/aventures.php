<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper padding_b-xxl">
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
          <div class="wrapper grid-wrapper">
            <div class='grid c-2'>
              <div class="text margin_t-m">
                <?= $desc; ?>
              </div>
            <?php snippet('artists-list', array('collection' => $aventuresP->children()->listed()->filterBy('intendedTemplate', $type))); ?>  
            </div class="text margin_t-m">
            <?php snippet('filters', array('categories' => ['' => "Tous les âges", '.children1' => '4-5 ans', '.children2' => '6-10 ans', '.teen1' => '11-14 ans', '.teen2' => '15-18 ans', '.students' => 'étudiants', '.adults' => 'adultes'])); ?>
            <ul class="filter-grid grid c-3">
            <?php foreach ($aventuresP->children()->listed()->filterBy('intendedTemplate', $type) as $adventure): ?>
              <?php snippet('thumb', array('event' => $adventure)); ?>
            <?php endforeach; ?>
            </ul>
          </div>
        </section>
      <?php endforeach; ?>
      <section class="dropdown-bloc" data-dropdown="true" data-id="visits">
          <header class="flex space-between">
            <h1 class="h1">Visites de la Paillette</h1>
            <span class="open-icon"></span>
          </header>
          <div class="wrapper">
            <div class='grid c-2'>
            	<div class="text margin_t-m">
                	<?= $page->visitsText()->kirbytext(); ?>
                  <?php snippet('blocks/buttonLink', array('data' => $page->visitsLinks()->toStructure())); ?>
              </div>
              <?php snippet('headerImg', array('img' => $page->visitsImage())); ?>
            </div>
            
          </div>
      </section>
    <?php endif; ?>
  </div>
</main>
<?php if($page->focus()->isNotEmpty()):
  snippet('focus', array('focus' => $page->focus()->toStructure()));
endif ?>
<?php snippet('isotope-script') ?>
<?php snippet('footer') ?>
