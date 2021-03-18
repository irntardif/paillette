<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper padding_b-xxl">
    <?php snippet('breadcrumb') ?>
    <?php snippet('intro') ?>
    <?php if ($page): ?>

    <div class='grid-wrapper'>
      <div class="header-grid grid c-2">
        <?php snippet('filters', array('categories' => ['' => "Tout public", '.family' => 'En famille'], "showMonths" => true )); ?>
        <?php snippet('links', array('links' => $page->program()->toStructure(), 'class' => 'bg-main')) ?>
      </div>
      <ul class="filter-grid grid c-2 margin_t-m row-large">
        <?php foreach ($page->onseason()->toPages() as $event): ?>
        <?php snippet('event-thumb', array('event' => $event)); ?>
        <?php endforeach ?>
      </ul>
      <div>
      <section class="margin_t-l">
        <h1 class="margin_b-l h1">Archives des saisons</h2>
        <?php 
          $archives = $site->children()->unlisted()->filterBy('template', 'spectacles');
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
    </div>
    <?php endif ?>
  </div>
</main>
<?php if($page->focus()->isNotEmpty()):
  snippet('focus', array('focus' => $page->focus()->toStructure()));
endif ?>
<?php snippet('isotope-script') ?>
<?php snippet('footer') ?>

<script>
  document.getElementById('pdfArchives').onchange = (e) => {
  e.preventDefault();
  var win = window.open(e.target.options[e.target.selectedIndex].getAttribute('value'), '_blank');
  win.focus();
}
</script>

