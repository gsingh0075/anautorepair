<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Shop extends BaseConfig
{
    public string $name = 'A&N Auto Repair';
    public string $owner = 'Asif Nawaz';
    public string $tagline = 'We do All Kind of Mechanical & Electrical Work For All kind of Foreign & Domestic Cars';
    public string $street = '2218 Mt Holly Rd';
    public string $city = 'Burlington';
    public string $state = 'NJ';
    public string $zip = '08016';
    public string $phoneDisplay = '(609) 614-6365';
    public string $phoneTel = '+16096146365';
    public string $hoursNote = 'Call for hours';
    public string $latitude = '40.0715';
    public string $longitude = '-74.8360';

    /**
     * Nearby towns used in local SEO copy.
     *
     * @var list<string>
     */
    public array $areaServed = [
        'Burlington',
        'Mount Holly',
        'Willingboro',
        'Florence',
        'Westampton',
        'Bordentown',
        'Delran',
    ];

    /**
     * @return list<array{slug:string,name:string,short:string,icon:string,image:string,alt:string,title:string,description:string,h1:string,body:list<string>}>
     */
    public function services(): array
    {
        return [
            [
                'slug'        => 'oil-change',
                'name'        => 'Oil Change',
                'short'       => 'Conventional and synthetic oil changes to keep engines running clean in Burlington, NJ.',
                'icon'        => 'bi-droplet',
                'image'       => 'images/services/oil-change.png',
                'alt'         => 'Oil draining from a car on the lift during an oil change at A&N Auto Repair',
                'title'       => 'Oil Change in Burlington, NJ | A&N Auto Repair',
                'description' => 'Fast oil changes for foreign and domestic cars at A&N Auto Repair on Mt Holly Rd in Burlington, NJ. Call Asif Nawaz at (609) 614-6365.',
                'h1'          => 'Oil Change in Burlington, NJ',
                'body'        => [
                    'Regular oil changes are one of the simplest ways to protect your engine. At A&N Auto Repair on 2218 Mt Holly Rd in Burlington, NJ, Asif Nawaz and the shop handle conventional and synthetic oil changes for foreign and domestic cars.',
                    'Whether you commute through Willingboro, Mount Holly, or Florence Township, bringing the vehicle in on schedule helps prevent sludge, overheating, and costly engine wear. We inspect filters and fluids while the car is on the lift so you leave knowing the basics are covered.',
                    'Most visits include a fresh filter, a check of coolant and washer fluid, and a look at leaks around the pan and valve cover. If the car is due for more than oil, we will tell you before extra work starts.',
                    'Bring the make, model, and last service date if you have it. Call (609) 614-6365 to schedule an oil change. Hours vary — call ahead and we will get you in.',
                ],
            ],
            [
                'slug'        => 'tune-up',
                'name'        => 'Tune-Up',
                'short'       => 'Spark plugs, filters, and drivability checks so your car starts and runs the way it should.',
                'icon'        => 'bi-speedometer2',
                'image'       => 'images/services/tune-up.png',
                'alt'         => 'Mechanic performing a tune-up and spark plug service in the engine bay',
                'title'       => 'Car Tune-Up in Burlington, NJ | A&N Auto Repair',
                'description' => 'Engine tune-ups for foreign and domestic vehicles at A&N Auto Repair in Burlington Township. Spark plugs, filters, and drivability work.',
                'h1'          => 'Tune-Up Service in Burlington, NJ',
                'body'        => [
                    'A proper tune-up restores smooth idle, easier starts, and better fuel response. A&N Auto Repair in Burlington, NJ works on both foreign and domestic engines — from daily drivers to older cars that need extra attention.',
                    'Typical work includes spark plugs and wires or coils, air and cabin filters, and a check of sensors and idle quality. If the check engine light is on, we diagnose that first so the tune-up actually solves the problem.',
                    'Rough idle, hard starts in the morning, or a sudden drop in mileage are common reasons people stop at the Mt Holly Rd shop. We look at ignition and fuel together instead of swapping parts until the symptom goes away.',
                    'Drivers from Westampton, Bordentown, and Delran use the shop because mechanical and electrical issues are handled in one place. Call (609) 614-6365 to talk through symptoms before you come in.',
                ],
            ],
            [
                'slug'        => 'tires',
                'name'        => 'Tires',
                'short'       => 'Tire repair, rotation, and replacement so you stay safe on New Jersey roads.',
                'icon'        => 'bi-circle',
                'image'       => 'images/services/tires.png',
                'alt'         => 'Tire being mounted in the shop during tire service at A&N Auto Repair',
                'title'       => 'Tires in Burlington, NJ | A&N Auto Repair',
                'description' => 'Tire repair, rotation, and replacement at A&N Auto Repair, 2218 Mt Holly Rd, Burlington, NJ 08016. Foreign and domestic cars.',
                'h1'          => 'Tire Service in Burlington, NJ',
                'body'        => [
                    'Worn or damaged tires are a safety issue on Route 541 and the local Burlington County roads. A&N Auto Repair inspects tread, sidewalls, and inflation, then repairs, rotates, or replaces tires as needed.',
                    'We work on passenger cars and many light vehicles, foreign and domestic. If a puncture is repairable we will say so; if a tire is unsafe we will not patch it just to send you back on the road.',
                    'Rotations even out wear and can stretch the life of a good set. We also check for cupping or inner-edge wear that often points to alignment or suspension issues, not just a cheap tire.',
                    'Mount Holly, Willingboro, and Florence drivers can call (609) 614-6365 to ask about sizing and to schedule service. Call for hours before you visit 2218 Mt Holly Rd.',
                ],
            ],
            [
                'slug'        => 'electrical',
                'name'        => 'Electrical',
                'short'       => 'Batteries, alternators, starters, wiring, and electrical diagnostics for all makes.',
                'icon'        => 'bi-lightning-charge',
                'image'       => 'images/services/electrical.png',
                'alt'         => 'Battery and charging system being tested during auto electrical repair',
                'title'       => 'Auto Electrical Repair in Burlington, NJ | A&N Auto Repair',
                'description' => 'Car electrical repair in Burlington, NJ: batteries, starters, alternators, and wiring. A&N Auto Repair does mechanical and electrical work on foreign and domestic cars.',
                'h1'          => 'Auto Electrical Repair in Burlington, NJ',
                'body'        => [
                    'The shop tagline is literal: A&N Auto Repair does mechanical and electrical work. Weak batteries, no-start conditions, charging problems, and lighting issues are diagnosed at 2218 Mt Holly Rd in Burlington, NJ.',
                    'Asif Nawaz looks at starters, alternators, battery condition, and wiring instead of guessing at parts. That matters on both foreign and domestic cars, where electrical systems vary by make.',
                    'A clicking starter is not always a battery. We test voltage and load so you do not replace a good battery and still get stranded in the parking lot. Parasitic drains and bad grounds get checked when the symptoms point that way.',
                    'If the car clicks, dies while driving, or the lights dim, call (609) 614-6365. Nearby towns we regularly see include Mount Holly, Westampton, and Bordentown.',
                ],
            ],
            [
                'slug'        => 'brakes',
                'name'        => 'Brakes',
                'short'       => 'Pads, rotors, and brake hydraulics so you can stop with confidence.',
                'icon'        => 'bi-disc',
                'image'       => 'images/services/brakes.png',
                'alt'         => 'Brake rotor and caliper inspection with the wheel off at A&N Auto Repair',
                'title'       => 'Brake Repair in Burlington, NJ | A&N Auto Repair',
                'description' => 'Brake pads, rotors, and hydraulic service at A&N Auto Repair in Burlington, NJ. Call (609) 614-6365 for foreign and domestic brake work.',
                'h1'          => 'Brake Repair in Burlington, NJ',
                'body'        => [
                    'Squealing, grinding, or a soft pedal should not wait. A&N Auto Repair inspects pads, rotors, calipers, and brake fluid on foreign and domestic vehicles at the Burlington shop on Mt Holly Rd.',
                    'We replace what is worn and explain what can wait. That keeps costs honest and keeps the car safe for commuting around Willingboro, Delran, and Florence.',
                    'A pulling pedal, a longer stop, or a dashboard brake warning all get a look at the whole system — not just the noisiest corner. Hardware and fluid condition matter as much as pad thickness.',
                    'Call (609) 614-6365 to describe the noise or warning light. Hours are by phone — call ahead before you drive in.',
                ],
            ],
            [
                'slug'        => 'shocks-suspension',
                'name'        => 'Shocks & Suspension',
                'short'       => 'Shocks, struts, and suspension repairs for a smoother, safer ride.',
                'icon'        => 'bi-arrows-collapse',
                'image'       => 'images/services/shocks-suspension.png',
                'alt'         => 'Car on a lift showing strut and suspension components during repair',
                'title'       => 'Shocks & Suspension in Burlington, NJ | A&N Auto Repair',
                'description' => 'Shocks, struts, and suspension repair at A&N Auto Repair, Burlington, NJ. Foreign and domestic cars. Call Asif Nawaz at (609) 614-6365.',
                'h1'          => 'Shocks and Suspension Repair in Burlington, NJ',
                'body'        => [
                    'A bouncing ride, nose dive when you brake, or uneven tire wear often points to shocks, struts, or other suspension parts. A&N Auto Repair diagnoses and repairs that work for foreign and domestic cars.',
                    'The shop on 2218 Mt Holly Rd in Burlington, NJ is set up for mechanical jobs like this — not just quick lube. Asif Nawaz looks at bushings, links, and related components so the repair lasts.',
                    'Clunks over speed bumps, a crooked steering wheel, or tires wearing on the inner edge are all reasons to have the suspension checked. Fixing the worn part first often saves you from buying tires twice.',
                    'If you drive in from Mount Holly, Westampton, or Bordentown and the car feels loose over bumps, call (609) 614-6365. Call for hours before you visit.',
                ],
            ],
        ];
    }

    public function serviceBySlug(string $slug): ?array
    {
        foreach ($this->services() as $service) {
            if ($service['slug'] === $slug) {
                return $service;
            }
        }

        return null;
    }

    public function fullAddress(): string
    {
        return $this->street . ', ' . $this->city . ', ' . $this->state . ' ' . $this->zip;
    }
}
