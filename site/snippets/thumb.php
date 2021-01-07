<li class="thumb" data-age="<?= $event->public(); ?>">
  <a href="<?= $event->url() ?>">
    <?php $img = $event->cover()->toFile(); 
    if($img): ?>
    <figure class="regular">
      <img class="<?php echo $img->extension() == 'jpg' ? 'blue-filter' : '' ?>" src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
    </figure>
    <?php endif; ?>
    <div class="infos margin_t-s">
      <h2 class="h2"><?= $event->title(); ?></h2>
      <p>avec <?= $event->intervenant()->toPage() ? $event->intervenant()->toPage()->title() : $event->companyName(); ?></p>
    </div>
  </a>
</li>