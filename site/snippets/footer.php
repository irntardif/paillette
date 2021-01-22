</div>
  <?php snippet('newsletter-footer'); ?>
  <footer class="footer">
    <section class="bg-main padding_h-l">
      <div class="main-wrapper no-p">
        <div class="grid">
          <div class="column flex noflex-mob" style="--columns: 5">
             <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" width="66.069" height="88.521" viewBox="0 0 66.069 88.521">
              <defs>
                <clipPath id="home-b">
                  <path id="Tracé_20" data-name="Tracé 20" d="M0-134.784H66.069V-223.3H0Z" transform="translate(0 223.305)"/>
                </clipPath>
              </defs>
              <g id="Groupe_31" data-name="Groupe 31" transform="translate(0 0)">
                <g id="Groupe_17" data-name="Groupe 17" clip-path="url(#clip-path)">
                  <g id="Groupe_16" data-name="Groupe 16" transform="translate(0 0)">
                    <path id="Tracé_19" data-name="Tracé 19" d="M-17.546-134.784H-28.192a.878.878,0,0,1-.878-.878v-46.895a2.882,2.882,0,0,1,.552-1.559l31.486-38.9a.692.692,0,0,1,1.114-.008l32.357,38.867A2.817,2.817,0,0,1,37-182.609v46.947a.878.878,0,0,1-.878.878H25.475" transform="translate(29.07 223.305)"/>
                  </g>
                </g>
              </g>
            </svg>
            <div class="nomargin-mob margin_l-m">
              <a class="logo footer-logo" href="<?= $site->url() ?>">
                <?= $site->title()->html() ?>
              </a>
              <p><?= $site->address() ?></p>
              <p><a href="mailto:<?= $site->email()?>"><?= $site->email() ?></a></p>
              <p>Accueil: <?= $site->mainphone() ?></p>
              <p>Billetterie: <?= $site->ticketingphone() ?></p>
            </div>
          </div>
          <div class="column" style="--columns: 3">
            <ul>
              <?php foreach ($site->children()->listed() as $elPage): ?>
              <li><a href="<?= $elPage->url() ?>"><?= $elPage->title()->html() ?></a></li>
              <?php endforeach ?>
              <li><a href="<?= $site->find('artistes')->url() ?>"><?= $site->find('artistes')->title()->html() ?></a></li>
            </ul>
          </div>
          <div class="column" style="--columns: 2">
            <ul>
              <li><a href="<?= $site->find('la-paillette')->url() ?>"><?= $site->find('la-paillette')->title()->html() ?></a></li>
              <li><a href="<?= $site->find('infos')->url() ?>"><?= $site->find('infos')->title()->html() ?></a></li>
              <?php if($site->find('espace-pro')): ?>
              <li><a href="<?= $site->find('espace-pro')->url() ?>"><?= $site->find('espace-pro')->title()->html() ?></a></li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="column" style="--columns: 2">
            <?php snippet('social', ['socials' => $site->social()->toStructure() ]) ?>
            <ul>
              <li class="margin_b-m">
                 <a class="menu-icon icon-text newsletter" href="#newsletter"><span class="bg-primary bg-tint">Newsletter</span></a>
              </li>
              <?php if( $site->ticketing()->isNotEmpty()): ?>
              <li>
                <a class="menu-icon icon-text ticket" target="_blank" href="<?= $site->ticketing() ?>">
                  Billetterie
                </a>
              </li> 
              <?php endif; ?>
              <li>
                <a class="menu-icon icon-text loop" target="_blank" href="#">search</a>
              </li>
            </ul>
          </div>
        </div>
    </section>
    <section class="bg-accent padding_h-s">
      <div class="main-wrapper no-p">
         <ul class="list-inline">
           <?php if($site->find('mentions-legales')): ?>
            <li><a href="<?= $site->find('mentions-legales')->url() ?>"><?= $site->find('mentions-legales')->title()->html() ?></a></li>
            <?php endif; ?>
            <?php if($site->find('credits')): ?>
            <li><a href="<?= $site->find('credits')->url() ?>"><?= $site->find('credits')->title()->html() ?></a></li>
            <?php endif; ?>
         </ul>
      </div>
    </section>
    <svg class="defs-only">
      <filter id="monochrome" color-interpolation-filters="sRGB"
            x="0" y="0" height="100%" width="100%">
      <feColorMatrix type="matrix"
        values="0.68 0 0 0 0.05                 
                0.86 0 0 0 0.05                 
                0.94 0 0 0 0.06                 
                0    0 0 1 0" />
    </filter>
  </svg>
  </footer>

  <?= js([
    'assets/js/siema.min.js',
    'assets/js/prism.js',
    'assets/js/lightbox.js',
    'assets/js/inview.js',
    'assets/js/index.js',
    '@auto'
  ]) ?>

</body>
</html>

