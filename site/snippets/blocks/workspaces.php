<?php if($data): ?>
<section id="workspaces" class="dropdown-bloc" data-dropdown="<?=$data->dropdown()?>" data-id="<?=$data->_uid()?>">
  <header class="flex space-between">
    <h1 class="h1"><?= $data->h1title(); ?></h1>
    <span class="open-icon"></span>
  </header>
  <?php if($data->dropdown()->toBool()): ?>
  <div class="wrapper">
  <?php endif; ?>
    <div class="text margin_t-m"><?= $data->description()->kirbytext(); ?></div>
      <div class="media margin_t-m">
        <div class="grid c-3">
          <?php foreach($data->workspaces()->toStructure() as $workspace): ?>
            <figure>
              <?php if($workspace->img()->isNotEmpty()):
              $img = $workspace->img()->toFile();  ?>
              <img class="blue-filter" src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" alt="<?= $img->filename() ?>" data-srcset="<?= $img->srcset() ?>"/>
              <?php endif; ?>
              <figcaption>
                <span class="cap"><?= $workspace->location() ?></span>
                <span><?= $workspace->pName() ?></span>
                <span class="micro-text"><?= $workspace->moreInfos()->kirbytext() ?></span>  
              </figcaption>
            </figure>
          <?php endforeach;?>
        </div>
      </div>


  <?php if($data->dropdown()->toBool()): ?>
    </div>
  <?php endif ?>

</section>
<?php endif; ?>
