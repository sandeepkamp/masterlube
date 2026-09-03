<?php

namespace Database\Seeders;

use App\Models\Magazine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MagazineSeeder extends Seeder
{
    /**
     * Seeded verbatim from magazines.html's 5 cards. Each modal's own title
     * ("Magazine 01 - Pages" etc.) is a copy-paste leftover in the source, so
     * the card title is used as the real title instead.
     */
    public function run(): void
    {
        $rows = [
            ['title' => 'Powerboat Installation', 'cover_image' => 'powerboat (1).gif', 'pages' => ['powerboat1.jpg', 'powerboat2.jpg', 'powerboat3.jpg', 'powerboat4.jpg']],
            ['title' => 'Hot Boat Installation', 'cover_image' => 'hotboat.gif', 'pages' => ['hotboat1 (1).jpg', 'hotboat2.jpg', 'hotboat3.jpg', 'hotboat4.jpg']],
            ['title' => 'Vintage Oval Racing Article', 'cover_image' => 'vintage.jpg', 'pages' => ['vintage1.jpg']],
            ['title' => 'Powerboat Do It Yourself', 'cover_image' => 'diy.jpg', 'pages' => ['diy1.jpg', 'diy2.jpg', 'diy3.jpg', 'diy4.jpg', 'diy5.jpg', 'diy6.jpg']],
            ['title' => 'Drive Installation Article', 'cover_image' => 'drive.gif', 'pages' => ['drive1.jpg', 'drive2.jpg', 'drive3.jpg', 'drive4.jpg']],
        ];

        foreach ($rows as $i => $row) {
            $magazine = Magazine::updateOrCreate(
                ['slug' => Str::slug($row['title'])],
                [
                    'title' => $row['title'],
                    'cover_image' => 'site/'.$row['cover_image'],
                    'order' => $i,
                    'status' => 'published',
                ]
            );

            $magazine->pages()->delete();
            foreach ($row['pages'] as $j => $image) {
                $magazine->pages()->create(['image' => 'site/'.$image, 'order' => $j]);
            }
        }
    }
}
