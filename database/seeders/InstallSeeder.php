<?php

namespace Database\Seeders;

use App\Models\Install;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class InstallSeeder extends Seeder
{
    /**
     * Seeded verbatim from installs.html. The top "Customer Pictures, Applications
     * and Feedback" block (4 photos + 1 quote) is modeled as its own Install record
     * with is_featured photos, plus the quote reuses the Testimonials module rather
     * than a separate column, per the approved plan.
     */
    public function run(): void
    {
        Testimonial::updateOrCreate(
            ['author_name' => 'W. Gowsell'],
            [
                'quote' => 'You people truly have come up with a winner. This thing is simple, effective and a true bolt on modification that is worth its weight in gold. A REAL bearing saver in my books and it absolutely is the best insurance to low oil pressure, especially for cars equipped with an automatic transmission. It has worked flawlessly since day one and because it has very few moving parts I can see why. Install it and leave it to do the job. Great Product!! You got my vote!',
                'author_role' => null,
                'is_featured' => false,
                'order' => 100,
                'status' => 'published',
            ]
        );

        $rows = [
            ['title' => 'Customer Feedback', 'caption' => null, 'photos' => ['yellow3a.jpg', 'yellow4a.jpg', 'yellowa.jpg', 'yellow5.jpg'], 'featured' => true],
            ['title' => "'40 Willy", 'caption' => null, 'photos' => ['willy_lrg (1).jpg', '40willy_eng1.jpg', '40willy_eng2.jpg']],
            ['title' => "'58 Ferarri", 'caption' => null, 'photos' => ['58ferrari (2).jpg', '58ferrari_eng1 (1).jpg']],
            ['title' => 'John Deere Tractor', 'caption' => null, 'photos' => ['deere3a (1).jpg', 'deereside.gif', 'deere4.jpg']],
            [
                'title' => 'Marine Engine',
                'caption' => null,
                'photos' => ['blownmotor1 (1).jpg', 'blockshot1 (1).jpg', 'blockshot2 (1).jpg'],
                'photo_captions' => [
                    'blownmotor1 (1).jpg' => 'This view shows the entire engine. At the left is the MasterLube System mounted, and at right is the connection of the system to the block.',
                    'blockshot1 (1).jpg' => 'Image showing the MasterLube System installed at the left and the steel braided hose connection at right.',
                    'blockshot2 (1).jpg' => 'Same engine, with a closeup view of the steel braided hose connected to the block.',
                ],
            ],
            ['title' => 'Vortec Engine', 'caption' => null, 'photos' => ['silverado_eng1 (1).jpg', 'silverado_eng2.jpg']],
            ['title' => 'TCP-Racing', 'caption' => null, 'photos' => ['tcpracecar.jpg', 'tcpracecar1 (1).jpg', 'tcpracecar2.jpg']],
        ];

        foreach ($rows as $i => $row) {
            $install = Install::updateOrCreate(
                ['title' => $row['title']],
                ['caption' => $row['caption'], 'order' => $i, 'status' => 'published']
            );

            $install->photos()->delete();
            foreach ($row['photos'] as $j => $image) {
                $install->photos()->create([
                    'image' => 'site/'.$image,
                    'caption' => $row['photo_captions'][$image] ?? null,
                    'is_featured' => $row['featured'] ?? false,
                    'order' => $j,
                ]);
            }
        }
    }
}
