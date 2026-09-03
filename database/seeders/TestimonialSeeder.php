<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Seeded verbatim from testimonials.html (10 unique customer quotes).
     * The first 3 are flagged featured so the homepage/our-advantages sections
     * show real, distinct quotes instead of the source's 3x-repeated placeholder.
     */
    public function run(): void
    {
        $rows = [
            ['quote' => 'We previously purchasd one of your units and to date have been impressed with it\'s perfomance. It is installed on a 1968 Chevrolet Camaro drag car that we used to have oil fluctuation problems with. This always occurred after we made a pass as we were decelerating. Many times the oil pressure would approach zero PIS during this period of deceleration. Since we have installed your system we no longer experience this problem. We have tried various other accumulator systems which seem to work for a while but ultimately develop problems and need to be rebuilt. We have recommended your system to others that we race with and know of at least one person that has purchased it.', 'author_name' => 'M. Stuczynski', 'author_role' => null, 'is_featured' => true],
            ['quote' => 'You probably don\'t remember me, but I ordered one of your 3 quart systems a couple of weeks ago and I just got around to installing it yesterday. All went very well with the install, I have it mounted on the core support right next to the radiator on the passenger side. Just wanted to express my total satisfaction with how this product works. Its SOOO nice to fire up the 455 and not hear the motor screaming for oil for that 5-6 seconds while the filter fills and oil finally reaches the main bearings. Problem is, I\'ll be driving it a lot more now. :-) Thanks for a great product.', 'author_name' => 'K. Wanderi', 'author_role' => null, 'is_featured' => true],
            ['quote' => 'Under hard braking at the top end, the oil pressure would go to almost zero. After installing your MasterLube system, our pressure never drops below 40 PSI — even under the hardest braking. Your system is definitely a bearing saver, and is essentially a \'Dry Sump\' for the racer on a budget. I also liked the fact that we can prelube the engine before we start it.', 'author_name' => 'P. Christensen', 'author_role' => 'Editor, Full Throttle News', 'is_featured' => true],
            ['quote' => 'My boat usually sits for a week or two without being started...this has always bothered me, as has that knocking and ticking noise in the first few seconds when I first started it — those noises were not there when the boat was new. Since installing your 3 quart MasterLube model, the boat starts just like new, without the noises! Thanks for a great product.', 'author_name' => 'J. Anderson', 'author_role' => null, 'is_featured' => false],
            ['quote' => 'I have been looking for a product like this for years, now I simply turn on a switch, wait a few seconds for oil pressure to register on the gauge, then start my engine. It even starts easier, without any of those clicking noises that it had before. Thanks for a great product.', 'author_name' => 'D. Bender', 'author_role' => null, 'is_featured' => false],
            ['quote' => 'The MasterLube took less than an hour to install, and setup. When I hit the switch it worked just as just as I expected...I saw oil pressure then started my engine, and watched the pressure gauge as the system refilled itself.', 'author_name' => 'J. Ford', 'author_role' => null, 'is_featured' => false],
            ['quote' => 'I have always believed that an ounce of prevention is worth a pound of cure. Now, with the MasterLube system, I am pushing 2 quarts of prevention (oil) through my boats engines before I start them. Thanks for the great service when I had questions and for a wonderful product.', 'author_name' => 'D. Mathews', 'author_role' => null, 'is_featured' => false],
            ['quote' => 'I think all engines should come equipped with a Masterlube system. It was so easy to install. Once installed, just push the button and it works! It even looks really good in the engine compartment.', 'author_name' => 'C. Roberts', 'author_role' => null, 'is_featured' => false],
            ['quote' => 'Your company should be complimented on a wonderfully engineered product — it works even better than expected. I am definitely keeping this one or buying another for my next boat.', 'author_name' => 'R. Barry', 'author_role' => null, 'is_featured' => false],
            ['quote' => 'I have worked on heavy equipment for 25 years, I have seen systems costing many thousands of dollars, that do the same job, but are very complicated in their design. The MasterLube system only took an hour to install. I am very happy that I can have oil pressure before I start my boat, no matter how long it has been sitting.', 'author_name' => 'P. Thomas', 'author_role' => null, 'is_featured' => false],
        ];

        foreach ($rows as $i => $row) {
            Testimonial::updateOrCreate(
                ['author_name' => $row['author_name'], 'quote' => $row['quote']],
                [...$row, 'order' => $i, 'status' => 'published']
            );
        }
    }
}
