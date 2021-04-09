<?php if($data): ?>
<section class="editorial dropdown-bloc" data-dropdown="<?=$data->dropdown()?>" data-id="<?=$data->_uid()?>">
  <header class="flex space-between">
    <h1 class="h1"><?= $data->h1title(); ?></h1>
    <span class="open-icon"></span>
  </header>
  <?php if($data->dropdown()->toBool()): ?>
  <div class="wrapper">
  <?php endif;
    
    if($data->builder2()->isNotEmpty() && $data->layout() == 'c-2'): ?>
      <div class="grid c-2">
    <?php foreach($data->builder2()->toBuilderBlocks() as $block):
      snippet('blocks/' . $block->_key(), array('data' => $block, 'class' => "btn-light"));
      endforeach;
    endif;

    if($data->builder3()->isNotEmpty() && $data->layout() == 'c-3'): ?>
      <div class="grid c-3">
        <?php foreach($data->builder3()->toBuilderBlocks() as $block):
          snippet('blocks/' . $block->_key(), array('data' => $block, 'class' => "btn-light"));
        endforeach; ?>
      </div>
    <?php endif ?>

  <?php if($data->dropdown()->toBool()): ?>
    </div>
  <?php endif ?>

</section>
<?php endif; ?>
