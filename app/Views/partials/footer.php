<?php
/** @var \Config\Shop $shop */
$services = $shop->services();
$mapQuery = rawurlencode($shop->fullAddress());
?>
<footer>
    <div class="section-sm bg-dark">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-3">
                    <img class="an-footer-logo" src="<?= asset_url('images/logo.png') ?>" alt="A&amp;N Auto Repair">
                    <p class="mt-3 mb-0"><?= esc($shop->tagline) ?></p>
                </div>
                <div class="col-6 col-lg-3">
                    <h6 class="font-small fw-medium uppercase">Company</h6>
                    <ul class="list-dash animate-links">
                        <li><a href="<?= site_url('/') ?>">Home</a></li>
                        <li><a href="<?= site_url('about-us') ?>">About Us</a></li>
                        <li><a href="<?= site_url('services') ?>">Services</a></li>
                        <li><a href="<?= site_url('contact-us') ?>">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3">
                    <h6 class="font-small fw-medium uppercase">Services</h6>
                    <ul class="list-dash animate-links">
                        <?php foreach ($services as $service): ?>
                            <li><a href="<?= site_url('services/' . $service['slug']) ?>"><?= esc($service['name']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-12 col-lg-3">
                    <h6 class="font-small fw-medium uppercase">Visit the shop</h6>
                    <ul class="list-unstyled mb-3">
                        <li><?= esc($shop->name) ?></li>
                        <li><?= esc($shop->street) ?></li>
                        <li><?= esc($shop->city) ?>, <?= esc($shop->state) ?> <?= esc($shop->zip) ?></li>
                        <li><a href="tel:<?= esc($shop->phoneTel) ?>"><?= esc($shop->phoneDisplay) ?></a></li>
                        <li><?= esc($shop->hoursNote) ?></li>
                        <li>Owner: <?= esc($shop->owner) ?></li>
                    </ul>
                    <div class="an-map">
                        <iframe title="Map to A&amp;N Auto Repair" src="https://maps.google.com/maps?q=<?= $mapQuery ?>&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-black py-4">
        <div class="container">
            <p class="mb-0">&copy; <?= date('Y') ?> <?= esc($shop->name) ?>. All rights reserved. Auto repair in <?= esc($shop->city) ?>, <?= esc($shop->state) ?>.</p>
        </div>
    </div>
</footer>
