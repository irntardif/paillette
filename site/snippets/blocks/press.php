<div class="text margin_t-l">
	<h3 class="h3 margin_b-s">La presse en parle</h3>
	<?php foreach ($pressData as $article): ?>
		<div class="micro-text">
			<em><?= $article->excerpt()->kirbytext(); ?></em>
			<p><?= $article->moreinfos()->value(); ?></p>
			<a class="link-regular" target="_blank" href="<?= $article->link() ?>">En lire plus</a>
		</div>
	<?php endforeach; ?>
</div>