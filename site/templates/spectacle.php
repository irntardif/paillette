<?php snippet('header') ?>

<main class="main spectacle">
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
       <header class="grid margin_t-l">
          <div class="column" style="--columns: 8">
            <h1 class="no_m h1"><?= $page->title(); ?></h1>
            <?php  $cats = explode(",", $page->categories());
            foreach ($cats as $cat): ?>
              <span class="label tag bg-accent uppercase">
              <?= $cat == 'family' ? 'En famille' : 'Création'; ?>
              </span>
            <?php endforeach ?>
            <p style="font-size:1.16em"><?= $page->relatedCompany()->toPage() ? '<a href="'.$site->find('artistes')->url().'#'.$page->relatedCompany()->toPage()->uid().'">'.$page->relatedCompany()->toPage()->title().'</a>' : $page->companyName(); ?></p>
          </div>
          <div class="column" style="--columns: 4; padding-top: 1em;">
            <span style="font-size:1.16em" class="uppercase"><?= $page->genre() ?></span>
            <?= $page->moreinfos()->kirbytext(); ?>
          </div>
        </header>
        <div class="grid margin_t-m">
          <section class="text column" style="--columns: 8">
            <?php if($page->accentinfos()->isNotEmpty()): ?>
             <div class="margin_b-s color-accent" style="font-size:1.16em; line-height:1.4"><?= $page->accentinfos()->kirbytext(); ?></div>
            <?php endif; ?>
            <div class="margin_b-l" style="font-size:1.16em; line-height:1.4"><?= $page->description()->kirbytext(); ?></div>
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
            <?php if ($page->relatedCompany()->isNotEmpty()): ?>
              <?php snippet('about', array('speaker' => $page->relatedCompany()->toPage(), 'class' => 'btn-light')) ?>
            <?php endif; ?>
           
          </section>
          <aside class="column" style="--columns: 4;">
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
            <div class="margin_t-s text">
              <?php snippet('prices', array('prices' => $page->prices())) ?>
            </div>
            <div class="margin_t-m text">
              <?php if ($page->cohostingInfos()->isNotEmpty()): 
                  echo $page->cohostingInfos()->kt();
                endif; ?>
            </div>
            <?php snippet('social-sharer') ?>
          </aside>
      </div>
    </article>
    <?php snippet('related-events', array('related' => $page->relatedPages())) ?>
    <?php snippet('next-prev', array('template' => 'Spectacle', 'type' => 'm')) ?>
  </div>
</main>

<?php snippet('footer') ?>
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

