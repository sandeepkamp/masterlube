<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Magazine;
use App\Models\MagazinePage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class MagazineController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $magazines = Magazine::withCount('pages')->orderBy('order')->get();

        return view('admin.magazines.index', compact('magazines'));
    }

    public function create(): View
    {
        return view('admin.magazines.form', ['magazine' => new Magazine]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->storeImage($request->file('cover_image'), 'magazines');
        }

        $magazine = Magazine::create($data);
        $this->syncPages($request, $magazine);

        return redirect()->route('admin.magazines.index')->with('success', 'Magazine created.');
    }

    public function edit(Magazine $magazine): View
    {
        $magazine->load('pages');

        return view('admin.magazines.form', compact('magazine'));
    }

    public function update(Request $request, Magazine $magazine): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($data['title']);
        $data['cover_image'] = $this->replaceImage($request->file('cover_image'), 'magazines', $magazine->cover_image);

        $magazine->update($data);
        $this->syncPages($request, $magazine);

        return redirect()->route('admin.magazines.index')->with('success', 'Magazine updated.');
    }

    public function destroy(Magazine $magazine): RedirectResponse
    {
        $this->deleteImage($magazine->cover_image);
        foreach ($magazine->pages as $page) {
            $this->deleteImage($page->image);
        }
        $magazine->delete();

        return redirect()->route('admin.magazines.index')->with('success', 'Magazine deleted.');
    }

    public function destroyPage(MagazinePage $page): RedirectResponse
    {
        $magazine = $page->magazine;
        $this->deleteImage($page->image);
        $page->delete();

        return redirect()->route('admin.magazines.edit', $magazine)->with('success', 'Page removed.');
    }

    private function syncPages(Request $request, Magazine $magazine): void
    {
        foreach ($request->file('new_pages', []) as $i => $file) {
            $magazine->pages()->create([
                'image' => $this->storeImage($file, 'magazines'),
                'order' => $magazine->pages()->max('order') + $i + 1,
            ]);
        }
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'cover_image' => ['nullable', 'image', 'max:4096'],
            'order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);
    }
}
