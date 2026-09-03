<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Seeded verbatim from the supplied HTML design (racing.html, commercial.html,
     * aviation.html, classic.html, exotic.html, motorcycle.html, streetrod.html,
     * towvehicles.html, marin-application.html). All 9 pages are published in the
     * source site — including the 4 "we are currently developing this page" stubs
     * (commercial, aviation, motorcycle, towvehicles) — so they stay published
     * here too, per the approved plan's "preserve as-is" decision. The shared
     * "Engine Protection / Stable Oil Pressure" icon pair and page-banner
     * boilerplate are template fragments (see Settings + industry-page component),
     * not per-row data.
     */
    public function run(): void
    {
        $rows = [
            [
                'slug' => 'racing',
                'name' => 'Racing Applications',
                'nav_label' => 'Racing',
                'hero_eyebrow' => 'Racing Applications',
                'hero_title' => 'Built for a Wide Range of Equipment',
                'hero_text' => 'MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.',
                'hero_image' => 'site/blownmotor.jpg',
                'thumbnail_image' => 'site/prostock_sm.jpg',
                'intro_body' => <<<'TXT'
                Racing places very high demands on an engine and its oiling system. Aside from generating greater amounts of horsepower than "stock" engines, racing engines are also required to function under severe acceleration, deceleration, violent burnouts, and high G-force side loads from going through the turns of a race track. Race boats do not deal with the effects of a racetrack, but suffer the effects of extremely rough water conditions, and can also need added protection.

                It is under these inertial loads that stock oiling systems and even most high performance wet sump systems are inadequate, causing your oil pressure to fluctuate, cavitating the oil pump, not supplying adequate oil to the critical load bearing surfaces of your engine, and eventually leading to early and possibly extreme engine damage.

                The Patented MasterLube PreLubrication and Accumulator Systems can be configured for any application. With over 12 years of development, our unique lightweight Patented design (only 2-4 pounds), uses state of the art materials and manufacturing techniques… you'll see why our unique system comes with a Lifetime Guarantee on our manufactured products. It is designed to protect and extend the life of any engine, any application - that is the purpose of our system, and that is our Goal!

                Even the best built of engines using the strongest and most expensive parts can be damaged or even destroyed by an inadequate oiling system that is not designed or not able to properly protect your engine under harsh, and extreme conditions... conditions that can not be prevented, but must be endured. Oil is the "Life Giving Blood" of your engine!

                This can eventually lead to premature and potentially extreme engine damage. Our patented prelubrication and accumulator systems are designed to provide consistent oil pressure when your engine needs it most.
                TXT,
                'intro_image' => 'site/blownmotor.jpg',
                'secondary_title' => null,
                'secondary_body' => <<<'TXT'
                Engine damage accumulates - every time your oil pressure fluctuates metal-to-metal contact can occur, causing wear, especially under load. When a part fails because of an oiling system problem or inadequacy, it usually will fail under load. If this is allowed to happen, the effects will be severe and expensive. This type of engine damage is "PREVENTABLE."

                It has been proven and is considered both Common Sense as well as Common Knowledge that your engine needs a constant, sufficient volume, and uninterrupted flow of pressurized oil for lubrication if it is to survive… this especially important in all "High Performance Applications."

                If an engine's oil pressure fluctuates after burnouts, at high Rpm's, or during deceleration, hard cornering, rough water conditions, that engine Will Not Last!

                When an engine is run at high RPM's, 60% to 100% of the "usable" oil is trapped or has been pumped into the upper areas of the engine, "away" from the oil pump, and is not in the oil pan. This can lead to Oil Starvation when it is most needed by your engine. It is during acceleration, hard cornering, etc., or so called "Heavy Load Conditions", when failures occur.

                Even if you have invested in expensive oil pans with trap doors, baffles, "check balls," or kick outs, If there is no oil, or an insufficient amount of oil in the pan, even the "Best" or most expensive oil pan on the market cannot keep enough oil around the pick up, the oil pressure will be unstable, allowing engine Damage!

                These facts are considered common knowledge by Top mechanics, Elite engine builders, and Lubrication Engineers. Even if you are your own mechanic, you definitely know that a stable, constant flow of oil is the major factor in the overall life of your high performance engine. It has always been said that an ounce of prevention is worth a pound of cure. With different sizes and styles of the MasterLube and TurboLube Accumulator Systems available for Racing applications, you can now protect your engine with the world's best oil additive —"Pressure" — something that no oil additive can claim or accomplish!!

                With our unique Patented system you can even PreLubricate that expensive engine before every start up, and have the assurance that by stabilizing your engines oil pressure, you have virtually eliminated a major factor that can cause your engine to fail.

                If you do not see or can not find a MasterLube or TurboLube System that fits your application, let us know... we welcome the opportunity to custom build or prototype specialized units for you, usually at little or no extra cost. Even private Labeling is available for dealers and specific applications.
                TXT,
                'secondary_image' => 'site/prostock_med.jpg',
                'callout_text' => 'Stable and uninterrupted oil flow is essential for protecting high-performance racing engines.',
                'order' => 0,
                'status' => 'published',
            ],
            [
                'slug' => 'commercial',
                'name' => 'Commercial',
                'nav_label' => 'Commercial',
                'hero_eyebrow' => 'Commercial',
                'hero_title' => 'Built for a Wide Range of Equipment',
                'hero_text' => 'MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.',
                'hero_image' => 'site/deereside1.jpg',
                'thumbnail_image' => 'site/deere.jpg',
                'intro_body' => <<<'TXT'
                We are currently developing this page for your Commercial application. If you have any questions about how the MasterLube System is used on your commercial application, please contact us, either by email or by telephone.

                Email: info@masterlube.net

                Telephone: 970.867.5154
                TXT,
                'intro_image' => 'site/deereside1.jpg',
                'secondary_title' => null,
                'secondary_body' => null,
                'secondary_image' => null,
                'callout_text' => null,
                'order' => 5,
                'status' => 'published',
            ],
            [
                'slug' => 'aviation',
                'name' => 'Aviation',
                'nav_label' => 'Aviation',
                'hero_eyebrow' => 'Aviation',
                'hero_title' => 'Built for a Wide Range of Equipment',
                'hero_text' => 'MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.',
                'hero_image' => 'site/plane.jpg',
                'thumbnail_image' => 'site/plane.jpg',
                'intro_body' => <<<'TXT'
                We are currently developing this page for the Aviation application. If you have any questions about how the MasterLube System is used on an aircraft, please contact us, either by email or by telephone.

                Email: info@masterlube.net

                Telephone: 970.867.5154
                TXT,
                'intro_image' => 'site/plane.jpg',
                'secondary_title' => null,
                'secondary_body' => null,
                'secondary_image' => null,
                'callout_text' => null,
                'order' => 9,
                'status' => 'published',
            ],
            [
                'slug' => 'classic',
                'name' => 'Classic/Stock/Antique',
                'nav_label' => 'Stock / Classic / Antique',
                'hero_eyebrow' => 'Stock / Classic / Antique',
                'hero_title' => 'Built for a Wide Range of Equipment',
                'hero_text' => 'MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.',
                'hero_image' => 'site/68GT500_lrg (1).jpg',
                'thumbnail_image' => 'site/vette_sm.jpg',
                'intro_body' => <<<'TXT'
                Never Start Your Engine Without Oil Again!

                With both the MasterLube and TurboLube PreLubrication/Accumulator Systems available to protect your "Classic, Stock, or Antique" — or any other style of automobile for that matter — you will never again have to start them without oil on the critical bearing, and valve train surfaces. It has been proven, and is common knowledge, that Prelubricating these surfaces before every start is the key extending engine life, maintaining ease of starting, and increased engine reliability. This type of "Dry Start" engine wear is preventable!

                Depending upon your requirements, and the unique situations that your vehicle encounters (from sitting for weeks or months without being started, to frequent or occasional racing applications), making the choice of either a MasterLube or TurboLube System is as simple as answering a few questions:

                Do you want or need to have a PreLubrication System permanently mounted on the vehicle that is electronically or mechanically controlled.
                TXT,
                'intro_image' => 'site/68GT500_lrg (1).jpg',
                'secondary_title' => 'Models that we have pre-made applications for:',
                'secondary_body' => <<<'TXT'
                Do you want a PreLubrication system that is efficient and simple to use? One that utilizes a non-permanent mounting, enabling the Prelubricating of any engine by easily connecting and disconnecting the PreLubrication system after every use, by the use of a unique drip-less quick coupling system.

                Do you have multiple cars and applications that you would like to protect by easily PreLubricating them before starting? Simply Prelubricate, start the engine, the system will refill itself, then unhook the system — all in around 20 seconds?

                Do you need a Prelubrication System to work prior to starting the engine, and an Accumulator System to stabilize your oil pressure while the engine is running, because in some racing or driving conditions, the stock oiling system is not adequate?

                If you answered "Yes" to any of these questions, we have the product for you. Our MasterLube System and TurboLube System work as a Prelubrication and Accumulator System, ensuring you the proper protection that you need for that valuable Classic, Stock, or Antique.

                Our MasterLube System is ideal for those looking for a permanently mounted system that functions both as a Prelubricator and an Accumulator.

                Our TurboLube System is ideal for those looking for a Prelubrication system that is not permanently mounted... a system that can be quickly connected and disconnected to multiple vehicles, allowing for quick Prelubrication.

                To read more about our Systems, please take your time and look through the web site. If you have any questions, please feel free to call us or drop us an email. We would love to help you!
                TXT,
                'secondary_image' => 'site/vette_lrg (1).jpg',
                'callout_text' => 'Stable and uninterrupted oil flow is essential for protecting high-performance racing engines.',
                'order' => 4,
                'status' => 'published',
            ],
            [
                'slug' => 'exotic',
                'name' => 'Exotic/Collector',
                'nav_label' => 'Exotic',
                'hero_eyebrow' => 'Exotic/Collector',
                'hero_title' => 'Built for a Wide Range of Equipment',
                'hero_text' => 'MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.',
                'hero_image' => 'site/58ferrari.jpg',
                'thumbnail_image' => 'site/viper_sm.jpg',
                'intro_body' => <<<'TXT'
                Need to protect your investment? You can! By watching your engine's oil pressure gauge show oil pressure before your engine is even cranked over, knowing that, by PreLubricating your engine before it is started, you are reducing engine wear.

                Do you enjoy a little racing or "hard" cornering and accelerating when you finally get a chance to drive your "investment"? Want to be secure in knowing that the oil pressure is not fluctuating during that hard cornering or acceleration?

                The MasterLubeSystem works as both a prelubrication system and as an accumulator system — taking as little as 5 seconds to prelubricate your engine before starting it (the prelubrication), and keeping proper oil pressures during harsh driving conditions (the accumulator system), both of these reducing the excessive wear on your engine and extending it's life.

                Facts...

                • 80% of all engine wear occurs when an engine is first started! This "Dry Start" damage is caused by a lack of lubrication on critical bearing and valvetrain surfaces due to oil that has drained back into the oil pan, leaving oil galleys empty and critical bearing surfaces dry. The resulting metal to metal contact, and friction, is PREVENTABLE!

                • An engine needs a constant, non-fluctuating supply of oil if it is to survive. If the oil pressure fluctuates in hard turns, heavy acceleration or braking, or at high rpm's, the engine will not last! This oil starvation is easily PREVENTABLE!

                • Damage caused by oil pressure fluctuations or oil starvation is accumulative. Parts that fail under these conditions will fail with little or no warning, and the end result is usually major engine damage that could have been PREVENTED.

                • The longer it is between engine startups, the longer it will take to get needed oil for lubrication to the bearings and valve train components, causing excessive wear — PreLubrication will PREVENT this "Dry Start" engine wear.
                TXT,
                'intro_image' => 'site/58ferrari.jpg',
                'secondary_title' => null,
                'secondary_body' => <<<'TXT'
                Whether you need to protect your vehicle from the metal-to-metal contact, and the wear that occurs when first starting your engine, or the potential for extreme engine damage that can occur if your oil pressure fluctuates when pushing your car past "regular" driving situations, MasterLube Industries has a system for you... one that protects your engine and extend its life.

                The Patented MasterLube PreLubrication & Accumulator System it is designed to be permanently mounted on the vehicle, with an electronic switch to operate the system. It is a very efficient Prelubrication system as well Accumulator System capable of flowing a quart of protective oil in 5 seconds when needed.

                If you do not want to mount a "Permanent" system in your vehicle, or if you have multiple vehicles to protect, then we offer the TurboLube PreLubrication System. By simply installing a unique "quick disconnect" fitting into any oil galley, you now have the ability to "couple" a TurboLube PreLubrication System to the fitting forcing oil into the engine, Once the engine is started, the TurboLube System will refill itself. It is then uncoupled from the "quick disconnect" fitting, and placed back into your garage or workshop, and you are ready to drive, all in less than a minute.

                If you have any more questions about our system, please read through the web site, or feel free to call us and we'll discuss your needs.
                TXT,
                'secondary_image' => 'site/viper_lrg (1).jpg',
                'callout_text' => 'Stable and uninterrupted oil flow is essential for protecting high-performance racing engines.',
                'order' => 3,
                'status' => 'published',
            ],
            [
                'slug' => 'motorcycle',
                'name' => 'Motorcycle',
                'nav_label' => 'Motorcycle',
                'hero_eyebrow' => 'Motorcycle',
                'hero_title' => 'Built for a Wide Range of Equipment',
                'hero_text' => 'MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.',
                'hero_image' => 'site/harley.jpg',
                'thumbnail_image' => 'site/harley_sm.jpg',
                'intro_body' => <<<'TXT'
                We are currently developing this page for the Motorcycle application. If you have any questions about how the MasterLube System is used on a motorcycle, please contact us either by email or by telephone.

                Email: info@masterlube.net

                Telephone: 970.867.5154

                Thank you.
                TXT,
                'intro_image' => 'site/harley.jpg',
                'secondary_title' => null,
                'secondary_body' => null,
                'secondary_image' => null,
                'callout_text' => null,
                'order' => 6,
                'status' => 'published',
            ],
            [
                'slug' => 'streetrod',
                'name' => 'Street Rods',
                'nav_label' => 'Street Rod',
                'hero_eyebrow' => 'Street Rods',
                'hero_title' => 'Built for a Wide Range of Equipment',
                'hero_text' => 'MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.',
                'hero_image' => 'site/blk_willy_lrg.jpg',
                'thumbnail_image' => 'site/willy_sm (1).jpg',
                'intro_body' => <<<'TXT'
                Countless hours of work, and thousands of dollars are invested in your car. After all of the effort it takes to finish building the car, it will often sit for weeks or months without being started. When you finally get a chance to go driving, do you know what happens to your engine's load bearing surfaces? They have no oil on them because the car was sitting for so long. Why would you start your engine without oil when it would be so easy to Prelubricate before it is ever started?

                Why Prelubricate Your Engine?

                Here are some facts that have been proven many times and are considered common knowledge by Lubrication Engineers and Top Mechanics...

                Facts...

                • Over 80-90% of all engine wear occurs in the first 5-10 seconds when it is first started. Lack of lubrication causes friction, which causes the wear and damage that occurs. This damage is accelerated by the length of time between engine startes.

                • Prelubrication will increase engine life, reduce maintenance, decreased friction allows easier starting from the reduced current draw needed by the starter.

                • The resulting wear is accumulative... the "Dry Starting" of the engine causes "metal-to-metal" friction at initial startup, however Prelubrication of the engines with oil eliminates the normal scuffing and friction. "Dry Start" wear is Preventable...
                TXT,
                'intro_image' => 'site/blk_willy_lrg.jpg',
                'secondary_title' => null,
                'secondary_body' => <<<'TXT'
                After all your efforts and investments of both time and money, the last thing you want to happen is Engine Trouble! Or even worse, who wants to be driving their new rod across country tow, when something as simple as Prelubricating your engine before it was started could have prevented the "Dry Start" damage... damage to the cam, the fuel pump lobe, rocker arm, valve tip, or even a rod or main bearing. Since this type of damage accumulates, it is so important to stop it before it happens.

                In the past it was a difficult and time consuming proposition to Prelubricate your engine. Now, with the MasterLube System you have many options and 2 unique methods to prevent "Dry Start" engine wear and damage.

                Method 1...
                With the MasterLube PreLubrication-Accumulator System, you get a state of the art Patented Electronic Valve & Cylinder that, once installed in your vehicle, is as simple to use as turning a switch, waiting 3 to 5 seconds for oil pressure to register on the vehicles gauge (your engine is now full prelubed), releasing the switch, and starting the engine!

                Once the engine is running, the system will automatically be refilled with the oil that was just pushed into the engine. With the MasterLube System, you can always start your engine and have one less thing to worry about.

                Method 2...

                With our TurboLube System, you get the same quality system with a proprietary valve and "Mechanical Level Control" assembly that is designed Not to be Permanently Attached or Mounted to the vehicle. The TurboLube System is capable of Prelubricating the engines of multiple vehicles, using just one cylinder and valve assembly. By simply adding additional commercial/aviation quality nipple assemblies to each vehicle, you have a portable solution to prelube many vehicles... all with a single cylinder assembly.
                TXT,
                'secondary_image' => 'site/blown_redrod_lrg.jpg',
                'callout_text' => 'Stable and uninterrupted oil flow is essential for protecting high-performance racing engines.',
                'order' => 2,
                'status' => 'published',
            ],
            [
                'slug' => 'towvehicles',
                'name' => 'Tow Vehicle/Motorhome',
                'nav_label' => 'Tow Vehicle',
                'hero_eyebrow' => 'Tow Vehicle/Motorhome',
                'hero_title' => 'Built for a Wide Range of Equipment',
                'hero_text' => 'MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.',
                'hero_image' => 'site/rv_photo3.jpg',
                'thumbnail_image' => 'site/rv_wht_sm.jpg',
                'intro_body' => <<<'TXT'
                We are currently developing this page for your towing vehicle. If you have any questions about how the MasterLube System is used on your towing vehicle, please contact us, either by email or by telephone.

                Email: info@masterlube.net

                Telephone: 970.867.5154
                TXT,
                'intro_image' => 'site/rv_photo3.jpg',
                'secondary_title' => null,
                'secondary_body' => null,
                'secondary_image' => null,
                'callout_text' => null,
                'order' => 7,
                'status' => 'published',
            ],
            [
                'slug' => 'marin-application',
                'name' => 'Marine Applications',
                'nav_label' => 'Marine',
                'hero_eyebrow' => 'Marine Applications',
                'hero_title' => 'Built for a Wide Range of Equipment',
                'hero_text' => 'MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.',
                'hero_image' => 'site/42LIGHTNING_boat.jpg',
                'thumbnail_image' => 'site/29FEVER_sm (1).jpg',
                'intro_body' => <<<'TXT'
                How long has it has been since you have started the engine on your boat? After a couple of days of just sitting, any protective oil that was left on the bearings is almost gone, basically leaving a "dry start" metal to metal condition the next time you start that engine.

                Facts...

                • 80% of all engine wear occurs at startup. The longer it has been since an engine was last started the greater potential for wear!

                • Pre-Lubricating any engine before it is started will decrease or eliminate the overall wear normally associated with the "dry starting" of an engine, thus extending engine life.

                Even the best built of engines using the strongest and most expensive parts can be damaged or even destroyed by an inadequate oiling system that is not designed or not able to properly protect your engine under harsh, and extreme conditions... conditions that can not be prevented, but must be endured. Oil is the "Life Giving Blood" of your engine!

                After a week, even oil that normally is in the small oil passages and oil galleys has run back into the oil pan, making the initial starting of your engine even harder on the bearings and valve train components. Why? Because now when starting the engine the oil pump has to fill all of the oil passages before any oil gets to your bearings or valve train...on some engines this can take 5-10 seconds or MORE.

                Extend the life of your expensive boat engine, reduce maintenance, and make starting easier, with the MasterLube Prelubrication system. Boats of all types, sizes and uses can be protected. With models to fit almost any application, we welcome the opportunity to build custom models for those "unique" applications, usually for little if any extra from our kit pricing. Call us for details.
                TXT,
                'intro_image' => 'site/42LIGHTNING_boat.jpg',
                'secondary_title' => 'Models that we have pre-made applications for:',
                'secondary_body' => <<<'TXT'
                • Fishing, Skiing, all purpose styled boats with inboards/outboards

                • V-drive MasterCraft and Ski-Nautique styled ski/recreation boats

                • Cigarette and Offshore Racing style with single or multiple engines

                • Sailboats, both diesel and gasoline auxiliary/emergency engines

                • Generators, or pumping engines
                TXT,
                'secondary_image' => 'site/29fever.jpg',
                'callout_text' => 'Stable and uninterrupted oil flow is essential for protecting high-performance racing engines.',
                'order' => 1,
                'status' => 'published',
            ],
        ];

        foreach ($rows as $row) {
            $row['intro_body'] = $this->dedent($row['intro_body']);
            $row['secondary_body'] = $row['secondary_body'] ? $this->dedent($row['secondary_body']) : null;

            Industry::updateOrCreate(['slug' => $row['slug']], $row);
        }
    }

    /**
     * Heredocs above are indented to match code style; strip the common
     * leading whitespace so stored copy doesn't carry it into the page.
     */
    private function dedent(string $text): string
    {
        return implode("\n", array_map(fn ($line) => ltrim($line), explode("\n", trim($text))));
    }
}
