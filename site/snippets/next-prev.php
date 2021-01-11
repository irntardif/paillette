<nav class="flex" style="justify-content:space-between">
<?php if ($page->hasPrevListed()): ?>
<a class="btn bg-light prev" href="<?= $page->prevListed()->url() ?>">Évènement précédent</a>
<?php endif ?>
<a class="btn bg-light" href="<?= $url ?>">Tous les évènements</a>
<?php if ($page->hasNextListed()): ?>
<a class="btn bg-light next" href="<?= $page->nextListed()->url() ?>">Évènement suivant</a>
<?php endif ?>
</nav>