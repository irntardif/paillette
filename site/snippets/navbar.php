 <header class="main-header">
  <div class="wrapper-1">
    <div class="w_33">
      <span id="burger" class="menu-burger">
        <span class="burger--line"></span>
        <span>Menu</span>
      </span>
    </div>
    
    <a class="logo w_33" href="<?= $site->url() ?>">
      <span class="paillette-logo"></span>
      <?= $site->title()->html() ?>
    </a>

    <nav class="menu aside-menu w_33">
      <?php if( $site->ticketing()->isNotEmpty()): ?>
        <a target="_blank" href="<?= $site->ticketing() ?>">
          Billetterie
        </a>
      <?php endif; ?>
      <a href="#newsletter">
        <span class="bg-primary bg-tint">Newsletter</span>
      </a>
       <?php snippet('social', ['socials' => $site->social()->toStructure() ]) ?>
    </nav>
  </div>

  <div class="wrapper-2">
    <span id="burger2" class="menu-burger">
        <span class="burger--line"></span>
        <span>Menu</span>
      </span>
    <nav class="menu">
      <?php foreach ($site->children()->listed() as $item): ?>
      <a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>">
        <?php if($item->id() == 'spectacles'): ?> Spectacles 
        <?php elseif($item->id() == 'aventures'): ?> Aventures 
        <?php else:
        echo $item->title()->html();
      endif; ?>
        </a>
      <?php endforeach ?>
    
      <?php foreach ($site->children()->unlisted() as $item):
        if($item->id() == 'artistes' || $item->id() == 'infos' || $item->id() == 'la-paillette'): ?>
        <a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>">
          <?= $item->title()->html(); ?>
        </a>
      <?php endif; ?>
    <?php endforeach ?>
      <a href="/search">
        <span class="bg-primary bg-tint">Recherche</span>
      </a>
    </nav>
    
  </div>

</header>