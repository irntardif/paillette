<?php if($representations->isNotEmpty()): ?>
  <h3 class="margin_t-m">Représentations</h3>
  <p class="h3 color-accent"><?= $label; ?></p>
  <div class="margin_b-s">
    <?php foreach ($representations->toStructure() as $rprst): ?>
       <p class="flex">
        <span style="width: 60%"><?= $rprst->date()->toDate('%d %B %Y'); ?> → <?= $rprst->date()->toDate('%Hh%M') ?></span>
        <span class="no_m" style="width: 40%">
          <span class="label bg-light"><?php snippet('categories', array('categories' => $rprst->publicType())) ?></span>
        </span>
       </p>
    <?php endforeach ?>
  </div>
  <?= $moreInfos; ?>
<?php endif; ?>