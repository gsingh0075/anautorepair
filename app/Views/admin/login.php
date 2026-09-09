<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Admin Login') ?> | A&amp;N Auto Repair</title>
    <link href="<?= base_url('mono/plugins/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="card shadow-sm" style="width: 100%; max-width: 420px;">
        <div class="card-body p-4 text-center">
            <a href="/admin" class="d-inline-block mb-3">
                <img src="<?= base_url('images/logo.png') ?>" alt="A&amp;N Auto Repair" style="max-height: 72px; width: auto;">
            </a>
            <p class="text-muted mb-4">Sign in to view shop inquiries.</p>

            <?php if (! empty($error)): ?>
                <div class="alert alert-danger text-start"><?= esc($error) ?></div>
            <?php endif; ?>
            <?php if ($msg = session()->getFlashdata('success')): ?>
                <div class="alert alert-success text-start"><?= esc($msg) ?></div>
            <?php endif; ?>

            <form method="post" action="/admin/login" autocomplete="off" class="text-start">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required autofocus>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-dark w-100">Sign in</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
