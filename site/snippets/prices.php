<?php if($prices->isNotEmpty()):  ?>
<p style="font-size:1.16em" class="margin_t-m">Tarifs <?php if($page->intendedTemplate() == 'atelier') : echo "(à l'année)";  endif;?></p>
<ul class="no_m">
  <?php foreach ($prices->toStructure() as $price): ?>
  <li class="flex">
    <?php if($price->amount()->toInt() === 0): ?>
    <span style="width: 20%">Gratuit</span>
    <?php else: ?>
    <span style="width: 15%"><?=$price->amount()?> €</span>
    <?php endif; ?>
    <span class="no_m" style="width: 85%">→&nbsp;&nbsp;<?=$price->pricetype()?></span>
  </li>
  <?php endforeach ?>
</ul>
<?php endif; ?>