<?php
/** @var \Config\Shop $shop */
$current = $current ?? uri_string();
$services = $shop->services();
?>
<div class="header header-lg sticky-autohide">
    <div class="container">
        <div class="header-logo">
            <a href="<?= site_url('/') ?>">
                <img src="<?= base_url('images/logo.png') ?>" alt="A&amp;N Auto Repair, Burlington NJ">
            </a>
        </div>
        <div class="header-menu">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link<?= $current === '' ? ' active' : '' ?>" href="<?= site_url('/') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= $current === 'about-us' ? ' active' : '' ?>" href="<?= site_url('about-us') ?>">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= str_starts_with($current, 'services') ? ' active' : '' ?>" href="<?= site_url('services') ?>">Services</a>
                    <ul class="nav-dropdown">
                        <?php foreach ($services as $service): ?>
                            <li class="nav-dropdown-item">
                                <a class="nav-dropdown-link<?= $current === 'services/' . $service['slug'] ? ' active' : '' ?>" href="<?= site_url('services/' . $service['slug']) ?>"><?= esc($service['name']) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= $current === 'contact-us' ? ' active' : '' ?>" href="<?= site_url('contact-us') ?>">Contact Us</a>
                </li>
            </ul>
        </div>
        <div class="header-menu-extra">
            <ul class="list-inline">
                <li>
                    <a class="button button-sm button-radius button-red" href="tel:<?= esc($shop->phoneTel) ?>"><?= esc($shop->phoneDisplay) ?></a>
                </li>
            </ul>
        </div>
        <button class="header-toggle" type="button" aria-label="Open menu">
            <span></span>
        </button>
    </div>
</div>
