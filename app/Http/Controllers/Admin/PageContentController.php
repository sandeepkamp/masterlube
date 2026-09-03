<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\AccessoriesPage;
use App\Models\AdvantagesPage;
use App\Models\ApplicationsHubPage;
use App\Models\ContactPage;
use App\Models\CustomHosePage;
use App\Models\HomePage;
use App\Models\Industry;
use App\Models\LandingPage;
use App\Models\PrelubePage;
use App\Models\SystemsPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageContentController extends Controller
{
    use HandlesUploads;

    public function editLanding(): View
    {
        return view('admin.pages.landing', [
            'page' => LandingPage::current(),
            'industries' => Industry::orderBy('order')->get(['slug', 'name']),
        ]);
    }

    public function updateLanding(Request $request): RedirectResponse
    {
        $page = LandingPage::current();

        $data = $request->validate([
            'hero_title' => ['nullable', 'string', 'max:255'],
            'hero_text' => ['nullable', 'string'],
            'hero_bullets' => ['nullable', 'string'],
            'hero_cta_primary_text' => ['nullable', 'string', 'max:255'],
            'hero_cta_secondary_text' => ['nullable', 'string', 'max:255'],
            'stat_1_number' => ['nullable', 'string', 'max:50'],
            'stat_1_label' => ['nullable', 'string', 'max:100'],
            'stat_1_caption' => ['nullable', 'string', 'max:255'],
            'stat_2_number' => ['nullable', 'string', 'max:50'],
            'stat_2_label' => ['nullable', 'string', 'max:100'],
            'stat_2_caption' => ['nullable', 'string', 'max:255'],
            'showcase_title' => ['nullable', 'string', 'max:255'],
            'showcase_tagline' => ['nullable', 'string', 'max:255'],
            'showcase_cta_text' => ['nullable', 'string', 'max:255'],
            'showcase_grid' => ['nullable', 'array'],
            'showcase_grid.*.label' => ['nullable', 'string', 'max:255'],
            'showcase_grid.*.sublabel' => ['nullable', 'string', 'max:255'],
            'showcase_grid.*.industry_slug' => ['nullable', 'string', 'max:255'],
            'showcase_grid.*.image' => ['nullable', 'image', 'max:4096'],
            'solutions_eyebrow' => ['nullable', 'string', 'max:255'],
            'solutions_title' => ['nullable', 'string', 'max:255'],
            'solutions_subtitle' => ['nullable', 'string'],
            'solutions_grid' => ['nullable', 'array'],
            'solutions_grid.*.badge' => ['nullable', 'string', 'max:255'],
            'solutions_grid.*.title' => ['nullable', 'string', 'max:255'],
            'solutions_grid.*.text' => ['nullable', 'string'],
            'solutions_grid.*.image' => ['nullable', 'image', 'max:4096'],
            'testimonials_eyebrow' => ['nullable', 'string', 'max:255'],
            'testimonials_title' => ['nullable', 'string', 'max:255'],
            'trust_label' => ['nullable', 'string', 'max:255'],
            'trust_pills' => ['nullable', 'string'],
            'cta_eyebrow' => ['nullable', 'string', 'max:255'],
            'cta_title' => ['nullable', 'string', 'max:255'],
            'cta_text' => ['nullable', 'string'],
            'cta_primary_text' => ['nullable', 'string', 'max:255'],
            'cta_secondary_text' => ['nullable', 'string', 'max:255'],
            'footer_text' => ['nullable', 'string'],
            'copyright_text' => ['nullable', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        $existingGrid = $page->showcase_grid ?? [];
        $grid = [];

        foreach ($data['showcase_grid'] ?? [] as $i => $item) {
            $existing = $existingGrid[$i] ?? [];
            $image = $this->replaceImage($request->file("showcase_grid.$i.image"), 'landing', $existing['image'] ?? null);

            if (! $image && empty($item['label']) && empty($existing['label'])) {
                continue;
            }

            $grid[] = [
                'label' => $item['label'] ?? ($existing['label'] ?? ''),
                'sublabel' => $item['sublabel'] ?? ($existing['sublabel'] ?? null),
                'industry_slug' => $item['industry_slug'] ?? ($existing['industry_slug'] ?? null),
                'image' => $image,
            ];
        }

        $data['showcase_grid'] = $grid ?: null;
        $data['trust_pills'] = $this->linesToArray($request->input('trust_pills')) ?: null;
        $data['hero_bullets'] = $this->linesToArray($request->input('hero_bullets')) ?: null;

        $existingSolutionsGrid = $page->solutions_grid ?? [];
        $solutionsGrid = [];

        foreach ($data['solutions_grid'] ?? [] as $i => $item) {
            $existing = $existingSolutionsGrid[$i] ?? [];
            $image = $this->replaceImage($request->file("solutions_grid.$i.image"), 'landing', $existing['image'] ?? null);

            if (! $image && empty($item['title']) && empty($existing['title'])) {
                continue;
            }

            $solutionsGrid[] = [
                'badge' => $item['badge'] ?? ($existing['badge'] ?? ''),
                'title' => $item['title'] ?? ($existing['title'] ?? ''),
                'text' => $item['text'] ?? ($existing['text'] ?? ''),
                'image' => $image,
            ];
        }

        $data['solutions_grid'] = $solutionsGrid ?: null;

        $page->update($data);

        return back()->with('success', 'Landing page updated.');
    }

    public function editHome(): View
    {
        return view('admin.pages.home', ['page' => HomePage::current()]);
    }

    public function updateHome(Request $request): RedirectResponse
    {
        $page = HomePage::current();

        $data = $request->validate([
            'hero_eyebrow' => ['nullable', 'string', 'max:255'],
            'hero_title' => ['nullable', 'string', 'max:255'],
            'hero_text' => ['nullable', 'string'],
            'hero_image' => ['nullable', 'image', 'max:4096'],
            'features_title' => ['nullable', 'string', 'max:255'],
            'feature_grid' => ['nullable', 'array'],
            'feature_grid.*.icon' => ['nullable', 'string', 'max:100'],
            'feature_grid.*.title' => ['nullable', 'string', 'max:255'],
            'feature_grid.*.text' => ['nullable', 'string'],
            'systems_eyebrow' => ['nullable', 'string', 'max:255'],
            'systems_title' => ['nullable', 'string', 'max:255'],
            'systems_text' => ['nullable', 'string'],
            'systems_grid' => ['nullable', 'array'],
            'systems_grid.*.number' => ['nullable', 'string', 'max:50'],
            'systems_grid.*.title' => ['nullable', 'string', 'max:255'],
            'systems_grid.*.text' => ['nullable', 'string'],
            'systems_grid.*.image' => ['nullable', 'image', 'max:4096'],
            'applications_eyebrow' => ['nullable', 'string', 'max:255'],
            'applications_title' => ['nullable', 'string', 'max:255'],
            'applications_grid' => ['nullable', 'array'],
            'applications_grid.*.label' => ['nullable', 'string', 'max:255'],
            'applications_grid.*.image' => ['nullable', 'image', 'max:4096'],
            'why_choose_eyebrow' => ['nullable', 'string', 'max:255'],
            'why_choose_title' => ['nullable', 'string', 'max:255'],
            'why_choose_grid' => ['nullable', 'array'],
            'why_choose_grid.*.icon' => ['nullable', 'string', 'max:100'],
            'why_choose_grid.*.title' => ['nullable', 'string', 'max:255'],
            'why_choose_grid.*.text' => ['nullable', 'string'],
            'news_eyebrow' => ['nullable', 'string', 'max:255'],
            'news_title' => ['nullable', 'string', 'max:255'],
            'news_cta_title' => ['nullable', 'string', 'max:255'],
            'news_cta_text' => ['nullable', 'string'],
            'faq_eyebrow' => ['nullable', 'string', 'max:255'],
            'faq_title' => ['nullable', 'string', 'max:255'],
            'car_clubs_eyebrow' => ['nullable', 'string', 'max:255'],
            'car_clubs_title' => ['nullable', 'string', 'max:255'],
            'car_clubs_text' => ['nullable', 'string'],
            'car_clubs_image' => ['nullable', 'image', 'max:4096'],
            'testimonials_eyebrow' => ['nullable', 'string', 'max:255'],
            'testimonials_title' => ['nullable', 'string', 'max:255'],
            'contact_heading' => ['nullable', 'string', 'max:255'],
            'contact_text' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        $data['hero_image'] = $this->replaceImage($request->file('hero_image'), 'home', $page->hero_image);
        $data['car_clubs_image'] = $this->replaceImage($request->file('car_clubs_image'), 'home', $page->car_clubs_image);

        $data['feature_grid'] = $this->compactGrid($data['feature_grid'] ?? [], 'title');
        $data['why_choose_grid'] = $this->compactGrid($data['why_choose_grid'] ?? [], 'title');

        $existingSystemsGrid = $page->systems_grid ?? [];
        $systemsGrid = [];

        foreach ($data['systems_grid'] ?? [] as $i => $item) {
            $existing = $existingSystemsGrid[$i] ?? [];
            $image = $this->replaceImage($request->file("systems_grid.$i.image"), 'home', $existing['image'] ?? null);

            if (! $image && empty($item['title']) && empty($existing['title'])) {
                continue;
            }

            $systemsGrid[] = [
                'number' => $item['number'] ?? ($existing['number'] ?? ''),
                'title' => $item['title'] ?? ($existing['title'] ?? ''),
                'text' => $item['text'] ?? ($existing['text'] ?? ''),
                'image' => $image,
            ];
        }

        $data['systems_grid'] = $systemsGrid ?: null;

        $existingApplicationsGrid = $page->applications_grid ?? [];
        $applicationsGrid = [];

        foreach ($data['applications_grid'] ?? [] as $i => $item) {
            $existing = $existingApplicationsGrid[$i] ?? [];
            $image = $this->replaceImage($request->file("applications_grid.$i.image"), 'home', $existing['image'] ?? null);

            if (! $image && empty($item['label']) && empty($existing['label'])) {
                continue;
            }

            $applicationsGrid[] = [
                'label' => $item['label'] ?? ($existing['label'] ?? ''),
                'image' => $image,
            ];
        }

        $data['applications_grid'] = $applicationsGrid ?: null;

        $page->update($data);

        return back()->with('success', 'Home page updated.');
    }

    public function editAbout(): View
    {
        return view('admin.pages.about', ['page' => AboutPage::current()]);
    }

    public function updateAbout(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'story_body' => ['nullable', 'string'],
            'drives_us_grid' => ['nullable', 'array'],
            'drives_us_grid.*.icon' => ['nullable', 'string', 'max:100'],
            'drives_us_grid.*.title' => ['nullable', 'string', 'max:255'],
            'drives_us_grid.*.text' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        $data['drives_us_grid'] = $this->compactGrid($data['drives_us_grid'] ?? [], 'title');

        AboutPage::current()->update($data);

        return back()->with('success', 'About page updated.');
    }

    public function editContact(): View
    {
        return view('admin.pages.contact', ['page' => ContactPage::current()]);
    }

    public function updateContact(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'shipping_address' => ['nullable', 'string'],
            'ordering_phone' => ['nullable', 'string', 'max:255'],
            'ordering_email' => ['nullable', 'string', 'max:255'],
            'tech_phone' => ['nullable', 'string', 'max:255'],
            'tech_email' => ['nullable', 'string', 'max:255'],
            'dealer_phone' => ['nullable', 'string', 'max:255'],
            'dealer_email' => ['nullable', 'string', 'max:255'],
            'intro_text' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        ContactPage::current()->update($data);

        return back()->with('success', 'Contact page updated.');
    }

    public function editSystems(): View
    {
        return view('admin.pages.systems', ['page' => SystemsPage::current()]);
    }

    public function updateSystems(Request $request): RedirectResponse
    {
        $page = SystemsPage::current();

        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096'],
            'description' => ['nullable', 'string'],
            'includes_list' => ['nullable', 'string'],
            'options_list' => ['nullable', 'string'],
            'kits' => ['nullable', 'array'],
            'kits.*.label' => ['nullable', 'string', 'max:255'],
            'kits.*.title' => ['nullable', 'string', 'max:255'],
            'kits.*.text' => ['nullable', 'string'],
            'kits.*.image' => ['nullable', 'image', 'max:4096'],
            'kits.*.contact_email' => ['nullable', 'string', 'max:255'],
            'kits.*.contact_phone' => ['nullable', 'string', 'max:255'],
            'kits.*.extra_image_1' => ['nullable', 'image', 'max:4096'],
            'kits.*.extra_image_2' => ['nullable', 'image', 'max:4096'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        $data['image'] = $this->replaceImage($request->file('image'), 'systems', $page->image);
        $data['includes_list'] = $this->linesToArray($request->input('includes_list'));
        $data['options_list'] = $this->linesToArray($request->input('options_list'));

        $existingKits = $page->kits ?? [];
        $kits = [];

        foreach ($data['kits'] ?? [] as $i => $kit) {
            $existing = $existingKits[$i] ?? [];

            $kits[] = [
                'label' => $kit['label'] ?? ($existing['label'] ?? ''),
                'title' => $kit['title'] ?? ($existing['title'] ?? ''),
                'text' => $kit['text'] ?? ($existing['text'] ?? ''),
                'image' => $this->replaceImage($request->file("kits.$i.image"), 'systems', $existing['image'] ?? null),
                'contact_email' => $kit['contact_email'] ?? ($existing['contact_email'] ?? null),
                'contact_phone' => $kit['contact_phone'] ?? ($existing['contact_phone'] ?? null),
                'extra_images' => [
                    $this->replaceImage($request->file("kits.$i.extra_image_1"), 'systems', $existing['extra_images'][0] ?? null),
                    $this->replaceImage($request->file("kits.$i.extra_image_2"), 'systems', $existing['extra_images'][1] ?? null),
                ],
            ];

            $kits[$i]['extra_images'] = array_values(array_filter($kits[$i]['extra_images']));
        }

        $data['kits'] = $kits ?: null;

        $page->update($data);

        return back()->with('success', 'Systems page updated.');
    }

    public function editAdvantages(): View
    {
        return view('admin.pages.advantages', ['page' => AdvantagesPage::current()]);
    }

    public function updateAdvantages(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'banner_eyebrow' => ['nullable', 'string', 'max:255'],
            'banner_title' => ['nullable', 'string', 'max:255'],
            'intro_body' => ['nullable', 'string'],
            'features_heading' => ['nullable', 'string', 'max:255'],
            'feature_grid' => ['nullable', 'array'],
            'feature_grid.*.icon' => ['nullable', 'string', 'max:100'],
            'feature_grid.*.title' => ['nullable', 'string', 'max:255'],
            'feature_grid.*.text' => ['nullable', 'string'],
            'testimonials_eyebrow' => ['nullable', 'string', 'max:255'],
            'testimonials_title' => ['nullable', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        $data['feature_grid'] = $this->compactGrid($data['feature_grid'] ?? [], 'title');

        AdvantagesPage::current()->update($data);

        return back()->with('success', 'Our Advantages page updated.');
    }

    public function editPrelube(): View
    {
        return view('admin.pages.prelube', ['page' => PrelubePage::current()]);
    }

    public function updatePrelube(Request $request): RedirectResponse
    {
        $page = PrelubePage::current();

        $data = $request->validate([
            'caption' => ['nullable', 'string'],
            'hero_image' => ['nullable', 'image', 'max:4096'],
            'benefit_1_text' => ['nullable', 'string', 'max:255'],
            'benefit_2_text' => ['nullable', 'string', 'max:255'],
            'gallery_image_1' => ['nullable', 'image', 'max:4096'],
            'gallery_image_2' => ['nullable', 'image', 'max:4096'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        $data['hero_image'] = $this->replaceImage($request->file('hero_image'), 'prelube', $page->hero_image);
        $data['gallery_image_1'] = $this->replaceImage($request->file('gallery_image_1'), 'prelube', $page->gallery_image_1);
        $data['gallery_image_2'] = $this->replaceImage($request->file('gallery_image_2'), 'prelube', $page->gallery_image_2);

        $page->update($data);

        return back()->with('success', 'Prelube page updated.');
    }

    public function editAccessories(): View
    {
        return view('admin.pages.accessories', ['page' => AccessoriesPage::current()]);
    }

    public function updateAccessories(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'banner_eyebrow' => ['nullable', 'string', 'max:255'],
            'banner_title' => ['nullable', 'string', 'max:255'],
            'banner_text' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        AccessoriesPage::current()->update($data);

        return back()->with('success', 'Staff page updated.');
    }

    public function editCustomHouse(): View
    {
        return view('admin.pages.custom-house', ['page' => CustomHosePage::current()]);
    }

    public function updateCustomHouse(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'banner_eyebrow' => ['nullable', 'string', 'max:255'],
            'banner_title' => ['nullable', 'string', 'max:255'],
            'banner_text' => ['nullable', 'string'],
            'other_stuff_heading' => ['nullable', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        CustomHosePage::current()->update($data);

        return back()->with('success', 'Custom Hose page updated.');
    }

    public function editApplicationsHub(): View
    {
        return view('admin.pages.applications-hub', ['page' => ApplicationsHubPage::current()]);
    }

    public function updateApplicationsHub(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'banner_eyebrow' => ['nullable', 'string', 'max:255'],
            'banner_title' => ['nullable', 'string', 'max:255'],
            'banner_text' => ['nullable', 'string'],
            'intro_title' => ['nullable', 'string', 'max:255'],
            'intro_body' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        ApplicationsHubPage::current()->update($data);

        return back()->with('success', 'Applications hub page updated.');
    }

    private function linesToArray(?string $value): array
    {
        return collect(explode("\n", (string) $value))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }

    private function compactGrid(array $rows, string $requiredKey): ?array
    {
        $rows = array_values(array_filter($rows, fn ($row) => ! empty($row[$requiredKey])));

        return $rows ?: null;
    }
}
