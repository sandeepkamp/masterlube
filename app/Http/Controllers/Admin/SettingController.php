<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    use HandlesUploads;

    private const TEXT_KEYS = [
        'company_name',
        'company_phone',
        'company_email_orders',
        'company_email_tech',
        'company_email_dealer',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'youtube_url',
        'footer_text',
        'copyright_text',
        'default_meta_title',
        'default_meta_description',
        'industry_benefit_1_title',
        'industry_benefit_1_text',
        'industry_benefit_2_title',
        'industry_benefit_2_text',
    ];

    public function edit(): View
    {
        $this->authorize('manage-settings');

        $settings = Setting::whereIn('key', array_merge(self::TEXT_KEYS, ['logo_path']))
            ->pluck('value', 'key');

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $this->authorize('manage-settings');

        $validated = $request->validate([
            ...array_fill_keys(self::TEXT_KEYS, ['nullable', 'string', 'max:2000']),
            'logo' => ['nullable', 'image', 'max:2048'],
        ]);

        foreach (self::TEXT_KEYS as $key) {
            Setting::set($key, $validated[$key] ?? null);
        }

        if ($request->hasFile('logo')) {
            $path = $this->replaceImage($request->file('logo'), 'settings', Setting::get('logo_path'));
            Setting::set('logo_path', $path, 'image');
        }

        return back()->with('success', 'Settings updated.');
    }
}
