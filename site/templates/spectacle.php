<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>
    <article>
      <?php if ($page->gallery()->isNotEmpty()): ?>
      <div class="carousel">
        <?php foreach ($page->gallery()->toFiles() as $img): ?>
        <figure class="regular _16_9">
           <img src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
          </figure>
         <?php endforeach ?>
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
          
          <div class="grid c-2">
            <?php if ($page->distribution()->isNotEmpty()): ?>
            <div>
              <p class="underline margin_b-s margin_t-m">Distribution</p>
              <?= $page->distribution()->kirbytext(); ?>

            </div>
            <?php endif; ?>
            <?php if ($page->credits()->isNotEmpty()): ?>
            <div>
              <p class="underline margin_b-s margin_t-m">Crédits</p>
              <?= $page->credits()->kirbytext(); ?>
            </div>
            <?php endif; ?>
          </div>
        </section>
        <aside class="column" style="--columns: 4">
           <span class="uppercase"><?php snippet('categories', array('categories' => $page->genre())) ?></span>
           <?= $page->moreinfos()->kirbytext(); ?>
           <span><?php snippet('representations', 
          array('representations' => $page->representations(), 
                'label' => null, 
                'moreInfos' => null
                )) ?></span>
           <a class="btn icon ticket" href="<?= $page->ticketing(); ?>" target="_blank">Réserver en ligne</a>
           <ul class="icons-list margin_t-m">
             <li><a href="tel:<?=$site->ticketingphone()?>"class="menu-icon icon-text underline phone">Réserver par téléphone</a></li>
             <li><a href="<?= $site->find('infos')->url()?>" class="menu-icon icon-text underline infos">Informations pratiques</a></li>
             <li><a href="<?= $site->find('la-paillette')->url()?>" class="menu-icon icon-text underline marker">La Paillette, côté théâtre</a></li>
           </ul>
           <div class="margin_t-s">
             <?php snippet('prices', array('prices' => $page->prices())) ?>
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
<?= js(['assets/js/siema.min.js']) ?>
<script>
  new Siema({
    selector: '.carousel',
    duration: 400,
    easing: 'ease-out',
    perPage: 1,
    startIndex: 0,
    draggable: true,
    multipleDrag: true,
    threshold: 20,
    loop: false,
    rtl: false,
    onInit: () => {},
    onChange: () => {},
  });
</script>

