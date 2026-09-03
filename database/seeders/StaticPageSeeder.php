<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use App\Models\AccessoriesPage;
use App\Models\AdvantagesPage;
use App\Models\ApplicationsHubPage;
use App\Models\ContactPage;
use App\Models\CustomHosePage;
use App\Models\HomePage;
use App\Models\PrelubePage;
use App\Models\SystemsPage;
use Illuminate\Database\Seeder;

class StaticPageSeeder extends Seeder
{
    /**
     * Seeded verbatim from index.html, about.html, contact.html, systems.html,
     * our-advantages.html, applications.html (intro), prelube.html, staff.html,
     * and custom-hose.html.
     */
    public function run(): void
    {
        HomePage::current()->update([
            'hero_eyebrow' => 'Precision Lubrication Systems',
            'hero_title' => 'Automatic Lubrication Systems Built for Better Performance',
            'hero_text' => 'MasterLube automatic lubrication systems help deliver consistent lubrication, reduce maintenance requirements, and keep equipment operating efficiently.',
            'hero_image' => 'site/hero-product.jpg',
            'feature_grid' => [
                ['icon' => 'bi-gear', 'title' => 'Consistent Lubrication', 'text' => 'Delivers the right amount of lubricant every time.'],
                ['icon' => 'bi-gear', 'title' => 'Reduced Maintenance', 'text' => 'Minimize downtime and lower maintenance costs.'],
                ['icon' => 'bi-clock-history', 'title' => 'Extended Equipment Life', 'text' => 'Proper lubrication reduces wear and extends life.'],
                ['icon' => 'bi-lightning-charge', 'title' => 'Easy Installation', 'text' => 'Designed for quick and hassle-free installation.'],
            ],
            'features_title' => 'Reliable Lubrication. Smarter Maintenance.',
            'systems_grid' => [
                ['image' => 'site/system-automatic.jpg', 'number' => '01', 'title' => 'Automatic Lubrication Systems', 'text' => 'Reliable lubrication delivered automatically where and when it is needed.'],
                ['image' => 'site/system-single-line.jpg', 'number' => '02', 'title' => 'Single-Line Systems', 'text' => 'A practical solution for maintaining consistent lubrication across equipment.'],
                ['image' => 'site/system-multi-point.jpg', 'number' => '03', 'title' => 'Multi-Point Lubrication', 'text' => 'Designed to service multiple lubrication points efficiently.'],
                ['image' => 'site/system-custom.jpg', 'number' => '04', 'title' => 'Custom Solutions', 'text' => 'Flexible solutions tailored to specific equipment requirements.'],
            ],
            'systems_eyebrow' => 'Our Systems',
            'systems_title' => 'Lubrication Solutions Designed Around Your Equipment',
            'systems_text' => "MasterLube systems are built to deliver automatic lubrication where and when it's needed, keeping your equipment running smoother and longer.",
            'applications_eyebrow' => 'Applications',
            'applications_title' => 'Built for a Wide Range of Equipment',
            'applications_grid' => [
                ['image' => 'site/app-construction.jpg', 'label' => "Construction\nEquipment"],
                ['image' => 'site/app-industrial.jpg', 'label' => "Agricultural\nEquipment"],
                ['image' => 'site/app-industrial.jpg', 'label' => "Industrial\nMachinery"],
                ['image' => 'site/app-mining.jpg', 'label' => "Mining\nEquipment"],
                ['image' => 'site/app-material-handling.jpg', 'label' => "Material\nHandling"],
                ['image' => 'site/app-transportation.jpg', 'label' => 'Transportation'],
                ['image' => 'site/app-municipal.jpg', 'label' => "Municipal\nEquipment"],
                ['image' => 'site/app-specialty.jpg', 'label' => "Specialty\nEquipment"],
            ],
            'why_choose_eyebrow' => 'Our Advantages',
            'why_choose_title' => 'Why Choose MasterLube?',
            'why_choose_body' => null,
            'why_choose_grid' => [
                ['icon' => 'bi-lightning-charge', 'title' => 'Automatic Lubrication', 'text' => 'Deliver the right amount of lubricant at the right time.'],
                ['icon' => 'bi-sliders', 'title' => 'Less Maintenance', 'text' => 'Reduce manual lubrication requirements and maintenance effort.'],
                ['icon' => 'bi-arrow-repeat', 'title' => 'Improved Equipment Life', 'text' => 'Proper lubrication helps minimize wear and supports longer equipment life.'],
                ['icon' => 'bi-flask', 'title' => 'Built for Real-World Equipment', 'text' => 'Solutions designed for demanding operating environments.'],
            ],
            'news_eyebrow' => "What's New",
            'news_title' => 'The Latest from MasterLube',
            'news_cta_title' => 'Need a Custom Hose Solution?',
            'news_cta_text' => 'Find the right hose solution for your lubrication system and equipment requirements.',
            'faq_eyebrow' => 'Questions',
            'faq_title' => 'Have Questions About MasterLube?',
            'car_clubs_eyebrow' => 'Car Clubs',
            'car_clubs_title' => 'MasterLube for Car Clubs & Enthusiasts',
            'car_clubs_text' => 'Discover lubrication solutions designed to help keep vehicles and specialty equipment operating smoothly.',
            'car_clubs_image' => 'site/car-clubs-jaguar.jpg',
            'testimonials_eyebrow' => 'Customer Stories',
            'testimonials_title' => 'Trusted by Equipment Owners & Professionals',
            'contact_heading' => "Let's Find the Right Lubrication Solution",
            'contact_text' => 'Have a question about a MasterLube system or need help selecting the right solution? Get in touch with our team.',
            'meta_title' => 'MasterLube - Automatic Lubrication Systems',
            'meta_description' => 'MasterLube automatic lubrication systems help deliver consistent lubrication, reduce maintenance requirements, and keep equipment operating efficiently.',
        ]);

        AboutPage::current()->update([
            'story_body' => "MasterLube started as a small machine shop solving a simple problem: equipment failing early because lubrication was inconsistent or forgotten entirely. Today, our automatic lubrication systems are trusted across construction, mining, agriculture, transportation, and specialty applications worldwide.\n\nWe design every system to be reliable in the field, easy to install, and simple to maintain — because the best lubrication system is one that just works.",
            'drives_us_grid' => [
                ['icon' => 'bi-tools', 'title' => 'Built to Last', 'text' => 'Engineered for demanding, real-world operating environments.'],
                ['icon' => 'bi-people', 'title' => 'Customer First', 'text' => 'Our team supports every install, from first question to final setup.'],
                ['icon' => 'bi-graph-up-arrow', 'title' => 'Always Improving', 'text' => 'We continually refine our systems based on field feedback.'],
                ['icon' => 'bi-shield-check', 'title' => 'Reliable Support', 'text' => 'Responsive service and readily available replacement parts.'],
            ],
            'meta_title' => 'About Us - MasterLube',
            'meta_description' => 'Learn about MasterLube and our automatic lubrication systems, trusted across construction, mining, agriculture, and specialty applications worldwide.',
        ]);

        ContactPage::current()->update([
            'shipping_address' => "MasterLube Industries\n218 W. Railroad\nFort Morgan, CO 80701",
            'ordering_phone' => '1.970.867.5154 Phone Calls or Send us a Text',
            'ordering_email' => 'MasterLube.net@gmail.com',
            'tech_phone' => '1.970.867.5154 Phone Calls or Send us a Text',
            'tech_email' => 'Kerry.MasterLube.net@gmail.com',
            'dealer_phone' => '1.970.867.5154 Phone Calls or Send us a Text',
            'dealer_email' => 'dealerinfo@masterlube.net',
            'intro_text' => 'We are updating our website, Please call for current pricing and Sales information. We are always happy to help you with any questions you may have regarding our products, or the installation of our Kits. When contacting us, please BE SURE to include your telephone number, your engine size, your application- Racing, Street Rod, Marine, Everyday driver, basically any information so we can help you make the right choice for your application.',
            'meta_title' => 'Contact Us - MasterLube',
            'meta_description' => 'Contact MasterLube for pricing, sales information, and help choosing the right automatic lubrication system for your application.',
        ]);

        SystemsPage::current()->update([
            'title' => 'Built for a Wide Range of Equipment',
            'image' => 'site/54e7d62c-3c4c-494d-8a7d-166a3c33d10b.png',
            'description' => "The exclusive removable plug makes adding oil, or checking the System's oil level a simple process. The plug has an O-ring seal, and a standard air valve assembly for easy pressurization of the system. It also allows the release of pressure before removing the plug.\n\nAluminum alloy cylinder is available in different capacities and comes powder coated Black, Brushed Aluminum, or as an optional Highly Polished Aluminum. Extremely strong and light, the total system weight is only between 2 to 4 pounds.\n\nCommercial quality, rubber-lined Steel or optional Stainless Steel band clamps included with the system, allowing for easy, solid mounting.\n\nAll units are supplied with a gauge that registers pressure in the cylinder. An optional stainless steel liquid filled gauge is also available.\n\nA high quality steel braided Teflon® hose is included for connecting the system to your engine.\n\nThe heart of the Patented system is an innovative, commercial quality electronic valve with only one moving part. It will last millions of cycles and is so reliable, it carries a lifetime guarantee. It has the ability to retain pressure in the cylinder for years and is available in different flow rates for different applications.",
            'includes_list' => [
                'Standard Black Paint or Brushed Aluminum',
                'Electronic Valve',
                'Aluminum Cylinder',
                'Steel Band Clamps',
                'Gauge',
                "Steel Braided Teflon® Hose",
                'Installation Instructions',
                '<strong>Lifetime Guarantee</strong>',
            ],
            'options_list' => [
                'High Flow Performance Valve',
                'Liquid-filled Gauges',
                '3-position Switches',
                'Polished Aluminum Cylinder',
                'Additional Hose Lengths',
                'Stainless Steel Clamps',
            ],
            'kits' => [
                [
                    'label' => 'MasterLube Electronic Kits',
                    'title' => 'MasterLube Electronic Kits',
                    'text' => 'All MasterLube Electronic Kits come with high flow electronic solenoid valves (Aviation Quality), Lightweight Aluminum Alloy Cylinders which come in various sizes and finishes, Stainless Steel Braided Teflon Hose with Adaptor Fittings, Commercial Heavy Duty Plated or Stainless Steel Band Clamps, a standard gauge or a Stainless Steel Liquid Filled Gauge, a custom 3-position switch, Lifetime Warranty and Installation Instructions.',
                    'image' => 'site/mleleckit (1).jpg',
                    'extra_images' => [],
                    'contact_email' => null,
                    'contact_phone' => null,
                ],
                [
                    'label' => 'MasterLube Marine Kits',
                    'title' => 'MasterLube Marine Kits',
                    'text' => 'All MasterLube Marine Kits come with high flow electronic solenoid valves (Aviation Quality), Lightweight Aluminum Alloy Cylinders, Stainless Steel Braided Teflon Hose with Adaptor Fittings, Stainless Steel Band Clamps, a Stainless Steel Liquid Filled Gauge, a custom 3-position switch, Lifetime Warranty and Installation Instructions',
                    'image' => 'site/mleleckit.jpg',
                    'extra_images' => [],
                    'contact_email' => null,
                    'contact_phone' => null,
                ],
                [
                    'label' => 'TurboLube Mechanical Kits',
                    'title' => 'TurboLube Mechanical Kits',
                    'text' => 'The TurboLube Mechanical Accumulator & Prelubrication System Kits features the unique Non-Electric Mechanical TurboLube Valve System with an Automatic Level Control to exactly meter oil into your engine and the amount returned to the TurboLube System when you start your engine. They should be permanently mounted if used as an Accumulator / Prelubrication System. If used as just a PreLubrication System it does not need to be permanently mounted, so you can Prelubricate either one or many engines with a single TurboLube system. Although this method is not as convenient as the Electronic or Quick Coupler System also available, this is for applications that require the greater flow characteristics that these systems offer.',
                    'image' => 'site/tlmechkit.jpg',
                    'extra_images' => [],
                    'contact_email' => null,
                    'contact_phone' => null,
                ],
                [
                    'label' => 'TurboLube "Quick" Kit',
                    'title' => 'TurboLube "Quick" Kit',
                    'text' => 'The TurboLube Mechanical Quick Prelubrication System Kits feature the unique Non-Electric Mechanical TurboLube Valve System with an Automatic Level Control to exactly meter oil into your engine and the amount returned to the TurboLube System when you start your engine. They are not designed to be permanently mounted, use an optional "TurboLube Bag Holder". By using a unique "Zero Loss" nipple & coupler assembly, and purchasing extra nipple assemblies for each vehicle you can Prelubricate many vehicles with one TurboLube system.',
                    'image' => 'site/tlquickkit.jpg',
                    'extra_images' => [],
                    'contact_email' => null,
                    'contact_phone' => null,
                ],
                [
                    'label' => 'Commercial Kits',
                    'title' => 'Commercial Kits',
                    'text' => 'We are currently developing this page for your Commercial application. If you have any questions about how the MasterLube System is used on your commercial application, please contact us, either by email or by telephone.',
                    'image' => 'site/connections.jpg',
                    'extra_images' => ['site/sideview.jpg', 'site/crossover.jpg'],
                    'contact_email' => 'info@masterlube.net',
                    'contact_phone' => '970.867.5154',
                ],
            ],
            'meta_title' => 'Systems - MasterLube',
            'meta_description' => 'Explore the MasterLube automatic lubrication system: included components, materials, and available options and upgrades.',
        ]);

        AdvantagesPage::current()->update([
            'banner_eyebrow' => 'Our Advantages',
            'banner_title' => 'Why Choose MasterLube?',
            'intro_body' => 'Reliable, low-maintenance lubrication systems backed by decades of engineering and real-world field experience.',
            'features_heading' => 'Reliable Lubrication. Smarter Maintenance.',
            'feature_grid' => [
                ['icon' => 'bi-flask', 'title' => 'Consistent Lubrication', 'text' => 'Delivers the right amount of lubricant every time.'],
                ['icon' => 'bi-gear', 'title' => 'Reduced Maintenance', 'text' => 'Minimize downtime and lower maintenance costs.'],
                ['icon' => 'bi-clock-history', 'title' => 'Extended Equipment Life', 'text' => 'Proper lubrication reduces wear and extends life.'],
                ['icon' => 'bi-lightning-charge', 'title' => 'Easy Installation', 'text' => 'Designed for quick and hassle-free installation.'],
            ],
            'testimonials_eyebrow' => 'Customer Stories',
            'testimonials_title' => 'Trusted by Equipment Owners & Professionals',
            'meta_title' => 'Our Advantages - MasterLube',
            'meta_description' => 'Why choose MasterLube automatic lubrication systems — reliability, reduced maintenance, and equipment life backed by real-world results.',
        ]);

        ApplicationsHubPage::current()->update([
            'banner_eyebrow' => 'Applications',
            'banner_title' => 'Built for a Wide Range of Equipment',
            'banner_text' => 'MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.',
            'intro_title' => 'Applications',
            'intro_body' => null,
            'meta_title' => 'Applications - MasterLube',
            'meta_description' => 'MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.',
        ]);

        AccessoriesPage::current()->update([
            'banner_eyebrow' => 'Staff',
            'banner_title' => 'Built for a Wide Range of Equipment',
            'banner_text' => 'MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.',
            'meta_title' => 'Staff - MasterLube',
            'meta_description' => null,
        ]);

        CustomHosePage::current()->update([
            'banner_eyebrow' => 'Questions',
            'banner_title' => 'Have Questions?',
            'banner_text' => 'Answers to the questions we hear most from equipment owners and operators.',
            'other_stuff_heading' => 'Other New Stuff',
            'meta_title' => 'Custom Hose - MasterLube',
            'meta_description' => null,
        ]);

        PrelubePage::current()->update([
            'caption' => 'The TurboLube "Quick" System installed on a Bourget motorcycle:',
            'hero_image' => 'site/bikespectators.jpg',
            'benefit_1_icon' => 'bi-shield-check',
            'benefit_1_text' => 'Helps protect critical engine components.',
            'benefit_2_icon' => 'bi-speedometer2',
            'benefit_2_text' => 'Consistent oil supply during demanding conditions.',
            'gallery_image_1' => 'site/bikeconnection (1).jpg',
            'gallery_image_2' => 'site/bikecylinder (1).jpg',
            'meta_title' => 'Pre Lubrication System - MasterLube',
            'meta_description' => 'The MasterLube Pre-Lubrication Tool and TurboLube "Quick" System.',
        ]);
    }
}
