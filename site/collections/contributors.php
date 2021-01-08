<?php 
return function ($site) {
	$artistes = $site->find('artistes')->children()->listed();
	$intervenants = $site->find('intervenants')->children()->listed();
    return $artistes->merge($intervenants);
};
