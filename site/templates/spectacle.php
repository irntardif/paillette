<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>
    <article>
      <?php var_dump($page); ?>
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
        <aside class="text column" style="--columns: 4">
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
        </aside>
      </div>
    </article>
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

