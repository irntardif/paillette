<?php if($prices->isNotEmpty()):  ?>
<p style="font-size:1.16em" class="margin_t-m">Tarifs <?php if($page->intendedTemplate() == 'atelier') : echo "(à l'année)";  endif;?></p>
<ul class="no_m">
  <?php foreach ($prices->toStructure() as $price): ?>
  <li class="flex">
    <?php if($price->amount()->toInt() === 0): ?>
    <span class="w_20">Gratuit</span>
    <?php else: ?>
    <span class="w_20"><?=$price->amount()?> €</span>
    <?php endif; ?>
    <span class="no_m w_85">&#8594;&nbsp;&nbsp;<?=$price->pricetype()?></span>
  </li>
  <?php endforeach ?>
</ul>
<?php endif; ?>