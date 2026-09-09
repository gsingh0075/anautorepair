<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= esc($metaDescription ?? '') ?>">
    <title><?= esc($title ?? 'A&N Auto Repair') ?></title>
    <link rel="canonical" href="<?= esc($canonical ?? current_url()) ?>">
    <link href="<?= asset_url('images/favicon.png') ?>" rel="shortcut icon">
    <link href="<?= asset_url('mono/plugins/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset_url('mono/plugins/owl-carousel/owl.carousel.min.css') ?>" rel="stylesheet">
    <link href="<?= asset_url('mono/plugins/owl-carousel/owl.theme.default.min.css') ?>" rel="stylesheet">
    <link href="<?= asset_url('mono/plugins/magnific-popup/magnific-popup.min.css') ?>" rel="stylesheet">
    <link href="<?= asset_url('mono/plugins/sal/sal.min.css') ?>" rel="stylesheet">
    <link href="<?= asset_url('mono/plugins/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link href="<?= asset_url('mono/css/theme.css') ?>" rel="stylesheet">
    <link href="<?= asset_url('mono/plugins/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= asset_url('mono/plugins/font-awesome/css/all.css') ?>" rel="stylesheet">
    <link href="<?= asset_url('css/an-theme.css') ?>?v=4" rel="stylesheet">
    <?php if (! empty($jsonLd)): ?>
        <script type="application/ld+json"><?= $jsonLd ?></script>
    <?php endif; ?>
</head>
<body>
<?= view('partials/header', ['shop' => $shop, 'current' => $current ?? '']) ?>
<?= $this->renderSection('content') ?>
<?= view('partials/footer', ['shop' => $shop]) ?>

<div class="scrolltotop">
    <a class="button-circle button-circle-md button-circle-dark" href="#"><i class="bi bi-arrow-up"></i></a>
</div>

<script src="<?= asset_url('mono/plugins/jquery.min.js') ?>"></script>
<script src="<?= asset_url('mono/plugins/plugins.js') ?>"></script>
<script src="<?= asset_url('mono/js/functions.js') ?>"></script>
</body>
</html>
