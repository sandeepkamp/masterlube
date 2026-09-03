<?php

namespace Database\Seeders;

use App\Models\NavItem;
use Illuminate\Database\Seeder;

class NavItemSeeder extends Seeder
{
    /**
     * Seeds the header/footer navigation exactly as it exists in the supplied
     * HTML design, including its dead links and mislabeled items (Staff, Custom
     * House) — see the approved implementation plan's "preserve as-is" decision.
     */
    public function run(): void
    {
        NavItem::query()->delete();

        $this->header();
        $this->footer();
    }

    private function header(): void
    {
        $order = 0;

        $home = NavItem::create(['menu' => 'header', 'label' => 'Home', 'route_name' => 'home', 'order' => $order++]);
        $systems = NavItem::create(['menu' => 'header', 'label' => 'Systems', 'route_name' => 'systems', 'order' => $order++]);

        $applications = NavItem::create(['menu' => 'header', 'label' => 'Applications', 'route_name' => 'applications.index', 'order' => $order++]);
        $appChildren = [
            ['Applications', null, 'applications.index'],
            ['Marine', '/applications/marin-application', null],
            ['Street Rod', '/applications/streetrod', null],
            ['Racing', '/applications/racing', null],
            ['Motorcycle', '/applications/motorcycle', null],
            ['Exotic/Classics/Vintage/Car Collectors', '/applications/exotic', null],
            ['Motor Homes/Diesel Engines', '/applications/towvehicles', null],
            ['Commercial', '/applications/commercial', null],
            ['Aviation', '/applications/aviation', null],
            ['Pre Lubrication Tool', null, 'prelube'],
        ];
        foreach ($appChildren as $i => [$label, $url, $routeName]) {
            NavItem::create(['menu' => 'header', 'parent_id' => $applications->id, 'label' => $label, 'url' => $url, 'route_name' => $routeName, 'order' => $i]);
        }

        NavItem::create(['menu' => 'header', 'label' => 'Staff', 'route_name' => 'staff.index', 'order' => $order++]);

        // Preserved as-is: source markup has href="" (broken/empty) for Advantages.
        NavItem::create(['menu' => 'header', 'label' => 'Advantages', 'url' => '', 'order' => $order++]);

        $questions = NavItem::create(['menu' => 'header', 'label' => 'Questions', 'url' => '#', 'order' => $order++]);
        $questionChildren = [
            ["Questions/Answers", '/faq'],
            ["FAQ's for MasterLube Kits", '/faqml'],
            ["FAQ's for TurboLube Kits", '/faqtl'],
            ["FAQ's for TurboLube \"Quick\" Kits", '/faqquick'],
            ["FAQ's for Commercial Kits", '/faqcommercial'],
        ];
        foreach ($questionChildren as $i => [$label, $url]) {
            NavItem::create(['menu' => 'header', 'parent_id' => $questions->id, 'label' => $label, 'url' => $url, 'order' => $i]);
        }

        $testimonials = NavItem::create(['menu' => 'header', 'label' => 'Testimonials', 'route_name' => 'testimonials.index', 'order' => $order++]);
        $testimonialChildren = [
            ['Testimonials', null, 'testimonials.index'],
            ['Customer Pictures/Applications/Feedback', null, 'installs.index'],
            ['Magazine Articles', null, 'magazines.index'],
        ];
        foreach ($testimonialChildren as $i => [$label, $url, $routeName]) {
            NavItem::create(['menu' => 'header', 'parent_id' => $testimonials->id, 'label' => $label, 'url' => $url, 'route_name' => $routeName, 'order' => $i]);
        }

        $customHouse = NavItem::create(['menu' => 'header', 'label' => 'Custom House', 'url' => '#', 'order' => $order++]);
        $customHouseChildren = [
            ['Custom House', null, 'custom-house.show'],
            ['Stainless Steel Braided Teflon', null, 'custom-house.show'],
        ];
        foreach ($customHouseChildren as $i => [$label, $url, $routeName]) {
            NavItem::create(['menu' => 'header', 'parent_id' => $customHouse->id, 'label' => $label, 'url' => $url, 'route_name' => $routeName, 'order' => $i]);
        }

        $contact = NavItem::create(['menu' => 'header', 'label' => 'Contact', 'route_name' => 'contact.show', 'order' => $order++]);
        $contactChildren = [
            ['Contact', null, 'contact.show'],
            // Preserved as-is: source markup has href="" (broken/empty).
            ['Contact MastuerLube Industries', '', null],
            ['Become a Dealers', '', null],
            ['Featured Dealers', null, 'dealers.index'],
        ];
        foreach ($contactChildren as $i => [$label, $url, $routeName]) {
            NavItem::create(['menu' => 'header', 'parent_id' => $contact->id, 'label' => $label, 'url' => $url, 'route_name' => $routeName, 'order' => $i]);
        }

        $carClubs = NavItem::create(['menu' => 'header', 'label' => 'Car Clubs', 'url' => '#', 'order' => $order++]);
        $carClubChildren = [
            ['Car Clubs', null, 'carclubs.index'],
            ['Discounts for Associations', null, 'carclubs.index'],
        ];
        foreach ($carClubChildren as $i => [$label, $url, $routeName]) {
            NavItem::create(['menu' => 'header', 'parent_id' => $carClubs->id, 'label' => $label, 'url' => $url, 'route_name' => $routeName, 'order' => $i]);
        }

        NavItem::create(['menu' => 'header', 'label' => 'Links', 'route_name' => 'link.index', 'order' => $order++]);
    }

    private function footer(): void
    {
        $products = [
            ['Systems', null, 'systems'],
            ['Applications', null, 'applications.index'],
            ['Custom Hose', null, 'custom-house.show'],
            ['New Stuff', null, 'new-stuff.index'],
        ];
        foreach ($products as $i => [$label, $url, $routeName]) {
            NavItem::create(['menu' => 'footer_products', 'label' => $label, 'url' => $url, 'route_name' => $routeName, 'order' => $i]);
        }

        $company = [
            ['Our Advantages', null, 'our-advantages'],
            ['Questions', null, 'faq.index'],
            ['Testimonials', null, 'testimonials.index'],
            // Preserved as-is: source footer links this to "#", not to carclubs.html.
            ['Car Clubs', '#', null],
        ];
        foreach ($company as $i => [$label, $url, $routeName]) {
            NavItem::create(['menu' => 'footer_company', 'label' => $label, 'url' => $url, 'route_name' => $routeName, 'order' => $i]);
        }

        $connect = [
            ['Contact Us', null, 'contact.show'],
            ['About Us', null, 'about'],
        ];
        foreach ($connect as $i => [$label, $url, $routeName]) {
            NavItem::create(['menu' => 'footer_connect', 'label' => $label, 'url' => $url, 'route_name' => $routeName, 'order' => $i]);
        }
    }
}
