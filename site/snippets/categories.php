<?php 

$cats = [];

foreach ($categories->split(',') as $cat): 
	switch ($cat) {
	    case 'family':
	        $cats[] = 'en famille';
	        break;
	    case 'creation':
	        $cats[] = 'création';
	        break;
	}
endforeach;
echo implode(" • ", $cats);
?>