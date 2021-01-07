<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>
    <?php if ($spectaclesP = page('spectacles')): ?>
    
    <ul class="grid c-2">
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
<?php snippet('footer') ?>
