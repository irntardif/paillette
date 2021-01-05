<?php if($data): ?>
<section class="partnersBlock dropdown-bloc" data-dropdown="<?=$data->dropdown()?>" data-id="<?=$data->_uid()?>">
  <header class="flex space-between">
    <h1 class="h1"><?= $data->h1title(); ?></h1>
    <span class="open-icon"></span>
  </header>
  <?php if($data->dropdown()->toBool()): ?>
  <div class="wrapper">
  <?php endif; ?>
    <div class="grid c-2">
      <div class="text margin_t-m"><?= $data->description()->kirbytext(); ?></div>
      <div class="media margin_t-m">
        <div class="flex wrap">
          <?php foreach($data->partnersLogos()->toStructure() as $partner): ?>
            <figure class="logo-img">
              <?php if($partner->logo()->isNotEmpty()):
              $logo = $partner->logo()->toFile();  ?>
              <img src="<?= $logo->thumb()->url() ?>" data-src="<?= $logo->resize(200)->url() ?>" alt="<?= $logo->filename() ?>"/>
              <?php endif; ?>
              <figcaption><?= $partner->pName() ?></figcaption>
            </figure>
          <?php endforeach;?>
        </div>
      </div>
    </div>


  <?php if($data->dropdown()->toBool()): ?>
    </div>
  <?php endif ?>

</section>
<?php endif; ?>
