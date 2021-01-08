<?php 
$artists = [];?>
<div class="margin_t-m">

 	<ul class="comma-list">
 		Avec
<?php foreach ($collection as $adventure): 
	foreach ($adventure->intervenant()->toPages() as $intervenant): 
		if ($intervenant): 
			if(!in_array($intervenant, $artists)):
				$artists[] = $intervenant; ?>
				<li><?= $intervenant->title();?></li> 
			<?php endif; 
		endif; 
	endforeach; 
endforeach;?>
</ul> 
</div>      

