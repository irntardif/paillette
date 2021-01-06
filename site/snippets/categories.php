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
	    case 'theatre':
	    	$cats[] = 'théâtre';
	        break;
	    case 'musical':
	    	$cats[] = 'comédie musicale';
	        break;
	    case 'danse':
	    	$cats[] = 'danse';
	        break;
	    case 'puppets':
	    	$cats[] = 'marionnettes';
	        break;
	    case 'performance':
	    	$cats[] = 'performance';
	        break;
	    case 'school':
	    	$cats[] = 'scolaires';
	        break;
	    case 'all':
	    	$cats[] = 'tous publics';
	        break;
	}
endforeach;
echo implode(" • ", $cats);
?>