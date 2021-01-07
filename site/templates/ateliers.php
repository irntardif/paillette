<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>

    <?php if ($ateliersP = page('ateliers')): ?>
      <?php $types = ['arts-plastiques', 'bien-être', 'danse', 'musique-chant', 'theatre'];
      foreach ($types as $key => $type): ?>
        <section class="dropdown-bloc" data-dropdown="true" data-id="<?=$key?>">
          <header class="flex space-between">
            <h1 class="h1"><?= $type ?></h1>
            <span class="open-icon"></span>
          </header>
          <div class="wrapper">
            <div class='grid c-2'>
              <div class="text">
                <?php switch ($type) {
                  case 'arts-plastiques':
                      echo $page->artsedito()->kirbytext();
                      break;
                  case 'bien-être':
                      echo $page->wellnessedito()->kirbytext();
                      break;
                  case 'danse':
                      echo $page->danseedito()->kirbytext();
                      break;
                  case 'musique-chant':
                      echo $page->musicedito()->kirbytext();
                      break;
                  case 'theatre':
                      echo $page->theatreedito()->kirbytext();
                      break;
                  }?>
              </div>
              <div>
                Intervenants
              </div>
            </div>
            <ul class="grid c-3">
            <?php foreach ($ateliersP->children()->listed()->filterBy('area', $type, ',') as $workshop): ?>
              <?php snippet('thumb', array('event' => $workshop)); ?>
            <?php endforeach; ?>
            </ul>
          </div>
        </section>
      <?php endforeach;
    endif; ?>
  </div>
</main>
<?php if($page->focus()->isNotEmpty()):
  snippet('focus', array('focus' => $page->focus()->toStructure()));
endif ?>
<?php snippet('footer') ?>
