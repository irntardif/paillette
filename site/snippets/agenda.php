<div id="calendar"></div>
<a id="fire-events-modal" href="#event-modal"></a>
<?php $events = $kirby->collection('events');
$calendarEvents = [];
foreach($events as $key => $event):

	if($event->representations()->isNotEmpty()):
		if($event->intendedTemplate()->name() == 'spectacle'){
			$company = $event->relatedCompany()->toPage() ? $event->relatedCompany()->toPage()->title()->value() : $event->companyName()->value();
		}else{
			$company = $event->intervenant()->isNotEmpty() ? $event->intervenant()->toPage()->title()->value() : '';
		}
		$eventArray = [];
		$eventArray['id'] = $event->id();
		$eventArray['title'] = $event->title()->value();
		$eventArray['url'] = $event->url();
		$eventArray['company'] = $company;
		$eventArray['genre'] = $event->genre()->isNotEmpty() ? $event->genre()->value() : $event->intendedTemplate()->name();
		$eventArray['backgroundColor'] = '##000';
		$eventArray['textColor'] = '#000';
		$eventArray['allDay'] = true;
		
		foreach($event->representations()->toStructure() as $rprst):
			$eventArray['start'] = $rprst->date()->toDate('%Y-%m-%d');
			if(!in_array($eventArray,$calendarEvents)):
				$calendarEvents[] = $eventArray;
			endif;
		endforeach;	
	endif;
endforeach?>

<script>
	var modal = document.querySelector('#event-modal .modal-body');
    //document.addEventListener('DOMContentLoaded', function() {
	    var calendarEl = document.getElementById('calendar');
	    var calendar = new FullCalendar.Calendar(calendarEl, {
	      	//initialView: 'dayGridMonth',
	      	locale: 'fr',
	      	height: 220,
	      	buttonText:{
	      		today:    'Aujourd\'hui',
	      	},
	      	events: <?php echo json_encode($calendarEvents) ?>,
	      	eventDidMount: function(e){
				e.el.setAttribute('data-id', e.event.id);
				e.el.parentNode.parentNode.setAttribute('data-event', true);
				const $id = e.el.parentNode.parentNode;
				console.log(e);
			},
			eventsSet(events){
				setTimeout(function(){	
					Array.from(document.querySelectorAll("[data-event = 'true']")).forEach(element => {
						var $eventsList = [];
						Array.from(element.querySelectorAll("a")).forEach(link => {
							el = calendar.getEventById(link.getAttribute('data-id'))
							$eventsList.push(el._def);
						});
						let template = [];
						$eventsList.forEach($event => {
							template.push(<?php snippet('content-modal') ?>);
						});
						tippy( element, {
							interactive: true,
					        content: template.join(' '),
					        allowHTML: true,
					        theme: 'light',
					     	maxWidth: 400,
					     	hideOnClick: true,
					      });
					});
				},500)
			}
		});
	    calendar.render();
	    calendar.setOption('visibleRange', {
		  start: '2021-04-01',
		  end: '2021-04-05'
		});
  //});

</script>

