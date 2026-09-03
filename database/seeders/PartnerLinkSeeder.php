<?php

namespace Database\Seeders;

use App\Models\PartnerLink;
use Illuminate\Database\Seeder;

class PartnerLinkSeeder extends Seeder
{
    /**
     * link.html's 10 cards carry no real label text in the source (only leftover
     * alt="Racing"/"Marine"/etc. copy-pasted from the Applications template, not
     * actual partner names). Labels below are inferred from each card's image
     * filename/destination domain instead of propagating that mismatched alt text.
     */
    public function run(): void
    {
        $rows = [
            ['label' => 'Two Guys Garage', 'image' => 'tgg_speed.jpg', 'url' => 'https://twoguysgarage.com/'],
            ['label' => 'Powerboat Magazine', 'image' => 'powerboat.gif', 'url' => 'https://www.powerboatmag.com/'],
            ['label' => 'Eastwood', 'image' => 'eastwood.gif', 'url' => 'http://www.eastwoodco.com/'],
            ['label' => 'Classic Industries', 'image' => 'classicindustries (1).gif', 'url' => 'https://www.classicindustries.com/'],
            ['label' => 'Original Parts Group', 'image' => 'originalparts.gif', 'url' => 'https://www.opgi.com/'],
            ['label' => 'Goodguys Rod & Custom Association', 'image' => 'goodguys.gif', 'url' => 'https://www.good-guys.com/'],
            ['label' => 'NHRA', 'image' => 'nhra.gif', 'url' => 'https://www.nhra.com/nhra'],
            ['label' => 'SearchHounds', 'image' => 'hotboat.jpg', 'url' => 'https://www.searchhounds.com/'],
            ['label' => 'MadVet', 'image' => 'midamerica.gif', 'url' => 'http://madvet.com/'],
            ['label' => 'FocusMidgets', 'image' => 'scream.gif', 'url' => 'http://focusmidgets.com/'],
        ];

        foreach ($rows as $i => $row) {
            PartnerLink::updateOrCreate(
                ['url' => $row['url']],
                [
                    'label' => $row['label'],
                    'image' => 'site/'.$row['image'],
                    'order' => $i,
                    'status' => 'published',
                ]
            );
        }
    }
}
