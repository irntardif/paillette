<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This header snippet is reused in all templates.
  It fetches information from the `site.txt` content file
  and contains the site navigation.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= $site->title() ?> | <?= $page->title() ?></title>

  <?= css([
    'assets/css/prism.css',
    'assets/css/lightbox.css',
    'assets/css/index.css',
    '@auto'
  ]) ?>

  <?php if($page->uid() == 'home'): ?>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.css' rel="stylesheet"/>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js'></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/tippy.js/themes/light.css" />
  <?php endif; ?>
  
  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
</head>
<body class="<?= $page->id() ?>">

<?php if($page->uid() == 'home' && $page->headerImage()->isNotEmpty()): ?>
<section class="header-paillette header-image">
  <?php $img = $page->headerImage()->toFile(); ?>
  <figure class="regular">
    <img src="<?= $img->thumb()->url() ?>" data-src="<?= $img->url() ?>" data-srcset="<?= $img->srcset() ?>" alt="<?= $img->filename() ?>"/>
  </figure>
</section>
<?php endif; ?>

<?php if($page->isMobile()):
  snippet('navbar-mobile');
else: ?>
  <a href="<?= $site->url() ?>">
    <div class="paillette-logo"></div>
  </a>
  <?php snippet('navbar');
endif;
snippet('newsletter');
snippet('event-modal') ?>



