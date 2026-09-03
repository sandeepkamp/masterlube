<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CmsPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CmsPageController extends Controller
{
    public function index(): View
    {
        $pages = CmsPage::orderBy('order')->get();

        return view('admin.cms-pages.index', compact('pages'));
    }

    public function create(): View
    {
        return view('admin.cms-pages.form', ['page' => new CmsPage]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = ($data['slug'] ?? null) ?: Str::slug($data['title']);

        CmsPage::create($data);

        return redirect()->route('admin.cms-pages.index')->with('success', 'Page created.');
    }

    public function edit(CmsPage $cmsPage): View
    {
        return view('admin.cms-pages.form', ['page' => $cmsPage]);
    }

    public function update(Request $request, CmsPage $cmsPage): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = ($data['slug'] ?? null) ?: Str::slug($data['title']);

        $cmsPage->update($data);

        return redirect()->route('admin.cms-pages.index')->with('success', 'Page updated.');
    }

    public function destroy(CmsPage $cmsPage): RedirectResponse
    {
        $cmsPage->delete();

        return redirect()->route('admin.cms-pages.index')->with('success', 'Page deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'alpha_dash'],
            'body' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);
    }
}
