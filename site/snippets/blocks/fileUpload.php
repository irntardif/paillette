 <div class="text margin_t-m">
 <?php foreach($data->files()->toStructure() as $element): ?>
	<?php if($element->files()->isNotEmpty()): ?>
	<p><a target="_blank" href="<?= $element->files()->toFile()->url() ?>"><?= $element->docname() ?></a></p>
	<?php endif; ?>	
<?php endforeach; ?>
</div>