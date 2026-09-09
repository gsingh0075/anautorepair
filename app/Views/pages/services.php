<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="an-page-hero an-banner">
    <img class="an-banner-media" src="<?= asset_url('images/banners/services.png') ?>" alt="Brake and lift work at A&amp;N Auto Repair in Burlington, NJ" width="1280" height="720">
    <div class="an-banner-overlay">
        <div class="container">
            <h1 class="fw-medium mb-2">Auto Repair Services in Burlington, NJ</h1>
            <p class="font-large mb-0"><?= esc($shop->tagline) ?></p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 col-lg-8">
                <p>A&amp;N Auto Repair on Mt Holly Rd handles the jobs Burlington County drivers need most: oil changes, tune-ups, tires, electrical, brakes, shocks, and suspension. Foreign and domestic cars are welcome. Call <?= esc($shop->phoneDisplay) ?> if you are unsure which service you need — Asif Nawaz will point you in the right direction.</p>
                <p>Each page below explains what we look at, who the work is for, and when to call. You do not need the exact part name. Describe the symptom — a grind, a click, a bounce, a leak — and we will tell you what to bring in.</p>
            </div>
        </div>
        <div class="row g-4 g-lg-5">
            <?php foreach ($shop->services() as $service): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="<?= site_url('services/' . $service['slug']) ?>" class="an-service-link">
                        <div class="an-service-photo">
                            <img src="<?= asset_url($service['image']) ?>" alt="<?= esc($service['alt']) ?>">
                        </div>
                        <div class="an-service-icon" aria-hidden="true"><i class="bi <?= esc($service['icon']) ?>"></i></div>
                        <h2 class="h5 fw-medium mb-2"><?= esc($service['name']) ?></h2>
                        <p class="mb-2"><?= esc($service['short']) ?></p>
                        <span>Learn more</span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
