<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>
    <?php if ($artistsP = page('artistes')): ?>
    
    <ul class="grid c-2 margin_t-m">
      <?php foreach ($artistsP->children()->listed() as $artist): ?>
      <?php snippet('artist-thumb', array('artist' => $artist)); ?>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
  </div>
</main>
<?php if($page->focus()->isNotEmpty()):
  snippet('focus', array('focus' => $page->focus()->toStructure()));
endif ?>
<?php snippet('footer') ?>
