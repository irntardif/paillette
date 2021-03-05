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
      
          <header class="grid margin_t-l">
            <div class="column" style="--columns: 8">
              <h1 class="no_m h1"><?= $page->title(); ?></h1>
              <?php if($page->intervenant()->isNotEmpty()): ?>
              <p> <?= $page->intervenant()->toPage()->title() ?></p>
              <?php endif; ?>
            </div>
          </header>
          <div class="grid">
            <section class="text column" style="--columns: 8">
            <?php if($page->accentinfos()->isNotEmpty()): ?>
            <div class="margin_t-m color-accent" style="font-size:1.16em; line-height:1.4"><?= $page->accentinfos()->kirbytext(); ?></div>
            <?php endif; ?>
            <div class="margin_t-m"><?= $page->description()->kirbytext(); ?></div>
            <div class="margin_b-l">
              <ul class="no_m">
                <?php foreach ($page->planning()->toStructure() as $key => $timeslot):
                $isDesc = $timeslot->description()->isNotEmpty();  ?>
                <section class="dropdown-bloc small" data-id="<?=$key?>">
                  <header class="no_m flex wrap space-between">
                    <span style="width:30%"><?=$timeslot->public()?></span>
                    <span style="width:40%"><?=$timeslot->hours()?></span>
                    <?php if($timeslot->isFull()->toBool()): ?> 
                      <span style="width:20%"><span class="label bg-light">complet</span></span>
                    <?php else: ?>
                      <span style="width:20%"></span>
                    <?php endif; ?>
                    <span></span>
                    <!-- <span class="no_m" style="width:5%"><span class="open-icon no_m"></span></span> -->
                  </header>
                </section>
               <?php endforeach ?>
              </ul>
            </div>
            <?php snippet('blocks/buttonLink', array('data' => $page->links()->toStructure(), 'class' => 'btn-light')) ?>
            <?php if ($page->intervenant()->isNotEmpty()): ?>
              <?php snippet('about', array('speaker' => $page->intervenant()->toPage(), 'class' => 'btn-light')) ?>
            <?php endif; ?>
          </section>
          <aside class="column" style="--columns: 4">
            <?php if($page->level()->isNotEmpty()): ?>
            <div class="margin_t-m" style="font-size:1.16em; line-height:1.4"><?= $page->level()->kirbytext(); ?></div>
            <?php endif; ?>
            <span class="uppercase"><?php snippet('categories', array('categories' => $page->genre())) ?></span>
            <?= $page->moreinfos()->kirbytext(); ?>
             
            <div class="margin_t-s text">
              <?php snippet('prices', array('prices' => $page->prices())) ?>
                <?php if ($page->cohostingInfos()->isNotEmpty()): 
                  echo $page->cohostingInfos()->kt();
                endif; ?>
            </div>
              <ul class="icons-list margin_t-s">
                <li><a href="<?= $site->find('infos')->url()?>" class="menu-icon icon-text underline infos">Informations pratiques</a></li>
                <?php if($page->contactMail()->isNotEmpty()): ?>
                <li><a href="mailto:<?=$site->contactmail()?>"class="menu-icon icon-text underline mail">Contact</a></li>
              <?php endif; ?>
             </ul>
             <?php snippet('social-sharer') ?>
          </aside>
      </div>
    </article>
    <?php snippet('related-events', array('related' => $page->relatedPages())) ?>
    <?php snippet('next-prev', array('template' => 'Atelier', 'type' => 'm')) ?>
  </div>
</main>

<?php snippet('footer') ?>


 