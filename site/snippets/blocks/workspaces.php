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
            <div>
              <figure>
                <?php if($workspace->img()->isNotEmpty()):
                $img = $workspace->img()->toFile();  ?>
                <img src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" alt="<?= $img->filename() ?>" data-srcset="<?= $img->srcset() ?>"/>
                <?php endif; ?>
              </figure>
              <div class="ws-infos margin_t-s">
                <span class="cap"><?= $workspace->location() == 'lavoir' ? 'Au lavoir' : 'Au théâtre' ?></span>
                <span><?= $workspace->pName() ?></span>
                <div class="micro-text"><?= $workspace->moreInfos()->kt() ?></div>  
              </div>
            </div>
          <?php endforeach;?>
        </div>
      </div>
      <?php snippet('blocks/buttonLink', array('data' => $data->buttonLink()->toStructure(), 'class' => 'btn-light')) ?>

  <?php if($data->dropdown()->toBool()): ?>
    </div>
  <?php endif ?>

</section>
<?php endif; ?>
