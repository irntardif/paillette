<?php if($data): ?>
<section class="wrapper">
  <header>
    <h1><?= $data->h1title(); ?></h1>
  </header>
  <div class="grid <?= $data->layout().' '.$data->template()?>">
    <div class="text-content">
      <?= $data->textcontent()->kirbytext(); ?>
    </div>
  </div>
</section>
<?php endif; ?>
