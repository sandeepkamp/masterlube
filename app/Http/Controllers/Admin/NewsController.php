<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $items = News::orderByDesc('published_at')->get();

        return view('admin.news.index', compact('items'));
    }

    public function create(): View
    {
        return view('admin.news.form', ['item' => new News]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->storeImage($request->file('cover_image'), 'news');
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'News item created.');
    }

    public function edit(News $news): View
    {
        return view('admin.news.form', ['item' => $news]);
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($data['title']);
        $data['cover_image'] = $this->replaceImage($request->file('cover_image'), 'news', $news->cover_image);

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'News item updated.');
    }

    public function destroy(News $news): RedirectResponse
    {
        $this->deleteImage($news->cover_image);
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News item deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'badge' => ['nullable', 'string', 'max:100'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['nullable', 'string'],
            'cover_image' => ['nullable', 'image', 'max:4096'],
            'published_at' => ['nullable', 'date'],
            'status' => ['required', 'in:draft,published'],
        ]);
    }
}
