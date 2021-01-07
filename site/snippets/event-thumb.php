<li>
  <span class="header-thumb grid c-2 margin_b-s">
    <span><?php snippet('dates', array('representations' => $event->representations())) ?></span>
    <span><?= $event->type() == 'show' ? 'Spectacle' : 'Évènement'; ?></span>
  </span>
  <a href="<?= $event->url() ?>">
    <figure class="regular">
      <?php $img = $event->cover()->toFile(); ?>
      <img class="<?php echo $img->extension() == 'jpg' ? 'blue-filter' : '' ?>" src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
    </figure>
    <div class="infos margin_t-s">
      <?php snippet('categories', array('categories' => $event->categories())) ?>
      <h2 class="h2"><?= $event->title(); ?></h2>
      <p><?= $event->relatedCompany()->toPage() ? $event->relatedCompany()->toPage()->title() : $event->companyName(); ?></p>
    </div>
  </a>
</li>