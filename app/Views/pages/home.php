<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="an-hero an-banner">
    <img class="an-banner-media" src="<?= base_url('images/banners/home.png') ?>" alt="Cars on lifts inside A&amp;N Auto Repair in Burlington, NJ" width="1280" height="720">
    <div class="an-banner-overlay">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-12 col-lg-8">
                    <h6 class="font-small fw-medium uppercase letter-spacing-1 mb-3">Burlington, New Jersey</h6>
                    <h1 class="fw-medium mb-3">A&amp;N Auto Repair</h1>
                    <p class="an-tagline mb-4"><?= esc($shop->tagline) ?></p>
                    <p class="mb-4">Asif Nawaz runs a full-service shop at <?= esc($shop->fullAddress()) ?>. Oil changes, brakes, tires, tune-ups, electrical, shocks, and suspension — foreign and domestic.</p>
                    <a class="button button-lg button-radius button-red me-2 mb-2" href="tel:<?= esc($shop->phoneTel) ?>">Call <?= esc($shop->phoneDisplay) ?></a>
                    <a class="button button-lg button-radius button-white mb-2" href="<?= site_url('contact-us') ?>">Request service</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col-12 col-lg-8 offset-lg-2">
                <h6 class="font-small fw-medium uppercase">What we fix</h6>
                <h2 class="mb-3">Mechanical and electrical work in Burlington, NJ</h2>
                <p class="mb-0">From a same-week oil change to a no-start electrical job, the shop on Mt Holly Rd is set up for the work Burlington County cars actually need. Pick a service below or call if you are not sure where to start.</p>
            </div>
        </div>
        <div class="row g-4 g-lg-5">
            <?php foreach ($shop->services() as $service): ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="<?= site_url('services/' . $service['slug']) ?>" class="an-service-link">
                        <div class="an-service-photo">
                            <img src="<?= base_url($service['image']) ?>" alt="<?= esc($service['alt']) ?>">
                        </div>
                        <div class="an-service-icon" aria-hidden="true"><i class="bi <?= esc($service['icon']) ?>"></i></div>
                        <h5 class="fw-medium mb-2"><?= esc($service['name']) ?></h5>
                        <p class="mb-0"><?= esc($service['short']) ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-5">
            <a class="button button-lg button-radius button-dark" href="<?= site_url('services') ?>">See all services</a>
        </div>
    </div>
</section>

<section class="section bg-gray-lighter">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-12 col-lg-6">
                <h6 class="font-small fw-medium uppercase">Your local shop</h6>
                <h2 class="mb-3">Honest repair on Mt Holly Road</h2>
                <p>A&amp;N Auto Repair is a neighborhood shop, not a chain. Owner Asif Nawaz works on foreign and domestic cars for drivers in Burlington, Mount Holly, Willingboro, Florence, Westampton, Bordentown, and Delran.</p>
                <p>Bring the car for maintenance or for a problem that needs diagnosis. If it is mechanical or electrical, ask — that is the work this shop is set up to do. Oil, brakes, tires, tune-ups, charging systems, shocks, and suspension all stay under one roof so you are not bouncing between specialty stores.</p>
                <p>Call before you drive over. Hours are by phone, and a short description of the noise or warning light helps us plan the bay time.</p>
                <p class="mb-0"><strong>Address:</strong> <?= esc($shop->fullAddress()) ?><br>
                    <strong>Phone:</strong> <a href="tel:<?= esc($shop->phoneTel) ?>"><?= esc($shop->phoneDisplay) ?></a><br>
                    <strong>Hours:</strong> <?= esc($shop->hoursNote) ?></p>
            </div>
            <div class="col-12 col-lg-6">
                <div class="an-map">
                    <iframe title="A&amp;N Auto Repair location" src="https://maps.google.com/maps?q=<?= rawurlencode($shop->fullAddress()) ?>&output=embed" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="an-page-hero an-banner an-cta-banner">
    <img class="an-banner-media" src="<?= base_url('images/banners/contact.png') ?>" alt="Open bay at A&amp;N Auto Repair on Mt Holly Rd in Burlington, NJ" width="1280" height="720">
    <div class="an-banner-overlay">
        <div class="container text-center">
            <h2 class="mb-3">Need the car looked at?</h2>
            <p class="font-large mb-4">Call Asif or send a short message. We will tell you when to come in.</p>
            <a class="button button-lg button-radius button-red me-2" href="tel:<?= esc($shop->phoneTel) ?>"><?= esc($shop->phoneDisplay) ?></a>
            <a class="button button-lg button-radius button-white" href="<?= site_url('contact-us') ?>">Contact the shop</a>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
