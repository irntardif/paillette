<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>
    <?php if ($spectaclesP = page('spectacles')): ?>
    
    <ul class="grid c-2">
      <?php foreach ($spectaclesP->children()->listed() as $spectacle): ?>
      <li>
        <span class="header-thumb grid c-2 margin_b-s">
          <span><?php snippet('dates', array('representations' => $spectacle->representations())) ?></span>
          <span><?= $spectacle->type() == 'show' ? 'Spectacle' : 'Évènement'; ?></span>
        </span>
        <a href="<?= $spectacle->url() ?>">
          <figure class="regular">
            <?php $img = $spectacle->cover()->toFile(); ?>
            <img class="<?php echo $img->extension() == 'jpg' ? 'blue-filter' : '' ?>" src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
          </figure>
          <span class="infos margin_t-s">
            <?php snippet('categories', array('categories' => $spectacle->categories())) ?>
            <h2 class="h2"><?= $spectacle->title(); ?></h2>
            <?= $spectacle->relatedCompany()->toPage() ? $spectacle->relatedCompany()->toPage()->title() : $spectacle->companyName(); ?>
          </span>
        </a>
      </li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
  </div>
</main>
<?php if($page->focus()->isNotEmpty()):
  snippet('focus', array('focus' => $page->focus()->toStructure()));
endif ?>
<?php snippet('footer') ?>
