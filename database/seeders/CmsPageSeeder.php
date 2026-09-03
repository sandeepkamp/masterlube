<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Seeder;

class CmsPageSeeder extends Seeder
{
    /**
     * None of these four pages have real content in the source design (Privacy
     * Policy/Terms were dead "#" footer links; Become a Dealer / Contact
     * MasterLube Industries are empty "" nav dropdown links) — created here as
     * empty/placeholder pages an admin can develop later, matching the site's
     * current undeveloped state. The footer now links Privacy Policy/Terms to
     * these CMS pages; Become a Dealer / Contact MasterLube Industries remain
     * unwired.
     */
    public function run(): void
    {
        $rows = [
            ['slug' => 'privacy-policy', 'title' => 'Privacy Policy'],
            ['slug' => 'terms', 'title' => 'Terms'],
            ['slug' => 'become-a-dealer', 'title' => 'Become a Dealer'],
            ['slug' => 'contact-masterlube-industries', 'title' => 'Contact MasterLube Industries'],
        ];

        foreach ($rows as $i => $row) {
            CmsPage::updateOrCreate(
                ['slug' => $row['slug']],
                ['title' => $row['title'], 'order' => $i, 'status' => 'published']
            );
        }
    }
}
