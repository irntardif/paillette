<?php 
return function ($site) {
	$events = $site->find('spectacles')->children()->listed();
	$adventures = $site->find('aventures')->children()->listed();
	$today = new Datetime();
	$today = $today->getTimestamp();
	$incoming = [];
	foreach($events as $event):
		if($event->representations()->isNotEmpty()):
			foreach($event->representations()->toStructure() as $rprst):
				if($rprst->date()->toDate('%s') >= $today && !in_array($event, $incoming)):
					$incoming[] = $event;
				endif;
			endforeach;
		endif;
	endforeach; 
	foreach($adventures as $adv):
		if($adv->dates()->isNotEmpty()):
			foreach($adv->dates()->toStructure() as $date):
				if($date->date()->toDate('%s') >= $today && !in_array($adv, $incoming)):
					$incoming[] = $adv;
				endif;
			endforeach;
		endif;
	endforeach; 
    return $incoming;
};

