<?php

?>
<?php snippet('header') ?>
<main class="main">
  <div class="main-wrapper">
  <?php 
    foreach($page->pagebuilder()->toBuilderBlocks() as $block):
      snippet('blocks/' . $block->_key(), array('data' => $block));
    endforeach;

    ?>
	</div>
</main>
  
<?php snippet('footer') ?>
