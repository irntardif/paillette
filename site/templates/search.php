<?php snippet('header') ?>

<main class="main margin_b-l">
  <div class="main-wrapper">
    <?php snippet('breadcrumb') ?>
    <h1 class="h1">Tapez votre recherche ici...</h1>
    <form class="margin_t-l">
	  <input class="input-search" type="search" name="q" value="<?= html($query) ?>">
	  <input class="btn cursor-pointer" type="submit" value="Recherche">
	</form>

	<ul class="search margin_t-l">
	  <?php foreach ($results as $result): ?>
	  <li>
	    <a class="link" href="<?= $result->url() ?>">
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
