<li class="filter-item <?php snippet('categories', array('categories' => $event->categories(), 'isClass' => true )) ?><?= $event->representations()->isNotEmpty() ? ' '.$event->representations()->toStructure()->first()->date()->toDate('%B') : ' all' ?>">
  <section>
    <header class="header-thumb grid c-2 margin_b-s">
      <span><?php snippet('dates', array('representations' => $event->representations())) ?></span>
      <span>
        <?= $event->type() == 'show' ? 'Spectacle' : 'Évènement'; ?>
         <?php  $cats = explode(",", $page->categories());
          foreach ($cats as $cat): ?>
            <span class="label tag bg-accent uppercase">
            <?= $cat == 'family' ? 'En famille' : 'Création'; ?>
            </span>
          <?php endforeach ?>  
      </span>
     
    </header>
    <a href="<?= $event->url() ?>">
      <?php $img = $event->cover()->toFile(); ?>
      <figure class="<?php  echo $img->extension() == 'jpg' || $img->extension() == 'jpeg' ? 'regular blue-filter' : 'regular' ?>">
        <?php if($event->accentlabel()->isNotEmpty()): ?>
        <span style="font-size:18px;" class="label tag bg-accent mention">
          <?= $event->accentlabel() ?>
        </span>
        <?php endif; ?>
        <?php if($event->creation()->toBool()): ?>
        <span class="creation--stamp"></span>
        <?php endif; ?>
        <img src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
      </figure>
      <div class="infos margin_t-s">
        <h2 class="h2"><?= $event->title(); ?></h2>
        <p><?= $event->relatedCompany()->toPage() ? $event->relatedCompany()->toPage()->title() : $event->companyName(); ?></p>
      </div>
    </a>
  </section>
</li>