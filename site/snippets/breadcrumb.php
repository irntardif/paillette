<nav class="breadcrumb" aria-label="breadcrumb">
  <ol>
    <?php foreach($site->breadcrumb() as $crumb): ?>
	     <?php  
	    switch ($crumb->intendedTemplate()->name()) {
		    case 'immersion':
		    	$prefix = 'Immersion / ';
		    	 break;
		   	case 'projet':
		    	$prefix = 'Projet / ';
		    	 break;
		   	case 'stage':
		    	$prefix = 'Stage / ';
		    	 break;
		   	case 'sortie-classe':
		    	$prefix = 'Sortie de classe / ';
		    	 break;
		   	default:
		   		$prefix = '';
	   	}?>
	    <li>
	      <a href="<?= $crumb->url() ?>" <?= e($crumb->isActive(), 'aria-current="page"') ?>>
	        <?= $prefix.html($crumb->title()) ?>
	      </a>
	    </li>
	
    <?php endforeach ?>
  </ol>
</nav>