<?php if($data): ?>
  <!-- <?php var_dump($data) ?>  -->
<section class="editorial" data-dropdown="<?=$data->dropdown()?>" data-id="<?=$data->_uid()?>">
  <header>
    <h1 class="h1"><?= $data->h1title(); ?></h1>
  </header>
  <?php if($data->dropdown()->toBool()): ?>
  <div class="wrapper">
  <?php endif ?>
    <div class="grid <?= $data->layout().' '.$data->template()?>">
      <div class="text">
        <?= $data->textcontent()->kirbytext(); ?>
      </div>
      <?php if($data->textonly()->toBool()): ?>
        <?php if($data->layout() == 'c-2'): ?>
        <div class="text"><?= $data->textcontent2()->kirbytext(); ?> </div>
        <?php endif ?>
        <?php if($data->layout() == 'c-3'): ?>
        <div class="text"><?= $data->textcontent3()->kirbytext(); ?> </div>
        <div class="text"><?= $data->textcontent4()->kirbytext(); ?> </div>
        <?php endif ?>
      <?php else:
        if($data->hasVideo()->toBool()): ?>
          BLOCK VIDEO
         <?php else:
          
          foreach($data->imgs()->toFiles() as $img): ?>
            <figure>
             <img src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
            </figure>
            
          <?php endforeach;
        endif;
      endif ?>
    </div>
  <?php if($data->dropdown()->toBool()): ?>
    </div>
  <?php endif ?>
</section>
<?php endif; ?>
