<?php

namespace Database\Seeders;

use App\Models\Accessory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AccessorySeeder extends Seeder
{
    /**
     * Seeded verbatim from staff.html's 8-tab accessory catalog, cross-checked
     * against custom-hose.html (identical copy for the Custom Hose item, which
     * is flagged featured so it drives the dedicated /custom-house page).
     */
    public function run(): void
    {
        $rows = [
            ['name' => '3 Quart Short MasterLube Unit', 'image' => '3qtshort_lg.gif', 'description' => 'We have introduced a new size. This tank measures 5 1/4" x 8". The total length of the unit including the valve is 12". If you have any questions about how the MasterLube System is used, please contact us, either by email or by telephone.', 'featured' => false],
            ['name' => 'Custom Hose', 'image' => 'hose_lg.gif', 'description' => 'Standard hose lengths in stock for -6 are 2ft, 3ft and 5ft. However we now offer any length hose custom made to order. Hose widths include -4, -6, -8 and -10. Please allow us to assist you for all your various hose needs.', 'featured' => true],
            ['name' => 'Remote Gauge Mounting Kit', 'image' => 'gaugemount_lg.gif', 'description' => 'For increased visibility on applications where the standard valve mounted gauge is not easy to see, or where the gauge needs to be mounted in/under dash. The Gauge Mounting Kit comes standard with a 2 ft. or optional 3 ft. -4 SS Braided Teflon Hose (longer hose can be used if needed), JIC fittings & adaptors, and a versatile SS 2 1/2 inch gauge Bracket. (Gauge is not included, use the original supplied with the System).', 'featured' => false],
            ['name' => 'Remote Cylinder Mounting Kit', 'image' => 'cylindermount_lg.gif', 'description' => 'This Kit allows you to Remote mount the MasterLube or TurboLube System Cylinder in the trunk, fender well, body panel or any remote location. By remote mounting the Gauge and Schrader (Air) valve you can easily check and set the Calibration Gas Charge, when the Cylinder is mounted in a hidden or out of the way location. The Kit comes with a 2 ft. or optional 3 ft. -4 SS Braided Teflon Hose (longer hoses can be used if needed), JIC fittings & adaptors, and a versatile SS 21/2 inch gauge Bracket. (Gauge is not included, use the original supplied with the system).', 'featured' => false],
            ['name' => 'Stainless Steel Laser Cut Bracket', 'image' => 'laserbracket_lg.gif', 'description' => 'MasterLube\'s "Time Saver" The MasterLube "Time Saver" is an optional Laser Cut Stainless Steel Bracket that as the nickname says - saves time on mounting a MasterLube System for any Application. For Maximum versatility they are shipped flat, and depending upon the appliction can be bent as shown, or at any angle without losing strength. An added feature for commercial systems using multiple cylinders, or marine applications with 2 engines is the ability to mount 2 Cylinders to a single bracket.', 'featured' => false],
            ['name' => '6th Generation Short Valve', 'image' => 'valve_lg.gif', 'description' => 'We have introduced a new valve. It\'s 90 degree shape shortens the overall length of the unit to assist with installation in more applications. If you have any questions about how the MasterLube System is used, please contact us, either by email or by telephone.', 'featured' => false],
            // Source references "hosekit_lg.jpg", which doesn't exist in the design assets — the .gif is the real file.
            ['name' => 'Hose Kit', 'image' => 'hosekit_lg.gif', 'description' => 'The hose kit includes standard hose lengths of 2ft, 3ft and 5ft. Each hose includes clamps and connectors.', 'featured' => false],
            ['name' => 'Chrome Upgrade Option', 'image' => 'chrome_lg.gif', 'description' => 'For the ultimate system go chrome.', 'featured' => false],
        ];

        foreach ($rows as $i => $row) {
            Accessory::updateOrCreate(
                ['slug' => Str::slug($row['name'])],
                [
                    'name' => $row['name'],
                    'image' => 'site/'.$row['image'],
                    'description' => $row['description'],
                    'is_featured_on_custom_hose' => $row['featured'],
                    'order' => $i,
                    'status' => 'published',
                ]
            );
        }
    }
}
