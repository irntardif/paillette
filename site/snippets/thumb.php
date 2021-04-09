<li class="filter-item thumb <?php if($event->public()->isNotEmpty()): echo str_replace(',', '', $event->public()); endif; ?>">
  
    <header class="margin_b-xs header-thumb">
      <?php if($event->level()->isNotEmpty()): ?>
      <span><?= $event->level() ?></span>
      <?php else : ?>
      <span style="color:transparent">Coucou</span>
      <?php endif; ?>
    </header>
 
  <a href="<?= $event->url() ?>">
    <?php $img = $event->cover()->toFile(); 
    if($img): ?>
    <figure class="<?php  echo ($img->extension() == 'jpg' || $img->extension() == 'jpeg' || $img->extension() == 'webp') ? 'regular blue-filter' : 'regular' ?>">
      <?php if($event->accentlabel()->isNotEmpty()): ?>
        <span style="font-size:18px;" class="mention label tag bg-accent">
          <?= $event->accentlabel() ?>
        </span>
        <?php endif; ?>
      <?php if($event->intendedTemplate()->name() == "sortie-classe"): ?>
        <span class="label cap tag bg-accent">Projet Scolaire</span>
      <?php endif; ?>
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