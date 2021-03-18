<?php
?>
<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper padding_b-xxl">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>
    <?php if ($page): ?>
    
    <ul class="grid c-2 margin_t-m">
      <?php foreach ($page->onSeason()->toPages() as $artist): ?>
      <?php snippet('artist-thumb', array('artist' => $artist)); ?>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
    <section class="margin_t-l">
        <h1 class="margin_b-l h1">Archives des saisons</h2>
        <?php 
          $archives = $site->children()->unlisted()->filterBy('template', 'artistes');
          if($archives): ?>
            <select class="select" name="archives" id="archives">
                <option value="">Toutes les saisons</option>
                <?php foreach ($archives as $archive): ?>
                  <option value="<?= $archive->url() ?>"><?= $archive->title() ?></option>
                <?php endforeach?>
            </select>
          <?php endif; ?>
      </section>
  </div>
</main>
<?php if($page->focus()->isNotEmpty()):
  snippet('focus', array('focus' => $page->focus()->toStructure()));
endif ?>
<?php snippet('footer') ?>
