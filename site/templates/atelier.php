<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>
    <article>
      <?php var_dump($page); ?>
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
            <?= $page->relatedCompany()->toPage() ? $page->relatedCompany()->toPage()->title() : $page->companyName(); ?>
          </header>
          <div class="margin_t-m"><?= $page->description()->kirbytext(); ?></div>
          <?php snippet('links', array('links' => $page->links()->toStructure(), 'class' => 'btn-light')) ?>
          
        </section>
        <aside class="column" style="--columns: 4">
           <span class="uppercase"><?php snippet('categories', array('categories' => $page->genre())) ?></span>
           <?= $page->moreinfos()->kirbytext(); ?>
           <div class="margin_t-s">
            <?php foreach ($page->representations()->toStructure() as $rprst): ?>
               <p class="flex">
                <span style="width: 60%"><?= $rprst->date()->toDate('%d %B %Y'); ?> → <?= $rprst->date()->toDate('%Hh%M') ?></span>
                <span class="no_m" style="width: 40%">
                  <span class="label bg-light"><?php snippet('categories', array('categories' => $rprst->publicType())) ?></span>
                </span>
               </p>
            <?php endforeach ?>
           </div>
           <a class="btn icon ticket" href="<?= $page->ticketing(); ?>" target="_blank">Réserver en ligne</a>
           <ul class="icons-list margin_t-s">
             <li><a href="<?= $site->find('infos')->url()?>" class="menu-icon icon-text underline infos">Informations pratiques</a></li>
              <li><a href="tel:<?=$site->ticketingphone()?>"class="menu-icon icon-text underline phone">Réserver par téléphone</a></li>
           </ul>
           <div class="margin_t-s">
            <p class="margin_b-s">Tarifs</p>
             <ul class="no_m">
                <?php foreach ($page->prices()->toStructure() as $price): ?>
                <li class="flex">
                  <span style="width: 15%"><?=$price->amount()?> €</span>
                  <span class="no_m" style="width: 85%"><?=$price->pricetype()?></span>
                </li>
               <?php endforeach ?>
             </ul>
             <?php if ($page->cohosting()->toBool()): ?>
             <p class="comma-list margin_t-s">Ce spectacle est en co-accueil avec
              <?php foreach ($page->cohostinginfos()->toStructure() as $info): ?>
              <a class="underline" target="_blank" href="<?=$info->url()?>"><?=$info->label()?></a>
              <?php endforeach ?>
            </p>
             <?php endif; ?>
           </div>
        </aside>
      </div>
    </article>
    <?php snippet('prev-next') ?>
  </div>
</main>

<?php snippet('footer') ?>


 