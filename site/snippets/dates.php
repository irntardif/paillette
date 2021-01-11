<?php 
if($representations->isNotEmpty()):
	$formatDates = [];

	foreach ($representations->toStructure() as $rpstn): 
		if(count($representations->toStructure()) <= 1):
			echo $rpstn->date()->toDate('%A %e %B %Y');
		else:
			$formatDates[] = $rpstn;
		endif;
	endforeach;

	if(count($formatDates)):
		if(count($formatDates) == 2):
			if($formatDates[0]->date()->toDate('%e %B %Y') == $formatDates[1]->date()->toDate('%e %B %Y')):
				echo $formatDates[1]->date()->toDate('%e %B %Y');
			elseif($formatDates[0]->date()->toDate('%B %Y') == $formatDates[1]->date()->toDate('%B %Y')):
				echo $formatDates[0]->date()->toDate('%e').' - '.$formatDates[1]->date()->toDate('%e %B %Y');
			else:
				echo $formatDates[0]->date()->toDate('%e %B').' - '.$formatDates[1]->date()->toDate('%e %B %Y');
			endif;
		elseif(count($formatDates) == 3):
			if($formatDates[0]->date()->toDate('%e %B %Y') == $formatDates[1]->date()->toDate('%e %B %Y') && $formatDates[1]->date()->toDate('%e %B %Y')== $formatDates[2]->date()->toDate('%e %B %Y')):
				echo $formatDates[2]->date()->toDate('%e %B %Y');
			elseif($formatDates[0]->date()->toDate('%e %B %Y') == $formatDates[1]->date()->toDate('%e %B %Y') && $formatDates[1]->date()->toDate('%e %B %Y') != $formatDates[2]->date()->toDate('%e %B %Y')):
				echo $formatDates[1]->date()->toDate('%e %B').' '.$formatDates[2]->date()->toDate('%e %B %Y');
			elseif($formatDates[0]->date()->toDate('%e %B %Y') != $formatDates[1]->date()->toDate('%e %B %Y') && $formatDates[1]->date()->toDate('%e %B %Y') == $formatDates[2]->date()->toDate('%e %B %Y')):
				echo $formatDates[0]->date()->toDate('%e %B').' – '.$formatDates[1]->date()->toDate('%e %B %Y'); 
			elseif( $formatDates[0]->date()->toDate('%B %Y') == $formatDates[1]->date()->toDate('%B %Y') && $formatDates[1]->date()->toDate('%B %Y') == $formatDates[2]->date()->toDate('%B %Y')):
				echo $formatDates[0]->date()->toDate('%e').' - '.$formatDates[1]->date()->toDate('%e').' - '.$formatDates[2]->date()->toDate('%e %B %Y');
			elseif($formatDates[0]->date()->toDate('%B %Y') == $formatDates[1]->date()->toDate('%B %Y') && $formatDates[1]->date()->toDate('%B %Y') != $formatDates[2]->date()->toDate('%B %Y')):
				echo $formatDates[0]->date()->toDate('%e').' - '.$formatDates[1]->date()->toDate('%e %B').' – '.$formatDates[2]->date()->toDate('%e %B %Y');
			endif;
		else:
			echo $formatDates[0]->date()->toDate('%e %B').' - '.$formatDates[count($formatDates) - 1]->date()->toDate('%e %B %Y');
		endif;
	endif;
else:
	echo ' –– ';
endif;

?>