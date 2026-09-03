<?php

namespace Database\Seeders;

use App\Models\CarClubEvent;
use Illuminate\Database\Seeder;

class CarClubEventSeeder extends Seeder
{
    /**
     * Seeded verbatim from carclubs.html's 8 accordion tiles. Only "Saugus
     * Speedway" has any description text in the source (generic placeholder
     * copy, kept as-is); "Submit Application"'s broken/empty image reference
     * was dropped rather than inventing a filename.
     */
    public function run(): void
    {
        $rows = [
            ['title' => "Hasty's Car Country", 'cover_image' => 'hastys.gif', 'description' => null, 'photos' => ['hastys0.jpg', 'hastys1.jpg', 'hastys2.jpg']],
            ['title' => 'Balloon Stampede Car & Cycle Show', 'cover_image' => 'balloon.jpg', 'description' => null, 'photos' => ['balloon1.jpg', 'balloon2.jpg']],
            ['title' => 'City Lights Street Rodders', 'cover_image' => 'lights.jpg', 'description' => null, 'photos' => ['lights0.jpg', 'lights1.jpg']],
            ['title' => 'Flashback In Seaside', 'cover_image' => 'seaside.jpg', 'description' => null, 'photos' => ['seaside0.jpg', 'seaside1.jpg', 'seaside2.jpg']],
            ['title' => 'Saugus Speedway', 'cover_image' => 'saugus.jpg', 'description' => "Classic Applications\n\nExplore our classic application products.", 'photos' => ['saugus0.jpg']],
            ['title' => 'Submit Application', 'cover_image' => 'submit.jpg', 'description' => null, 'photos' => []],
            ['title' => 'Hot Rod Sunday', 'cover_image' => 'calvary (1).jpg', 'description' => null, 'photos' => ['calvary0.jpg', 'calvary1.jpg', 'calvary2.jpg', 'calvary3.jpg', 'calvary4.jpg']],
            // Source references "skunk04.jpg", which doesn't exist in the design assets — the .gif is the real file.
            ['title' => 'Skunk River Cruzers', 'cover_image' => 'skunk.jpg', 'description' => null, 'photos' => ['skunk04l.jpg', 'skunk04.gif', 'skunk05l.jpg']],
        ];

        foreach ($rows as $i => $row) {
            $event = CarClubEvent::updateOrCreate(
                ['title' => $row['title']],
                [
                    'cover_image' => 'site/'.$row['cover_image'],
                    'description' => $row['description'],
                    'order' => $i,
                    'status' => 'published',
                ]
            );

            $event->photos()->delete();
            foreach ($row['photos'] as $j => $image) {
                $event->photos()->create(['image' => 'site/'.$image, 'order' => $j]);
            }
        }
    }
}
