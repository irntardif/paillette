<li id="<?= $artist->uid() ?>" class="thumb">
  <span class="header-thumb grid c-2 margin_b-s">
    <span><?= $artist->duration(); ?></span>
    <span><?= $artist->type(); ?></span>
  </span>
  <?php $img = $artist->cover()->toFile(); ?>
  <figure class="<?php echo $img->extension() == 'jpg' || $img->extension() == 'jpeg' ? 'blue-filter regular' : 'regular' ?>">
    <?php if($artist->origin()->isNotEmpty()): ?>
      <span class="label tag cap bg-accent"><?= $artist->origin() ?></span>
    <?php endif; ?>
    <img data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
  </figure>
  <div class="infos margin_t-s">
    <h2 class="h2"><?= $artist->title(); ?></h2>
    <?php if($artist->spectacle()->isNotEmpty()): ?>
       <?= $artist->spectacle()->toPage()->title(); ?>
    <?php else: ?>
      <?= $artist->creationName(); ?>
    <?php endif; ?>
    <div class="margin_t-s text"><?= $artist->description()->kirbytext(); ?></div>
    <?php if($artist->spectacle()->isNotEmpty()): ?>
    <p class="text"><a class="link" href="<?= $artist->spectacle()->toPage()->url() ?>">En savoir plus sur le spectacle</a></p>
    <?php endif; ?>
    <?php snippet('blocks/buttonLink', array('data' => $artist->links()->toStructure(), 'class' => 'btn-light')) ?>
    
  </div>
</li>