<?php if($data): ?>
<section class="team dropdowwn-bloc" data-dropdown="<?=$data->dropdown()?>" data-id="<?=$data->_uid()?>">
  <header class="flex space-between">
    <h1 class="h1"><?= $data->h1title(); ?></h1>
    <span class="open-icon"></span>
  </header>
  <!--  <?php var_dump($data); ?>  -->
  <?php if($data->dropdown()->toBool()): ?>
  <div class="wrapper">
  <?php endif ?>
    <div class='text margin_t-m'>
      <p><?= $data->description()->kirbytext(); ?></p>
    </div>
    <div class="grid">
      <?php foreach($data->columnTeam()->toBuilderBlocks() as $column): ?>
        <?php snippet('blocks/team', array('teamBlock' => $column)); ?>
      <?php endforeach; ?>
    </div>
  <?php if($data->dropdown()->toBool()): ?>
    </div>
  <?php endif ?>
  </div>
</section>
<?php endif; ?>
