<?php
$created = (string) ($inquiry['created_at'] ?? '');
$createdLabel = $created !== '' ? date('M j, Y g:i A', strtotime($created)) : '—';
$email = (string) ($inquiry['email'] ?? '');
?>

<div class="mb-3">
    <a href="/admin" class="btn btn-link px-0">&larr; Back to inquiries</a>
</div>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h5 mb-0">Inquiry detail</h1>
            <small class="text-muted"><?= esc($createdLabel) ?></small>
        </div>
    </div>
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9"><?= esc((string) ($inquiry['name'] ?? '')) ?></dd>

            <dt class="col-sm-3">Phone</dt>
            <dd class="col-sm-9"><?= esc((string) ($inquiry['phone'] ?? '') !== '' ? (string) $inquiry['phone'] : '—') ?></dd>

            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9">
                <?php if ($email !== ''): ?>
                    <a href="mailto:<?= esc($email) ?>"><?= esc($email) ?></a>
                <?php else: ?>
                    —
                <?php endif; ?>
            </dd>

            <dt class="col-sm-3">Service</dt>
            <dd class="col-sm-9"><?= esc((string) ($inquiry['subject'] ?? '')) ?></dd>

            <dt class="col-sm-3">Message</dt>
            <dd class="col-sm-9">
                <div class="border rounded p-3 bg-light" style="white-space: pre-wrap;"><?= esc((string) ($inquiry['message'] ?? '')) ?></div>
            </dd>
        </dl>
    </div>
    <?php if ($email !== ''): ?>
        <div class="card-footer bg-white">
            <a class="btn btn-dark" href="mailto:<?= esc($email) ?>?subject=Re:%20<?= rawurlencode((string) ($inquiry['subject'] ?? 'Your inquiry')) ?>">Reply by email</a>
        </div>
    <?php endif; ?>
</div>
