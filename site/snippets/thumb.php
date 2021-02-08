<li class="filter-item thumb <?php if($event->public()->isNotEmpty()): echo str_replace(',', '', $event->public()); endif; ?>">
  <a href="<?= $event->url() ?>">
    <?php $img = $event->cover()->toFile(); 
    if($img): ?>
    <figure class="<?php  echo $img->extension() == 'jpg' || $img->extension() == 'jpeg' ? 'regular blue-filter' : 'regular' ?>">
      <img src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
    </figure>
    <?php endif; ?>
    <div class="infos margin_t-s">
      <h2 class="h2"><?= $event->title(); ?></h2>
      <?php if($event->intervenant()->isNotEmpty()): ?>
      <p> <?= $event->intervenant()->toPage()->title() ?></p>
      <?php endif; ?>
    </div>
  </a>
</li>