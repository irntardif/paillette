<li class="carousel-thumb thumb <?php if($event->public()->isNotEmpty()): echo str_replace(',', '', $event->public()); endif; ?>">
  <a href="<?= $event->url() ?>">
    <?php $img = $event->cover()->toFile(); 
    if($img): ?>
    <figure class="regular">
      <img class="<?php  echo $img->extension() == 'jpg' || $img->extension() == 'jpeg' ? 'blue-filter' : '' ?>" src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
    </figure>
    <?php endif; ?>
    <div class="infos margin_t-s">
      <span class="label bg-light"><?= $event->intendedTemplate() ?></span>
      <h2 class="h2 margin_t-s"><?= $event->title(); ?></h2>
      <?php if($event->intervenant()->isNotEmpty()): ?>
      <p> <?= $event->intervenant()->toPage()->title() ?></p>
      <?php endif; ?>
      <p><?= $event->relatedCompany()->toPage() ? $event->relatedCompany()->toPage()->title() : $event->companyName(); ?></p>
    </div>
  </a>
</li>