<?php

namespace Database\Seeders;

use App\Models\Dealer;
use Illuminate\Database\Seeder;

class DealerSeeder extends Seeder
{
    /**
     * dealers.html has exactly one dealer card in the source (a second slot was
     * planned in an HTML comment but never filled in). The card itself has no
     * visible name text — "CP Performance" is inferred from the linked domain.
     */
    public function run(): void
    {
        Dealer::updateOrCreate(
            ['url' => 'https://www.cpperformance.com/'],
            [
                'name' => 'CP Performance',
                'image' => 'site/cp.gif',
                'order' => 0,
                'status' => 'published',
            ]
        );
    }
}
