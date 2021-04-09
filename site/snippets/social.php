<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  In this snippet the svg() helper is a great way to embed SVG
  code directly in your HTML. Pass the path to your SVG
  file to load it.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
 <?php if ($socials->count()): ?>
<span class="social">
  <?php foreach ($socials as $social): ?>
  <a target="_blank" href="<?= $social->url(); ?>">
    <?= svg('assets/icons/'.$social->platform().'.svg') ?>
  </a>
  <?php endforeach; ?>
</span>
<?php endif; ?>
