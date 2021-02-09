<?php if($links): ?>
<div class="margin_t-m">
<?php foreach ($links as $link):
	$href = $link->document()->isNotEmpty() ? $link->document()->toFile()->url() :  $link->url();
	$icon = $link->linktype() == 'external' ? 'url' : 'download' ?>
	<a class="btn icon <?= $class.' '.$icon ?>" target="_blank" href="<?= $href ?>"><?= $link->label() ?></a>
<?php endforeach; ?>
</div>
<?php endif; ?>

