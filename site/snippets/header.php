 <?php 
if($page->edito()->isNotEmpty()):
  $description = $page->edito()->value();
elseif($page->description()->isNotEmpty()):
  $description = $page->description()->value();
else:
  $description = $site->description()->value();
endif; 

if($page->cover()->isNotEmpty()):
  $image = $page->cover()->toFile()->url();
else:
  $image = $site->mainImage()->toFile()->url();
endif; 

if($page->intendedTemplate() == 'spectacles' || $page->intendedTemplate() == 'ateliers' || $page->intendedTemplate() == 'aventures' || $page->intendedTemplate() == 'infos' || $page->intendedTemplate() == 'la-paillette' || $page->intendedTemplate() == 'home'):
  $type = 'website';
else:
  $type = 'article';
endif; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= $site->title() ?> | <?= $page->title() ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?= $kirby->url('assets') ?>/icons/favicons/favicon-32x32.png">
  <link rel="apple-touch-icon" sizes="57x57" href="<?= $kirby->url('assets') ?>/icons/favicons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?= $kirby->url('assets') ?>/icons/favicons/favicons//apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?= $kirby->url('assets') ?>/icons/favicons/favicons//apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= $kirby->url('assets') ?>/icons/favicons/favicons//apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?= $kirby->url('assets') ?>/icons/favicons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?= $kirby->url('assets') ?>/icons/favicons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?= $kirby->url('assets') ?>/icons/favicons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?= $kirby->url('assets') ?>/icons/favicons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= $kirby->url('assets') ?>/icons/favicons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="<?= $kirby->url('assets') ?>/icons/favicons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= $kirby->url('assets') ?>/icons/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?= $kirby->url('assets') ?>/icons/favicons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= $kirby->url('assets') ?>/icons/favicons/favicon-16x16.png">
  <link rel="manifest" href="<?= $kirby->url('assets') ?>/icons/favicons/manifest.json">
  <meta name="msapplication-TileColor" content="#ADDCEB">
  <meta name="msapplication-TileImage" content="<?= $kirby->url('assets') ?>/icons/favicons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ADDCEB">
 
  <meta name="description" content="<?= $description ?>"> 
  <meta property="og:type" content="<?= $type ?>" />
  <meta property="og:url" content="<?= $page->url() ?>" />
  <meta property="og:title" content="<?= $site->title() ?> | <?= $page->title() ?>" />
  <meta property="og:description" content="<?= $description ?>"/>
  <meta property="og:site_name" content="La Paillette"/>
  <meta property="og:local" content="fr_FR"/>
  <meta property="og:image:url" content="<?= $image ?>"/>


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
  
</head>
<body class="<?= $page->uid() ?>">

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
  <?php snippet('navbar');
endif;
snippet('newsletter');
snippet('event-modal') ?>



