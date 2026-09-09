<?php

namespace App\Controllers;

use App\Models\FormInquiryModel;
use Config\Shop;

class Home extends BaseController
{
    private function shop(): Shop
    {
        return config(Shop::class);
    }

    /**
     * @param array<string, mixed> $data
     */
    private function render(string $view, array $data = []): string
    {
        $shop = $this->shop();
        $data['shop']    = $shop;
        $data['current'] = uri_string();
        $data['canonical'] = current_url();

        if (empty($data['jsonLd']) && in_array($view, ['pages/home', 'pages/contact'], true)) {
            $data['jsonLd'] = $this->localBusinessJsonLd($shop);
        }

        return view($view, $data);
    }

    private function localBusinessJsonLd(Shop $shop): string
    {
        $payload = [
            '@context'    => 'https://schema.org',
            '@type'       => 'AutoRepair',
            'name'        => $shop->name,
            'image'       => asset_url('images/logo.png'),
            'url'         => site_url('/'),
            'telephone'   => $shop->phoneTel,
            'description' => $shop->tagline,
            'address'     => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => $shop->street,
                'addressLocality' => $shop->city,
                'addressRegion'   => $shop->state,
                'postalCode'      => $shop->zip,
                'addressCountry'  => 'US',
            ],
            'geo' => [
                '@type'     => 'GeoCoordinates',
                'latitude'  => $shop->latitude,
                'longitude' => $shop->longitude,
            ],
            'areaServed' => array_map(static fn (string $place): array => [
                '@type' => 'City',
                'name'  => $place . ', NJ',
            ], $shop->areaServed),
            'priceRange' => '$$',
        ];

        return json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?: '{}';
    }

    public function index(): string
    {
        return $this->render('pages/home', [
            'title'            => 'A&N Auto Repair | Burlington, NJ Auto Shop',
            'metaDescription'  => 'A&N Auto Repair at 2218 Mt Holly Rd, Burlington, NJ 08016. Mechanical and electrical work for foreign and domestic cars. Call Asif Nawaz at (609) 614-6365.',
        ]);
    }

    public function aboutUs(): string
    {
        return $this->render('pages/about', [
            'title'           => 'About Us | A&N Auto Repair in Burlington, NJ',
            'metaDescription' => 'Meet Asif Nawaz and A&N Auto Repair in Burlington, NJ. Foreign and domestic mechanical and electrical auto repair on Mt Holly Rd.',
        ]);
    }

    public function services(): string
    {
        return $this->render('pages/services', [
            'title'           => 'Auto Repair Services in Burlington, NJ | A&N Auto Repair',
            'metaDescription' => 'Oil change, tune-up, tires, electrical, brakes, shocks, and suspension at A&N Auto Repair, 2218 Mt Holly Rd, Burlington, NJ.',
        ]);
    }

    public function service(string $slug)
    {
        $service = $this->shop()->serviceBySlug($slug);
        if ($service === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return $this->render('pages/service', [
            'title'           => $service['title'],
            'metaDescription' => $service['description'],
            'service'         => $service,
        ]);
    }

    public function contactUs(): string
    {
        return $this->render('pages/contact', [
            'title'           => 'Contact A&N Auto Repair | Burlington, NJ',
            'metaDescription' => 'Contact A&N Auto Repair at 2218 Mt Holly Rd, Burlington, NJ 08016. Call (609) 614-6365 or send a service request.',
        ]);
    }

    public function submitInquiry()
    {
        $honeypot = trim((string) $this->request->getPost('website_url'));
        if ($honeypot !== '') {
            return redirect()->to('/contact-us')->with('success', 'Thanks. We will be in touch.');
        }

        $name    = trim((string) $this->request->getPost('name'));
        $email   = trim((string) $this->request->getPost('email'));
        $phone   = trim((string) $this->request->getPost('phone'));
        $service = trim((string) $this->request->getPost('service'));
        $message = trim((string) $this->request->getPost('message'));

        $errors = [];
        if ($name === '') {
            $errors[] = 'Name is required.';
        }
        if ($phone === '') {
            $errors[] = 'Phone is required.';
        }
        if ($email === '' || ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'A valid email is required.';
        }
        if ($message === '') {
            $errors[] = 'Message is required.';
        }

        if ($errors !== []) {
            return redirect()->to('/contact-us')->with('error', implode(' ', $errors))->withInput();
        }

        $subject = $service !== '' ? $service : 'Website inquiry';

        $inquiry = [
            'name'         => $name,
            'email'        => $email,
            'phone'        => $phone,
            'subject'      => $subject,
            'message'      => $message,
            'inquiry_type' => 'contact',
            'created_at'   => date('Y-m-d H:i:s'),
        ];

        $model    = model(FormInquiryModel::class);
        $inserted = $model->insert($inquiry, true);

        if (! $inserted) {
            log_message('error', 'Failed to save form inquiry: {errors}', [
                'errors' => json_encode($model->errors()),
            ]);

            return redirect()->to('/contact-us')->with('error', 'Something went wrong. Please call the shop.');
        }

        return redirect()->to('/contact-us')->with('success', 'Thanks. Your message is in our shop inbox. We will call or email you back.');
    }

    public function sitemap()
    {
        $shop = $this->shop();
        $urls = [
            site_url('/'),
            site_url('about-us'),
            site_url('services'),
            site_url('contact-us'),
        ];
        foreach ($shop->services() as $service) {
            $urls[] = site_url('services/' . $service['slug']);
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($urls as $loc) {
            $xml .= '  <url><loc>' . esc($loc, 'xml') . '</loc></url>' . "\n";
        }
        $xml .= '</urlset>';

        return $this->response->setHeader('Content-Type', 'application/xml; charset=UTF-8')->setBody($xml);
    }
}
