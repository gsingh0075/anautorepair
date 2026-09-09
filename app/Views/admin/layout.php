<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Admin') ?> | A&amp;N Auto Repair</title>
    <link href="<?= asset_url('mono/plugins/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center py-1" href="/admin">
            <img src="<?= asset_url('images/logo.png') ?>" alt="A&amp;N Auto Repair" style="max-height: 40px; width: auto; background:#fff; border-radius:4px; padding:2px 6px;">
        </a>
        <div class="d-flex align-items-center gap-3">
            <a class="nav-link text-white-50" href="/admin">Inquiries</a>
            <a class="nav-link text-white-50" href="/" target="_blank" rel="noopener">View site</a>
            <span class="navbar-text text-white-50"><?= esc($adminUsername ?? 'admin') ?></span>
            <a class="btn btn-outline-light btn-sm" href="/admin/logout">Logout</a>
        </div>
    </div>
</nav>

<main class="container pb-5">
    <?php if ($msg = session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= esc($msg) ?></div>
    <?php endif; ?>
    <?php if ($msg = session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= esc($msg) ?></div>
    <?php endif; ?>

    <?= $content ?? '' ?>
</main>
</body>
</html>
