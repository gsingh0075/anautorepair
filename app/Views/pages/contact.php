<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="an-page-hero an-banner">
    <img class="an-banner-media" src="<?= asset_url('images/banners/contact.png') ?>" alt="Shop bay at dusk at A&amp;N Auto Repair, 2218 Mt Holly Rd, Burlington NJ" width="1280" height="720">
    <div class="an-banner-overlay">
        <div class="container">
            <h1 class="fw-medium mb-2">Contact A&amp;N Auto Repair</h1>
            <p class="font-large mb-0">Call, visit 2218 Mt Holly Rd, or send a message. We will follow up from the shop.</p>
        </div>
    </div>
</section>

<section class="section" id="contact-form">
    <div class="container">
        <div class="row g-5">
            <div class="col-12 col-lg-5">
                <h3 class="fw-normal mb-3"><?= esc($shop->name) ?></h3>
                <p>Talk with Asif Nawaz about oil changes, brakes, tires, electrical, tune-ups, shocks, or suspension. Foreign and domestic cars.</p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><strong>Address:</strong> <?= esc($shop->fullAddress()) ?></li>
                    <li class="mb-2"><strong>Phone:</strong> <a href="tel:<?= esc($shop->phoneTel) ?>"><?= esc($shop->phoneDisplay) ?></a></li>
                    <li class="mb-2"><strong>Hours:</strong> <?= esc($shop->hoursNote) ?></li>
                    <li><strong>Owner:</strong> <?= esc($shop->owner) ?></li>
                </ul>
                <div class="an-map">
                    <iframe title="Directions to A&amp;N Auto Repair" src="https://maps.google.com/maps?q=<?= rawurlencode($shop->fullAddress()) ?>&output=embed" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <?php if ($msg = session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= esc($msg) ?></div>
                <?php endif; ?>
                <?php if ($msg = session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= esc($msg) ?></div>
                <?php endif; ?>

                <form method="post" action="<?= site_url('submit-inquiry') ?>" autocomplete="on">
                    <div class="an-honeypot" aria-hidden="true">
                        <label for="website_url">Website</label>
                        <input type="text" id="website_url" name="website_url" tabindex="-1" autocomplete="off">
                    </div>
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control form-control-lg" type="text" id="name" name="name" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="phone">Phone</label>
                            <input class="form-control form-control-lg" type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control form-control-lg" type="email" id="email" name="email" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="service">Service needed</label>
                            <select class="form-select form-select-lg" id="service" name="service">
                                <option value="">Not sure / other</option>
                                <?php foreach ($shop->services() as $item): ?>
                                    <option value="<?= esc($item['name']) ?>"><?= esc($item['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="message">Message</label>
                            <textarea class="form-control form-control-lg" id="message" name="message" rows="5" required placeholder="Year, make, model, and what the car is doing"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="button button-lg button-radius button-red" type="submit">Send to the shop</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
