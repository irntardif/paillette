<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>
    <article>
      <?php if ($page->cover()->isNotEmpty()):
      $img = $page->cover()->toFile(); ?>
      <div>
        <figure class="regular _16_9">
           <img src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
        </figure>
      </div>
      <?php endif; ?>
      <div class="grid margin_t-l">
        <section class="text column" style="--columns: 8">
          <header>
            <h1 class="no_m h1"><?= $page->title(); ?></h1>
            <p>avec <?= $page->intervenant()->toPage() ? $page->intervenant()->toPage()->title() : $page->companyName(); ?></p>
          </header>
          <div class="margin_t-m"><?= $page->description()->kirbytext(); ?></div>
          <ul class="no_m">
            <?php foreach ($page->planning()->toStructure() as $key => $timeslot): ?>
            <section class="dropdown-bloc bloc-small" data-dropdown="true" data-id="<?=$key?>">
              <header class="flex wrap space-between">
                <span style="width:10%"><?=$timeslot->public()?></span>
                <span style="width:25%"><?=$timeslot->hours()?></span>
                <?php if($timeslot->isFull()->toBool()): ?> 
                  <span style="width:10%"><span class="label bg-light">complet</span></span>
                <?php else: ?>
                  <span style="width:10%"></span>
                <?php endif; ?>
                <span class="open-icon no_m"></span>
              </header>
              <div class="wrapper no_m">
                <?= $timeslot->description()->kirbytext() ?>
              </div>
            </section>
           <?php endforeach ?>
          </ul>
          <?php snippet('links', array('links' => $page->links()->toStructure(), 'class' => 'btn-light')) ?>

        </section>
        <aside class="column" style="--columns: 4">
           <span class="uppercase"><?php snippet('categories', array('categories' => $page->genre())) ?></span>
           <?= $page->moreinfos()->kirbytext(); ?>
           
            <p class="margin_b-s">Tarifs</p>
            <ul class="no_m">
              <?php foreach ($page->prices()->toStructure() as $price): ?>
              <li class="flex">
                <span style="width: 15%"><?=$price->amount()?> €</span>
                <span class="no_m" style="width: 85%"><?=$price->pricetype()?></span>
              </li>
             <?php endforeach ?>
            </ul>
           
            <ul class="icons-list margin_t-s">
              <li><a href="<?= $site->find('infos')->url()?>" class="menu-icon icon-text underline infos">Informations pratiques</a></li>
              <?php if($page->contactMail()->isNotEmpty()): ?>
              <li><a href="mailto:<?=$site->contactmail()?>"class="menu-icon icon-text underline mail">Contact</a></li>
            <?php endif; ?>
           </ul>
        </aside>
      </div>
    </article>
    <?php snippet('prev-next') ?>
  </div>
</main>

<?php snippet('footer') ?>


 