<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Dealer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DealerController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $dealers = Dealer::orderBy('order')->get();

        return view('admin.dealers.index', compact('dealers'));
    }

    public function create(): View
    {
        return view('admin.dealers.form', ['dealer' => new Dealer]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request->file('image'), 'dealers');
        }

        Dealer::create($data);

        return redirect()->route('admin.dealers.index')->with('success', 'Dealer created.');
    }

    public function edit(Dealer $dealer): View
    {
        return view('admin.dealers.form', compact('dealer'));
    }

    public function update(Request $request, Dealer $dealer): RedirectResponse
    {
        $data = $this->validated($request);
        $data['image'] = $this->replaceImage($request->file('image'), 'dealers', $dealer->image);

        $dealer->update($data);

        return redirect()->route('admin.dealers.index')->with('success', 'Dealer updated.');
    }

    public function destroy(Dealer $dealer): RedirectResponse
    {
        $this->deleteImage($dealer->image);
        $dealer->delete();

        return redirect()->route('admin.dealers.index')->with('success', 'Dealer deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096'],
            'url' => ['nullable', 'url', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);
    }
}
