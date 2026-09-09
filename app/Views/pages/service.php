<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="an-page-hero an-banner">
    <img class="an-banner-media" src="<?= base_url('images/banners/services.png') ?>" alt="Service bay at A&amp;N Auto Repair in Burlington, NJ" width="1280" height="720">
    <div class="an-banner-overlay">
        <div class="container">
            <p class="font-small uppercase letter-spacing-1 mb-2"><a class="text-white" href="<?= site_url('services') ?>">Services</a></p>
            <h1 class="fw-medium mb-2"><?= esc($service['h1']) ?></h1>
            <p class="font-large mb-0"><?= esc($shop->tagline) ?></p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-12 col-lg-8">
                <div class="an-service-hero-photo mb-4">
                    <img src="<?= base_url($service['image']) ?>" alt="<?= esc($service['alt']) ?>">
                </div>
                <?php foreach ($service['body'] as $paragraph): ?>
                    <p><?= esc($paragraph) ?></p>
                <?php endforeach; ?>
                <a class="button button-lg button-radius button-red me-2 mt-2" href="tel:<?= esc($shop->phoneTel) ?>">Call <?= esc($shop->phoneDisplay) ?></a>
                <a class="button button-lg button-radius button-dark mt-2" href="<?= site_url('contact-us') ?>">Send a message</a>
            </div>
            <div class="col-12 col-lg-4">
                <div class="bg-gray-lighter border-radius p-4">
                    <h5 class="fw-medium mb-3">Other services</h5>
                    <ul class="list-dash animate-links mb-0">
                        <?php foreach ($shop->services() as $item): ?>
                            <?php if ($item['slug'] === $service['slug']) {
                                continue;
                            } ?>
                            <li><a href="<?= site_url('services/' . $item['slug']) ?>"><?= esc($item['name']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <hr>
                    <p class="mb-1"><strong><?= esc($shop->fullAddress()) ?></strong></p>
                    <p class="mb-0"><?= esc($shop->hoursNote) ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
