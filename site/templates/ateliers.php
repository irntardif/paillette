<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper padding_b-xxl">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>

    <?php if ($ateliersP = page('ateliers')): ?>
      <?php $types = ['arts-plastiques', 'bien-être', 'danse', 'musique-chant', 'theatre'];
      foreach ($types as $key => $type): ?>
        <?php switch ($type) {
        case 'arts-plastiques':
            $title = 'Arts Plastiques';
            $desc = $page->artsedito()->kirbytext();
            break;
        case 'bien-être':
            $title = 'Bien-être';
            $desc =  $page->wellnessedito()->kirbytext();
            break;
        case 'danse':
            $title = 'Danse';
            $desc =  $page->danseedito()->kirbytext();
            break;
        case 'musique-chant':
            $title = 'Musique et chant';
            $desc =  $page->musicedito()->kirbytext();
            break;
        case 'theatre':
            $title = 'Théâtre';
            $desc =  $page->theatreedito()->kirbytext();
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
             <!--  <?php snippet('artists-list', array('collection' => $ateliersP->children()->listed()->filterBy('area', $type))); ?>   -->
            </div>
            <?php snippet('filters', array('categories' => ['' => "Tous les âges", '.children1' => '4-5 ans', '.children2' => '6-10 ans', '.teen1' => '11-14 ans', '.teen2' => '15-18 ans', '.students' => 'étudiants', '.adults' => 'adultes'])); ?>
            <ul class="filter-grid grid c-3 margin_t-m">
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
<?php snippet('isotope-script') ?>
<?php snippet('footer') ?>

