<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>
    <?php if ($spectaclesP = page('spectacles')): ?>

    <?php snippet('filters', array('categories' => ['' => "Tous les genres", '.family' => 'En famille', '.creation' => 'Création'])); ?>
    
    <ul class="filter-grid grid c-2 margin_t-m row-large">
      <?php foreach ($spectaclesP->children()->listed() as $event): ?>
      <?php snippet('event-thumb', array('event' => $event)); ?>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
  </div>
</main>
<?php if($page->focus()->isNotEmpty()):
  snippet('focus', array('focus' => $page->focus()->toStructure()));
endif ?>
<?php snippet('isotope-script') ?>
<?php snippet('footer') ?>

