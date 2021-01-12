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
            <?php if($page->intervenant()->isNotEmpty()): ?>
            <p> <?= $page->intervenant()->toPage()->title() ?></p>
            <?php endif; ?>
          </header>
          <div class="margin_t-m"><?= $page->description()->kirbytext(); ?></div>
          <?php snippet('about', array('speaker' => $page->intervenant()->toPage(), 'class' => 'btn-light')) ?>

          <ul class="no_m">
            <?php foreach ($page->planning()->toStructure() as $key => $timeslot):
            $isDesc = $timeslot->description()->isNotEmpty();  ?>
            
            <section class="dropdown-bloc bloc-small" data-dropdown="<?= $isDesc ? 'true' : 'false' ?>" data-id="<?=$key?>">
              <header class="no_m flex wrap space-between">
                <span style="width:15%"><?=$timeslot->public()?></span>
                <span style="width:25%"><?=$timeslot->hours()?></span>
                <?php if($timeslot->isFull()->toBool()): ?> 
                  <span style="width:10%"><span class="label bg-light">complet</span></span>
                <?php else: ?>
                  <span style="width:10%"></span>
                <?php endif; ?>
                <span class="open-icon no_m"></span>
              </header>
              <?php if($timeslot->description()->isNotEmpty()): ?>
              <div class="wrapper no_m">
                <?= $timeslot->description()->kirbytext() ?>
              </div>
            <?php endif; ?>
            </section>
           <?php endforeach ?>
          </ul>
          
          <?php snippet('links', array('links' => $page->links()->toStructure(), 'class' => 'btn-light')) ?>

        </section>
        <aside class="column" style="--columns: 4">
          <?php if($page->dates()->isNotEmpty()): ?>
          <h3 class="margin_t-m margin_b-s">Dates</h3>
          <span><?php snippet('dates', array('representations' => $page->dates())) ?></span>
          <?php endif; ?>

          <?php snippet('prices', array('prices' => $page->prices())) ?>
          
          <ul class="icons-list margin_t-s">
            <li><a href="<?= $site->find('infos')->url()?>" class="menu-icon icon-text underline infos">Informations pratiques</a></li>
            <?php if($page->contactMail()->isNotEmpty()): ?>
            <li><a href="mailto:<?=$page->contactmail()?>"class="menu-icon icon-text underline mail">Contact</a></li>
          <?php endif; ?>
         </ul>
         <span><?php snippet('representations', 
          array('representations' => $page->representations(), 
                'label' => $page->rprstnName(), 
                'moreInfos' => $page->moreInfos()
                )) ?></span>
        </aside>
      </div>
    </article>
    <?php snippet('related-events', array('related' => $page->relatedPages())) ?>
    <?php snippet('next-prev', array('template' => 'Sortie de classe', 'type' => 'f')) ?>
  </div>
</main>

<?php snippet('footer') ?>


 