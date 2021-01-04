<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This footer snippet is reused in all templates.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>

  </main>
</div>
  <footer class="footer">
    <section class="bg-main padding_t-l ">
      <div class="main-wrapper no-p">
        <div class="grid">
          <div class="column" style="--columns: 5">
            <a class="logo footer-logo" href="<?= $site->url() ?>">
              <?= $site->title()->html() ?>
            </a>
            <p><?= $site->address() ?></p>
            <p><a href="mailto:<?= $site->email()?>"><?= $site->email() ?></a></p>
            <p>Accueil: <?= $site->mainphone() ?></p>
            <p>Billetterie: <?= $site->ticketingphone() ?></p>
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
  </footer>

  <?= js([
    'assets/js/prism.js',
    'assets/js/lightbox.js',
    'assets/js/inview.js',
    'assets/js/index.js',
    '@auto'
  ]) ?>

</body>
</html>
