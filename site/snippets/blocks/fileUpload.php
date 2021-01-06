<?php foreach($data->files()->toStructure() as $element): ?>
	<?php if($element->files()->isNotEmpty()): ?>
	<a class="btn icon download btn-light" target="_blank" href="<?= $element->files()->toFile()->url() ?>"><?= $element->docname() ?></a>
	<?php endif; ?>	
<?php endforeach; ?>
