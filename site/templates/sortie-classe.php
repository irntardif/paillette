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
            <?php if($page->intervenantType() == 'artistpage'): ?>
            <p class='list' style="font-size:1.16em">
              <?php foreach ($page->intervenant()->toPages() as $intervenant) {
                echo '<span>'.$intervenant->title().'</span>';
              } ?>
            </p>
            <?php else: ?>
            <p style="font-size:1.16em"> <?= $page->intervenantName() ?></p>
            <?php endif; ?>
          </div>
          <div class="column" style="--columns: 4; align-self: flex-end;">
            <span style="font-size:1.16em" class="uppercase">Sortie de classe</span>
            <?php  
            if($page->isFull()->toBool()): ?>
              <span style="font-size:1.16em" class="color-accent">– COMPLET</span>
            <?php endif; ?>
          </div>
        </header>

        <div class="grid">
        <section class="text column" style="--columns: 8">
          <?php if($page->accentinfos()->isNotEmpty()): ?>
            <div class="color-accent" style="font-size:1.16em; line-height:1.4"><?= $page->accentinfos()->kirbytext(); ?></div>
          <?php endif; ?>
          <div class="margin_b-m" style="font-size:1.16em; line-height:1.4">
            <?= $page->description()->kirbytext(); ?>
            <?php snippet('blocks/buttonLink', array('data' => $page->links()->toStructure(), 'class' => 'btn-light')); ?>  
          </div>
          <?php if ($page->highlightedBlocks()->isNotEmpty()): ?>
          <div class="grid c-2 margin_b-m">
            <?php foreach ($page->highlightedBlocks()->toStructure() as $bloc): ?>
               <div>
                <p class="underline"><?= $bloc->title(); ?></p>
                <?= $bloc->contentText()->kirbytext(); ?>
              </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
           <?php if($page->intervenant()->toPages()):
            foreach ($page->intervenant()->toPages() as $page) {
              snippet('about', array('speaker' => $page->intervenant()->toPage(), 'class' => 'btn-light'));
            }
          endif; ?>
        </section>
        <aside class="column" style="--columns: 4">
          <?php if($page->level()->isNotEmpty()): ?>
            <div style="font-size:1.16em; line-height:1.4"><?= $page->level()->kirbytext(); ?></div>
          <?php endif; ?>
          <?php if($page->dates()->isNotEmpty()): ?>
          <span style="font-size:1.16em"><?php snippet('dates', array('representations' => $page->dates())) ?></span>
          <?php endif; ?>
          <?php if($page->hours()->isNotEmpty()): ?>
          <p style="max-width: 200px;"><span style="font-size:1.16em"><?= $page->hours(); ?></span></p>
          <?php endif; ?>
          <span class="color-accent"><?php snippet('representations', 
          array('representations' => $page->representations(), 
                'label' => $page->rprstnName(), 
                'moreInfos' => $page->moreInfos()
                )) ?></span>
         
          <?php snippet('prices', array('prices' => $page->prices())) ?>
          
          <ul class="icons-list margin_t-m">
            <li><a href="<?= $site->find('infos')->url()?>" class="menu-icon icon-text underline infos">Informations pratiques</a></li>
            <?php if($page->contactMail()->isNotEmpty()): ?>
            <li><a href="mailto:<?=$page->contactmail()?>"class="menu-icon icon-text underline mail">Contact</a></li>
          <?php endif; ?>
         </ul>
         
          <?php snippet('social-sharer') ?>
        </aside>
      </div>
    </article>
    <?php snippet('related-events', array('related' => $page->relatedPages())) ?>
    <?php snippet('next-prev', array('template' => 'Sortie de classe', 'type' => 'f')) ?>
  </div>
</main>

<?php snippet('footer') ?>


