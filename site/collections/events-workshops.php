<?php 
return function ($site) {
	$aventures = $site->find('aventures')->children()->listed();
	$ateliers = $site->find('ateliers')->children()->listed();
	$spectacles = $site->find('spectacles')->children()->listed();
	$workshops = $aventures->merge($ateliers);
    return $spectacles->merge($workshops);
};

