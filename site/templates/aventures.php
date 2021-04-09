<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper padding_b-xxl">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>

    <?php if ($aventuresP = page('aventures')): ?>
      <?php $types = ['stage', 'immersion', 'projet', 'sortie-classe'];
      foreach ($types as $key => $type): ?>
        <?php switch ($type) {
        case 'stage':
            $title = 'Les Stages';
            $desc   =   $page->stageText()->kirbytext();
            $link   =   $page->stageLinks()->toStructure();
            $onSeason = $page->onseasonStage()->toPages();
            break;
        case 'immersion':
            $title  = 'Immersion dans la création';
            $desc   =  $page->immersionText()->kirbytext();
            $link   =  $page->immersionLinks()->toStructure();
            $onSeason = $page->onseasonImmersion()->toPages();
            break;
        case 'projet':
            $title  = 'Projets en complicité';
            $desc   =  $page->projectText()->kirbytext();
            $link   =  $page->projectLinks()->toStructure();
            $onSeason = $page->onseasonProject()->toPages();
            break;
        case 'sortie-classe':
            $title  = 'Sorties de Classes';
            $desc   =  $page->classExitsText1()->kirbytext();
            $desc2  =  $page->classExitsText2()->kirbytext();
            $link   =  $page->classLinks()->toStructure();
            $onSeason = $page->onseasonClass()->toPages();
            break;

        }?>
        <section class="dropdown-bloc" data-dropdown="true" data-id="<?=$key?>">
          <header class="flex space-between">
            <h1 class="h1"><?= $title ?></h1>
            <span class="open-icon"></span>
          </header>
          <div class="wrapper grid-wrapper">
            <div class='grid c-2'>
              <div class="text margin_t-m">
                <?= $desc; ?>
                <?php snippet('blocks/buttonLink', array('data' => $link, 'class' => 'btn-light')); ?>
              </div>
              <div class="text margin_t-m">
                <?php if($type == 'sortie-classe'):
                  echo $desc2; 
                endif; ?>
              </div>
           
            </div class="text margin_t-m">
            <?php if($type == 'stage'):
            snippet('filters', array('categories' => ['' => "Tous les âges", '.children1' => '4-5 ans', '.children2' => '6-10 ans', '.teen1' => '11-14 ans', '.teen2' => '15-18 ans', '.students' => 'étudiants', '.adults' => 'adultes'])); ?>
          <?php endif; ?>
            <ul class="filter-grid grid c-3">
            <?php foreach ($onSeason as $adventure): ?>
              <?php snippet('thumb', array('event' => $adventure)); ?>
            <?php endforeach; ?>
            </ul>
          </div>
        </section>
      <?php endforeach; ?>
      <section class="dropdown-bloc" data-dropdown="true" data-id="visits">
          <header class="flex space-between">
            <h1 class="h1">Visites de la Paillette</h1>
            <span class="open-icon"></span>
          </header>
          <div class="wrapper">
            <div class='grid c-2'>
            	<div class="text margin_t-m">
                	<?= $page->visitsText()->kirbytext(); ?>
                  <?php snippet('blocks/buttonLink', array('data' => $page->visitsLinks()->toStructure(), 'class' => 'btn-light')); ?>
              </div>
              <?php snippet('headerImg', array('imgs' => $page->visitsImage())); ?>
            </div>
            
          </div>
      </section>
    <?php endif; ?>
    <section class="margin_t-l">
        <h1 class="margin_b-l h1">Archives des saisons</h2>
        <?php 
          $archives = $site->children()->unlisted()->filterBy('template', 'aventures');
          if($archives): ?>
            <select class="select" name="archives" id="archives">
                <option value="">Toutes les saisons</option>
                <?php foreach ($archives as $archive): ?>
                  <option value="<?= $archive->url() ?>"><?= $archive->title() ?></option>
                <?php endforeach?>
            </select>
          <?php endif; ?>
          <?php if($site->pdfArchives()->isNotEmpty()): ?>
          <select class="select" name="pdfArchives" id="pdfArchives">
              <option value="">Tous les PDF</option>
              <?php foreach ($site->pdfArchives()->toStructure() as $pdfArchive): ?>
                <option value="<?= $pdfArchive->doc()->toFile()->url() ?>"><?= $pdfArchive->title() ?></option>
              <?php endforeach?>
          </select>
        <?php endif; ?>
      </section>
  </div>
</main>
<?php if($page->focus()->isNotEmpty()):
  snippet('focus', array('focus' => $page->focus()->toStructure()));
endif ?>
<?php snippet('isotope-script') ?>
<?php snippet('footer') ?>
