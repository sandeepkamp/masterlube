<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            SettingSeeder::class,
            NavItemSeeder::class,
            IndustrySeeder::class,
            StaticPageSeeder::class,
            LandingPageSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
            NewsSeeder::class,
            AccessorySeeder::class,
            DealerSeeder::class,
            PartnerLinkSeeder::class,
            MagazineSeeder::class,
            InstallSeeder::class,
            CarClubEventSeeder::class,
            CmsPageSeeder::class,
        ]);
    }
}
