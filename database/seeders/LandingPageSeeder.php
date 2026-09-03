<?php

namespace Database\Seeders;

use App\Models\LandingPage;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    /**
     * Seeded verbatim from the root html-design/index.html landing page.
     */
    public function run(): void
    {
        LandingPage::current()->update([
            'hero_title' => "Industrial\nLubrication Systems",
            'hero_text' => 'Reliable lubrication solutions engineered for demanding industrial applications. Protect machinery, reduce maintenance overhead, and optimize operational uptime.',
            'hero_cta_primary_text' => 'Explore Products',
            'hero_cta_secondary_text' => 'View Applications',
            'stat_1_number' => '10,000+',
            'stat_1_label' => 'PSI RATED',
            'stat_1_caption' => 'For heavy-duty pressure systems',
            'stat_2_number' => '99.9%',
            'stat_2_label' => 'RELIABILITY',
            'stat_2_caption' => 'Engineered uptime architecture',

            'showcase_title' => 'MASTER-LUBE',
            'showcase_tagline' => 'The Patented Pre-Lubrication & Oil pressure Accumulator Experts',
            'showcase_cta_text' => 'Call or email today for pricing on your specific application',
            'showcase_grid' => [
                ['label' => 'Classic', 'sublabel' => null, 'image' => 'landing/classic.png', 'industry_slug' => 'classic'],
                ['label' => 'Street Rod Coupé', 'sublabel' => null, 'image' => 'landing/street-rod-coupe.png', 'industry_slug' => 'streetrod'],
                ['label' => 'Exotic Dodge Viper', 'sublabel' => null, 'image' => 'landing/exotic-dodge-viper.png', 'industry_slug' => 'exotic'],
                ['label' => 'Recreational/Diesel', 'sublabel' => null, 'image' => 'landing/recreational-diesel.png', 'industry_slug' => 'towvehicles'],
                ['label' => 'Marine', 'sublabel' => null, 'image' => 'landing/marine.png', 'industry_slug' => 'marin-application'],
                ['label' => 'Commercial', 'sublabel' => 'John Deere Tractor', 'image' => 'landing/commercial-tractor.png', 'industry_slug' => 'commercial'],
                ['label' => 'Racing', 'sublabel' => null, 'image' => 'landing/racing.png', 'industry_slug' => 'racing'],
                ['label' => 'Motorcycle', 'sublabel' => 'Harley-Davidson', 'image' => 'landing/motorcycle.png', 'industry_slug' => 'motorcycle'],
            ],

            'solutions_eyebrow' => 'PRECISION HARDWARE',
            'solutions_title' => 'Engineered Lubrication Solutions',
            'solutions_subtitle' => 'Explore our comprehensive range of high-performance lubrication hardware designed for minimal wear and tear.',
            'solutions_grid' => [
                ['image' => 'landing/category-image.png', 'badge' => 'SYSTEM CLASS: SYS-MAX', 'title' => 'Product Systems', 'text' => 'Comprehensive automated lubrication assemblies featuring central controllers, main pumps, and automated monitors configured for entire manufacturing lines.'],
                ['image' => 'landing/category-image (1).png', 'badge' => 'MAX PSI: 15,000', 'title' => 'Product Components', 'text' => 'Robust replacement injectors, progressive distributors, premium heavy-pressure valves, and hydraulic connectors built to withstand extreme environmental parameters.'],
                ['image' => 'landing/category-image (2).png', 'badge' => 'COMPATIBILITY: IP67', 'title' => 'Product Accessories', 'text' => 'Diagnostic controllers, smart reservoir sensors, automatic flow switches, and maintenance kits designed to streamline system integrity.'],
            ],

            'testimonials_eyebrow' => 'CUSTOMER STORIES',
            'testimonials_title' => "Trusted by Equipment Owners &\nProfessionals",
            'trust_label' => 'OPERATIONAL TRUST ASSOCIATES',
            'trust_pills' => ['LOGO MINING', 'LOGO MINING', 'LOGO MINING', 'LOGO MINING', 'LOGO MINING'],

            'cta_eyebrow' => 'SYSTEM SPECIFICATION AUDIT',
            'cta_title' => "Optimize Your Automated\nLubrication Today",
            'cta_text' => 'Connect with our senior technical engineering leads to draft an automated progressive layout optimized for your specific mechanical configuration.',
            'cta_primary_text' => 'Request Technical Consultation',
            'cta_secondary_text' => 'System Configurator',

            'footer_text' => 'Engineered precision fluid systems designed for heavy industry, marine environments, and manufacturing automation.',
            'footer_badges' => ['ISO 9001', 'CE COMPLIANT', 'OHSAS 18001'],
            'copyright_text' => '© 2026 MasterLube Systems & Co. All rights reserved.',

            'meta_title' => 'MasterLube - Industrial Lubrication Systems',
            'meta_description' => 'Reliable lubrication solutions engineered for demanding industrial applications. Protect machinery, reduce maintenance overhead, and optimize operational uptime.',
        ]);
    }
}
