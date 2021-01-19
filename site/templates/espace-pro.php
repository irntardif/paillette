<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper padding_b-xxl">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>
    <div class="grid default">
      <div class="text">
        <?= $page->text()->kt() ?>
        <?php snippet('links', array('links' => $page->links()->toStructure(), 'class' => 'eye')); ?>
      </div>
      <div class="media">
        <?php if ($page->cover()->isNotEmpty()):
         $img = $page->cover()->toFile(); ?>
          <figure>
           <img class="<?php echo $img->extension() == 'jpg' ? 'blue-filter' : '' ?>" src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
          </figure>
        <?php endif ?>
      </div>
    </div>
  </div>
</main>

<?php snippet('footer') ?>

