<?php 
if($representations->isNotEmpty()):
	$formatDates = [];

	foreach ($representations->toStructure() as $rpstn): 
		if(count($representations->toStructure()) <= 1):
			echo $rpstn->date()->toDate('%e %b %Y');
		else:
			$formatDates[] = $rpstn;
		endif;
	endforeach;

	if(count($formatDates)):
		if(count($formatDates) == 2):
			if($formatDates[0]->date()->toDate('%e %b %Y') == $formatDates[1]->date()->toDate('%e %B %Y')):
				echo $formatDates[1]->date()->toDate('%e %b %Y');
			elseif($formatDates[0]->date()->toDate('%b %Y') == $formatDates[1]->date()->toDate('%b %Y')):
				echo $formatDates[0]->date()->toDate('%e').' & '.$formatDates[1]->date()->toDate('%e %b %Y');
			else:
				echo $formatDates[0]->date()->toDate('%e %b').' & '.$formatDates[1]->date()->toDate('%e %b %Y');
			endif;
		elseif(count($formatDates) == 3):
			$date0 = $formatDates[0]->date()->toDate('%e %b %Y');
			$date1 = $formatDates[1]->date()->toDate('%e %b %Y');
			$date2 = $formatDates[2]->date()->toDate('%e %b %Y');
			$date0next = $formatDates[0]->date()->toDate('%e') + 1;
			$date1next = $formatDates[1]->date()->toDate('%e') + 1;
			
			if($date0 == $date1 && $date1 == $date2):
				echo $date2;
			elseif($date0 == $date1 && $date1 != $date2 && ($date1next != $formatDates[2]->date()->toDate('%e'))):
				echo $formatDates[1]->date()->toDate('%e %b').' – '.$date2;
			elseif(($date0 == $date1 && $date1 != $date2) && ($date1next == $formatDates[2]->date()->toDate('%e')) || $date0next == $date1 && $date1 == $date2):
				echo $formatDates[0]->date()->toDate('%e').' & '.$date2;
			elseif($formatDates[0]->date()->toDate('%b') == $formatDates[1]->date()->toDate('%b') && $formatDates[1]->date()->toDate('%b') == $formatDates[2]->date()->toDate('%b')):
				echo $formatDates[0]->date()->toDate('%e').' – '.$date2;
			else:
				echo $formatDates[0]->date()->toDate('%e %b').' - '.$date2;
			endif;
		else:
			$date0 = $formatDates[0]->date()->toDate('%e %b');
			$date0next = $formatDates[0]->date()->toDate('%e') + 1;
			if( $date0 == $formatDates[count($formatDates) - 1]->date()->toDate('%e %b')):
				echo $formatDates[0]->date()->toDate('%e').' - '.$formatDates[count($formatDates) - 1]->date()->toDate('%e %b %Y');
			elseif( $date0next == $formatDates[count($formatDates) - 1]->date()->toDate('%e')):
				echo $formatDates[0]->date()->toDate('%e').' & '.$formatDates[count($formatDates) - 1]->date()->toDate('%e %b %Y');
			else:
				echo $date0.' - '.$formatDates[count($formatDates) - 1]->date()->toDate('%e %b %Y');
			endif;
		endif;
	endif;
else:
	echo ' –– ';
endif;

?>