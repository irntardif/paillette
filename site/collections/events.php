<?php 
return function ($site) {
	$aventures = $site->find('aventures')->children()->listed();
	$spectacles = $site->find('spectacles')->children()->listed();
    return $spectacles->merge($aventures);
};

