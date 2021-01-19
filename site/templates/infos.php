<?php

?>
<?php snippet('header') ?>
<main class="main">
  <div class="main-wrapper padding_b-xxl">
  <?php 
    foreach($page->pagebuilder()->toBuilderBlocks() as $block):
      snippet('blocks/' . $block->_key(), array('data' => $block));
    endforeach;

    ?>
	</div>
</main>
  
<?php snippet('footer') ?>
