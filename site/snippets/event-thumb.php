<li class="filter-item <?php snippet('categories', array('categories' => $event->categories(), 'isClass' => true )) ?><?= $event->representations()->isNotEmpty() ? ' '.$event->representations()->toStructure()->first()->date()->toDate('%B') : ' all' ?>">
  <span class="header-thumb grid c-2 margin_b-s" style="grid-gap: 2em;">
    <span><?php snippet('dates', array('representations' => $event->representations())) ?></span>
    <span><?= $event->type() == 'show' ? 'Spectacle' : 'Évènement'; ?></span>
  </span>
  <a href="<?= $event->url() ?>">
    <figure class="regular">
      <?php $img = $event->cover()->toFile(); ?>
      <img class="<?php  echo $img->extension() == 'jpg' || $img->extension() == 'jpeg' ? 'blue-filter' : '' ?>" src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
    </figure>
    <div class="infos margin_t-s">
      <?php snippet('categories', array('categories' => $event->categories(), 'isClass' => false )) ?>
      <h2 class="h2"><?= $event->title(); ?></h2>
      <p><?= $event->relatedCompany()->toPage() ? $event->relatedCompany()->toPage()->title() : $event->companyName(); ?></p>
    </div>
  </a>
</li>