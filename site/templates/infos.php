<?php

?>
<?php snippet('header') ?>
  <?php snippet('intro') ?>
  <?php
  /*
    We always use an if-statement to check if a page exists to
    prevent errors in case the page was deleted or renamed before
    we call a method like `children()` in this case
  */
  ?>
  <?php 
    //var_dump($page); 
    foreach($page->pagebuilder()->toBuilderBlocks() as $block):
      snippet('blocks/' . $block->_key(), array('data' => $block));
    endforeach;

    ?>
  
<?php snippet('footer') ?>
