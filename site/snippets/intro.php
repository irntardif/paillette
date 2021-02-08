<?php
?>
<header class="grid c-2">
  <div>
    <div class="text" data-text="<?= $page->edito()->kirbytext()?>">
      <?= $page->edito()->kirbytext()->short(500,'...'); ?>
    </div>
    <?php if($page->edito()->length() > 500): ?>
      <span class="link color-accent read-more">&darr;</span>
    <?php endif; ?>
  </div>
  <div class="media">
    <?php if ($page->headerImage()->isNotEmpty()):
     $img = $page->headerImage()->toFile(); ?>
      <figure>
       <img class="<?php echo $img->extension() == 'jpg' ? 'blue-filter' : '' ?>" src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
      </figure>
    <?php endif ?>
  </div>
</header>
