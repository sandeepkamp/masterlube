<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class IndustryController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $industries = Industry::orderBy('order')->get();

        return view('admin.industries.index', compact('industries'));
    }

    public function create(): View
    {
        return view('admin.industries.form', ['industry' => new Industry]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = ($data['slug'] ?? null) ?: Str::slug($data['name']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $this->storeImage($request->file('hero_image'), 'industries');
        }
        if ($request->hasFile('thumbnail_image')) {
            $data['thumbnail_image'] = $this->storeImage($request->file('thumbnail_image'), 'industries');
        }
        if ($request->hasFile('secondary_image')) {
            $data['secondary_image'] = $this->storeImage($request->file('secondary_image'), 'industries');
        }

        Industry::create($data);

        return redirect()->route('admin.industries.index')->with('success', 'Industry created.');
    }

    public function edit(Industry $industry): View
    {
        return view('admin.industries.form', compact('industry'));
    }

    public function update(Request $request, Industry $industry): RedirectResponse
    {
        $data = $this->validated($request, $industry);
        $data['slug'] = ($data['slug'] ?? null) ?: Str::slug($data['name']);

        $data['hero_image'] = $this->replaceImage($request->file('hero_image'), 'industries', $industry->hero_image);
        $data['thumbnail_image'] = $this->replaceImage($request->file('thumbnail_image'), 'industries', $industry->thumbnail_image);
        $data['secondary_image'] = $this->replaceImage($request->file('secondary_image'), 'industries', $industry->secondary_image);

        $industry->update($data);

        return redirect()->route('admin.industries.index')->with('success', 'Industry updated.');
    }

    public function destroy(Industry $industry): RedirectResponse
    {
        $this->deleteImage($industry->hero_image);
        $this->deleteImage($industry->thumbnail_image);
        $this->deleteImage($industry->secondary_image);
        $industry->delete();

        return redirect()->route('admin.industries.index')->with('success', 'Industry deleted.');
    }

    private function validated(Request $request, ?Industry $industry = null): array
    {
        return $request->validate([
            'slug' => ['nullable', 'string', 'max:255', 'unique:industries,slug'.($industry ? ','.$industry->id : '')],
            'name' => ['required', 'string', 'max:255'],
            'nav_label' => ['nullable', 'string', 'max:255'],
            'hero_eyebrow' => ['nullable', 'string', 'max:255'],
            'hero_title' => ['nullable', 'string', 'max:255'],
            'hero_text' => ['nullable', 'string'],
            'hero_image' => ['nullable', 'image', 'max:4096'],
            'thumbnail_image' => ['nullable', 'image', 'max:4096'],
            'intro_body' => ['nullable', 'string'],
            'secondary_title' => ['nullable', 'string', 'max:255'],
            'secondary_body' => ['nullable', 'string'],
            'secondary_image' => ['nullable', 'image', 'max:4096'],
            'callout_text' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);
    }
}
