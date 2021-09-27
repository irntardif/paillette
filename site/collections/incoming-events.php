<?php 
return function ($site) {
	$events = $site->find('spectacles')->onSeason()->toPages()->sortBy('firstEvent', 'asc');
	$adventures = $site->find('aventures')->children()->listed()->sortBy('firstEvent', 'asc');
	$allEvents = new Pages(array($events, $adventures));
	$today = new Datetime();
	$today = $today->getTimestamp();
	$incoming = [];
	$i = 0;
	foreach($allEvents as $event):
		
		// if($i < 3){
			if($event->representations()->isNotEmpty() && $event->dates()->isEmpty()):
				foreach($event->representations()->toStructure() as $rprst):
					if($rprst->date()->toDate('%s') >= $today && !in_array($event, $incoming)):
						$incoming[] = $event;
						$i = $i+1;
					endif;
				endforeach;
			elseif($event->dates()->isNotEmpty()):
				foreach($event->dates()->toStructure() as $date):
					if($date->date()->toDate('%s') >= $today && !in_array($event, $incoming)):
						$incoming[] = $event;
						$i = $i+1;
					endif;
				endforeach;
			endif;
		// }
	endforeach; 
	$incoming = new Pages($incoming);
    return $incoming->sortBy('dates', 'representations', 'asc');
};

