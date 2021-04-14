<li class="filter-item <?php snippet('categories', array('categories' => $event->categories(), 'isClass' => true )) ?><?= $event->representations()->isNotEmpty() ? ' '.$event->representations()->toStructure()->first()->date()->toDate('%B') : ' all' ?>">
  <section>
    <header class="header-thumb grid c-2 margin_b-s">
      <?php if($event->representations()->isNotEmpty()){ ?>
        <span><?php snippet('dates', array('representations' => $event->representations())) ?></span>
      <?php }else{ ?>
        <span><?php snippet('dates', array('representations' => $event->dates())) ?></span>
      <?php } ?>
      
      <span>
        <?php if($event->intendedTemplate() == 'spectacle'){ 
          echo  $event->type() == 'show' ? 'Spectacle' : 'Évènement'; 
        }else{
          switch($event->intendedTemplate()){
            case 'stage':
            echo 'Stage';
            break;
            case 'sortie-classe':
            echo 'Sortie de classe';
            break;
            case 'immersion':
            echo 'Immersion';
            break;
            case 'projet':
            echo 'Projet';
            break;
            default:
            echo 'Stage';
            break;
          }
        }

        if( $event->categories()-> isNotEmpty()):
          $cats = explode(",", $event->categories());
          foreach ($cats as $cat): ?>
            <span class="label tag bg-accent uppercase">
            <?= $cat == 'family' ? 'En famille' : 'Création'; ?>
            </span>
          <?php endforeach ?>  
        <?php endif; ?>
      </span>
     
    </header>
    <a href="<?= $event->url() ?>">
      <?php $img = $event->cover()->toFile(); ?>
      <figure class="<?php  echo $img->extension() == 'jpg' || $img->extension() == 'jpeg' ? 'regular blue-filter' : 'regular' ?>">
        <?php if($event->accentlabel()->isNotEmpty()): ?>
        <span style="font-size:18px;" class="label tag bg-accent mention">
          <?= $event->accentlabel() ?>
        </span>
        <?php endif; ?>
        <?php if($event->creation()->toBool()): ?>
        <span class="creation--stamp"></span>
        <?php endif; ?>
        <img src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
      </figure>
      <div class="infos margin_t-s">
        <h2 class="h2"><?= $event->title(); ?></h2>
        <p><?= $event->company() == 'artistpage' && $event->relatedCompany()->isNotEmpty() ? $event->relatedCompany()->toPage()->title() : $event->companyName(); ?></p>
         <?php if($event->intervenantType() == 'artistpage'): ?>
            <p class='list' style="font-size:1.16em">
              <?php foreach ($event->intervenant()->toPages() as $intervenant) {
                echo '<span>'.$intervenant->title().'</span>';
              } ?>
            </p>
            <?php else: ?>
            <p style="font-size:1.16em"> <?= $event->intervenantName() ?></p>
            <?php endif; ?>
      </div>
    </a>
  </section>
</li>