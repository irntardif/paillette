<?php if ($page->hasPrevListed()): ?>
<a href="<?= $page->prevListed()->url() ?>">previous page</a>
<?php endif ?>

<?php if ($page->hasNextListed()): ?>
<a href="<?= $page->nextListed()->url() ?>">next page</a>
<?php endif ?>