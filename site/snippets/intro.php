<?php
?>
<header class="grid c-2">
  <div class="text">
    <?= $page->edito()->kirbytext(); ?>
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
