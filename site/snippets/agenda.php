<div id="calendar"></div>
<a id="fire-events-modal" href="#event-modal"></a>
<?php $events = $kirby->collection('events');
$calendarEvents = [];
foreach($events as $key => $event):

	if($event->representations()->isNotEmpty()):
		$dates[$key] = [];
		foreach($event->representations()->toStructure() as $rprst):
			$dates[$key][] = $rprst->date()->toDate('%Y-%m-%d');
		endforeach;

	$class = str_replace("/", "_", $event->id()); 
	$eventArray = [];
	$eventArray['id'] = $event->id();
	$eventArray['classNames'] = [$class];
	$eventArray['title'] = $event->title()->value();
	$eventArray['start'] = $dates[$key][0];
	$eventArray['end'] = $dates[$key][count($dates[$key]) - 1];
	$eventArray['backgroundColor'] = '##000';
	$eventArray['textColor'] = '#000';
	$calendarEvents[] = $eventArray;
	endif;
endforeach?>

<script>
	var modal = document.querySelector('#event-modal .modal-body');
    document.addEventListener('DOMContentLoaded', function() {
	    var calendarEl = document.getElementById('calendar');
	    var calendar = new FullCalendar.Calendar(calendarEl, {
	      	initialView: 'dayGridMonth',
	      	locale: 'fr',
	      	height: 220,
	      	buttonText:{
	      		today:    'Aujourd\'hui',
	      	},
	      	events: <?php echo json_encode($calendarEvents) ?>,
	      	eventDidMount: function(e){
				console.log(e);
				e.el.setAttribute('id', e.event.id.replace('/', '_'));
				const $id = e.el;
				
			    var xhr = new XMLHttpRequest();
			    xhr.open('GET', e.event._def.publicId+'.json', true);
			    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
			    xhr.onload = function() {
			      if (this.status == 200) {
			      	console.log('load');
			        let $page = JSON.parse(this.response);
					const template = <?php snippet('content-modal') ?>;
					setTimeout(function(){
						tippy($id, {
					        content: template,
					        allowHTML: true,
					        theme: 'light',
					      });
					},300)
			      }
			    }
			    xhr.send();
			},
			eventMouseLeave: function(e){
				//document.getElementsByClassName('modal-overlay')[0].click();
			},
			
		
			
		});
	    calendar.render();
  });

</script>

