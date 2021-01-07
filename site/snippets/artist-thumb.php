<li>
  <span class="header-thumb grid c-2 margin_b-s">
    <span><?= $artist->duration(); ?></span>
    <span><?= $artist->type(); ?></span>
  </span>
  <figure class="regular">
    <?php $img = $artist->cover()->toFile(); ?>
    <img class="<?php echo $img->extension() == 'jpg' || $img->extension() == 'jpeg' ? 'blue-filter' : '' ?>" src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
  </figure>
  <div class="infos margin_t-s">
    <h2 class="h2"><?= $artist->title(); ?></h2>
    <?php if($artist->spectacle()->isNotEmpty()): ?>
       <?= $artist->spectacle()->toPage()->title(); ?>
    <?php else: ?>
      <?= $artist->creationName(); ?>
    <?php endif; ?>
    <div class="margin_t-s"><?= $artist->description(); ?></div>
    <?php snippet('links', array('links' => $artist->links()->toStructure(), 'class' => 'btn-light')) ?>
  </div>
</li>