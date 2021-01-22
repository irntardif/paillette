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
<script>
	document.addEventListener('DOMContentLoaded', function(){
		if(window.location.hash && window.location.hash == '#workspaces') {
		  document.getElementById('workspaces').setAttribute('data-dropdown', 'true');
		  document.getElementById('workspaces').classList.add('open')
		  console.log(window.location.hash)
		} 
	});

</script>