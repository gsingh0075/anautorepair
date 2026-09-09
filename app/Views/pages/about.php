<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="an-page-hero an-banner">
    <img class="an-banner-media" src="<?= asset_url('images/banners/about.png') ?>" alt="Mechanic at the workbench at A&amp;N Auto Repair in Burlington, NJ" width="1280" height="720">
    <div class="an-banner-overlay">
        <div class="container">
            <h1 class="fw-medium mb-2">About A&amp;N Auto Repair</h1>
            <p class="font-large mb-0">A Burlington, NJ shop for foreign and domestic cars — mechanical and electrical.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-12 col-lg-7">
                <h2 class="fw-normal mb-3">The shop Asif Nawaz runs</h2>
                <p>A&amp;N Auto Repair is located at <?= esc($shop->fullAddress()) ?>, just off the Mount Holly Road corridor that connects Burlington Township to Mount Holly. Owner Asif Nawaz built the shop around a simple idea: do the mechanical and electrical work local drivers actually need, on both foreign and domestic cars.</p>
                <p>That means oil changes and tune-ups sit next to brakes, tires, shocks, suspension, batteries, starters, and wiring. You do not have to guess which specialty shop to call first. If the car will not start, pulls when you brake, or rides rough over bumps, this is the place to ask.</p>
                <p>Customers come from Burlington, Willingboro, Florence, Westampton, Bordentown, and Delran because they want a real conversation with the person doing the work. Call <?= esc($shop->phoneDisplay) ?> and talk to the shop before you drive over — hours are by phone, not a chain lobby board.</p>
                <a class="button button-lg button-radius button-red mt-2" href="tel:<?= esc($shop->phoneTel) ?>">Call <?= esc($shop->phoneDisplay) ?></a>
            </div>
            <div class="col-12 col-lg-5">
                <div class="bg-gray-lighter border-radius p-4">
                    <h5 class="fw-medium mb-3">Shop details</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><strong>Name:</strong> <?= esc($shop->name) ?></li>
                        <li class="mb-2"><strong>Owner:</strong> <?= esc($shop->owner) ?></li>
                        <li class="mb-2"><strong>Address:</strong> <?= esc($shop->fullAddress()) ?></li>
                        <li class="mb-2"><strong>Phone:</strong> <a href="tel:<?= esc($shop->phoneTel) ?>"><?= esc($shop->phoneDisplay) ?></a></li>
                        <li class="mb-2"><strong>Hours:</strong> <?= esc($shop->hoursNote) ?></li>
                        <li><strong>Cars:</strong> Foreign and domestic</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-gray-lighter">
    <div class="container">
        <h2 class="mb-4">What we stand for</h2>
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <h5 class="fw-medium">All kinds of mechanical work</h5>
                <p class="mb-0">From routine maintenance to brakes, tires, shocks, and suspension, the shop is set up to keep daily drivers on the road.</p>
            </div>
            <div class="col-12 col-md-4">
                <h5 class="fw-medium">Electrical diagnosis</h5>
                <p class="mb-0">No-starts, charging issues, and lighting problems get traced, not guessed. Electrical work is part of the core offer, not an afterthought.</p>
            </div>
            <div class="col-12 col-md-4">
                <h5 class="fw-medium">Foreign and domestic</h5>
                <p class="mb-0">Bring the Honda, Toyota, Ford, Chevy, or European daily driver. If it is a passenger car that needs honest repair in Burlington County, ask.</p>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
