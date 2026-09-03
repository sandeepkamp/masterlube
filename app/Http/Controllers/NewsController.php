<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $items = News::published()->orderByDesc('published_at')->get();

        return view('news.index', ['items' => $items]);
    }

    public function show(News $news): View
    {
        $related = News::published()
            ->where('id', '!=', $news->id)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('news.show', ['item' => $news, 'related' => $related]);
    }
}
