<?php if($representations->isNotEmpty()): ?>
  <?php if($page->rprstnTitle()->isNotEmpty()): ?>
  <h3 style="font-size:1.16em"><?= $page->rprstnTitle() ?> </h3>
  <?php else: ?>
  <h3 style="font-size:1.16em">Représentations</h3>
  <?php endif; ?>
  <p class="h3 color-accent"><?= $label; ?></p>
  <div style="font-size:1.16em" class="margin_b-s">
    <?php foreach ($representations->toStructure() as $rprst): ?>
       <p class="flex">
        <span class="<?= $rprst->publicType() != 'all' ? 'color-grey w_75' : ' w_75'?>"><?= $rprst->date()->toDate('%d %b %Y'); ?> &#8594; <?= $rprst->date()->toDate('%Hh%M') ?></span>
        <?php if($rprst->publicType() != 'all'): ?>
        <span class="no_m w_25" style="padding-left:5px;">
          <span class="label bg-light"><?php snippet('categories', array('categories' => $rprst->publicType())) ?></span>
        </span>
        <?php endif; ?>
       </p>
    <?php endforeach ?>
    <?= $moreInfos; ?>
  </div>
<?php endif; ?>