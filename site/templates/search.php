<?php snippet('header') ?>

<main class="main">
  <div class="main-wrapper">
    <?php snippet('breadcrumb') ?>
    <form>
	  <input type="search" name="q" value="<?= html($query) ?>">
	  <input type="submit" value="Search">
	</form>

	<ul>
	  <?php foreach ($results as $result): ?>
	  <li>
	    <a href="<?= $result->url() ?>">
	      <?= $result->title() ?>
	    </a>
	  </li>
	  <?php endforeach ?>
	</ul>
    
  </div>
</main>
<?php if($page->focus()->isNotEmpty()):
  snippet('focus', array('focus' => $page->focus()->toStructure()));
endif ?>
<?php snippet('footer') ?>
