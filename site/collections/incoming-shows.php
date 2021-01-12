<?php 
return function ($site) {
	$events = $site->find('spectacles')->children()->listed();
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
    return $incoming;
};

