<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Seeded verbatim from new-stuff.html's 6 cards. Source has no publish dates
     * (the "Read More" links are all href="#" placeholders) — dates below are
     * synthetic, spaced a week apart, purely to give the list a sensible order.
     */
    public function run(): void
    {
        $rows = [
            ['title' => 'Introducing Our New Progressive Lubricator', 'badge' => 'New Products', 'excerpt' => 'Built for reliability and performance in the toughest conditions.', 'image' => 'news-progressive-lubricator.jpg'],
            ['title' => 'System Upgrade for Better Efficiency', 'badge' => 'Product Improvements', 'excerpt' => 'Enhanced features for improved performance and monitoring.', 'image' => 'news-system-upgrade.jpg'],
            ['title' => 'Lubrication Best Practices for Longer Equipment Life', 'badge' => 'Industry Updates', 'excerpt' => 'Expert tips and industry insights to keep your equipment running longer.', 'image' => 'news-best-practices.jpg'],
            ['title' => 'How We Built a Custom System for a Fleet Client', 'badge' => 'Custom Solutions', 'excerpt' => 'A behind-the-scenes look at our custom engineering process.', 'image' => 'system-custom.jpg'],
            ['title' => 'MasterLube Joins Regional Car Club Meetups', 'badge' => 'Car Clubs', 'excerpt' => 'Meeting enthusiasts and sharing lubrication tips for classic vehicles.', 'image' => 'car-clubs-jaguar.jpg'],
            ['title' => 'Preparing Industrial Equipment for Heavy Season', 'badge' => 'Industry Updates', 'excerpt' => 'A maintenance checklist for teams heading into peak production.', 'image' => 'app-industrial.jpg'],
        ];

        foreach ($rows as $i => $row) {
            News::updateOrCreate(
                ['slug' => Str::slug($row['title'])],
                [
                    'title' => $row['title'],
                    'badge' => $row['badge'],
                    'excerpt' => $row['excerpt'],
                    'cover_image' => 'site/'.$row['image'],
                    'published_at' => now()->subWeeks($i),
                    'status' => 'published',
                ]
            );
        }
    }
}
