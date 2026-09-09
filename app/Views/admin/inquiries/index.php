<?php
$months = [
    1  => 'January',
    2  => 'February',
    3  => 'March',
    4  => 'April',
    5  => 'May',
    6  => 'June',
    7  => 'July',
    8  => 'August',
    9  => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December',
];
$filterYear  = (int) ($filterYear ?? date('Y'));
$filterMonth = (int) ($filterMonth ?? date('n'));
$years       = $years ?? range((int) date('Y'), (int) date('Y') - 5);
$currentMonthHref = '/admin?year=' . (int) date('Y') . '&month=' . (int) date('n');
?>

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <div>
        <h1 class="h3 mb-1">Form Inquiries</h1>
        <p class="text-muted mb-0">Contact form submissions from the website</p>
    </div>
    <span class="badge text-bg-secondary"><?= count($inquiries) ?> shown</span>
</div>

<form method="get" action="/admin" class="card shadow-sm mb-3">
    <div class="card-body">
        <div class="row g-3 align-items-end">
            <div class="col-sm-6 col-md-3">
                <label for="filterYear" class="form-label">Year</label>
                <select class="form-select" id="filterYear" name="year">
                    <?php foreach ($years as $y): ?>
                        <option value="<?= (int) $y ?>" <?= (int) $y === $filterYear ? 'selected' : '' ?>><?= (int) $y ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-6 col-md-3">
                <label for="filterMonth" class="form-label">Month</label>
                <select class="form-select" id="filterMonth" name="month">
                    <?php foreach ($months as $num => $label): ?>
                        <option value="<?= (int) $num ?>" <?= (int) $num === $filterMonth ? 'selected' : '' ?>><?= esc($label) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-12 col-md-6">
                <button type="submit" class="btn btn-dark me-2">Apply filter</button>
                <a href="<?= esc($currentMonthHref) ?>" class="btn btn-outline-secondary">Current month</a>
            </div>
        </div>
    </div>
</form>

<?php if (empty($inquiries)): ?>
    <div class="alert alert-info mb-0">No inquiries for <?= esc($months[$filterMonth] ?? '') ?> <?= (int) $filterYear ?>. Try another month.</div>
<?php else: ?>
    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Service</th>
                    <th scope="col" class="text-end">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($inquiries as $inquiry): ?>
                    <?php
                    $created = (string) ($inquiry['created_at'] ?? '');
                    $createdLabel = $created !== '' ? date('M j, Y g:i A', strtotime($created)) : '—';
                    ?>
                    <tr>
                        <td class="text-nowrap"><?= esc($createdLabel) ?></td>
                        <td><?= esc((string) ($inquiry['name'] ?? '')) ?></td>
                        <td>
                            <?php $phone = (string) ($inquiry['phone'] ?? ''); ?>
                            <?php if ($phone !== ''): ?>
                                <a href="tel:<?= esc(preg_replace('/\D+/', '', $phone)) ?>"><?= esc($phone) ?></a>
                            <?php else: ?>
                                —
                            <?php endif; ?>
                        </td>
                        <td><a href="mailto:<?= esc((string) ($inquiry['email'] ?? '')) ?>"><?= esc((string) ($inquiry['email'] ?? '')) ?></a></td>
                        <td><?= esc((string) ($inquiry['subject'] ?? '')) ?></td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-dark" href="/admin/inquiries/<?= (int) $inquiry['id'] ?>">View</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
