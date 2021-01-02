 <header class="main-header">
  <div class="wrapper-1">
    <a class="logo" href="<?= $site->url() ?>">
      <?= $site->title()->html() ?>
    </a>

    <span id="burger">
      <span class="burger--line"></span>
      <span>Menu</span>
    </span>
  </div>

  <div class="wrapper-2">
    
     <nav class="menu main-menu">
      <?php foreach ($site->children()->listed() as $item): ?>
      <a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>">
        <?php if($item->id() == 'spectacles'): ?> Spectacles 
        <?php elseif($item->id() == 'aventures'): ?> Aventures 
        <?php else:
        echo $item->title()->html();
      endif; ?>
        </a>
      <?php endforeach ?>
    </nav>

    <nav class="menu">
      <?php foreach ($site->children()->unlisted() as $item):
          if($item->id() == 'artistes' || $item->id() == 'infos' || $item->id() == 'la-paillette'): ?>
          <a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>">
            <?= $item->title()->html(); ?>
        </a>
        <?php endif; ?>
      <?php endforeach ?>
    </nav>
    
    <nav class="menu">
      
    
      <a href="#newsletter">
        <span class="bg-primary bg-tint">
          Newsletter
        </span>
      </a>
     <a class="menu-icon loop" target="_blank" href="#">
          search
        </a>
      <?php if( $site->ticketing()->isNotEmpty()): ?>
        <a class="menu-icon ticket" target="_blank" href="<?= $site->ticketing() ?>">
          Billetterie
        </a>
      <?php endif; ?>
    </nav>

     <?php snippet('social') ?>
  </div>

</header>