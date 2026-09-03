<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Accessory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AccessoryController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        $accessories = Accessory::orderBy('order')->get();

        return view('admin.accessories.index', compact('accessories'));
    }

    public function create(): View
    {
        return view('admin.accessories.form', ['accessory' => new Accessory]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request->file('image'), 'accessories');
        }

        Accessory::create($data);

        return redirect()->route('admin.accessories.index')->with('success', 'Accessory created.');
    }

    public function edit(Accessory $accessory): View
    {
        return view('admin.accessories.form', compact('accessory'));
    }

    public function update(Request $request, Accessory $accessory): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($data['name']);
        $data['image'] = $this->replaceImage($request->file('image'), 'accessories', $accessory->image);

        $accessory->update($data);

        return redirect()->route('admin.accessories.index')->with('success', 'Accessory updated.');
    }

    public function destroy(Accessory $accessory): RedirectResponse
    {
        $this->deleteImage($accessory->image);
        $accessory->delete();

        return redirect()->route('admin.accessories.index')->with('success', 'Accessory deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096'],
            'description' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $data['is_featured_on_custom_hose'] = $request->boolean('is_featured_on_custom_hose');

        return $data;
    }
}
